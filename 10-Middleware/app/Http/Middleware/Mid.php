<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class Mid {

    /* public function handle(Request $request, Closure $next, $nome, $idade) {
        Log::debug("[Mid]: $nome - $idade");
        return $response;
    }*/

    /*public function handle(Request $request, Closure $next) {

        Log::debug("[Mid]: Antes Resposta");
        $response = $next($request);
        Log::debug("[Mid]: Depois Resposta");
        return $response;
    }*/

    /*public function handle(Request $request, Closure $next) {

        Log::debug("[Mid]: Antes Resposta");
        $response = $next($request);
        Log::debug("[Mid]: Depois Resposta");
        Log::debug($response->getContent());
        return $response;
    }*/

    /*public function handle(Request $request, Closure $next) {

        Log::debug("[Mid]: Antes Resposta");
        $response = $next($request);
        Log::debug("[Mid]: Depois Resposta");
        return $response->setContent("<h1>Resposta Alterada</h1>");
    }*/

    /*public function handle(Request $request, Closure $next) { 

        // $route = Route::currentRouteName();
        $route = $request->url();
        Log::debug("[Route]: ".$route);
        Log::debug("[Mid]: Antes Resposta");
        $response = $next($request);
        Log::debug("[Mid]: Depois Resposta");
        return $response;
    }*/

    public function handle(Request $request, Closure $next, $permissao) {

        $per = array(
            array(
                'eixos.index', 
                'cursos.index'
            ),
            array(
                'eixos.index','eixos.create','eixos.show','eixos.edit','eixos.destroy',
                'cursos.index', 'cursos.create','cursos.show','cursos.edit','cursos.destroy',
                'disciplinas.index', 
                'professores.index', 
                'alunos.index'
            ),
            array(
                'eixos.index','eixos.create','eixos.show','eixos.edit','eixos.destroy',
                'cursos.index', 'cursos.create','cursos.show','cursos.edit','cursos.destroy',
                'disciplinas.index', 'disciplinas.create','disciplinas.show','disciplinas.edit','disciplinas.destroy', 
                'professores.index', 'professores.create','professores.show','professores.edit','professores.destroy', 
                'alunos.index', 'alunos.create','alunos.show','alunos.edit','alunos.destroy', 
            ),
        );        

        $route = Route::currentRouteName();
        $pag = explode(".", Route::currentRouteName());
        $response = $next($request);

        foreach ($per[$permissao-1] as $rotas) {
            if ($rotas == $route) {
                return $response;
            }
        }
        return redirect('permissoes');
    }

}
