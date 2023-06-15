<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Cursos", 'rota' => "cursos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Cursos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable 
                title="Cursos" 
                crud="cursos" 
                :header="['id', 'nome', 'sigla']" 
                :data="$data"
                :acao="[false, true, true, false, false, true, false]" 
            /> 
        </div>
    </div>
@endsection