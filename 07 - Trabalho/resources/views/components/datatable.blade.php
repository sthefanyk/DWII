<div>
    <table class="table align-middle caption-top table-striped">
        <caption>Tabela de <b>{{ $title }} cadastrados</b> no sistema</caption>
        <thead>
        <tr>
            @php $cont=0; @endphp
            @foreach ($header as $item)

                @if($cont != 0)
                    @if($item == 'ativo')
                        <th scope="col" class="d-none d-md-table-cell">STATUS</th>
                    @else
                        <th scope="col" class="d-none d-md-table-cell">{{ strtoupper($item) }}</th>      
                    @endif
                @endif
                @php $cont++; @endphp

            @endforeach
            <th scope="col">AÇÕES</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    @php $cont=0; @endphp
                    @foreach ($header as $hide)
                        @if($cont)    
                            @if($hide == 'Área/Eixo') 
                                @if($eixos??'' != null)
                                    @foreach ($eixos as $eixo)
                                        @if($eixo->id == $item->eixo_id)
                                            <td class="d-none d-md-table-cell">{{ $eixo->nome }}</td>
                                        @endif
                                    @endforeach
                                @endif
                            @elseif($hide == 'curso') 
                                @if($cursos??'' != null)
                                    @foreach ($cursos as $curso)
                                        @if($curso->id == $item->curso_id)
                                            <td class="d-none d-md-table-cell">{{ $curso->nome }}</td>
                                        @endif
                                    @endforeach
                                @endif    
                            @elseif($hide == 'ativo')
                                @if($item->$hide == "1")
                                    <td class="d-none d-md-table-cell">ATIVO</td>
                                @else
                                    <td class="d-none d-md-table-cell">INATIVO</td>
                                @endif
                            @elseif($hide == 'curso')              
                            @else
                                <td class="d-none d-md-table-cell">{{ $item->$hide }}</td>                    
                            @endif
                        @endif 
                        @php $cont = true @endphp
                    @endforeach
                    <td>
                        @if($acao[0] == true)
                            @if($item->ativo == '1')
                                @php $vinculos=0; @endphp
                                @foreach ($docencia as $doc)
                                    @if($doc->professor_id == $item->id)
                                        @php $vinculos++; @endphp
                                    @endif
                                @endforeach
                                <a nohref style="cursor:pointer" onclick="showDeactivateModal('{{ $item->id }}', '{{ $item->nome }}', '{{ $vinculos }}')" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                    </svg>
                                </a>
                            @else
                                <a nohref style="cursor:pointer" onclick="showActivateModal('{{ $item->id }}', '{{ $item->nome }}')" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                                </a>
                            @endif
                        @endif
                        @if($acao[1] == true)
                            <a href= "{{ route($crud.'.edit', $item[$header[0]]) }}" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                </svg>
                            </a>
                        @endif
                        @if($acao[2] == true)
                            <a nohref style="cursor:pointer" onclick="showInfoModal('{{ $item[$header[1]] }}', '{{ $item[$header[2]] }}')" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </svg>
                            </a>
                        @endif
                        @if($acao[3] == true)
                            <a href= "{{ route('docencia.index', $item->id) }}" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-list-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </a>
                        @endif
                        @if($acao[4] == true)
                            <a href= "{{ route('docencia.index', $item->id) }}" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg>
                            </a>
                        @endif
                        @if($acao[5] == true)
                            <a nohref style="cursor:pointer" onclick="showRemoveModal('{{ $item[$header[0]] }}', '{{ $item[$header[1]] }}')" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        @endif
                    </td>
                    <form action="{{ route($crud.'.destroy', $item[$header[0]]) }}" method="POST" id="form_{{$item[$header[0]]}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>