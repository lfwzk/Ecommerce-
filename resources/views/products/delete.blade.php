@auth

{!! Form::open(['method' => 'DELETE', 'route' => ['productos.destroy',$product->id]])  !!}

<input type="submit" value="Eliminar producto" class="btn btn-danger">

{!! Form::close() !!}

@endauth