<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Aluno;
use App\Models\Livro;
use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!UserPermissions::isAuthorized('matriculas.index')) {
            abort(403);
        }

        $dados[0] = Emprestimo::all();
        return view('matriculas.index', compact(['dados']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emprestimos = $request->emprestimos;
        $obj_aluno = Aluno::find($request->aluno);
        Emprestimo::where('aluno_id', $obj_aluno->id)->forceDelete();
        
        if($emprestimos != null){
            foreach($emprestimos as $emp){
                $obj_livro = Livro::find($emp);

                if(!isset($obj_aluno) || !isset($obj_livro)) { 
                    return "<h1>emp: id não encontrado!"; 
                }

                $obj = new Emprestimo();
                $obj->aluno()->associate($obj_aluno);
                $obj->livro()->associate($obj_livro);
                $obj->save();
            }
        }
        
        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
