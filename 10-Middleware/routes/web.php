<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Mid;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$permissoes = '3';

Route::get('/', function () {
    return view('templates.middleware')->with('titulo', "");
})->name('index');

Route::resource('alunos', 'AlunoController')->middleware(['Mid: '.$permissoes]);
Route::resource('cursos', 'CursoController')->middleware(['Mid: '.$permissoes]);
Route::resource('disciplinas', 'DisciplinaController')->middleware(['Mid: '.$permissoes]);
Route::resource('eixos', 'EixoController')->middleware(['Mid: '.$permissoes]);
Route::resource('professores', 'ProfessorController')->middleware(['Mid: '.$permissoes]);

Route::get('/permissoes', function() {
    return view('permissoes.denied');
});
