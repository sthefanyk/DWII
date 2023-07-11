@extends('templates.middleware', ['titulo'=>"Novo Livro"])

@section('conteudo')

<form action="{{ route('livros.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col" >
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @if($errors->has('titulo')) is-invalid @endif"
                    name="titulo"
                    placeholder="Titulo do livro"
                    value="{{old('titulo')}}"
                />
                <label for="titulo">Titulo do livro</label>
                @if($errors->has('titulo'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('titulo') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" >
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @if($errors->has('autor')) is-invalid @endif"
                    name="autor"
                    placeholder="Nome do Autor"
                    value="{{old('autor')}}"
                />
                <label for="autor">Nome do Autor</label>
                @if($errors->has('autor'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('autor') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
            <label class="input-group-text bg-success text-white" for="inputGroupSelect01" >Generos</label>
                <select name="genero_id" class="form-control {{ $errors->has('genero_id') ? 'is-invalid' : ''}}">
                    @foreach ($dados as $item)
                        <option value="{{$item->id}}" @if($item->id == old('genero_id')) selected="true" @endif>
                            {{ $item->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
    <div class="row">
        <div class="col">
            <a href="{{route('livros.index')}}" class="btn btn-secondary btn-block align-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Voltar
            </a>
            <button type="submit" class="btn btn-success btn-block align-content-center">
                Confirmar&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </button>
        </div>
    </div>
</form>
@endsection
