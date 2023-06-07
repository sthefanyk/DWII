<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;

use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    
    public function index() {
        $dados = Especialidade::all();
        return view('especialidades.index', compact(['dados']));
    }

    public function create() {
        return view('especialidades.create');
    }

   public function store(Request $request) {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'descricao' => 'required|max:250|min:20'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];
        
        $request->validate($regras, $msgs);

        Especialidade::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('especialidades.index');
    }

    public function show($id) {
        $dados = Especialidade::find($id);
        return view('especialidades.show', compact('dados'));
    }

    public function edit($id) {

        $dados = Especialidade::find($id);  
        return view('especialidades.edit', compact('dados'));        
    }

    public function update(Request $request, $id) {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'descricao' => 'required|max:250|min:20'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];
        
        $request->validate($regras, $msgs);
        
        $reg = Especialidade::find($id);
        
        $reg->fill([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);
        $reg->save();

        return redirect()->route('especialidades.index');
    }

    public function destroy($id) {
        Especialidade::destroy($id);
        return redirect()->route('especialidades.index');
    }
}
