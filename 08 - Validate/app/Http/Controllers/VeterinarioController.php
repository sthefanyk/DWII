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
        $regras = [
            'nome' => 'required|max:100|min:10',
            'crmv' => 'required|max:10|min:5|unique:veterinarios',
            'especialidade' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
        ];
        
        $request->validate($regras, $msgs);

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

        $regras = [
            'nome' => 'required|max:100|min:10',
            'crmv' => 'required|max:10|min:5|unique:veterinarios',
            'especialidade' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
        ];
        
        $request->validate($regras, $msgs);

        $reg = Veterinario::find($id);
        
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
