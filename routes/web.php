<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\UserController;


Route::group(['middleware' => 'admin'], function () {
    Route::get('/livros/create', [LivroController::class, 'create'])->name('livros.create');
    Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');
    Route::get('/livros/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');
    Route::put('/livros/{livro}', [LivroController::class, 'update'])->name('livros.update');
    Route::delete('/livros/{livro}', [LivroController::class, 'destroy'])->name('livros.delete');
    Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');
    Route::get('/generos/create', [GeneroController::class, 'create'])->name('generos.create');
    Route::post('/generos', [GeneroController::class, 'store'])->name('generos.store');
    Route::get('/generos/{genero}', [GeneroController::class, 'show'])->name('generos.show');
    Route::get('/generos/{genero}/edit', [GeneroController::class, 'edit'])->name('generos.edit');
    Route::put('/generos/{genero}', [GeneroController::class, 'update'])->name('generos.update');
    Route::delete('/generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.delete');
});

Route::group(['middleware' => 'user'], function () {
    Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
    Route::get('/livros/{livro}', [LivroController::class, 'show'])->name('livros.show');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/{user}/edit', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
