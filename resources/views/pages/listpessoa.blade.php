@extends('layouts.app')

@section('content')

<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <h3 class="ui header">Lista de pessoas</h3>
            <a href="{{ url('/pessoas/cadastro') }}">Cadastrar nova pessoa</a>
            <bcomplete-table 
            :colums = "{id:'Código', nome:'Nome da Pessoa'}"
            url='{{ url('/pessoas/api/listar') }}' acao=editar></bcomplete-table>
        </div>
        
    </div>
</div>
    
@endsection