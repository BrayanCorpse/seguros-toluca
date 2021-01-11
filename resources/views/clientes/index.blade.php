@extends('layouts.sistema')
@section("content")
  <h3>Clientes</h3><br>
  <div class="form-group row">
      <div class="col-sm-4">
        <button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Clientes</button>
      </div>
      <div class="col-sm-8">
        {!! Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'Buscar...']) !!}
      </div>
  </div>
  <div class="table-responsive-xl">
    <table class="table"> 
      <thead class="thead-dark">
        <tr>
          <th>Nombre</th>
          <th>Genero</th>
          <th>Edad</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Estado</th>
          <th>Municipio</th>
          <th>Calle</th>
          <th>No. Interio</th>
          <th>No. Exterior</th>
          <th>C. Postal</th>
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
          <h4 class="modal-title">Registrar Clientes</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>"Clientes.store","method"=>"POST","id"=>"form"]) !!}
              @csrf
              {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('ap_paterno', 'A. paterno', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('ap_paterno',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('ap_materno', 'A. materno', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('ap_materno',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('genero', 'Genero', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::radio('genero',"Maculino",['class'=>'form-control']) !!}Masculino
                {!! Form::radio('genero',"Femenino",['class'=>'form-control']) !!}Femenino
              </div><br><br>
              {!! Form::label('edad', 'Edad', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edad',null,['maxlength'=>'2','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('telefono', 'Telefono', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('telefono',null,['maxlength'=>'10','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('correo', 'Correo', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::email('correo',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('estado', 'Estado', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_estado', $estados, $estados,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('municipio', 'Municipio', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_municipio', $municipios, $municipios,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('calle', 'Calle', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('calle',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('no_int', 'N. interior', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('no_int',null,['maxlength'=>'5','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('no_ext', 'N. Exterior', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('no_ext',null,['maxlength'=>'5','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('c_p', 'C. Postal', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('c_p',null,['maxlength'=>'5','class'=>'form-control']) !!}
              </div><br><br>
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
          <h4 class="modal-title">Modificar Cliente</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["Clientes.update",0],"method"=>"POST","id"=>"update"]) !!}
              @csrf
              @method('PUT')
              {!! Form::hidden('id',null,['class'=>'form-control',"id"=>"id_update"]) !!}
              {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_nombre',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('ap_paterno', 'A. paterno', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_ap_paterno',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('ap_materno', 'A. materno', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_ap_materno',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('genero', 'Genero', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::radio('edit_genero',"Maculino",['class'=>'form-control']) !!}Masculino
                {!! Form::radio('edit_genero',"Femenino",['class'=>'form-control']) !!}Femenino
              </div><br><br>
              {!! Form::label('edad', 'Edad', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_edad',null,['maxlength'=>'2','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('telefono', 'Telefono', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_telefono',null,['maxlength'=>'10','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('correo', 'Correo', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::email('edit_correo',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('estado', 'Estado', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('edit_id_estado', $estados, $estados,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('municipio', 'Municipio', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('edit_id_municipio', $municipios, $municipios,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('calle', 'Calle', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_calle',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('no_int', 'N. interior', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_no_int',null,['maxlength'=>'5','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('no_ext', 'N. Exterior', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_no_ext',null,['maxlength'=>'5','class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('c_p', 'C. Postal', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('edit_c_p',null,['maxlength'=>'5','class'=>'form-control']) !!}
              </div><br><br>
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
          <h4 class="modal-title">Eliminar Cliente</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["delete_cli",0],"method"=>"GET","id"=>"delete"]) !!}
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
<input type="" maxlength="" name="">