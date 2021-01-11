@extends('layouts.sistema')
@section("content")
	<div class="data">
		<div class="form-group row">
			<center><h3 class="text-danger">Ventas</h3></center>
			<div class="col-sm-8">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Folio</th>
							<th>Usuario</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Productos</th>
							<th>Total</th>
							<th>Detalles</th>
						</thead>
						<tbody>
							@php $total = 0; @endphp
							@foreach($ventas as $i)
								<tr>
									<td>00{{ $i->id }}</td>
									<td>{{ $i->user }}</td>
									<td>{{ $i->fecha }}</td>
									<td>{{ $i->hora }}</td>
									<td>{{ $i->productos }}</td>
									<td>$ {{ number_format($i->total,2) }}</td>
									<td><a href="{{ route('details_ventas',$i->id) }}"><img src="/img/details.svg" width="25px"></a></td>
								</tr>
								@php $total += $i->total; @endphp
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th colspan="2">Total</th>
						</thead>
						<tbody>
							<tr>
								<td>Total:</td>
								<td>$ {{ number_format($total,2) }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection