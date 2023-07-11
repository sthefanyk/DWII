<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.middleware', ['titulo' => "Livros", 'rota' => "livros.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Livros @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')
    <div class="row">
        <div class="col">
            <x-datalist
                title="Livros"
                crud="livros"
                :header="['id', 'titulo', 'autor', 'genero']"
                :dados="$data"
                :acao="[true, true, true, false]"
            />
        </div>
    </div>
@endsection
