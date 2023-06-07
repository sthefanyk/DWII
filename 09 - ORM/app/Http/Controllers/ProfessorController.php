<?php

namespace App\Http\Controllers;

use App\Models\AreaEixo;
use App\Models\Docencia;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Professor::all();
        $eixos = AreaEixo::all();
        $docencia = Docencia::all();
        return view('professores.index', compact(['data', 'eixos', 'docencia']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eixos = AreaEixo::all();
        return view('professores.create', compact('eixos'));
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

        Professor::create([
            'nome' => mb_strtoupper($request->nome, $encoding), 
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo_id' => $request->eixo,
            'ativo' => '1'
        ]);

        return redirect()->route('professores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Professor::find($id);
        $eixos = AreaEixo::all();
        return view('professores.show', compact(['data','eixos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Professor::find($id); 
        $eixos = AreaEixo::all();  
        return view('professores.edit', compact('data', 'eixos'));
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

        $reg = Professor::find($id);
        $reg->fill([
            'nome' => mb_strtoupper($request->nome, $encoding), 
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo' => $request->eixo,
            'ativo' => $request->status,
        ]);
        $reg->save();

        return redirect()->route('professores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reg = Professor::find($id);
        if ($reg->ativo == '1') {
            $reg->fill([
                'ativo' => '0',
            ]);
        }else{
            $reg->fill([
                'ativo' => '1',
            ]);
        }
        
        $reg->save();
        //Professor::destroy($id);
        return redirect()->route('professores.index');
    }
}
