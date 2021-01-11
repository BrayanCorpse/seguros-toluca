@extends('layouts.sistema')
@section("content")
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Modificar Marca</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form validation</h5>
          </div>
          <div class="widget-content nopadding">
            {!! Form::open(["route"=>["Marcas.update",$marca->id],"method"=>"POST"]) !!}
              @csrf
              @method('PUT')
              {!! Form::text("marca",$marca->marca,["class"=>"form-control"]) !!}
              {!! Form::submit("Guardar",["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="newMark" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="cerrar">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(["route"=>"Marcas.store","method"=>"POST"]) !!}
            @csrf
            <div class="form-group row">
              {!! Form::label("marca","Marca",["class"=>"col-sm-2 col-form-label"]) !!}
              <div class="col-sm-10">
                {!! Form::text("marca",null,["class"=>"form-control","id"=>"marca"]) !!}
              </div>
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit("Guardar",["class"=>"btn btn-default"]) !!}
          {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>
@endsection