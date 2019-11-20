@extends('layouts.tads')
@section('title')
	Minha Tela TADS
@endsection
@section('conteudo')
<h1> Minha View </h1>


@isset($msg)
	<h2>{{$msg}}</h2>

@endisset
<form method="post">
	@csrf
	<button type="submit">Enviar</button>


</form>
@endsection
