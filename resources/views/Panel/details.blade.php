@extends('layouts.sistema')
	@section("content")
		<div class="data">
			<div class="row">
				<div class="text-center">
					<h3 class="text-danger">Detalle de compra</h3>
				</div>
				<div class="col-sm-8">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>Folio</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Subtotal</th>
							</thead>
							<tbody>
								@php $total = 0; @endphp
								@foreach($items as $i)
									<tr>
										<td>00{{ $i->id }}</td>
										<td>{{ $i->fecha }}</td>
										<td>{{ $i->hora }}</td>
										<td>{{ $i->cantidad }}</td>
										<td>$ {{ number_format($i->precio,2) }}</td>
										<td>$ {{ number_format($i->subtotal,2) }}</td>
										@php $total += $i->subtotal; @endphp
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>Total de compra</th>
							</thead>
							<tbody>
								<td>Total:</td>
								<td>$ {{ number_format($total,2) }}</td>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="text-center">
				<a href="{{ route('sistema') }}"><img src="/img/back.svg" width="50px"></a>
			</div>
		</div>
	@endsection