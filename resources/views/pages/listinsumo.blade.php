@extends('layouts.app')

@section('content')

<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <h3 class="ui header">Lista de insumos</h3>
            <a href="./cadastro">Cadastrar novo insumo</a>
            <bcomplete-table 
            :colums = "{id:'Código', nome:'Nome do insumo', lactose:'Possui lactose?', gluten: 'Possui glúten?', acoes: 'Ações'}"
            url='http://localhost/PGD/public/insumos/api/listar'></bcomplete-table>
        </div>
        
    </div>
</div>
    
@endsection