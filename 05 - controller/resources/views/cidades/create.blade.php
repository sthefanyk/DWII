<h1>Sistema Gestão de Municípios - Governo do Paraná</h1>

<span>[Cadastrar Nova Cidade]</span>
<a href="{{route('cidades.index')}}"><input type='button' value='voltar'></a>
<hr>

<form action="{{ route('cidades.store') }}" method="POST">
    <!-- Token de segurança salvo na sessão, verificar o formulário submetido -->
    @csrf
    <label>Nome: </label> <input type='text' name='nome'> <br><br>
    <label for="porte">Porte: </label> 

    <select name="porte" id="cars">
        <option value="Pequeno">Pequeno</option>
        <option value="Médio">Médio</option>
        <option value="Grande">Grande</option>
    </select>
    <hr>
    <input type="submit" value="Cadastrar">
</form>