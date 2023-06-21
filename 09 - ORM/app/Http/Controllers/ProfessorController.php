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
        $docencia = Docencia::all();
        $data = Professor::with(['eixo'])->get();
        
        foreach ($data as $prof) {
            $prof->vinculos = 0;
            foreach ($docencia as $doc) {
                if ($doc->professor_id == $prof->id) {
                    $prof->vinculos++;
                }
            }
        }
        return view('professores.index', compact(['data']));
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
        $regras = [
            'nome' => 'required|min:10|max:100',
            'email' => 'required|min:15|max:250|unique:professores',
            'siape' => 'required|min:8|max:10|unique:professores',
            'eixo_id' => 'required',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

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
        $regras = [
            'nome' => 'required|min:10|max:100',
            'email' => 'required|min:15|max:250|unique:professores',
            'siape' => 'required|min:8|max:10|unique:professores',
            'eixo_id' => 'required',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);
        
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
