<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("form").submit(function(e){
				e.preventDefault();
				var form = $(this);
				$.ajax({
					url:'datosReporte',
					type: 'get',
					data: form.serialize(),
					dataType: 'json',
					success: function(html){
						$("input[name=marca]").val(html.data[0].marca);
						$("input[name=modelo]").val(html.data[0].modelo);
						$("input[name=submarca]").val(html.data[0].submarca);
						$("input[name=descripcion]").val(html.data[0].descripcion);
						$("input[name=detalle]").val(html.data[0].detalle);
						$("input[name=genero]").val(html.data[0].genero);
						$("input[name=nombre]").val(html.data[0].nombre);
						$("input[name=edad]").val(html.data[0].edad);
						$("input[name=correo]").val(html.data[0].correo);
						$("input[name=telefono]").val(html.data[0].telefono);
						$("input[name=cobertura]").val(html.data[0].cobertura);
						$("input[name=monto]").val(html.data[0].monto);
						$("input[name=forma_pago]").val(html.data[0].forma_pago);
						$("input[name=cuota]").val(html.data[0].cuota);
						$("input[name=mensualidad]").val(html.data[0].mensualidad);
						$("input[name=total]").val(html.data[0].total);
					}
				});
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<form>
			<div class="group row">
				<div class="col-md-6">
					<input type="text" name="folio" class="form-control" placeholder="Buscar folio...">
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-outline-primary">Buscar</button>
				</div>
			</div><br>
			<div class="group row">
				<div class="col">
					<label>Marca</label>
					<input type="" name="marca" class="form-control" readonly="">
				</div>
				<div class="col">
					<label>Modelo</label>
					<input type="" name="modelo" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Submarca</label>
					<input type="" name="submarca" class="form-control" readonly="">
				</div>
				<div class="col">
					<label>Descripcion</label>
					<input type="" name="descripcion" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Detalle del auto</label>
					<input type="" name="detalle" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Genero</label>
					<input type="" name="genero" class="form-control" readonly="">
				</div>
				<div class="col">
					<label>Nombre</label>
					<input type="" name="nombre" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Edad</label>
					<input type="" name="edad" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Correo</label>
					<input type="" name="correo" class="form-control" readonly="">
				</div>
				<div class="col">
					<label>Teléfono</label>
					<input type="" name="telefono" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Tipo de cobertura</label>
					<input type="" name="cobertura" class="form-control" readonly="">					
				</div>
				<div class="col">
					<label>Monto aproximado</label>
					<input type="text" name="monto" class="form-control" readonly="">					
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Forma de Pago</label>
					<input type="text" name="forma_pago" class="form-control" readonly="">					
				</div>
				<div class="col">
					<label>Cuota</label>
					<input type="text" name="cuota" class="form-control" readonly="">					
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Mensualidad</label>					
				</div>
				<div class="col">
					<input type="text" name="mensualidad" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Total</label>					
				</div>
				<div class="col">
					<input type="text" name="total" class="form-control" readonly="" id="total">
				</div>
			</div>
		</form>
	</div>
</body>
</html>