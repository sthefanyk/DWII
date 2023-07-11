<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Facades\UserPermissions;
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
        if(!UserPermissions::isAuthorized('cursos.index')) {
            abort(403);
        }

        $data = Curso::all();
        return view('cursos.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!UserPermissions::isAuthorized('cursos.create')) {
            abort(403);
        }

        return view('cursos.create');
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
            'nome' => 'required|min:10|max:50',
            'sigla' => 'required|min:2|max:8',
        ];

        $msg = [
            "required" => "O campo [:attribute] é obrigatório!",
            "min" => "O [:attribute] deve conter no mínimo [:min] caracteres!",
            "max" => "O [:attribute] deve conter no máximo [:max] caracteres!",
        ];

        $request->validate($regras, $msg);

        $encoding = mb_internal_encoding();

        Curso::create([
            'nome' => mb_strtoupper($request->nome, $encoding),
            'sigla' => mb_strtoupper($request->sigla, $encoding)
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
        if(!UserPermissions::isAuthorized('cursos.show')) {
            abort(403);
        }

        $data = Curso::find($id);
        return view('cursos.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!UserPermissions::isAuthorized('cursos.edit')) {
            abort(403);
        }

        $data = Curso::find($id);
        return view('cursos.edit', compact(['data']));
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
            'sigla' => mb_strtoupper($request->sigla, $encoding)
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
        if(!UserPermissions::isAuthorized('cursos.destroy')) {
            abort(403);
        }

        Curso::destroy($id);
        return redirect()->route('cursos.index');
    }
}
