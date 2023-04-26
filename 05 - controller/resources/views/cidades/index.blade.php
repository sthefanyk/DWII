<h1>Sistema Gestão de Municípios - Governo do Paraná</h1>
<p>[Menu Principal]</p>
<hr>
<a href="{{ route('cidades.create') }}"><input type='button' value='Cadastrar Cidade'></a>
<hr>
<table cellpadding="5">
<thead>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>PORTE</th>
        <th>EDITAR</th>
        <th>REMOVER</th>
    </tr>
</thead>
<tbody>
    <!-- Funcionalidade Blade / Laço Repetição -->
    <!-- Percorre o array cidades enviado pela Controller -->
    @foreach ($cidades as $item)
        <tr valign="baseline">
            <!-- Acessa os campos de cada item do array -->
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['nome'] }}</td>
            <td>{{ $item['porte'] }}</td>
            <td>
                <form action="{{ route('cidades.edit', $item['id']) }}" method="GET">
                    <!-- Token de Segurança -->
                    <!-- Define o método de submissão como delete -->
                    @csrf
                    @method('PUT')
                    <input type='submit' value='editar'>
                </form>
            </td>
            <td>
                <form action="{{ route('cidades.destroy', $item['id']) }}" method="POST">
                    <!-- Token de Segurança -->
                    <!-- Define o método de submissão como delete -->
                    @csrf
                    @method('DELETE')
                    <input type='submit' value='remover'>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>