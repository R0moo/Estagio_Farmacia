<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\Curso;
use App\Models\Estudante;
use Illuminate\Support\Facades\DB;

class AvaliacaoController extends Controller
{
    public function index()
    {
    $cursosComAvaliacoes = Curso::withCount('avaliacoes')->having('avaliacoes_count', '>', 0)->get();

    return view('cursos.avaliacoes.index', compact('cursosComAvaliacoes'));
    }

    public function create(Curso $curso)
    {

        $avaliacaoExistente = Avaliacao::where('curso_id', $curso->id)->where('estudante_id', auth()->id())->exists();

        if ($avaliacaoExistente) {
            return redirect()->back()->with('error', 'Você já avaliou este curso!');
        }

        return view('cursos.avaliacoes.create', compact('curso'));
    }

    public function store(Request $request, Curso $curso)
    {
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado para avaliar.');
    }

    if (!$estudante = auth()->user()->estudante) {
        return back()->with('error', 'Seu usuário não possui um perfil de estudante vinculado');
    }

    if (Avaliacao::where('estudante_id', $estudante->id)->where('curso_id', $curso->id)->exists()) {
        return back()->with('error', 'Você já avaliou este curso anteriormente')->withInput();
    }

    $validationRules = [
        'comentario' => 'nullable|string|max:500'
    ];

    for ($i = 1; $i <= 13; $i++) {
        $validationRules["cc_$i"] = 'required|integer|between:1,5';
    }

    for ($i = 1; $i <= 7; $i++) {
        $validationRules["rc_$i"] = 'required|integer|between:1,5';
    }

    for ($i = 1; $i <= 7; $i++) {
        $validationRules["ag_$i"] = 'required|integer|between:1,5';
    }

    $data = $request->validate($validationRules);

    try {
        $avaliacaoData = [
            'estudante_id' => $estudante->id,
            'curso_id' => $curso->id,
            'comentario' => $data['comentario'] ?? null
        ];

        foreach ($data as $key => $value) {
            if (str_starts_with($key, 'cc_') || str_starts_with($key, 'rc_') || str_starts_with($key, 'ag_')) {
                $avaliacaoData[$key] = $value;
            }
        }

        $avaliacao = Avaliacao::create($avaliacaoData);

        return redirect()->route('cursos.index')
               ->with('success', 'Avaliação registrada com sucesso!');

    } catch (\Exception $e) {
        \Log::error('Erro ao criar avaliação: ' . $e->getMessage());
        return back()->withInput()
               ->with('error', 'Erro ao registrar avaliação: ' . $e->getMessage());
    }
    }

    public function show($cursoId)
    {
    $curso = Curso::find($cursoId);
    $avaliacoes = $curso->avaliacoes()->get();

    $detalhes = [
        'cc' => $this->prepararDetalhesPerguntas($avaliacoes, 'cc', 13, [
            'Eu sinto confiança no(a) instrutor(a) que ministrou o curso',
            'Eu acredito no conhecimento e na expertise do(a) instrutor(a)',
            'Eu recomendaria este(a) instrutor(a) para colegas e amigos',
            'Eu seguirei as orientações e recomendações passadas pelo(a) instrutor(a)',
            'O(A) instrutor(a) forneceu informações úteis e relevantes para minha formação',
            'O(A) instrutor(a) demonstrou estar atualizado(a) com as práticas e conhecimentos da área',
            'Eu gostaria que este(a) instrutor(a) ministrasse outros cursos que eu venha a fazer',
            'Caso alguém me pedisse uma opinião sobre este(a) instrutor(a), minha avaliação seria positiva',
            'O(A) instrutor(a) foi cuidadoso(a) e detalhista em suas explicações',
            'O(A) instrutor(a) e a equipe do curso trabalharam de forma colaborativa e eficiente',
            'O(A) instrutor(a) dedicou tempo suficiente para tirar dúvidas e auxiliar os alunos',
            'O(A) instrutor(a) demonstrou confiança na minha capacidade de aplicar os conhecimentos adquiridos',
            'O(A) instrutor(a) foi atencioso(a) e demonstrou preocupação com o aprendizado dos alunos'
        ]),
        
        'rc' => $this->prepararDetalhesPerguntas($avaliacoes, 'rc', 7, [
            'O(A) instrutor(a) foi amigável e acolhedor(a) durante o curso',
            'O(A) instrutor(a) demonstrou respeito pelos alunos e suas opiniões',
            'O(A) instrutor(a) foi paciente ao responder minhas perguntas e esclarecer minhas dúvidas',
            'O(A) instrutor(a) prestou atenção nas minhas contribuições e questionamentos',
            'O(A) instrutor(a) incentivou a participação e a interação durante as aulas',
            'O(A) instrutor(a) explicou os conceitos de forma clara e compreensível',
            'O(A) instrutor(a) me ajudou a entender os tópicos mais complexos do curso'
        ]),
        
        'ag' => $this->prepararDetalhesPerguntas($avaliacoes, 'ag', 7, [
            'Eu recomendaria este curso para colegas e amigos',
            'Eu certamente participaria de outros cursos oferecidos por esta instituição',
            'Mesmo que houvesse outras opções de cursos na área, eu escolheria este novamente',
            'Considero este curso melhor do que outros que já fiz na mesma área',
            'Sinto-me leal a esta instituição de ensino após a experiência neste curso',
            'Quando me perguntam sobre cursos na área, sempre indico este',
            'Confio na qualidade do ensino e dos recursos oferecidos por esta instituição'
        ])
    ];
    
    return view('cursos.avaliacoes.show', [
        'curso' => $curso,
        'detalhes' => $detalhes,
        'totalAvaliacoes' => $avaliacoes->count()
    ]);
    }

    private function prepararDetalhesPerguntas($avaliacoes, $prefixo, $quantidade, $textosPerguntas)
    {
    $resultado = [];
    
    for ($i = 1; $i <= $quantidade; $i++) {
        $campo = $prefixo.'_'.$i;
        $valores = $avaliacoes->pluck($campo)->all();
        
        $resultado[] = [
            'pergunta' => $textosPerguntas[$i-1] ?? "Pergunta $i",
            'media' => round($avaliacoes->avg($campo), 2),
            'valores' => $valores,
            'distribuicao' => array_count_values($valores) + [1=>0, 2=>0, 3=>0, 4=>0, 5=>0]
        ];
    }
    
    return $resultado;
    }

    public function edit($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        return view('cursos.avaliacoes.edit', compact('avaliacao'));
    }

    public function update(Request $request, $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        $avaliacao->update($request->all());
        return redirect()->route('cursos.avaliacoes.index')->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        $avaliacao->delete();
        return redirect()->route('cursos.avaliacoes.index')->with('success', 'Avaliação removida com sucesso!');
    }
}
