@extends('layouts.usuario')
	@section('content')
		<div class="data">
			<div class="row">
				<div class="text-center">
					<h2 class="text-danger">Datos de compra</h2>
				</div>
			</div>
			<h3>Datos de usuario</h3>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<th>Nombre</th>
						<th>Correo electrónico</th>
						<th>Teléfono</th>
					</thead>
					<tbody>
						@foreach($user as $i)
							<td>{{ $i->user }} {{ $i->paterno }} {{ $i->materno }}</td>
							<td>{{ $i->email }}</td>
							<td>{{ $i->telefono }}</td>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<h3>Datos de compra</h3>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>Imágen</th>
								<th>Producto</th>
								<th>Marca</th>
								<th>Cantidad</th>
								<th>Costo</th>
								<th>Subtotal</th>
							</thead>
							<tbody>
								@foreach($cart as $i)
									<tr>
										<td><img src="{{ $i->foto }}" width="40px;"></td>
										<td>{{ $i->nombre }}</td>
										<td>{{ $i->marca }}</td>
										<td>{{ $i->quantity }}</td>
										<td>$ {{ number_format($i->costo,2) }}</td>
										<td>$ {{ number_format($i->subtotal,2) }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col text-center">
							<a href="{{ route('catalogo') }}" style="text-decoration: none;">
								<img src="/img/carrito.png" width="50px;">
								<p>Seguir comprando</p>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<h3>Total</h3>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>Concepto</th>
							</thead>
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
					<div class="row">
						<div class="col text-center">
							<a href="{{ route('payment') }}"><img src="/img/paypal.svg" width="100px;"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection