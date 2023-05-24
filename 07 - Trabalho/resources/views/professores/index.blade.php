<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Professores", 'rota' => "professores.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable
                title="Professores" 
                crud="professores" 
                :header="['id', 'nome', 'Área/Eixo', 'ativo']" 
                :data="$data"
                :eixos="$eixos"
                :docencia="$docencia"
                :acao="[true, true, true, true, false, false]" 
            /> 
        </div>
    </div>
@endsection