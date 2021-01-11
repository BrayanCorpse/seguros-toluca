@extends('layouts.layout')
	@section('navigate')
    	@parent
	@stop
	@include('sweet::alert')
	<div class="container-catalogo">
		<div class="row">
			<div class="col-sm-8">
				<div class="col text-center">
					<h2 class="text-danger"><b>Carrito de compras</b></h2>				
				</div>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Imágen</th>
							<th>Producto</th>
							<th>Marca</th>
							<th>Cantidad</th>
							<th>Costo</th>
							<th>Subtotal</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							@foreach($items as $i)
								<tr>
									<td><img src="{{ $i->foto }}" width="50px;"></td>
									<td>{{ $i->nombre }}</td>
									<td>{{ $i->marca }}</td>
									<td style="width: 20%;">
										<input 
											type="number"
											min="1" 
											name=""
											style="width: 50px;border: 2px solid #EEE;border-radius: 5px;padding: 5px;" 
											value="{{ $i->quantity }}"
											id="item{{$i->id}}" 
										>
										<a href="" id="{{ $i->id }}" class="itemUpdate"><img src="/img/load.svg" width="25px"></a>
									</td>
									<td>$ {{ number_format($i->costo,2) }}</td>
									<td>$ {{ number_format($i->subtotal,2) }}</td>
									<td><a href="{{ route('deleteItem',$i->id) }}"><img src="/img/delete.svg" width="30px"></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col text-center">
					<h2 class="text-danger"><b>Total</b></h2>				
				</div>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<th>Subtotal:</th>
							<td>$ {{ number_format($total,2) }}</td>
						</tr>
						<tr>
							<th>Envío:</th>
							<td>$ 0.00</td>
						</tr>
						<tr>
							<th>Total:</th>
							<td>$ {{ number_format($total,2) }}</td>
						</tr>
					</table>
				</div>
				<div class="text-center">
					@if(Session::has('cart'))
						<a href="{{ route('datos_carrito') }}">
							<img src="/img/pagar.svg" width="50px;">
						</a>
					@endif
				</div>
			</div>
		</div>
	</div>