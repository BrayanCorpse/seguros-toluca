@extends('layouts.sistema')
@section("content")
  <h3>Estados</h3><br>
  <div class="form-group row">
      <div class="col-sm-4">
        <button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Estados</button>
      </div>
      <div class="col-sm-8">
        {!! Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'Buscar...']) !!}
      </div>
  </div>
  <div class="table-responsive-xl">
    <table class="table"> 
      <thead class="thead-dark">
        <tr>
          <th>Estados</th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!--tabla-->
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
          <h4 class="modal-title">Registrar Estado</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>"Estados.store","method"=>"POST","id"=>"form"]) !!}
              @csrf
              {!! Form::label('estado', 'Estado', ['class' => 'col-sm-2 col-form-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('estado',null,['class'=>'form-control']) !!}
              </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="send">Guardar</button>
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
          <h4 class="modal-title">Modificar Estado</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["Estados.update",0],"method"=>"POST","id"=>"update"]) !!}
              @csrf
              @method('PUT')
              <div class="modal_edit">
                  <div class="col-sm-10">
                    {!! Form::hidden('id',null,['class'=>'form-control',"id"=>"id_update"]) !!}
                  </div><br>
                  {!! Form::label('estado', 'Estado', ['class' => 'col-sm-2 col-form-label']) !!}
                  <div class="col-sm-10">
                    {!! Form::text('edit_estado',null,['class'=>'form-control']) !!}
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_update">Guardar</button>
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
          <h4 class="modal-title">Eliminar Estado</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["delete_estado",0],"method"=>"GET","id"=>"delete"]) !!}
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
@endsection