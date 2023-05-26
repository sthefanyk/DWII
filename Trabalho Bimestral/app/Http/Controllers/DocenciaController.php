<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Professor;
use Illuminate\Http\Request;

class DocenciaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docencia = Docencia::all();
        $professores = Professor::where('ativo', '=', '1')->get();
        $disciplinas = Disciplina::all();
        return view('docencia.index', compact(['docencia', 'disciplinas', 'professores']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vinculo = $request->docencia;
        if(isset($vinculo)){
            foreach ($vinculo as $item) {
                
                $dados = explode("_", $item);
                $disciplina = Disciplina::find($dados[0]);
                
                if(isset($dados[1])){
                    $professor = Professor::find($dados[1]);
                    
                    $vinculado = Docencia::where('disciplina_id', '=', $disciplina->id)->get();

                    if (isset($vinculado[0])) {
                        $reg = Docencia::find($vinculado[0]->id);
                        $reg->fill([
                            'professor_id' => $professor->id, 
                            'disciplina_id' => $disciplina->id,
                        ]);
                        $reg->save();
                    }else{
                        Docencia::create([
                            'professor_id' => $professor->id, 
                            'disciplina_id' => $disciplina->id,
                        ]);
                    }
                }
            }
        }

        /*$vinculo = $request->docencia;
        if(isset($vinculo)){
            foreach ($vinculo as $item) {
                
                $dados = explode("_", $item);
                $disciplina = Disciplina::find($dados[0]);
                
                if(isset($dados[1])){
                    $professor = Professor::find($dados[1]);
                    Docencia::firstOrCreate([
                        'professor_id' => $professor->id,
                        'disciplina_id' => $disciplina->id
                    ],[
                        'professor_id' => $professor->id,
                        'disciplina_id' => $disciplina->id
                    ]);
                }
            }
        }*/

        return redirect()->route('docencia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
