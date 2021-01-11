@extends('layouts.sistema')
@section("content")
  <h3>Autos</h3><br>
  <div class="form-group row">
      <div class="col-sm-4">
        <button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar autos</button>
      </div>
      <div class="col-sm-8">
        {!! Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'Buscar...']) !!}
      </div>
  </div>
  <div class="table-responsive-xl">
    <table class="table"> 
      <thead class="thead-dark">
        <tr>
          <th>Marcas</th>
          <th>Modelo</th>
          <th>Submarca</th>
          <th>Detalle</th>
          <th>Descripcion</th>
          <th>Monto de poliza</th>
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
          <h4 class="modal-title">Registrar Auto</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>"Autos.store","method"=>"POST","id"=>"form"]) !!}
              @csrf
              {!! Form::label('marca', 'Marca', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_marca', $marcas, $marcas,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('modelo', 'Modelo', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_modelo', $modelos, $modelos,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('submarca', 'Submarca', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_submarca', $submarcas, $submarcas,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('detalle', 'Detalle', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_detalle', $detalles, $detalles,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::select('id_descripcion', $descripciones, $descripciones,['class'=>'form-control']) !!}
              </div><br><br>
              {!! Form::label('monto', 'Monto', ['class' => 'col-sm-3 col-form-label']) !!}
              <div class="col-sm-9">
                {!! Form::text('monto', null,['class'=>'form-control']) !!}
              </div><br><br><br><br>
              <button type="submit" class="btn btn-primary" id="send" style="float: right;margin-right: 10px">Guardar</button>
              </div>
          </div>
        </div>
        <div class="modal-footer">
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
          <h4 class="modal-title">Modificar Auto</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["Autos.update",0],"method"=>"POST","id"=>"update"]) !!}
              @csrf
              @method('PUT')
              <div class="modal_edit">
                  <div class="col-sm-10">
                    {!! Form::hidden('id',null,['class'=>'form-control',"id"=>"id_update"]) !!}
                  </div><br>
                  {!! Form::label('marca', 'Marca', ['class' => 'col-sm-3 col-form-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::select('edit_id_marca', $marcas, $marcas,['class'=>'form-control']) !!}
                  </div><br><br>
                  {!! Form::label('modelo', 'Modelo', ['class' => 'col-sm-3 col-form-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::select('edit_id_modelo', $modelos, $modelos,['class'=>'form-control']) !!}
                  </div><br><br>
                  {!! Form::label('submarca', 'Submarca', ['class' => 'col-sm-3 col-form-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::select('edit_id_submarca', $submarcas, $submarcas,['class'=>'form-control']) !!}
                  </div><br><br>
                  {!! Form::label('detalle', 'Detalle', ['class' => 'col-sm-3 col-form-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::select('edit_id_detalle', $detalles, $detalles,['class'=>'form-control']) !!}
                  </div><br><br>
                  {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-3 col-form-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::select('edit_id_descripcion', $descripciones, $descripciones,['class'=>'form-control']) !!}
                  </div><br><br>
                  {!! Form::label('monto', 'Monto', ['class' => 'col-sm-3 col-form-label']) !!}
                  <div class="col-sm-9">
                    {!! Form::text('edit_monto',null,['class'=>'form-control','id'=>'edit_monto']) !!}
                  </div><br><br>
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
          <h4 class="modal-title">Eliminar Marca</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>["delete_car",0],"method"=>"GET","id"=>"delete"]) !!}
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