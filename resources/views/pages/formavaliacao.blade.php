@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Pratos </h1>
    <a href={{ url('/producoes/avaliar') }}>Listagem de produções para avaliar</a>
    <a href={{ url('/avaliacoes/listar') }}>Listagem de avaliações</a>
    <form action={{ url('/produzidos/salvar') }} method="POST">
        @csrf
        <div class="form-group">
        @foreach ($produzidos as $produzido)
            <h2>{{$produzido->prato->nome}}</h3>
            <h5>Cozinheiro: {{$produzido->producao->pessoa->nome}}</h5>
            <p>Data: {{$produzido->producao->data}}</p>
            <input type="text" name="id">
            <label for="customRange2">Sabor</label>
            <input type="range" class="custom-range" min="0" max="10" name="notaSabor/{{$produzido->id}}">
            <label for="customRange2">Aparência</label>
            <input type="range" class="custom-range" min="0" max="10" name="notaAparencia/{{$produzido->id}}">
            <label for="customRange2">Justificativa</label>
            <input type="text" class="form-control" name="justificativa/{{$produzido->id}}" value="">
        @endforeach
            <button type="submit" class="btn btn-primary">Salvar/Editar</button>
        </div>
    </form>
    {{-- @if (isset($producao))
        <form action={{ url('/producoes/excluir', []) }} method="post">
            @csrf
        <!-- Button trigger modal -->
            <input type="hidden" class="form-control-plaintext " name="id" value={{$producao->id}} disable>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao">
                Excluir
            </button>   
            <modal-exclusao></modal-exclusao>
        </form>    
    @endif --}}
</div>
    
@endsection