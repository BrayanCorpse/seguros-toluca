@extends('layouts.sistema')
@section("content")
  <h3>Polizas</h3><br>
  <div class="form-group row">
      <div class="col-sm-4">
        <button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Polizas</button>
      </div>
      <div class="col-sm-8">
        {!! Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'Buscar...']) !!}
      </div>
  </div>
  <div class="table-responsive-xl">
    <table class="table"> 
      <thead class="thead-dark">
        <tr>
          <th>Poliza</th>
          <th>Cliente</th>
          <th>Aseguradora</th>
          <th>Importe</th>
          <th>Moneda</th>
          <th>Forma de pago</th>
          <th>Fecha de registro</th>
          <th>Fecha de vigencia</th>
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
          <h4 class="modal-title">Registrar Polizas</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>"Polizas.store","method"=>"POST","id"=>"form"]) !!}
              @csrf
              {!! Form::label('poliza', 'Poliza', array('class' => 'col-sm-3 col-form-label')) !!}
              <div class="col-sm-9">
                {!! Form::text('poliza',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('aseguradora', 'Aseguradora', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('aseguradora', $aseguradoras, $aseguradoras,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('importe', 'Importe', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('importe', null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('moneda', 'Moneda', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('moneda', ["MXN"=>"MXN","Dolares"=>"Dolares"],null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('forma_pago', 'Forma de pago', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('forma_pago', ["Unica"=>"Unica","Fraccionada"=>"Fraccionada","Meses sin intereses"=>"Meses sin intereses"], null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('cliente', 'Cliente', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_cli',$clientes, $clientes,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('fecha_reg', 'Fecha de registro', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::date('fecha_registro', null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('fecha_vig', 'Fecha de vigencia', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::date('fecha_vigencia', null,['class'=>'form-control']) !!}
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
          <h4 class="modal-title">Modificar Poliza</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["Polizas.update",0],"method"=>"POST","id"=>"update"]) !!}
              @csrf
              @method('PUT')
              {!! Form::hidden('id',null,['class'=>'form-control',"id"=>"id_update"]) !!}
              {!! Form::label('poliza', 'Poliza', array('class' => 'col-sm-3 col-form-label')) !!}
              <div class="col-sm-9">
                {!! Form::text('po',null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('cliente', 'Cliente', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('cli',$clientes, $clientes,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('aseguradora', 'Aseguradora', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('as', $aseguradoras, $aseguradoras,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('importe', 'Importe', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('im', null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('moneda', 'Moneda', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('mo', ["MXN"=>"MXN","Dolares"=>"Dolares"],null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('forma_pago', 'Forma de pago', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('fp', ["Unica"=>"Unica","Fraccionada"=>"Fraccionada","Meses sin intereses"=>"Meses sin intereses"], null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('fecha_reg', 'Fecha de registro', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::date('fr', null,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('fecha_vig', 'Fecha de vigencia', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::date('fv', null,['class'=>'form-control']) !!}
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
          <h4 class="modal-title">Eliminar Poliza</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["delete_poliza",0],"method"=>"GET","id"=>"delete"]) !!}
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