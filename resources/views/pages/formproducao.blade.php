@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Produção</h1>
    <a href={{ url('/producoes/listar', []) }}>Listagem de producoes</a>        
    <form action={{ url('/producoes/salvar', []) }} method="POST">
        @csrf
        <div class="form-group">
            <label>Defina o cozinheiro</label>
            <select class="form-control" name="cozinheiro">
                <option>Escolha</option> 
                @foreach ($cozinheiros as $cozinheiro)
                    <option>{{$cozinheiro->nome}}/{{$cozinheiro->id}}</option> 
                @endforeach
            </select>
            <label>Data da produção</label>
            @if (isset($producao->data))
                <input type="hidden" class="form-control-plaintext " name="id" value={{$producao->id}} disable>
                <a href={{url('producoes/cadastro')}}>Cadastrar novo produção</a>
                <b-form-input v-model="{{$producao->data}}" type="date" name="data"></b-form-input>
            @else
                <date-picker></date-picker>
                <transfer-component url={{ url('/pratos/api/listar') }}></transfer-component>
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