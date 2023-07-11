@extends('templates.middleware', ['titulo' => "Emprestar Livro"])
@section('conteudo')
<form action="{{ route('emprestimos.store') }}" method="POST">
    @csrf
    <input type="hidden" name="aluno" value="{{$dados[0]->id}}">
    <div class="row mb-2">
        <div class="col">
            <h4 class="display-7 text-secondary d-none d-md-block"><b>Emprestimos de {{$dados[0]->nome}}</b></h4>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <table class="table align-middle caption-top table-striped" id="tabela">

                <caption>Tabela de <b>Emprestimo</b></caption>
                <thead>
                    <tr class="header-table">
                        <th scope="col" class="text-left">Livro</th>
                        <th scope="col" class="text-center">Emprestimo</th>
                    </tr>
                </thead>
                <tbody>
                    @csrf
                    @foreach($dados[1] as $liv)
                    <tr>
                        <td class="col-md-6">{{$liv->titulo}}</td>
                        <td class="text-center col-md-6">
                            <input type="checkbox" name="emprestimos[]" value="{{$liv->id}}"
                            @foreach($dados[2] as $emprestimo)
                            @if($emprestimo->livro_id == $liv->id)
                            checked
                            @endif
                            @endforeach>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <a href="{{route('alunos.index')}}" class="btn btn-danger btn-block align-content-center w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
                        </svg>
                        &nbsp;<b>Cancelar</b>
                    </a>
                </div>
                <div class="col-lg-8 col-md-12">
                    <button class="btn btn-success btn-block text-white mb-2 w-100" type="submit" id="bt_salvar">
                        <b>Confirmar</b>&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>

    @endsection

    @section('script')

    <script type="text/javascript"></script>
    @endsection