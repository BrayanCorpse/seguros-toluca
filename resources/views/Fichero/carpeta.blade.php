@extends('layouts.sistema')
@section("content")
  <h3>Carpeta {{$nombre}}</h3><br>
  <div class="form-group row">
      <div class="col-sm-4">
        <button id="" class="btn btn-primary" data-toggle="modal" data-target="#create">Subir archivo</button>
      </div>
      <div class="col-sm-8">
        {!! Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'Buscar...']) !!}
      </div>
  </div><br>
  <div class="table-responsive-xl">
    <table class="table"> 
      <thead class="thead-dark">
        <tr>
          <th>Archivo</th>
          <th>Tamaño</th>
          <th>Fecha</th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody>
      	<!--Cuerpo de la tabla-->
      </tbody>
    </table>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Subir archivo</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>"ficheros.store","method"=>"POST","id"=>"form_file","enctype"=>"multipart/form-data"]) !!}
              @csrf
              <input type="hidden" name="fichero" id="fichero" value="{{$fichero}}">
              {!! Form::label('archivo', 'Archivo', ['class' => 'col-sm-2 col-form-label']) !!}
              <div class="col-sm-10">
                <input type="file" name="file" class="form-control" id="file">
              </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="sendFile">Guardar</button>
          {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modal_delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar archivo</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["deleteFile",0],"method"=>"GET","id"=>"delete"]) !!}
                <center>
                  <h4 class="text-danger">&#191;Est&#225; seguro de eliminar este registro?</h4>
                  {!! Form::hidden('id_delete',null,['class'=>'form-control']) !!} 
                </center>    
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_delete">Aceptar</button>
            {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar carpeta</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["ficheros.update",0],"method"=>"POST","id"=>"update"]) !!}
            @method('PUT')
                <center>
                  <input type="hidden" name="id_update" id="id_update">
                  {!! Form::label('carpeta', 'Carpeta', ['class' => 'col-sm-2 col-form-label']) !!}
                  <div class="col-sm-10">
                    <input type="text" name="newName" id="newName" class="form-control">
                  </div>
                </center>    
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_update">Aceptar</button>
            {!! Form::close() !!}
        </div>
      </div>
      
    </div>
  </div>
@endsection