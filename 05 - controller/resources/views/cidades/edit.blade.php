<h1>Sistema Gestão de Municípios - Governo do Paraná</h1>

<span>[Alterar Dados da Cidade]</span>
<a href="{{route('cidades.index')}}"><input type='button' value='voltar'></a>
<hr>

<form action="{{ route('cidades.update', $dados['id']) }}" method="POST">
    <!-- Token de segurança salvo na sessão, verificar o formulário submetido -->
    @csrf
    @method('PUT')
    <label>Nome: </label> <input type='text' name='nome' value='{{$dados['nome']}}'> <br><br>
    <label for="porte">Porte: </label> 

    <select name="porte">
        <option value="Pequeno">Pequeno</option>
        <option value="Médio">Médio</option>
        <option value="Grande">Grande</option>
    </select>
    <hr>
    <input type="submit" value="Alterar">
</form>