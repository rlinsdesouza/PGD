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
                             
                                {{-- <table-component
                                    :columns = "[
                                    {
                                        title:'id',
                                    },
                                    {
                                        title:'name',
                                        visible: true,
                                        editable: true,
                                        filterable: false
                                    },
                                    {
                                        title:'age',
                                        visible: true,
                                        editable: true,
                                    },
                                    {
                                        title:'country',
                                        visible: true,
                                        editable: true,
                                        sortable: false
                                    }
                                ]"
                                :values = "[
                                    {
                                        'id': 1,
                                        'name': 'John',
                                        'country': 'UK',
                                        'age': 25,
                                    },
                                    {
                                        'id': 2,
                                        'name': 'Mary',
                                        'country': 'France',
                                        'age': 30,
                                    },
                                    {
                                        'id': 3,
                                        'name': 'Ana',
                                        'country': 'Portugal',
                                        'age': 20,
                                    }
                                ]"
                    
                                >
                                </table-component> --}}
                                {{-- <table-component urlfetch='http://localhost/PGD/public/insumos/listar'></table-component> --}}
                                <bcomplete-table url='http://localhost/PGD/public/insumos/listar'></bcomplete-table>
                            </div>
                            
                        </div>
                    </div>

 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
