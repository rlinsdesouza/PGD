@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="app" class="ui vertical stripe segment">
                        <div class="ui container">
                            <div id="conteudo" class="ui basic segment">
                                <h3 class="ui header">List of Users</h3>
                                <bcomplete-table 
                                :colums = "{id:'Código', nome:'Nome do insumo', lactose:'Possui lactose?', gluten: 'Possui glúten?', acoes: 'Ações'}"
                                url='http://localhost/PGD/public/insumos/listar'></bcomplete-table>
                            </div>
                            
                        </div>
                    </div>

 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
