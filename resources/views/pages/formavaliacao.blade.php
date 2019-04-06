@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Avaliação </h1>
    <a href={{ url('/producoes/avaliar') }}>Listagem de produções para avaliar</a>
    <a href={{ url('/avaliacoes/listar') }}>Listagem de avaliações</a>
    <form action={{ url('/avaliacoes/salvar') }} method="POST">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-auto">
            <input type="hidden" class="form-control-plaintext " name="produzidoid" value={{$produzido->id}} disable>                        
                <label class="col-form-label">Nome do prato</label>
                <input class="form-control mb-2" type="text" value="{{$prato->nome}}" disabled>
            {{-- </div> --}}
            {{-- <div class="col-auto"> --}}
                <label class="col-form-label">Cozinheiro</label>
                <input class="form-control mb-2" type="text" value="{{$producao->pessoa->nome}}" disabled>            
            {{-- </div> --}}
            {{-- <div class="col-auto"> --}}
                <label class="col-form-label">Data</label>
                <input type="hidden" class="form-control-plaintext " name="data" value={{$producao->data}} disable>
                <input class="form-control mb-2" type="date" value="{{$producao->data}}" disabled>
            {{-- </div> --}}
            {{-- <div class="col-auto"> --}}
                <label class="col-form-label">Sabor</label>
                <input type="range" class="custom-range" min="0" max="10" name="notaSabor">
            {{-- </div> --}}
            {{-- <div class="col-auto"> --}}
                <label class="col-form-label">Aparência</label>
                <input type="range" class="custom-range" min="0" max="10" name="notaAparencia">
            {{-- </div> --}}
            {{-- <div class="col-auto"> --}}
                <label class="col-form-label">Justificativa</label>
                <input type="text" class="form-control" name="justificativa" value="">
            {{-- </div> --}}
            {{-- <div class="col-auto">             --}}
            <button type="submit" class="btn btn-primary">Salvar/Editar</button>
            </div>
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