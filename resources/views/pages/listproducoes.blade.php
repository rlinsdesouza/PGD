@extends('layouts.app')

@section('content')

<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <h3 class="ui header">Lista de produções</h3>
            <a href={{url('producoes/cadastro')}}>Cadastrar nova produção</a>
            
            @if (!isset($avaliar))
                <bcomplete-table 
                :colums = "{id:'Código', data:'Data produção', pessoa_id: 'id Cozinheiro', cozinheiro:'Cozinheiro'}"
                url={{url('producoes/api/listar')}} acao="editar">
                </bcomplete-table>
            @else
                <bcomplete-table 
                :colums = "{id:'Código', data:'Data produção', pessoa_id: 'id Cozinheiro', cozinheiro:'Cozinheiro'}"
                url={{url('producoes/api/listar')}} acao="avaliar">
                </bcomplete-table>                
            @endif
            
        </div>
        
    </div>
</div>
    
@endsection