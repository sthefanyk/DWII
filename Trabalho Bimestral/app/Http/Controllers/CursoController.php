<?php

namespace App\Http\Controllers;

use App\Models\AreaEixo;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Curso::all();
        $eixos = AreaEixo::all();
        return view('cursos.index', compact(['data', 'eixos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eixos = AreaEixo::all();
        return view('cursos.create', compact(['eixos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encoding = mb_internal_encoding();

        Curso::create([
            'nome' => mb_strtoupper($request->nome, $encoding),
            'sigla' => mb_strtoupper($request->sigla, $encoding),
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixo,
        ]);

        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Curso::find($id);
        $eixos = AreaEixo::all();  
        return view('cursos.show', compact('data', 'eixos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Curso::find($id);
        $eixos = AreaEixo::all();   
        return view('cursos.edit', compact(['data', 'eixos']));
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
        $encoding = mb_internal_encoding();

        $reg = Curso::find($id);
        $reg->fill([
            'nome' => mb_strtoupper($request->nome, $encoding),
            'sigla' => mb_strtoupper($request->sigla, $encoding),
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixo,
        ]);
        $reg->save();

        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::destroy($id);
        return redirect()->route('cursos.index');
    }
}
