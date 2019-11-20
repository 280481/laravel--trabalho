@extends('layouts.tads')
@section('title')
	Confirmar Exclusão
@endsection
@section('conteudo')
<h1> Estados </h1>
@if(session('success'))
	<div class="alert alert-success">{{session('success')}}</div>
@endif
<a href = "{{route('estados.create')}}"class= "btn btn-warning">Novo</a>
<form method="post">
	@csrf
	@method('get')
	<input type="text" name="pesquisa" placeholder="pesquisar"> 
	<button type="submit" class="btn btn-info">pesquisar</button>
</form>

@if(isset($estados))
	@foreach($estados as $est)
		<h2>{{$est->nome}} 
			<a href="{{route('estados.edit',['estados'=>$est->id])}}" class="btn btn-info">Editar</a>
			<form action="{{route('estados.destroy',['estados'=>$est->id])}}"
				method="post">
				@method('delete')
				@csrf
				<button type="submit" class="btn btn-danger">Remover</button>
			</form>
		</h2>
	@endforeach
		{{$estados->links()}}
@endif
