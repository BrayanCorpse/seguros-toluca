@extends('layouts.sistema')
@section("content")
  <h3>Formato de banner: {{$nameBanner}}</h3><br><br>
  <div class="bodyBanners">
    @if($banner == 'error')
    <div class="alert alert-danger" role="alert">
      <center>No hay banners de este formato | <a href="/banner">Registrar ahora</a></center>
    </div>
  @else
    @foreach($banner as $i)
      <div class="banner-content">
        <i class="fas fa-times close-item" id="{{$i->id}}"></i>
        <img src="/storage/{{$i->imagen}}" class="banner-item" width="{{$i->Ancho}}" height="{{$i->Alto}}">
      </div>
    @endforeach
  @endif
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
@endsection