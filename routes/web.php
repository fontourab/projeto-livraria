<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ClienteLivroController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::prefix('/autor')->group(function () {
    Route::get('/index', [AutorController::class, 'index'])->name('autor.index');
    Route::get('/create', [AutorController::class, 'create'])->name('autor.create');
    Route::post('/store', [AutorController::class, 'store'])->name('autor.store');
    Route::get('/{id}/show', [AutorController::class, 'show'])->name('autor.show');
    Route::get('/{id}/edit', [AutorController::class, 'edit'])->name('autor.edit');
    Route::put('/{id}/update', [AutorController::class, 'update'])->name('autor.update');
    Route::post('/destroy', [AutorController::class, 'destroy'])->name('autor.destroy');
});

Route::prefix('/cliente')->group(function () {
    Route::get('/index', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/store', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/{id}/show', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('/{id}/update', [ClienteController::class, 'update'])->name('cliente.update');
    Route::post('/destroy', [ClienteController::class, 'destroy'])->name('cliente.destroy');
});

Route::prefix('/emprestimo')->group(function () {
    Route::get('/index', [ClienteLivroController::class, 'index'])->name('emprestimo.index');
    Route::get('/create', [ClienteLivroController::class, 'create'])->name('emprestimo.create');
    Route::post('/store', [ClienteLivroController::class, 'store'])->name('emprestimo.store');
    Route::get('/{id}/show', [ClienteLivroController::class, 'show'])->name('emprestimo.show');
    Route::get('/{id}/edit', [ClienteLivroController::class, 'edit'])->name('emprestimo.edit');
    Route::put('/{id}/update', [ClienteLivroController::class, 'update'])->name('emprestimo.update');
    Route::post('/destroy', [ClienteLivroController::class, 'destroy'])->name('emprestimo.destroy');
});

Route::prefix('/funcionario')->group(function () {
    Route::get('/index', [FuncionarioController::class, 'index'])->name('funcionario.index');
    Route::get('/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
    Route::post('/store', [FuncionarioController::class, 'store'])->name('funcionario.store');
    Route::get('/{id}/show', [FuncionarioController::class, 'show'])->name('funcionario.show');
    Route::get('/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionario.edit');
    Route::put('/{id}/update', [FuncionarioController::class, 'update'])->name('funcionario.update');
    Route::post('/destroy', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
});

Route::prefix('/genero')->group(function () {
    Route::get('/index', [GeneroController::class, 'index'])->name('genero.index');
    Route::get('/create', [GeneroController::class, 'create'])->name('genero.create');
    Route::post('/store', [GeneroController::class, 'store'])->name('genero.store');
    Route::get('/{id}/show', [GeneroController::class, 'show'])->name('genero.show');
    Route::get('/{id}/edit', [GeneroController::class, 'edit'])->name('genero.edit');
    Route::put('/{id}/update', [GeneroController::class, 'update'])->name('genero.update');
    Route::post('/destroy', [GeneroController::class, 'destroy'])->name('genero.destroy');
});

Route::prefix('/livro')->group(function () {
    Route::get('/index', [LivroController::class, 'index'])->name('livro.index');
    Route::get('/create', [LivroController::class, 'create'])->name('livro.create');
    Route::post('/store', [LivroController::class, 'store'])->name('livro.store');
    Route::get('/{id}/show', [LivroController::class, 'show'])->name('livro.show');
    Route::get('/{id}/edit', [LivroController::class, 'edit'])->name('livro.edit');
    Route::put('/{id}/update', [LivroController::class, 'update'])->name('livro.update');
    Route::post('/destroy', [LivroController::class, 'destroy'])->name('livro.destroy');
});