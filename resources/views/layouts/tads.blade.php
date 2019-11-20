<!DOCTYPE html>
<html Lang="pt-BR">
<head>
	<title>{{ config('app.name')}}@yield('title','Minha App')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		@yield('custom-style')
	</style>
	
</head>
<body>
	<nav>
		<ul>
			<li><a href="/">HOME</a></li>
		</ul>
	</nav>
	<div class="conteudo">
		@yield('conteudo')
	</div>
	<footer>
		powered by Tads / SA
	</footer>
</body>
</html>