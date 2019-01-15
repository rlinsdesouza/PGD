@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Prato</h1>
    <a href={{ url('/pratos/listar', []) }}>Listagem de insumos</a>        
    <form action={{ url('/pratos/salvar', []) }} method="POST">
        @csrf
        <div class="form-group">
            <label>Nome do prato</label>
            @if (isset($insumo->lactose))
                <input type="tex" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do prato" value={{$insumo->nome}}>
            @else
                <input type="tex" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do prato">
            @endif
            <div class="custom-control custom-checkbox">
                @if (isset($insumo->lactose) && $insumo->lactose==='S')
                    <input type="checkbox" class="custom-control-input" id="lactose" name="lactose" checked>    
                @else
                    <input type="checkbox" class="custom-control-input" id="lactose" name="lactose">
                @endif
                <label class="custom-control-label" for="lactose">Possui lactose?</label>
            </div>
            <div class="custom-control custom-checkbox">
                @if (isset($insumo->gluten) && $insumo->gluten==='S')
                    <input type="checkbox" class="custom-control-input" id="gluten" name="gluten" checked> 
                @else
                    <input type="checkbox" class="custom-control-input" id="gluten" name="gluten">
                @endif
                <label class="custom-control-label" for="gluten">Possui glúten?</label>
            </div>



            <button type="submit" class="btn btn-primary">Salvar/Editar</button>
            
        </div>
    </form>
    @if (isset($insumo))
        <form action={{ url('/insumos/excluir', []) }} method="post">
            @csrf
        <!-- Button trigger modal -->
            <input type="hidden" class="form-control-plaintext " name="id" value={{$insumo->id}} disable>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao">
                Excluir
            </button>   
            <modal-exclusao></modal-exclusao>
        </form>    
    @endif
</div>
    
@endsection