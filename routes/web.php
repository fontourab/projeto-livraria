<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/cliente')->group(function () {
    Route::get('/index', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/store', [ClienteController::class, 'store'])->name('cliente.store');
});