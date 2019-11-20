@extends('layouts.tads')
@section('title')
	Cadastros de Estados
@endsection
@section('conteudo')

<a href = "{{route('estados.index')}}" class= "btn btn-warning">Voltar</a>
<form method="post" 
@if(isset($estado))
action="{{route('estados.update',['estado'=>$estado-id])}}"
@else
action="{{route('estados.store')}}"
@endif
>
@if(isset($estado))
	@method('put')
@endif
	@csrf
	<label>Nome</label>
	<input type="text" required="required" name="nome" 
	@if(isset($estado))
		value="{{$estado->nome}}"
	@endif
	placeholder="nome">
	
	<label>Sigla</label>
	<input type="text" required="required" name="sigla"
	@if(isset($estado))
		value="{{$estado->sigla}}"
	@endif
	placeholder="sigla"> 

	<button type="submit" class="btn btn-info">Salvar</button>
</form>

@if($errors->any())
	@foreach($errors->all() as $er)
	<div class="alert alert-danger">{{$er}}</div>
	@endforeach
@endif



@endsection