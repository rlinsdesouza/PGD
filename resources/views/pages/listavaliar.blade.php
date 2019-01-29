@extends('layouts.app')

@section('content')

<div class="container">


<h3>Listagem de pratos produzidos para avaliar</h3>
@foreach ($produzidos as $produzido)
            <form action="{{url('produzido/avaliar',[$produzido->id])}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <input type="text" disabled value="{{$produzido->id}}">
                    </div>
                    <div class="col">
                        <input type="text" disabled value="{{$produzido->prato}}">
                    </div>
                    <div class="col">
                        <input type="text" disabled value="{{$produzido->cozinheiro}}">
                    </div>
                    <div class="col">
                        <input type="range" class="custom-range" min="0" max="10" name="notaSabor">
                    </div>
                    <div class="col">
                        <input type="range" class="custom-range" min="0" max="10" name="notaAparencia">                            
                    </div>
                    <div class="col">
                        <input type="text" name="justificativa">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">Avaliar</button>
                    </div>
                </div>

            </form>
        @endforeach 
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Prato</th>
        <th scope="col">Cozinheiro</th>
        <th scope="col">Sabor</th>
        <th scope="col">Aparência</th>
        <th scope="col">Justificativa</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    @if (isset($produzidos))
    <tbody>
        @foreach ($produzidos as $produzido)
            <form action="{{url('produzido/avaliar',[$produzido->id])}}" method="post">
                @csrf
                    <tr>
                        <th scope="row">{{$produzido->id}}</th>
                        <td>{{$produzido->prato}}</td>
                        <td>{{$produzido->cozinheiro}}</td>
                        <td><input type="range" class="custom-range" min="0" max="10" name="notaSabor"></td>
                        <td><input type="range" class="custom-range" min="0" max="10" name="notaAparencia"></td>
                        <td><input type="text" name="justificativa"></td>
                        <td><button type="submit" class="btn btn-success">Avaliar</button></td>
                    </tr>                 
            </form>
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

















{{-- 


@if (isset($dia))
<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <div id="conteudo" class="ui basic segment">
            <a href={{ url('/producoes/avaliar') }}>Listagem de produções para avaliar</a>
            <h3 class="ui header">Lista de pratos para avaliar</h3>

            <bcomplete-table 
            :colums = "{id:'Código', data:'Data produção',prato: 'Prato', cozinheiro:'Cozinheiro'}"
            url={{url('/produzidos/api/listardia',[$dia])}} acao='avaliar'>
            </bcomplete-table>
            
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
@endif --}}

    
@endsection