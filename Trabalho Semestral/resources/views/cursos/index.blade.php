<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.middleware', ['titulo' => "Cursos", 'rota' => "cursos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Cursos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist
                title="Cursos"
                crud="cursos"
                :header="['id', 'nome', 'sigla']"
                :dados="$data"
                :acao="[true, true, true, false]"
            />
        </div>
    </div>
@endsection
