@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Produção</h1>
    <a href={{ url('/producoes/listar', []) }}>Listagem de produções</a>        
    <form action={{ url('/producoes/salvar', []) }} method="POST">
        @csrf
        <div class="form-group">
            <label>Defina o cozinheiro</label>
            @if (isset($producao))
                <input class="form-control" type="text" name="cozinheiro" value="{{$producao->pessoa->nome}}" disabled>
            @else
                @if (isset($cozinheiro))
                    <select class="form-control" name="cozinheiro">
                        <option>Escolha</option> 
                        @foreach ($cozinheiros as $cozinheiro)
                            <option>{{$cozinheiro->nome}}/{{$cozinheiro->id}}</option> 
                        @endforeach
                    </select>
                @endif

            @endif
            <label>Data da produção</label>
            @if (isset($producao->data))
                <input type="hidden" class="form-control-plaintext " name="id" value={{$producao->id}} disable>
                <input class="form-control" type="date" name="data" value={{$producao->data}} disabled>
                <a href={{url('producoes/cadastro')}}>Cadastrar novo produção</a>
            <transfer-component url={{ url('/pratos/api/listar') }} :selecionados="{{$producao->prato}}"></transfer-component>

            @else
                <date-picker></date-picker>
                <transfer-component url={{ url('/pratos/api/listar') }} :selecionados="[]"></transfer-component>
            @endif
            <button type="submit" class="btn btn-primary">Salvar/Editar</button>
            
        </div>
    </form>
    @if (isset($producao))
        <form action={{ url('/producoes/excluir', []) }} method="post">
            @csrf
        <!-- Button trigger modal -->
            <input type="hidden" class="form-control-plaintext " name="id" value={{$producao->id}} disable>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao">
                Excluir
            </button>   
            <modal-exclusao></modal-exclusao>
        </form>    
    @endif
</div>
    
@endsection