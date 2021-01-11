@extends('layouts.sistema')
@section("content")
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Agregar Polizas</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form validation</h5>
          </div>
          <div class="widget-content nopadding">
            {!! Form::open(["route"=>"Polizas.store","method"=>"POST"]) !!}
            	@csrf
            	{!! Form::label("Fecha de registro","Fecha de registro",["class"=>"label"]) !!}
            	{!! Form::date("fr",null,["class"=>"form-control","id"=>"Fecha de registro"]) !!}
              {!! Form::label("aseguradora","aseguradora",["class"=>"label"]) !!}
              {!! Form::text("as",null,["class"=>"form-control","id"=>"aseguradora"]) !!}
              {!! Form::label("Clientes","Clientes",["class"=>"label"]) !!}
              {!! Form::select("cliente",$clientes,$clientes,array("class"=>"form-control","placeholder"=>"Seleccionar...")) !!}
              {!! Form::label("Fecha de vigencia","Fecha de vigencia",["class"=>"label"]) !!}
              {!! Form::date("fv",null,["class"=>"form-control","id"=>"Fecha de vigencia"]) !!}
            	{!! Form::submit("Guardar",["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection