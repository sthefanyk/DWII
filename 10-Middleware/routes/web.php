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

/*Route::get('/', function () {
    return view('welcome');

})->middleware('Mid');  //->middleware(Mid::class);*/

/*Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');*/

Route::get('/', function () {
    return view('templates.middleware')->with('titulo', "");
})->name('index');


// Route::get('/alunos', 'AlunoController@index')->middleware('Mid: Gil, 12');
// Route::get('/alunos/{id}', 'AlunoController@show')->middleware('Mid: Eduardo, 34');
/*Route::get('/alunos', 'AlunoController@index')
    ->middleware('Mid', 'NewMid')->name('alunos.index');*/

//Route::resource('alunos', 'AlunoController');
Route::resource('alunos', 'AlunoController')->middleware(['Mid: 1']);
Route::resource('cursos', 'CursoController')->middleware(['Mid: 1']);
Route::resource('disciplinas', 'DisciplinaController')->middleware(['Mid: 1']);
Route::resource('eixos', 'EixoController')->middleware(['Mid: 1']);
Route::resource('professores', 'ProfessorController')->middleware(['Mid: 1']);

/*Route::get('/alunos/{id}', 'AlunoController@show')
    ->middleware('Mid')->name('alunos.show');*/
