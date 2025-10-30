<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::resource('categorias', CategoriaController::class);
Route::resource('tarefas', TarefaController::class);
Route::get('/', function () {
    return redirect()->route('tarefas.index');
});
