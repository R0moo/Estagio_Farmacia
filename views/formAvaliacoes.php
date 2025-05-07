<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação do Curso</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="FormAvaliacoes">
    <div class="container">
    <h1>Avaliacão</h1>
    <form action="salvarAvaliacao.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $Avaliacao->getId(); ?>">
        <input type="hidden" name="estudante_id" value="<?php echo $Avaliacao->getEstudanteId() ?>">
        <input type="hidden" name="curso_id" value="<?php echo $Curso ?>">
        
        <h2>Confiança e Credibilidade no Curso e Instrutores</h2>
        <span class="questao">1. Eu sinto confiança no(a) instrutor(a) que ministrou o curso. </span>
        <input type="radio" name="cc_1" value="1" id="cc_1_1"> <label for="cc_1_1">Discordo Completamente</label>
        <input type="radio" name="cc_1" value="2" id="cc_1_2"> <label for="cc_1_2">Discordo</label>
        <input type="radio" name="cc_1" value="3" id="cc_1_3"> <label for="cc_1_3">Neutro</label>
        <input type="radio" name="cc_1" value="4" id="cc_1_4"> <label for="cc_1_4">Concordo</label>
        <input type="radio" name="cc_1" value="5" id="cc_1_5"> <label for="cc_1_5">Concordo Completamente</label>
        <br>
        <span class="questao">2. Eu acredito no conhecimento e na expertise do(a) instrutor(a).</span>
        <input type="radio" name="cc_2" value="1" id="cc_2_1"> <label for="cc_2_1">Discordo Completamente</label>
        <input type="radio" name="cc_2" value="2" id="cc_2_2"> <label for="cc_2_2">Discordo</label>
        <input type="radio" name="cc_2" value="3" id="cc_2_3"> <label for="cc_2_3">Neutro</label>
        <input type="radio" name="cc_2" value="4" id="cc_2_4"> <label for="cc_2_4">Concordo</label>
        <input type="radio" name="cc_2" value="5" id="cc_2_5"> <label for="cc_2_5">Concordo Completamente</label>
        <br>
        <span class="questao">3. Eu recomendaria este(a) instrutor(a) para colegas e amigos. </span>
        <input type="radio" name="cc_3" value="1" id="cc_3_1"> <label for="cc_3_1">Discordo Completamente</label>
        <input type="radio" name="cc_3" value="2" id="cc_3_2"> <label for="cc_3_2">Discordo</label>
        <input type="radio" name="cc_3" value="3" id="cc_3_3"> <label for="cc_3_3">Neutro</label>
        <input type="radio" name="cc_3" value="4" id="cc_3_4"> <label for="cc_3_4">Concordo</label>
        <input type="radio" name="cc_3" value="5" id="cc_3_5"> <label for="cc_3_5">Concordo Completamente</label>
        <br>
        <span class="questao">4. Eu seguirei as orientações e recomendações passadas pelo(a) instrutor(a).</span>
        <input type="radio" name="cc_4" value="1" id="cc_4_1"> <label for="cc_4_1">Discordo Completamente</label>
        <input type="radio" name="cc_4" value="2" id="cc_4_2"> <label for="cc_4_2">Discordo</label>
        <input type="radio" name="cc_4" value="3" id="cc_4_3"> <label for="cc_4_3">Neutro</label>
        <input type="radio" name="cc_4" value="4" id="cc_4_4"> <label for="cc_4_4">Concordo</label>
        <input type="radio" name="cc_4" value="5" id="cc_4_5"> <label for="cc_4_5">Concordo Completamente</label>
        <br>
        <span class="questao">5. O(A) instrutor(a) forneceu informações úteis e relevantes para minha formação.</span>
        <input type="radio" name="cc_5" value="1" id="cc_5_1"> <label for="cc_5_1">Discordo Completamente</label>
        <input type="radio" name="cc_5" value="2" id="cc_5_2"> <label for="cc_5_2">Discordo</label>
        <input type="radio" name="cc_5" value="3" id="cc_5_3"> <label for="cc_5_3">Neutro</label>
        <input type="radio" name="cc_5" value="4" id="cc_5_4"> <label for="cc_5_4">Concordo</label>
        <input type="radio" name="cc_5" value="5" id="cc_5_5"> <label for="cc_5_5">Concordo Completamente</label>
        <br>
        <span class="questao">6. O(A) instrutor(a) demonstrou estar atualizado(a) com as práticas e conhecimentos da área.</span>
        <input type="radio" name="cc_6" value="1" id="cc_6_1"> <label for="cc_6_1">Discordo Completamente</label>
        <input type="radio" name="cc_6" value="2" id="cc_6_2"> <label for="cc_6_2">Discordo</label>
        <input type="radio" name="cc_6" value="3" id="cc_6_3"> <label for="cc_6_3">Neutro</label>
        <input type="radio" name="cc_6" value="4" id="cc_6_4"> <label for="cc_6_4">Concordo</label>
        <input type="radio" name="cc_6" value="5" id="cc_6_5"> <label for="cc_6_5">Concordo Completamente</label>
        <br>
        <span class="questao">7. Eu gostaria que este(a) instrutor(a) ministrasse outros cursos que eu venha a fazer.</span>
        <input type="radio" name="cc_7" value="1" id="cc_7_1"> <label for="cc_7_1">Discordo Completamente</label>
        <input type="radio" name="cc_7" value="2" id="cc_7_2"> <label for="cc_7_2">Discordo</label>
        <input type="radio" name="cc_7" value="3" id="cc_7_3"> <label for="cc_7_3">Neutro</label>
        <input type="radio" name="cc_7" value="4" id="cc_7_4"> <label for="cc_7_4">Concordo</label>
        <input type="radio" name="cc_7" value="5" id="cc_7_5"> <label for="cc_7_5">Concordo Completamente</label>
        <br>
        <span class="questao">8. Caso alguém me pedisse uma opinião sobre este(a) instrutor(a), minha avaliação seria positiva.</span>
        <input type="radio" name="cc_8" value="1" id="cc_8_1"> <label for="cc_8_1">Discordo Completamente</label>
        <input type="radio" name="cc_8" value="2" id="cc_8_2"> <label for="cc_8_2">Discordo</label>
        <input type="radio" name="cc_8" value="3" id="cc_8_3"> <label for="cc_8_3">Neutro</label>
        <input type="radio" name="cc_8" value="4" id="cc_8_4"> <label for="cc_8_4">Concordo</label>
        <input type="radio" name="cc_8" value="5" id="cc_8_5"> <label for="cc_8_5">Concordo Completamente</label>
        <br>
        <span class="questao">9. O(A) instrutor(a) foi cuidadoso(a) e detalhista em suas explicações.</span>
        <input type="radio" name="cc_9" value="1" id="cc_9_1"> <label for="cc_9_1">Discordo Completamente</label>
        <input type="radio" name="cc_9" value="2" id="cc_9_2"> <label for="cc_9_2">Discordo</label>
        <input type="radio" name="cc_9" value="3" id="cc_9_3"> <label for="cc_9_3">Neutro</label>
        <input type="radio" name="cc_9" value="4" id="cc_9_4"> <label for="cc_9_4">Concordo</label>
        <input type="radio" name="cc_9" value="5" id="cc_9_5"> <label for="cc_9_5">Concordo Completamente</label>
        <br>
        <span class="questao">10. O(A) instrutor(a) e a equipe do curso trabalharam de forma colaborativa e eficiente.</span>
        <input type="radio" name="cc_10" value="1" id="cc_10_1"> <label for="cc_10_1">Discordo Completamente</label>
        <input type="radio" name="cc_10" value="2" id="cc_10_2"> <label for="cc_10_2">Discordo</label>
        <input type="radio" name="cc_10" value="3" id="cc_10_3"> <label for="cc_10_3">Neutro</label>
        <input type="radio" name="cc_10" value="4" id="cc_10_4"> <label for="cc_10_4">Concordo</label>
        <input type="radio" name="cc_10" value="5" id="cc_10_5"> <label for="cc_10_5">Concordo Completamente</label>
        <br>
        <span class="questao">11. O(A) instrutor(a) dedicou tempo suficiente para tirar dúvidas e auxiliar os alunos.</span>
        <input type="radio" name="cc_11" value="1" id="cc_11_1"> <label for="cc_11_1">Discordo Completamente</label>
        <input type="radio" name="cc_11" value="2" id="cc_11_2"> <label for="cc_11_2">Discordo</label>
        <input type="radio" name="cc_11" value="3" id="cc_11_3"> <label for="cc_11_3">Neutro</label>
        <input type="radio" name="cc_11" value="4" id="cc_11_4"> <label for="cc_11_4">Concordo</label>
        <input type="radio" name="cc_11" value="5" id="cc_11_5"> <label for="cc_11_5">Concordo Completamente</label>
        <br>
        <span class="questao">12. O(A) instrutor(a) demonstrou confiança na minha capacidade de aplicar os conhecimentos adquiridos.</span>
        <input type="radio" name="cc_12" value="1" id="cc_12_1"> <label for="cc_12_1">Discordo Completamente</label>
        <input type="radio" name="cc_12" value="2" id="cc_12_2"> <label for="cc_12_2">Discordo</label>
        <input type="radio" name="cc_12" value="3" id="cc_12_3"> <label for="cc_12_3">Neutro</label>
        <input type="radio" name="cc_12" value="4" id="cc_12_4"> <label for="cc_12_4">Concordo</label>
        <input type="radio" name="cc_12" value="5" id="cc_12_5"> <label for="cc_12_5">Concordo Completamente</label>
        <br>
        <span class="questao">13. O(A) instrutor(a) foi atencioso(a) e demonstrou preocupação com o aprendizado dos alunos.</span>
        <input type="radio" name="cc_13" value="1" id="cc_13_1"> <label for="cc_13_1">Discordo Completamente</label>
        <input type="radio" name="cc_13" value="2" id="cc_13_2"> <label for="cc_13_2">Discordo</label>
        <input type="radio" name="cc_13" value="3" id="cc_13_3"> <label for="cc_13_3">Neutro</label>
        <input type="radio" name="cc_13" value="4" id="cc_13_4"> <label for="cc_13_4">Concordo</label>
        <input type="radio" name="cc_13" value="5" id="cc_13_5"> <label for="cc_13_5">Concordo Completamente</label>
        <br>
        <h2>Relacionamento Interpessoal e Comunicação com os Instrutores</h2>
        <span class="questao">1. O(A) instrutor(a) foi amigável e acolhedor(a) durante o curso.</span>
        <input type="radio" name="rc_1" value="1" id="rc_1_1"> <label for="rc_1_1">Discordo Completamente</label>
        <input type="radio" name="rc_1" value="2" id="rc_1_2"> <label for="rc_1_2">Discordo</label>
        <input type="radio" name="rc_1" value="3" id="rc_1_3"> <label for="rc_1_3">Neutro</label>
        <input type="radio" name="rc_1" value="4" id="rc_1_4"> <label for="rc_1_4">Concordo</label>
        <input type="radio" name="rc_1" value="5" id="rc_1_5"> <label for="rc_1_5">Concordo Completamente</label>
        <br>
        <span class="questao">2. O(A) instrutor(a) demonstrou respeito pelos alunos e suas opiniões.</span>
        <input type="radio" name="rc_2" value="1" id="rc_2_1"> <label for="rc_2_1">Discordo Completamente</label>
        <input type="radio" name="rc_2" value="2" id="rc_2_2"> <label for="rc_2_2">Discordo</label>
        <input type="radio" name="rc_2" value="3" id="rc_2_3"> <label for="rc_2_3">Neutro</label>
        <input type="radio" name="rc_2" value="4" id="rc_2_4"> <label for="rc_2_4">Concordo</label>
        <input type="radio" name="rc_2" value="5" id="rc_2_5"> <label for="rc_2_5">Concordo Completamente</label>
        <br>
        <span class="questao">3. O(A) instrutor(a) foi paciente ao responder minhas perguntas e esclarecer minhas dúvidas.</span>
        <input type="radio" name="rc_3" value="1" id="rc_3_1"> <label for="rc_3_1">Discordo Completamente</label>
        <input type="radio" name="rc_3" value="2" id="rc_3_2"> <label for="rc_3_2">Discordo</label>
        <input type="radio" name="rc_3" value="3" id="rc_3_3"> <label for="rc_3_3">Neutro</label>
        <input type="radio" name="rc_3" value="4" id="rc_3_4"> <label for="rc_3_4">Concordo</label>
        <input type="radio" name="rc_3" value="5" id="rc_3_5"> <label for="rc_3_5">Concordo Completamente</label>
        <br>
        <span class="questao">4. O(A) instrutor(a) prestou atenção nas minhas contribuições e questionamentos.</span>
        <input type="radio" name="rc_4" value="1" id="rc_4_1"> <label for="rc_4_1">Discordo Completamente</label>
        <input type="radio" name="rc_4" value="2" id="rc_4_2"> <label for="rc_4_2">Discordo</label>
        <input type="radio" name="rc_4" value="3" id="rc_4_3"> <label for="rc_4_3">Neutro</label>
        <input type="radio" name="rc_4" value="4" id="rc_4_4"> <label for="rc_4_4">Concordo</label>
        <input type="radio" name="rc_4" value="5" id="rc_4_5"> <label for="rc_4_5">Concordo Completamente</label>
        <br>
        <span class="questao">5. O(A) instrutor(a) incentivou a participação e a interação durante as aulas.</span>
        <input type="radio" name="rc_5" value="1" id="rc_5_1"> <label for="rc_5_1">Discordo Completamente</label>
        <input type="radio" name="rc_5" value="2" id="rc_5_2"> <label for="rc_5_2">Discordo</label>
        <input type="radio" name="rc_5" value="3" id="rc_5_3"> <label for="rc_5_3">Neutro</label>
        <input type="radio" name="rc_5" value="4" id="rc_5_4"> <label for="rc_5_4">Concordo</label>
        <input type="radio" name="rc_5" value="5" id="rc_5_5"> <label for="rc_5_5">Concordo Completamente</label>
        <br>
        <span class="questao">6. O(A) instrutor(a) explicou os conceitos de forma clara e compreensível.</span>
        <input type="radio" name="rc_6" value="1" id="rc_6_1"> <label for="rc_6_1">Discordo Completamente</label>
        <input type="radio" name="rc_6" value="2" id="rc_6_2"> <label for="rc_6_2">Discordo</label>
        <input type="radio" name="rc_6" value="3" id="rc_6_3"> <label for="rc_6_3">Neutro</label>
        <input type="radio" name="rc_6" value="4" id="rc_6_4"> <label for="rc_6_4">Concordo</label>
        <input type="radio" name="rc_6" value="5" id="rc_6_5"> <label for="rc_6_5">Concordo Completamente</label>
        <br>
        <span class="questao">7. O(A) instrutor(a) me ajudou a entender os tópicos mais complexos do curso.</span>
        <input type="radio" name="rc_7" value="1" id="rc_7_1"> <label for="rc_7_1">Discordo Completamente</label>
        <input type="radio" name="rc_7" value="2" id="rc_7_2"> <label for="rc_7_2">Discordo</label>
        <input type="radio" name="rc_7" value="3" id="rc_7_3"> <label for="rc_7_3">Neutro</label>
        <input type="radio" name="rc_7" value="4" id="rc_7_4"> <label for="rc_7_4">Concordo</label>
        <input type="radio" name="rc_7" value="5" id="rc_7_5"> <label for="rc_7_5">Concordo Completamente</label>
        <br>
        <h2>Avaliação Geral do Curso</h2>
        <span class="questao">1. Eu recomendaria este curso para colegas e amigos.</span>
        <input type="radio" name="ag_1" value="1" id="ag_1_1"> <label for="ag_1_1">Discordo Completamente</label>
        <input type="radio" name="ag_1" value="2" id="ag_1_2"> <label for="ag_1_2">Discordo</label>
        <input type="radio" name="ag_1" value="3" id="ag_1_3"> <label for="ag_1_3">Neutro</label>
        <input type="radio" name="ag_1" value="4" id="ag_1_4"> <label for="ag_1_4">Concordo</label>
        <input type="radio" name="ag_1" value="5" id="ag_1_5"> <label for="ag_1_5">Concordo Completamente</label>
        <br>
        <span class="questao">2. Eu certamente participaria de outros cursos oferecidos por esta instituição.</span>
        <input type="radio" name="ag_2" value="1" id="ag_2_1"> <label for="ag_2_1">Discordo Completamente</label>
        <input type="radio" name="ag_2" value="2" id="ag_2_2"> <label for="ag_2_2">Discordo</label>
        <input type="radio" name="ag_2" value="3" id="ag_2_3"> <label for="ag_2_3">Neutro</label>
        <input type="radio" name="ag_2" value="4" id="ag_2_4"> <label for="ag_2_4">Concordo</label>
        <input type="radio" name="ag_2" value="5" id="ag_2_5"> <label for="ag_2_5">Concordo Completamente</label>
        <br>
        <span class="questao">3. Mesmo que houvesse outras opções de cursos na área, eu escolheria este novamente.</span>
        <input type="radio" name="ag_3" value="1" id="ag_3_1"> <label for="ag_3_1">Discordo Completamente</label>
        <input type="radio" name="ag_3" value="2" id="ag_3_2"> <label for="ag_3_2">Discordo</label>
        <input type="radio" name="ag_3" value="3" id="ag_3_3"> <label for="ag_3_3">Neutro</label>
        <input type="radio" name="ag_3" value="4" id="ag_3_4"> <label for="ag_3_4">Concordo</label>
        <input type="radio" name="ag_3" value="5" id="ag_3_5"> <label for="ag_3_5">Concordo Completamente</label>
        <br>
        <span class="questao">4. Considero este curso melhor do que outros que já fiz na mesma área.</span>
        <input type="radio" name="ag_4" value="1" id="ag_4_1"> <label for="ag_4_1">Discordo Completamente</label>
        <input type="radio" name="ag_4" value="2" id="ag_4_2"> <label for="ag_4_2">Discordo</label>
        <input type="radio" name="ag_4" value="3" id="ag_4_3"> <label for="ag_4_3">Neutro</label>
        <input type="radio" name="ag_4" value="4" id="ag_4_4"> <label for="ag_4_4">Concordo</label>
        <input type="radio" name="ag_4" value="5" id="ag_4_5"> <label for="ag_4_5">Concordo Completamente</label>
        <br>
        <span class="questao">5. Sinto-me leal a esta instituição de ensino após a experiência neste curso.</span>
        <input type="radio" name="ag_5" value="1" id="ag_5_1"> <label for="ag_5_1">Discordo Completamente</label>
        <input type="radio" name="ag_5" value="2" id="ag_5_2"> <label for="ag_5_2">Discordo</label>
        <input type="radio" name="ag_5" value="3" id="ag_5_3"> <label for="ag_5_3">Neutro</label>
        <input type="radio" name="ag_5" value="4" id="ag_5_4"> <label for="ag_5_4">Concordo</label>
        <input type="radio" name="ag_5" value="5" id="ag_5_5"> <label for="ag_5_5">Concordo Completamente</label>
        <br>
        <span class="questao">6. Quando me perguntam sobre cursos na área, sempre indico este.</span>
        <input type="radio" name="ag_6" value="1" id="ag_6_1"> <label for="ag_6_1">Discordo Completamente</label>
        <input type="radio" name="ag_6" value="2" id="ag_6_2"> <label for="ag_6_2">Discordo</label>
        <input type="radio" name="ag_6" value="3" id="ag_6_3"> <label for="ag_6_3">Neutro</label>
        <input type="radio" name="ag_6" value="4" id="ag_6_4"> <label for="ag_6_4">Concordo</label>
        <input type="radio" name="ag_6" value="5" id="ag_6_5"> <label for="ag_6_5">Concordo Completamente</label>
        <br>
        <span class="questao">7. Confio na qualidade do ensino e dos recursos oferecidos por esta instituição.</span>
        <input type="radio" name="ag_7" value="1" id="ag_7_1"> <label for="ag_7_1">Discordo Completamente</label>
        <input type="radio" name="ag_7" value="2" id="ag_7_2"> <label for="ag_7_2">Discordo</label>
        <input type="radio" name="ag_7" value="3" id="ag_7_3"> <label for="ag_7_3">Neutro</label>
        <input type="radio" name="ag_7" value="4" id="ag_7_4"> <label for="ag_7_4">Concordo</label>
        <input type="radio" name="ag_7" value="5" id="ag_7_5"> <label for="ag_7_5">Concordo Completamente</label>
        <br>
        <textarea name="comentario" id="comentario">Insira um comentário (opcional)</textarea>
        <div class="btns">
        <a href="Avaliacoes.php">Voltar</a> <button type="submit">Salvar</button>
        </div>
    </form>
</div>
</body>
</html>