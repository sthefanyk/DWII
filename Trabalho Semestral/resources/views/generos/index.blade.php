<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.middleware', ['titulo' => "Generos", 'rota' => "generos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Generos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist
                title="Generos"
                crud="generos"
                :header="['id', 'nome']"
                :dados="$data"
                :acao="[true, true, true, false]"
            />
        </div>
    </div>
@endsection
