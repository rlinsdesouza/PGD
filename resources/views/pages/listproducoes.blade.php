@extends('layouts.app')

@section('content')

<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <h3 class="ui header">Lista de produções</h3>
            <a href={{url('producoes/cadastro')}}>Cadastrar nova produção</a>
            <bcomplete-table 
            :colums = "{id:'Código', nome:'Nome do prato', lactose:'Possui lactose?', gluten: 'Possui glúten?', acoes: 'Ações'}"
            url={{url('api/listar')}}></bcomplete-table>
        </div>
        
    </div>
</div>
    
@endsection