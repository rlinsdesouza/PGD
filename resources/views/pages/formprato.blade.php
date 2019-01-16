@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Prato</h1>
    <a href={{ url('/pratos/listar', []) }}>Listagem de pratos</a>        
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
            @if (isset($prato))
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Insumos para fazer o prato</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                      @foreach ($insumos as $item)
                            <option><input type="hidden" class="form-control-plaintext " name="id" value={{$prato->insumos->id}} disable>{{$prato->insumos->nome}}</option>  
                      @endforeach
                    </select>
                </div>    
            @endif

            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Receita para fazer o prato</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="receita"></textarea>
            </div>

            <p>
                 <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                     Adicionar insumo ao prato
                </button>
            </p>
            @if (isset($insumos))
                <div class="collapse" id="collapseExample">
                    <select class="form-control" name="addinsumo">
                            <option>Escolha</option> 
                            @foreach ($insumos as $insumo)
                                <option>{{$insumo->nome}}/{{$insumo->id}}</option> 
                        @endforeach
                    </select>    
                </div>  
            @endif
              


            <button type="submit" class="btn btn-primary">Salvar/Editar</button>
            
        </div>
    </form>
    @if (isset($prato))
        <form action={{ url('/pratos/excluir', []) }} method="post">
            @csrf
        <!-- Button trigger modal -->
            <input type="hidden" class="form-control-plaintext " name="id" value={{$prato->id}} disable>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao">
                Excluir
            </button>   
            <modal-exclusao></modal-exclusao>
        </form>    
    @endif
</div>
    
@endsection