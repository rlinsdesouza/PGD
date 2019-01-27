@extends('layouts.app')

@section('content')

@if (isset($dia))
<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <a href={{ url('/producoes/avaliar') }}>Listagem de produções para avaliar</a>
            <h3 class="ui header">Lista de pratos para avaliar</h3>

            <bcomplete-table 
            :colums = "{id:'Código', data:'Data produção',prato: 'Prato', cozinheiro:'Cozinheiro'}"
            url={{url('/produzidos/api/listardia',[$dia])}} acao='avaliar'></bcomplete-table>
        </div>       
    </div>
</div>    
@else
<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <h3 class="ui header">Lista de produções</h3>
            <a href={{url('producoes/cadastro')}}>Cadastrar nova produção</a>
            <bcomplete-table 
            :colums = "{id:'Código', data:'Data produção', pessoa_id: 'id Cozinheiro', cozinheiro:'Cozinheiro'}"
            url={{url('producoes/api/listar')}} acao="avaliar"></bcomplete-table>
        </div>     
    </div>
</div>    
@endif

    
@endsection