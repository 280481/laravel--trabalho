@extends('layouts.tads')
@section('title')
    Lista de Estados
@endsection
@section('conteudo')
<h1>Cidades</h1>

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

<a href="{{route('cidades.create')}}">Novo</a>
 <form method="post">
    @csrf 
    @method('get')
    <input type="text" name="pesquisa" placeholder="pesquisar">
    <button type="submit" class="btn btn-info">Pesquisar</button>
 </form>

    @if(isset($cidades))
        
        @foreach($cidades as $cid)
            <h2>{{$est->nome}}
                <a href="{{route('cidades.edit',['cidade'=>$est->id])}}" class="btn btn-info">Editar</a>
                <a href="{{route('cidadess.confirm',['cidade'=>$est->id])}}" class="btn btn-danger">Excluir</a>
            </h2>
        @endforeach

        {{$cidades->links()}}
    @endif

@endsection 
