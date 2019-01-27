@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Prato</h1>
    <a href={{ url('/pratos/listar', []) }}>Listagem de pratos</a>        
    <form action={{ url('/pratos/salvar', []) }} method="POST">
        @csrf
        <div class="form-group">
            <label>Nome do prato</label>
            @if (isset($prato->lactose))
                <input type="hidden" class="form-control-plaintext " name="id" value={{$prato->id}} disable>
                <a href={{url('pratos/cadastro')}}>Cadastrar novo prato</a>            
                <input type="text" value="{{$prato->nome}}" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do prato">
            @else
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do prato">
            @endif
            
            <div class="form-check form-check-inline">
                @if (isset($prato) && $prato->dificuldade==1)
                <input class="form-check-input" type="radio" name="dificuldade" id="inlineRadio1" value="1" checked>
                @else
                <input class="form-check-input" type="radio" name="dificuldade" id="inlineRadio1" value="1">
                @endif
                <label class="form-check-label" for="inlineRadio1">Fácil</label>
            </div>
            <div class="form-check form-check-inline">
                @if (isset($prato) && $prato->dificuldade==2)
                <input class="form-check-input" type="radio" name="dificuldade" id="inlineRadio2" value="2" checked>
                @else
                <input class="form-check-input" type="radio" name="dificuldade" id="inlineRadio2" value="2">
                @endif
                <label class="form-check-label" for="inlineRadio2">Médio</label>
            </div>
            <div class="form-check form-check-inline">
                @if (isset($prato) && $prato->dificuldade==3)
                <input class="form-check-input" type="radio" name="dificuldade" id="inlineRadio3" value="3" checked>
                @else
                <input class="form-check-input" type="radio" name="dificuldade" id="inlineRadio3" value="3">
                @endif
                <label class="form-check-label" for="inlineRadio3">Difícil</label>
            </div>

            <div>
                <label>Tempo para produzir (Em min)</label>
                @if (isset($prato->tempoProduzir))
                    <input type="text" class="form-control" placeholder="minutos" name=tempoProduzir value={{$prato->tempoProduzir}}>
                @else
                    <input type="text" class="form-control" placeholder="minutos" name=tempoProduzir>                
                @endif        
            </div>
            
            <div class="custom-control custom-checkbox">
                @if (isset($prato->lactose) && $prato->lactose==='S')
                    <input type="checkbox" class="custom-control-input" id="lactose" name="lactose" checked>    
                @else
                    <input type="checkbox" class="custom-control-input" id="lactose" name="lactose">
                @endif
                <label class="custom-control-label" for="lactose">Possui lactose?</label>
            </div>
            <div class="custom-control custom-checkbox">
                @if (isset($prato->gluten) && $prato->gluten==='S')
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
                      @foreach ($prato->insumos as $insumo)
                      <option>{{$insumo->nome}}/{{$insumo->id}}</option>  
                      @endforeach
                    </select>
                </div>    
            @endif

            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Receita para fazer o prato</label>
                    @if (isset($prato))
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="receita">{{$prato->receita}}</textarea>                        
                    @else
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="receita"></textarea>
                    @endif
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