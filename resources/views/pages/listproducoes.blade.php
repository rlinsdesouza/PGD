@extends('layouts.app')

@section('content')

<div class="container">
    <form action={{ url('/producoes/listar') }} method="GET">
        <div class="form-group">
            <label for="formSearchDate">Filtra por Data da produção:</label>
            <input type="date" class="form-control" name="dia" placeholder="Selecionar a data">
            <input class="btn btn-primary" type="submit" value="Filtrar data">
        </div>
    </form>    
</div>


<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <h3 class="ui header">Lista de produções</h3>
            <a href={{url('producoes/cadastro')}}>Cadastrar nova produção</a>
            
            @if (!isset($dia))
                <bcomplete-table 
                :colums = "{id:'Código', data:'Data produção', pessoa_id: 'id Cozinheiro', cozinheiro:'Cozinheiro'}"
                url={{url('producoes/api/listar')}} acao="editar">
                </bcomplete-table>
            @else
                <bcomplete-table 
                :colums = "{id:'Código', data:'Data produção', pessoa_id: 'id Cozinheiro', cozinheiro:'Cozinheiro'}"
                url={{url('producoes/api/listar/'.$dia)}} acao="editar">
                </bcomplete-table>                
            @endif
            
        </div>
        
    </div>
</div>
    
@endsection