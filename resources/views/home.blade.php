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
                    
                <h1>Bem-vindo ao PGD! </h1>
                <h3>Programa de Gestão do Domani</h3>
 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
