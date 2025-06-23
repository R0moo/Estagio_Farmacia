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


Route::resource('projetos.cursos', CursoController::class);
Route::resource('projetos.cursos.estudantes', EstudanteController::class);
Route::resource('avaliacoes', AvaliacaoController::class);
Route::resource('projetos', ProjetoController::class);
Route::resource('projetos.postagens', PostagemController::class)->parameters(['postagens' => 'postagem']);
Route::resource('receitas', ReceitaController::class);
Route::resource('cursos', CursoController::class);
Route::get('cursos/modal/{curso}', [CursoController::class, 'showModal'])->name('cursos.modal');
Route::get('receitas/modal/{receita}', [ReceitaController::class, 'showModal'])->name('receitas.modal');
Route::post('/cursos/{curso}/inscrever', [CursoController::class, 'processarInscricao'])->name('cursos.inscrever.store');
Route::get('/cursos/{curso}/inscrever', [CursoController::class, 'inscrever'])->name('cursos.inscrever');
Route::get('/cursos/{curso}/avaliar', [AvaliacaoController::class, 'create'])->name('cursos.avaliacoes.create');
Route::post('/cursos/{curso}/avaliar', [AvaliacaoController::class, 'store'])->name('cursos.avaliacoes.store');

Route::middleware(['auth'])->group(function () {

    // Rotas apenas para moderadores
    Route::middleware(['moderador'])->group(function () {
        Route::resource('receitas', ReceitaController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('projetos.cursos', CursoController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('projetos.cursos.estudantes', EstudanteController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('avaliacoes', AvaliacaoController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('projetos', ProjetoController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('projetos.postagens', PostagemController::class)->parameters(['postagens' => 'postagem'])->only('create', 'edit', 'update', 'store');
        Route::resource('receitas', ReceitaController::class)->only('create', 'edit', 'update', 'store');
        Route::resource('cursos', CursoController::class)->only('create', 'edit', 'update', 'store');
    });
    
    // Rotas apenas para administradores
    Route::middleware(['admin'])->group(function () {

        Route::resource('receitas', ReceitaController::class)->only('create', 'edit', 'update', 'store', 'destroy');
        Route::resource('projetos.cursos', CursoController::class)->only('create', 'edit', 'update', 'store', 'destroy');
        Route::resource('projetos.cursos.estudantes', EstudanteController::class)->only('create', 'edit', 'update', 'store', 'destroy');
        Route::resource('avaliacoes', AvaliacaoController::class)->only('create', 'edit', 'update', 'store', 'destroy');
        Route::resource('projetos', ProjetoController::class)->only('create', 'edit', 'update', 'store', 'destroy');
        Route::resource('projetos.postagens', PostagemController::class)->parameters(['postagens' => 'postagem'])->only('create', 'edit', 'update', 'store', 'destroy');
        Route::resource('receitas', ReceitaController::class)->only('create', 'edit', 'update', 'store', 'destroy');
        Route::resource('cursos', CursoController::class)->only('create', 'edit', 'update', 'store', 'destroy');
        Route::get('/avaliacoes', [AvaliacaoController::class, 'index'])->name('avaliacoes.index');
        Route::get('/avaliacoes/{curso:id}', [AvaliacaoController::class, 'show'])->name('avaliacoes.show');

        Route::resource('usuarios', UserController::class);
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store']);
    });
});
require __DIR__.'/auth.php';
