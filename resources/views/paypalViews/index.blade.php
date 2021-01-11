@extends('layouts.layout')
	@section('navigate')
    	@parent
	@stop
	<div class="container-catalogo">

		<li class="nav-item">
            <a class="nav-link" href="/carrito"><img src="{{asset('img/cart.svg')}}" width="25px" > <span id="cart" class="text-danger" >
              @if(Session::has('cart'))
                {{ count(Session::get('cart')) }}
              @else
                {{ 0 }}
              @endif
            </span></a>
          </li>
  		
		<div class="row row-cols-1 row-cols-md-3">
			@foreach($products as $i)
				<div class="col mb-4">
					<div class="card">
						<div class="card-header text-danger text-center">
					    	{{ $i->nombre }}
					  	</div>
						<div class="card-body">
						    <img src="{{ $i->foto }}" width="100%">
						    <p><b>Marca:</b> {{ $i->marca }}</p>
						    <p><b>Piezas existentes:</b> {{ $i->existencia }}</p>
						    <p><b>Costo:</b> $ {{ number_format($i->costo,2) }}</p>
					  	</div>
						<div class="card-footer text-muted text-center">
					    	<a href="{{ route('addItem',$i->id) }}" class="btn btn-primary addItem">Añadir al carrito </a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>