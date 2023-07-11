<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!UserPermissions::isAuthorized('generos.index')) {
            abort(403);
        }

        $data = Genero::all();
        return view('generos.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!UserPermissions::isAuthorized('generos.create')) {
            abort(403);
        }

        return view('generos.create');
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
            'nome' => 'required|min:3|max:25',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

        $encoding = mb_internal_encoding();

        Genero::create([
            'nome' => mb_strtoupper($request->nome, $encoding)
        ]);

        return redirect()->route('generos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!UserPermissions::isAuthorized('generos.show')) {
            abort(403);
        }

        $data = Genero::find($id);
        return view('generos.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!UserPermissions::isAuthorized('generos.edit')) {
            abort(403);
        }
        
        $data = Genero::find($id);
        return view('generos.edit', compact(['data']));
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

        $reg = Genero::find($id);
        $reg->fill([
            'nome' => mb_strtoupper($request->nome, $encoding)
        ]);
        $reg->save();

        return redirect()->route('generos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!UserPermissions::isAuthorized('generos.destroy')) {
            abort(403);
        }

        Genero::destroy($id);
        return redirect()->route('generos.index');
    }
}
