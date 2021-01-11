<!DOCTYPE html>
<html>
<head>
	<title>Modulo de control</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cotizador").submit(function(e){
				var form = $("#cotizador");
				e.preventDefault();
				$.ajax({
					url: "cotizador",
					data: form.serialize(),
					type: 'get',
					dataType: 'json',
					success: function(data){
						if (data=='success') {
							alert("Registro guardado");
						}else{
							alert('Algo salio mal');
						}
					}
				}).fail(function(){
					alert('No se enviaron los datos');
				});
			});
			$("#marca").change(function(e){
				e.preventDefault();
				var valor = $(this).val();
				$.ajax({
					url:'modelo',
					type:'get',
					dataType:'html',
					data:{valor:valor},
					success: function(data){
						$("#modelo").html(data);
					}
				});
			});
			$("#modelo").change(function(e){
				e.preventDefault();
				var marca = $("#marca").val();
				var modelo = $(this).val();
				$.ajax({
					url:'submarca',
					type:'get',
					dataType:'html',
					data:{marca:marca,modelo:modelo},
					success: function(data){
						$("#submarca").html(data);
					}
				});
			})
			$("#submarca").change(function(e){
				e.preventDefault();
				var marca = $("#marca").val();
				var modelo = $("#modelo").val();
				var submarca = $(this).val();
				$.ajax({
					url:'descripcion',
					type:'get',
					dataType:'html',
					data:{marca:marca,modelo:modelo,submarca:submarca},
					success: function(data){
						$("#descripcion").html(data);
					}
				});
			})
			$("#descripcion").change(function(e){
				e.preventDefault();
				var marca = $("#marca").val();
				var modelo = $("#modelo").val();
				var submarca = $("#submarca").val();
				var descripcion = $(this).val();
				$.ajax({
					url:'detalle',
					type:'get',
					dataType:'html',
					data:{marca:marca,modelo:modelo,submarca:submarca,descripcion:descripcion},
					success: function(data){
						$("#detalle").html(data);
					}
				});
			})
			$("#detalle").click(function(e){
				e.preventDefault();
				var marca = $("#marca").val();
				var modelo = $("#modelo").val();
				var submarca = $("#submarca").val();
				var descripcion = $("#descripcion").val();
				var detalle = $(this).val();
				$.ajax({
					url:'datos',
					type:'get',
					dataType:'json',
					data:{marca:marca,modelo:modelo,submarca:submarca,descripcion:descripcion,detalle:detalle},
					success: function(html){
						$("input[name=monto_base]").val(html);
					}
				});
			});
			$("input[name=cobertura]").click(function(){
				var monto = $("#monto_base").val();
				switch($(this).val()){
					case 'Alta':
						aprox = parseInt(monto)*3;
						break;
					case 'Media':
						aprox = parseInt(monto)*2;
						break;
					case 'Baja':
						aprox = monto;
						break;	
				}
				$("input[name=monto]").val(aprox);
			});
			$("input[name=forma_pago]").click(function(){
				var  monto = $("input[name=monto]").val();
				switch($(this).val()){
					case 'unica':
						$("input[name=cuota]").prop('checked',false);
						$("input[name=cuota]").prop('disabled',true);
						break;
					case 'mensual':
						$("input[name=cuota]").prop('checked',true);
						$("input[name=cuota]").prop('disabled',false);
						$("input[name=total]").val("");
						break;
				}
				$("input[name=total]").val(monto);
			});
			$("input[name=cuota]").click(function(){
				var  monto = $("input[name=monto]").val();
				switch($(this).val()){
					case '3':
						total = monto/3;
						total = total.toFixed(2);
						$("input[name=mensualidad]").val(total);
						break;
					case '6':
						total = monto/6;
						total = total.toFixed(2);
						$("input[name=mensualidad]").val(total);
						break;
					case '12':
						total = monto/12;
						total = total.toFixed(2);
						$("input[name=mensualidad]").val(total);
						break;
				}
			});
		});
	</script>
