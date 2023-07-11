<?php

use App\Facades\UserPermissions;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     //return view('dashboard');
//     return view('templates.middleware')->with('titulo', "");
// })->middleware(['auth'])->name('dashboard');

// Route::get('/', function () {
//     return view('templates.main')->with('titulo', "");
// })->name('index');

Route::get('/dashboard', function () {
    return view('templates.middleware')->with('titulo', "");
})->middleware(['auth'])->name('dashboard');


Route::resource('/livros', '\App\Http\Controllers\LivroController')
    ->middleware(['auth']);
Route::resource('/generos', '\App\Http\Controllers\GeneroController')
    ->middleware(['auth']);
Route::resource('/alunos', '\App\Http\Controllers\AlunoController')
    ->middleware(['auth']);
Route::resource('/cursos', '\App\Http\Controllers\CursoController')
    ->middleware(['auth']);
Route::resource('/emprestimos', '\App\Http\Controllers\EmprestimoController')
    ->middleware(['auth']);

require __DIR__.'/auth.php';
