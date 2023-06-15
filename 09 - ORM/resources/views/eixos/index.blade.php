<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Áreas/Eixos", 'rota' => "eixos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Áreas/Eixos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable 
                title="Áreas/Eixos" 
                crud="eixos" 
                :header="['id', 'nome', 'descricao']" 
                :data="$data"
                :acao="[false, true, false, false, false, true, false]" 
            /> 
        </div>
    </div>
@endsection