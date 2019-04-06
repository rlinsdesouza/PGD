@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Funcionário</h1>
    <div>
            <a href={{ url('/pessoas/listar', []) }}>Listagem de pessoas</a>        
    </div>
    <a href={{url('pessoas/cadastro')}}>Cadastrar novo Funcionário </a>
    <form action={{ url('/pessoas/salvar', []) }} method="POST">
        @csrf
        <div class="form-group">
            <h3>Dados da pessoa</h3>
            @if (isset($pessoa))
                <input type="hidden" class="form-control-plaintext " name="id" value={{$pessoa->id}} disable>
                <input type="text" class="form-control" name="nome" placeholder="Escreva o nome completo do funcionário" value="{{$pessoa->nome}}">
                <input type="text" class="form-control" name="apelido" placeholder="Escreva o apelido do funcionário" value="{{$pessoa->apelido}}">            
                @else
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva o nome completo da funcionário">
                <input type="text" class="form-control" name="apelido" placeholder="Escreva o apelido do funcionário">            
            @endif
            <button type="submit" class="btn btn-primary">Salvar/Editar</button>
            
        </div>
    </form>
    @if (isset($pessoa))
        <form action={{ url('/pessoas/excluir', []) }} method="post">
            @csrf
        <!-- Button trigger modal -->
            <input type="hidden" class="form-control-plaintext " name="id" value={{$pessoa->id}} disable>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao">
                Excluir
            </button>   
            <modal-exclusao></modal-exclusao>
        </form>    
    @endif
</div>
    
@endsection