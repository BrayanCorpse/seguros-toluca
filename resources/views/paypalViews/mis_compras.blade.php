@extends('layouts.usuario')
	@section('content')
		@if(session::has('danger'))
			<script type="text/javascript">
				swal("", "{{session::get('danger')}}", "danger");
			</script>
		@endif
		@if(session::has('success'))
			<script type="text/javascript">
				swal("", "{{session::get('success')}}", "success");
			</script>
		@endif
		@if(session::has('warning'))
			<script type="text/javascript">
				swal("", "{{session::get('warning')}}", "warning");
			</script>
		@endif
		<div class="data">
			<div class="row">
			<div class="text-center">
				<h3 class="text-danger">Mis compras</h3>
			</div>
				<div class="col-sm-8">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>Folio</th>
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
										<td>{{ $i->fecha }}</td>
										<td>{{ $i->hora }}</td>
										<td>{{ $i->productos }}</td>
										<td>$ {{ number_format($i->total,2) }}</td>
										<td><a href="{{ route('detalle_compra',$i->id) }}"><img src="/img/details.svg" width="25px"></a></td>
										@php $total += $i->total; @endphp
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
								<th>Total en compras</th>
							</thead>
							<tbody>
								<td>Total:</td>
								<td>$ {{ number_format($total,2) }}</td>
							</tbody>
						</table>
					</div>
				</div>
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
	@endsection