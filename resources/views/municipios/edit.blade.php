@extends('layouts.sistema')
@section("content")
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Modificar Municipios</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form validation</h5>
          </div>
          <div class="widget-content nopadding">
            {!! Form::open(["route"=>["Municipios.update",$municipio->id],"method"=>"POST"]) !!}
              @csrf
              @method('PUT')
              {!! Form::select("estado",$estado,$municipio->id_estado,array("class"=>"form-control","placeholder"=>"Seleccionar...")) !!}
              {!! Form::text("municipio",$municipio->municipio,["class"=>"form-control"]) !!}
              {!! Form::submit("Guardar",["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
