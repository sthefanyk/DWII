<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Genero;
use App\Models\Livro;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!UserPermissions::isAuthorized('livros.index')) {
            abort(403);
        }

        $data = Livro::with(['genero'])->get();
        return view('livros.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!UserPermissions::isAuthorized('livros.create')) {
            abort(403);
        }

        $dados = Genero::all();
        return view('livros.create', compact('dados'));
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
            'titulo' => 'required|min:10|max:100',
            'autor' => 'required|min:10|max:100',
            'genero_id' => 'required'
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

        $obj_genero = Genero::find($request->genero_id);

        if(isset($obj_genero)) {

            $obj_livro = new Livro();
            $obj_livro->titulo = mb_strtoupper($request->titulo, 'UTF-8');
            $obj_livro->autor = mb_strtoupper($request->autor, 'UTF-8');
            $obj_livro->genero()->associate($obj_genero);
            $obj_livro->save();

            return redirect()->route('livros.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!UserPermissions::isAuthorized('livros.show')) {
            abort(403);
        }

        $data = Livro::with(['genero'])->find($id);

        return view('livros.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!UserPermissions::isAuthorized('livros.edit')) {
            abort(403);
        }

        $data = Livro::find($id);
        $generos = Genero::all();

        if(!isset($data)) {
            return "<h1> ID: $id não encontrado! </h1>";
        }

        return view('livros.edit', compact('data', 'generos'));
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
        $obj_livro = Livro::find($id);

        $regras = [
            'titulo' => 'required|min:10|max:100',
            'autor' => 'required|min:10|max:100',
            'genero_id' => 'required'
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

        if(!isset($obj_livro)) {
            return "<h1>ID: $id não encontrado! </h1>";
        }

        $obj_genero = Genero::find($request->genero_id);

        if(isset($obj_genero)) {
            $obj_livro->titulo = mb_strtoupper($request->titulo, 'UTF-8');
            $obj_livro->autor = mb_strtoupper($request->autor, 'UTF-8');
            $obj_livro->genero()->associate($obj_genero);
            $obj_livro->save();

            return redirect()->route('livros.index');
        }

        return redirect()->route('livros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!UserPermissions::isAuthorized('livros.destroy')) {
            abort(403);
        }

        Livro::destroy($id);
        return redirect()->route('livros.index');
    }
}
