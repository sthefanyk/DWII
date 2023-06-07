<?php

namespace App\Http\Controllers;
use App\Models\Veterinario;
use App\Models\Especialidade;

use Illuminate\Http\Request;

class VeterinarioController extends Controller{

    public function index() {
        $dados = Veterinario::all();
        $especialidades = Especialidade::all();
        foreach ($dados as $vet) {
            foreach ($especialidades as $esp) {
                if ($esp->id == $vet->especialidade_id) {
                    $vet->especialidade = $esp->nome;
                }
            }
        }
        return view('veterinarios.index', compact(['dados']));
    }

    public function create() {
        $especialidades = Especialidade::all();
        return view('veterinarios.create', compact(['especialidades']));
    }

   public function store(Request $request) {
        
        Veterinario::create([
            'crmv' => $request->crmv,
            'nome' => $request->nome,
            'especialidade_id' => $request->especialidade
        ]);

        return redirect()->route('veterinarios.index');
    }

    public function show($id) {
        $dados = Veterinario::find($id);
        return view('veterinarios.show', compact('dados'));
    }

    public function edit($id) {
        $dados = Veterinario::find($id);
        $especialidades = Especialidade::all();
        return view('veterinarios.edit', compact('dados', 'especialidades'));        
    }

    public function update(Request $request, $id) {
        //return $request;
        $reg = Veterinario::find($id);
        //return $id;
        $reg->fill([
            'crmv' => $request->crmv,
            'nome' => $request->nome,
            'especialidade_id' => $request->especialidade
        ]);

        
        $reg->save();

        return redirect()->route('veterinarios.index');
    }

    public function destroy($id) {
        Veterinario::destroy($id);
        return redirect()->route('veterinarios.index');
    }
}
