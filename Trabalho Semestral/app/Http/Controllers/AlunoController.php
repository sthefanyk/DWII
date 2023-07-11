<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Emprestimo;
use App\Models\Livro;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!UserPermissions::isAuthorized('alunos.index')) {
            abort(403);
        }

        $data = Aluno::with(['curso'])->get();
        return view('alunos.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!UserPermissions::isAuthorized('alunos.create')) {
            abort(403);
        }

        $dados = Curso::all();
        return view('alunos.create', compact('dados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:10|max:100',
            'curso_id' => 'required',
            'matricula' => 'required',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

        $obj_curso = Curso::find($request->curso_id);

        if(isset($obj_curso)) {

            $obj_aluno = new Aluno();
            $obj_aluno->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj_aluno->curso()->associate($obj_curso);
            $obj_aluno->matricula = $request->matricula;
            $obj_aluno->save();

            return redirect()->route('alunos.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!UserPermissions::isAuthorized('alunos.show')) {
            abort(403);
        }

        //$dados[0] = Aluno::with(['curso'])->find($id);
        $dados[0] = Aluno::find($id);

        //$dados[1]= Livro::where('cursos_id', $dados[0]->curso_id)->get();
        $dados[1]= Livro::all();

        $dados[2] = Emprestimo::where('aluno_id', $id)->get();

        return view('emprestimos.index', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!UserPermissions::isAuthorized('alunos.edit')) {
            abort(403);
        }

        $data = Aluno::find($id);
        $cursos = Curso::all();

        if(!isset($data)) {
            return "<h1> ID: $id não encontrado! </h1>";
        }

        return view('alunos.edit', compact('data', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj_aluno = Aluno::find($id);

        $regras = [
            'nome' => 'required|min:10|max:50',
            'curso_id' => 'required',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

        if(!isset($obj_aluno)) {
            return "<h1>ID: $id não encontrado! </h1>";
        }

        $obj_curso = Curso::find($request->curso_id);

        if(isset($obj_curso)) {
            $obj_aluno->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj_aluno->curso()->associate($obj_curso);
            $obj_aluno->matricula = $request->matricula;
            $obj_aluno->save();

            return redirect()->route('alunos.index');
        }

        return redirect()->route('alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!UserPermissions::isAuthorized('alunos.destroy')) {
            abort(403);
        }
        
        Aluno::destroy($id);
        return redirect()->route('alunos.index');
    }
}
