<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller {
    
    public function index() {
        $dados = Cliente::all();
        return view('clientes.index', compact(['dados']));
    }

    public function create() {

        return view('clientes.create');
    }

   public function store(Request $request) {
        Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        return redirect()->route('clientes.index');
    }

    public function show($id) {
        $dados = Cliente::find($id);
        return view('clientes.show', compact('dados'));
    }

    public function edit($id) {

        $dados = Cliente::find($id);  
        return view('clientes.edit', compact('dados'));        
    }

    public function update(Request $request, $id) {
        
        $reg = Cliente::find($id);
        
        $reg->fill([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);
        $reg->save();

        return redirect()->route('clientes.index');
    }

    public function destroy($id) {
        Cliente::destroy($id);
        return redirect()->route('clientes.index');
    }
}
