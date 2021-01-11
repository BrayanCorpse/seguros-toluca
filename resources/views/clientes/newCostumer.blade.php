@extends('layouts.sistema')
@section("content")
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Agregar Clientes</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Registrar clientes</h5>
          </div>
          <div class="widget-content nopadding">
            {!! Form::open(["route"=>"Clientes.store","method"=>"POST"]) !!}
            	@csrf
              {!! Form::label("nombre","Nombre",["class"=>"label"]) !!}
              {!! Form::text("nombre",null,["class"=>"form-control","id"=>"nombre"]) !!}
              {!! Form::label("ap_paterno","Apellido Paterno",["class"=>"label"]) !!}
              {!! Form::text("ap_paterno",null,["class"=>"form-control","id"=>"ap_paterno"]) !!}
              {!! Form::label("ap_materno","Apellido Materno",["class"=>"label"]) !!}
              {!! Form::text("ap_materno",null,["class"=>"form-control","id"=>"ap_materno"]) !!}
              <div class="form-check"><br>
                {!! Form::radio('genero', 'M', true) !!}
                {!! Form::label("genero","Masculino",["class"=>"form-check-label"]) !!}
                {!! Form::radio('genero', 'F', false) !!}
                {!! Form::label("genero","Femenino",["class"=>"form-check-label"]) !!}
              </div><br>
              {!! Form::label("edad","Edad",["class"=>"label"]) !!}
              {!! Form::text("edad",null,["class"=>"form-control","id"=>"edad","maxlength"=>"2"]) !!}
              {!! Form::label("telefono","Teléfono",["class"=>"label"]) !!}
              {!! Form::text("telefono",null,["class"=>"form-control","id"=>"telefono","maxlength"=>"10"]) !!}
              {!! Form::label("correo","Correo electrónico",["class"=>"label"]) !!}
              {!! Form::email("correo",null,["class"=>"form-control","id"=>"correo"]) !!}
              {!! Form::label("Municipio","Municipio",["class"=>"label"]) !!}
              {!! Form::select("municipio",$municipios,$municipios,array("class"=>"form-control","placeholder"=>"Seleccionar...")) !!}
            	{!! Form::label("calle","Calle",["class"=>"label"]) !!}
            	{!! Form::text("calle",null,["class"=>"form-control","id"=>"calle"]) !!}
              {!! Form::label("no_int","No. Interior",["class"=>"label"]) !!}
              {!! Form::text("no_int",null,["class"=>"form-control","id"=>"no_int","maxlength"=>"5"]) !!}
              {!! Form::label("no_ext","No. Exterior",["class"=>"label"]) !!}
              {!! Form::text("no_ext",null,["class"=>"form-control","id"=>"no_ext","maxlength"=>"5"]) !!}
              {!! Form::label("cp","Código Postal",["class"=>"label"]) !!}
              {!! Form::text("cod_p",null,["class"=>"form-control","id"=>"cp","maxlength"=>"5"]) !!}
            	{!! Form::submit("Guardar",["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
