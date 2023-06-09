<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Disciplinas", 'rota' => "disciplinas.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Disciplinas @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable 
                title="Disciplinas" 
                crud="disciplinas" 
                :header="['id', 'nome', 'curso']" 
                :data="$data"
                :cursos="$cursos"
                :acao="[false, true, true, false, true, true, true]" 
            /> 
        </div>
    </div>
@endsection