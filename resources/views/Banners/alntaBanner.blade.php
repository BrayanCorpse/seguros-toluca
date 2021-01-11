@extends('layouts.sistema')
@section("content")
  <h3>Banners de publicidad</h3><br>
  <div class="form-group row">
      <div class="col-sm-4">
        <button id="" class="btn btn-primary add-Banner" data-toggle="modal" data-target="#create">Agregar</button>
      </div>
      <div class="col-sm-8">
        {!! Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'Buscar...']) !!}
      </div>
  </div><br>
  <div class="table-responsive-xl">
    <table class="table"> 
      <thead class="thead-dark">
        <tr>
          <th>Formato</th>
          <th>Descripción</th>
          <th>Ancho</th>
          <th>Alto</th>
          <th>Imágen</th>
          <th colspan="3">Acciones</th>
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
          <h4 class="modal-title">Registrar banner</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>"banner.store","method"=>"POST","id"=>"form-file","enctype"=>"multipart/form-data"]) !!}
              @csrf 
              {!! Form::label('formato', 'Formato', ['class' => 'col-sm-2 col-form-label']) !!}
              <div class="col-sm-10">
                <select name="idFormato" class="form-control col-md-8">
                  <option selected="" disabled="" value="">Seleccionar formato</option>
                  @foreach($formatos as $i)
                    <option value="{{$i->id}}">{{$i->Formato}}</option>
                  @endforeach
                </select>
              </div><br>
                <div class="col-sm-12">
                  <div class="col-sm-6">
                    <b>Ancho :</b><span id="width"></span>
                  </div>
                  <div class="col-sm-6">
                    <b>Alto :</b><span id="height"></span>
                  </div>
                </div><br>
              {!! Form::label('banner', 'Banner', ['class' => 'col-sm-2 col-form-label']) !!}
              <div class="col-sm-10">
              	<input type="file" name="banner" class="form-control">
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
          <h4 class="modal-title">Actualizar banner</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            {!! Form::open(["route"=>"updateBanner","method"=>"POST","id"=>"update_file","enctype"=>"multipart/form-data"]) !!}
              @csrf 
              <input type="hidden" id="id_update" name="id_update">
              {!! Form::label('formato', 'Formato', ['class' => 'col-sm-2 col-form-label']) !!}
              <div class="col-sm-10">
                <select name="idNewFormato" id="idNewFormato" class="form-control col-md-8">
                  <option selected="" disabled="" value="">Seleccionar formato</option>
                  @foreach($formatos as $i)
                    <option value="{{$i->id}}">{{$i->Formato}}</option>
                  @endforeach
                </select>
              </div>
              {!! Form::label('banner', 'Banner', ['class' => 'col-sm-2 col-form-label']) !!}
              <div class="col-sm-10">
                <input type="file" name="newBanner" class="form-control">
              </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="sendUpdate">Guardar</button>
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
            {!! Form::open(["route"=>["deleteBanner",0],"method"=>"GET","id"=>"delete"]) !!}
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
  <div class="modal fade" id="banner_show" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Banner</h4>
        </div>
        <div class="modal-body">
          <center>
            <img src="" id="img_banner">
          </center>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal">cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
@endsection