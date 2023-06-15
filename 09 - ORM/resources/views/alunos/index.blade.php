<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Alunos", 'rota' => "alunos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Alunos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')
    <div class="row">
        <div class="col">
            <x-datatable 
                title="Alunos" 
                crud="alunos" 
                :header="['id', 'nome', 'cursos']" 
                :data="$data"
                :acao="[false, true, true, false, false, true, true]" 
            /> 
        </div>
    </div>
@endsection