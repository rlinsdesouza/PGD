@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Insumo</h1>
    <form action="salvar" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome insumo</label>
            <input type="tex" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do insumo">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="lactose" name="lactose">
                <label class="custom-control-label" for="lactose">Possui lactose?</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="gluten" name="gluten">
                <label class="custom-control-label" for="gluten">Possui glúten?</label>
            </div>
            <button type="submit" class="btn btn-primary">Salvar/Editar</button>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao">
                Excluir
            </button>
            <modal-exclusao></modal-exclusao>
        </div>
    </form>
</div>
    
@endsection