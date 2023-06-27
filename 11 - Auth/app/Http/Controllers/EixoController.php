<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!UserPermissions::isAuthorized('eixos.index')) {
            abort(403);
        }

        return view('eixos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!UserPermissions::isAuthorized('eixos.index')) {
            abort(403);
        }

        return view('eixos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!UserPermissions::isAuthorized('eixos.index')) {
            abort(403);
        }

        return view('eixos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!UserPermissions::isAuthorized('eixos.index')) {
            abort(403);
        }

        return view('eixos.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!UserPermissions::isAuthorized('eixos.index')) {
            abort(403);
        }
        
        return view('eixos.destroy');
    }
}
