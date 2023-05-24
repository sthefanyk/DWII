@extends('templates.main', ['titulo' => "Docência", 'rota' => "docencia.create"])

@section('titulo') Docência @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-docencia-list
                :header="['DISCIPLINA', 'PROFESSORES']" 
                :docencia="$docencia"
                :disciplinas="$disciplinas"
                :professores="$professores"
                :hide="[true, true]" 
            />
        </div>
    </div>
@endsection