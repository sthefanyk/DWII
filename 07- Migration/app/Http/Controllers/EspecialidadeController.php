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
