@extends('layouts.app')

@section('content')

<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <h3 class="ui header">Lista de pratos</h3>
            <a href={{url('pratos/cadastro')}}>Cadastrar novo prato</a>
            <bcomplete-table 
            :colums = "{id:'Código', nome:'Nome do prato', lactose:'Possui lactose?', gluten: 'Possui glúten?', acoes: 'Ações'}"
            url={{url('pratos/api/listar')}}></bcomplete-table>
        </div>
        
    </div>
</div>
    
@endsection