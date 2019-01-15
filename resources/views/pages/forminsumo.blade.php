@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Insumo</h1>
    @if (isset($insumo))
    <a href="../listar">Listagem de insumos</a>        
    @else
    <a href="listar">Listagem de insumos</a>
    @endif
    <form action="salvar" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome insumo</label>
            @if (isset($insumo->lactose))
                <input type="tex" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do insumo" value={{$insumo->nome}}>
            @else
                <input type="tex" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do insumo">
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
            <!-- Button trigger modal -->
            <form action="../excluir" method="POST">
                @csrf
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao">
                        Excluir
                    </button>
                <modal-exclusao></modal-exclusao>
            </form>
        </div>
    </form>
</div>
    
@endsection