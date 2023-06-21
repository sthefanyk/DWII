<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Disciplina::with(['curso'])->get();
        return view('disciplinas.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('disciplinas.create', compact('cursos'));
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
            'carga' => 'required|min:1|max:12',
            'curso_id' => 'required',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

        $encoding = mb_internal_encoding();

        Disciplina::create([
            'nome' => mb_strtoupper($request->nome, $encoding), 
            'curso_id' => $request->curso,
            'carga' => $request->carga,
        ]);

        return redirect()->route('disciplinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Disciplina::find($id);
        $cursos = Curso::all();
        return view('disciplinas.show', compact(['data','cursos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Disciplina::find($id); 
        $cursos = Curso::all();  
        return view('disciplinas.edit', compact('data', 'cursos'));
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
        $regras = [
            'nome' => 'required|min:10|max:100',
            'carga' => 'required|min:1|max:12',
            'curso_id' => 'required',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);
        
        $encoding = mb_internal_encoding();
        
        $reg = Disciplina::find($id);
        $reg->fill([
            'nome' => mb_strtoupper($request->nome), 
            'curso_id' => $request->curso,
            'carga' => $request->carga,
        ]);
        $reg->save();

        return redirect()->route('disciplinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disciplina::destroy($id);
        return redirect()->route('disciplinas.index');
    }
}
