@extends('layouts.app')

@section('content')

<div class="container">

    <div class="container">
        <form action={{ url('/produzidos/avaliar') }} method="GET">
            <div class="form-group">
                <label for="formSearchDate">Filtra por Data da produção:</label>
                <input type="date" class="form-control" name="dia" placeholder="Selecionar a data">
                <input class="btn btn-primary" type="submit" value="Filtrar data">
            </div>
        </form>    
    </div>

            
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Data</th>
                <th scope="col">Prato</th>
                <th scope="col">Cozinheiro</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        @if (isset($produzidos))
        <tbody>
            @foreach ($produzidos as $produzido)
                <tr>
                        <td scope="row">{{$produzido->id}}</td>
                        <td>{{$produzido->data}}</td>
                        <td>{{$produzido->prato}}</td>
                        <td>{{$produzido->cozinheiro}}</td>
                        <td><a class="btn btn-success" href="{{url('avaliacoes/cadastro',[$produzido->id])}}" role="button">Avaliar</a></td>
                    </tr>                 
            @endforeach 
        </tbody>    
        @else
        <tbody>
                <div class="alert alert-warning" role="alert">
                        Nenhum dado para exibir
                </div>
        </tbody>  
        @endif
    </table>  
</div>

    
@endsection