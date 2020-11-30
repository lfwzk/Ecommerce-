@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card padding">
	<header>
		<h4>Crear nuevo Producto </h4>
	</header>
		<div class="card-body">
			@include('products.form')<!--protege el formulario-->
		</div>
	</div>
</div>
@endsection