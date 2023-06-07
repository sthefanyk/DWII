@extends('templates/main', ['titulo'=>"Informações do Professo"])

@section('conteudo')

<form action="{{ route('professores.store') }}" method="POST">
    @csrf  
    <div class="row">
        <div class="col" >
            <div class="input-group mb-3">
                <span class="input-group-text text-white @if($data->ativo == '0') bg-danger @endif @if($data->ativo == '1') bg-success @endif">
                    Status
                </span>
                <select
                    class="form-select"
                    class="form-control"
                    disabled
                >
                <option value="0" @if($data->ativo == '0') selected="true" @endif>
                    Inativo
                </option>
                <option value="1" @if($data->ativo == '1') selected="true" @endif>
                    Ativo
                </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" >
            <div class="input-group mb-3">
                <span class="input-group-text bg-secondary text-white px-3">Nome</span>
                <input 
                    type="text" 
                    class="form-control" 
                    value="{{$data->nome}}"
                    disabled
                />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" >
            <div class="input-group mb-3">
                <span class="input-group-text bg-secondary text-white px-3">E-mail</span>
                <input 
                    type="text" 
                    class="form-control" 
                    value="{{$data->email}}"
                    disabled
                />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" >
            <div class="input-group mb-3">
                <span class="input-group-text bg-secondary text-white">SIAPE</span>
                <input 
                    type="number" 
                    class="form-control" 
                    value="{{ $data->siape }}"
                    disabled                
                />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" >
            <div class="input-group mb-5">
                <span class="input-group-text bg-secondary text-white">Área/Eixo</span>
                <select 
                    class="form-select"
                    class="form-control" 
                    disabled
                >
                    @foreach ($eixos as $item)
                        <option value="{{$item->id}}" @if($item->id == $data->eixo_area_id) selected="true" @endif>
                            {{ $item->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('professores.index')}}" class="btn btn-secondary btn-block align-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Voltar
            </a>
        </div>
    </div>
</form>
@endsection