<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Curso;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('cursos', CursoController::class)->only('index');
Route::get('cursos/modal/{curso}', [CursoController::class, 'showModal'])->name('cursos.modal');

Route::resource('receitas', ReceitaController::class);
Route::get('receitas/modal/{receita}', [ReceitaController::class, 'showModal'])->name('receitas.modal');

Route::resource('projetos.cursos.estudantes', EstudanteController::class);

Route::resource('avaliacoes', AvaliacaoController::class);

Route::resource('projetos', ProjetoController::class);
Route::resource('projetos.postagens', PostagemController::class)->parameters(['postagens' => 'postagem']);

Route::post('/cursos/{curso}/inscrever', [CursoController::class, 'processarInscricao'])->name('cursos.inscrever.store');
Route::get('/cursos/{curso}/inscrever', [CursoController::class, 'inscrever'])->name('cursos.inscrever');

Route::get('/cursos/{curso}/avaliar', [AvaliacaoController::class, 'create'])->name('cursos.avaliacoes.create');
Route::post('/cursos/{curso}/avaliar', [AvaliacaoController::class, 'store'])->name('cursos.avaliacoes.store');


Route::middleware(['auth'])->group(function () {
    

    Route::middleware(['auth', 'moderador.ou.admin'])->group(function () {
        Route::resource('receitas', ReceitaController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('projetos.cursos.estudantes', EstudanteController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('avaliacoes', AvaliacaoController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('projetos', ProjetoController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('projetos.postagens', PostagemController::class)->parameters(['postagens' => 'postagem'])->only('create', 'edit', 'update', 'store');
        Route::resource('receitas', ReceitaController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('cursos', CursoController::class)->only('create', 'edit', 'update', 'store');
        Route::post('/projetos/{projeto}/cursos/{curso}/materiais', [CursoController::class, 'adicionarMaterial'])->name('cursos.materiais.store');

        Route::get('projetos/{projeto}/cursos/create', [CursoController::class, 'create'])->name('projetos.cursos.create'); 
        Route::post('projetos/{projeto}/cursos', [CursoController::class, 'store'])->name('projetos.cursos.store');
        Route::get('projetos/{projeto}/cursos/edit', [CursoController::class, 'edit'])->name('projetos.cursos.edit');   
    });
    
    Route::get('projetos/{projeto}/cursos', [CursoController::class, 'index'])->name('projetos.cursos.index');
    Route::get('projetos/{projeto}/cursos/{curso}', [CursoController::class, 'show'])->name('projetos.cursos.show');

    Route::middleware(['course.access'])->group(function () {
        Route::resource('projetos.cursos', CursoController::class)->only('show');
    });

    Route::middleware(['admin'])->group(function () {

        Route::resource('receitas', ReceitaController::class)->only('destroy');
        Route::resource('projetos.cursos.estudantes', EstudanteController::class)->only('destroy');
        Route::resource('avaliacoes', AvaliacaoController::class)->only('destroy');
        Route::resource('projetos', ProjetoController::class)->only('destroy');
        Route::resource('projetos.postagens', PostagemController::class)->parameters(['postagens' => 'postagem'])->only('destroy');
        Route::resource('receitas', ReceitaController::class)->only('destroy');
        Route::resource('cursos', CursoController::class)->only('destroy');
        Route::resource('projetos.cursos', CursoController::class)->only(['destroy']);
        Route::get('/avaliacoes', [AvaliacaoController::class, 'index'])->name('avaliacoes.index');
        Route::get('/avaliacoes/{curso:id}', [AvaliacaoController::class, 'show'])->name('avaliacoes.show');
        
            Route::prefix('admin')->group(function () {
                Route::get('/solicitacoes', [AdminController::class, 'solicitacoes'])->name('admin.solicitacoes');
                Route::get('/solicitacoes/{solicitacao}', [AdminController::class, 'showSolicitacao'])->name('admin.solicitacoes.show');
                Route::post('/solicitacoes/{solicitacao}/aprovar', [AdminController::class, 'aprovar'])->name('admin.solicitacoes.aprovar');
                Route::post('/solicitacoes/{solicitacao}/rejeitar', [AdminController::class, 'rejeitar'])->name('admin.solicitacoes.rejeitar');
            });

        Route::resource('usuarios', UserController::class);
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store']);
    });
});
require __DIR__.'/auth.php';
