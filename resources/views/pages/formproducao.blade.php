@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cadastro de Produção</h1>
    <a href={{ url('/producoes/listar', []) }}>Listagem de producoes</a>        
    <form action={{ url('/producoes/salvar', []) }} method="POST">
        @csrf
        <div class="form-group">
            <label>Nome do producao</label>
            @if (isset($producao->lactose))
                <input type="hidden" class="form-control-plaintext " name="id" value={{$producao->id}} disable>
                <a href={{url('producoes/cadastro')}}>Cadastrar novo producao</a>            
                <input type="text" value="{{$producao->nome}}" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do producao">
            @else
                <datepicker-component v-model="value2"
                type="date"></datepicker-component>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do producao">
            @endif
            <div class="custom-control custom-checkbox">
                @if (isset($producao->lactose) && $producao->lactose==='S')
                    <input type="checkbox" class="custom-control-input" id="lactose" name="lactose" checked>    
                @else
                    <input type="checkbox" class="custom-control-input" id="lactose" name="lactose">
                @endif
                <label class="custom-control-label" for="lactose">Possui lactose?</label>
            </div>
            <div class="custom-control custom-checkbox">
                @if (isset($producao->gluten) && $producao->gluten==='S')
                    <input type="checkbox" class="custom-control-input" id="gluten" name="gluten" checked> 
                @else
                    <input type="checkbox" class="custom-control-input" id="gluten" name="gluten">
                @endif
                <label class="custom-control-label" for="gluten">Possui glúten?</label>
            </div>
            @if (isset($producao))
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Insumos para fazer o producao</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                      @foreach ($producao->insumos as $insumo)
                      <option>{{$insumo->nome}}/{{$insumo->id}}</option>  
                      @endforeach
                    </select>
                </div>    
            @endif

            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Receita para fazer o producao</label>
                    @if (isset($producao))
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="receita">{{$producao->receita}}</textarea>                        
                    @else
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="receita"></textarea>
                    @endif
            </div>

            <p>
                 <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                     Adicionar insumo ao producao
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