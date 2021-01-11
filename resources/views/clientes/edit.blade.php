@extends('layouts.sistema')
@section("content")
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Modificar Clientes</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form validation</h5>
          </div>
          <div class="widget-content nopadding">
            {!! Form::open(["route"=>["Clientes.update",$cliente->id],"method"=>"POST"]) !!}
              @csrf
              @method('PUT')
              {!! Form::label("nombre","Nombre",["class"=>"label"]) !!}
              {!! Form::text("nombre",$cliente->nombre,["class"=>"form-control","id"=>"nombre"]) !!}
              {!! Form::label("ap_paterno","Apellido Paterno",["class"=>"label"]) !!}
              {!! Form::text("ap_paterno",$cliente->ap_paterno,["class"=>"form-control","id"=>"ap_paterno"]) !!}
              {!! Form::label("ap_materno","Apellido Materno",["class"=>"label"]) !!}
              {!! Form::text("ap_materno",$cliente->ap_materno,["class"=>"form-control","id"=>"ap_materno"]) !!}
              <div class="form-check"><br>
                {!! Form::radio('genero', 'M', true) !!}
                {!! Form::label("genero","Masculino",["class"=>"form-check-label"]) !!}
                {!! Form::radio('genero', 'F', false) !!}
                {!! Form::label("genero","Femenino",["class"=>"form-check-label"]) !!}
              </div><br>
              {!! Form::label("edad","Edad",["class"=>"label"]) !!}
              {!! Form::number("edad",$cliente->edad,["class"=>"form-control","id"=>"edad"]) !!}
              {!! Form::label("telefono","Teléfono",["class"=>"label"]) !!}
              {!! Form::text("telefono",$cliente->telefono,["class"=>"form-control","id"=>"telefono"]) !!}
              {!! Form::label("correo","Correo electrónico",["class"=>"label"]) !!}
              {!! Form::email("correo",$cliente->correo,["class"=>"form-control","id"=>"correo"]) !!}
              {!! Form::label("Municipio","Municipio",["class"=>"label"]) !!}
              {!! Form::select("municipio",$municipio,$cliente->id_municipio,array("class"=>"form-control","placeholder"=>"Seleccionar...")) !!}
              {!! Form::label("calle","Calle",["class"=>"label"]) !!}
              {!! Form::text("calle",$cliente->calle,["class"=>"form-control","id"=>"calle"]) !!}
              {!! Form::label("no_int","No. Interior",["class"=>"label"]) !!}
              {!! Form::number("no_int",$cliente->no_int,["class"=>"form-control","id"=>"no_int"]) !!}
              {!! Form::label("no_ext","No. Exterior",["class"=>"label"]) !!}
              {!! Form::text("no_ext",$cliente->no_ext,["class"=>"form-control","id"=>"no_ext"]) !!}
              {!! Form::label("cp","Código Postal",["class"=>"label"]) !!}
              {!! Form::text("cod_p",$cliente->c_p,["class"=>"form-control","id"=>"cp"]) !!}
              {!! Form::submit("Guardar",["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
