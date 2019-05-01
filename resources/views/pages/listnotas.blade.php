@extends('layouts.app')

@section('content')

<div id="app" class="ui vertical stripe segment">
    <div class="ui container">
        <form action={{ url('/avaliacoes/notas') }} method="GET">
            <div class="form-group">
                <label for="formSearchDate">Data inicial:</label>
                <input type="date" class="form-control" name="datainicial" placeholder="Data inicial">
                
                <label for="formSearchDate">Data Final:</label>
                <input type="date" class="form-control" name="datafinal" placeholder="Data final">
                
                <input class="btn btn-primary" type="submit" value="Filtrar data">
            </div>
        </form> 
        
        @if (isset($notas))
        
        <table class="table">
        <thead>
            <tr>
            <th scope="col">nome</th>
            <th scope="col">nota</th>
            <th scope="col">produtividade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
            <tr>
                <td>{{$nota->nome}}</td>
                <td>{{$nota->nota}}</td>
                <td>{{$nota->produtividade}}</td>
            </tr>    
            @endforeach
        </tbody>
        </table>
            
        @endif
    </div>
</div>
    
@endsection