</head>
<body>
	<div class="container">
		{!! Form::open(["route"=>"cotizador","method"=>"get","autocomplete"=>"off","id"=>"cotizador"]) !!}
			<center><h1 class="text-primary">Cotiza con nosotros</h1></center>
			<div class="group row">
				<div class="col">
					{!! Form::select("marca",$marcas,$marcas,array("class"=>"form-control","placeholder"=>"Marca del auto","id"=>"marca")) !!}
				</div>
				<div class="col">
					<select class="form-control" id="modelo" name="modelo">
						<option disabled="" selected="" value="*">Seleccionar modelo</option>
					</select>
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<select class="form-control" id="submarca" name="submarca">
						<option disabled="" selected="" value="*">Seleccionar submarca</option>
					</select>
				</div>
				<div class="col">
					<select class="form-control" id="descripcion" name="descripcion">
						<option disabled="" selected="" value="*">Seleccionar descripcion</option>
					</select>
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<select class="form-control" id="detalle" name="detalle">
						<option disabled="" selected="" value="*">Seleccionar detalle</option>
					</select>
				</div>
			</div>
			<div class="group row">
				<div class="col">
					{!! Form::select("genero",array("M"=>"Masculino","F"=>"Femenino"),null,array("class"=>"form-control","placeholder"=>"Genero")) !!}
				</div>
				<div class="col">
					{!! Form::text("nombre",null,["class"=>"form-control","id"=>"name","placeholder"=>"Escribe tu nombre"]) !!}
					{!! Form::label("nombre","Escribe tu nombre",["class"=>"sr-only"]) !!}
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<select name="edad" class="form-control">
						<option disabled="" value="*" selected="">Selecciona tu edad</option>
						<?php
						for ($i=18; $i < 100; $i++) { 
							echo "<option value='".$i."'>".$i."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="group row">
				<div class="col">
					{!! Form::email("correo",null,["class"=>"form-control","id"=>"correp","placeholder"=>"Correo electrónico"]) !!}
					{!! Form::label("correp","Correo electrónico",["class"=>"sr-only"]) !!}
				</div>
				<div class="col">
					{!! Form::text("telefono",null,["class"=>"form-control","id"=>"telefonoc","placeholder"=>"Teléfono"]) !!}
					{!! Form::label("telefonoc","Teléfono",["class"=>"sr-only"]) !!}
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Tipo de cobertura</label>					
				</div>
				<div class="col">
					{!! Form::radio('cobertura', 'Alta',["class"=>"form-control"]) !!}Alta
				</div>
				<div class="col">
					{!! Form::radio('cobertura', 'Media',["class"=>"form-control"]) !!}Media
				</div>
				<div class="col">
					{!! Form::radio('cobertura', 'Baja',["class"=>"form-control"]) !!}Baja
				</div>
			</div>
			<div class="group row">
				<div class="col-md-4">
					<label>Monto aproximado</label>					
				</div>
				<div class="col-md-8">
					<input type="text" name="monto" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Forma de Pago</label>					
				</div>
				<div class="col">
					{!! Form::radio('forma_pago', 'unica',["class"=>"form-control"]) !!}Unica
				</div>
				<div class="col">
					{!! Form::radio('forma_pago', 'mensual',["class"=>"form-control"]) !!}Mensual
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<label>Cuota</label>					
				</div>
				<div class="col">
					{!! Form::radio('cuota', '3',["class"=>"form-control"]) !!}3
				</div>
				<div class="col">
					{!! Form::radio('cuota', '6',["class"=>"form-control"]) !!}6
				</div>
				<div class="col">
					{!! Form::radio('cuota', '12',["class"=>"form-control"]) !!}12
				</div>
			</div>
			<div class="group row">
				<div class="col-md-4">
					<label>Mensualidad</label>					
				</div>
				<div class="col-md-8">
					<input type="text" name="mensualidad" class="form-control" readonly="">
				</div>
			</div>
			<div class="group row">
				<div class="col-md-4">
					<label>Total</label>					
				</div>
				<div class="col-md-6">
					<input type="text" name="total" class="form-control" readonly="" id="total">
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
	<input type="hidden" name="monto_base" id="monto_base">
</body>
</html>