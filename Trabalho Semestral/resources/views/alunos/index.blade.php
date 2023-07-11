<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.middleware', ['titulo' => "Alunos", 'rota' => "alunos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Alunos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')
    <div class="row">
        <div class="col">
            <x-datalist
                title="Alunos"
                crud="alunos"
                :header="['id', 'nome', 'cursos']"
                :dados="$data"
                :acao="[true, true, true, true]"
            />
        </div>
    </div>
@endsection
