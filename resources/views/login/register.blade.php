@extends('layouts.layout')
@section('navigate')
    @parent
@stop
<div class="container-catalogo">
    <div class="register">
        <form method="get" action="{{ route('registerUser') }}">
            {{ csrf_field() }}
            <div class="text-center">
                <img src="/img/ad_user.png" width="100px">
            </div>
            <hr>
            <div class="form-group row">
                <div class="col">
                    <label>Nombre</label>
                    <input required="" type="text" name="user" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label>Apellido paterno</label>
                    <input required="" type="text" name="paterno" class="form-control">
                </div>
                <div class="col">
                    <label>Apellido materno</label>
                    <input required="" type="text" name="materno" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label>Teléfono</label>
                    <input required="" type="text" name="telefono" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label class="text-center">Correo electrónico</label>
                    <input required="" type="email" class="form-control" name="email" placeholder="example@example.com">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label class="text-center">Contraseña</label>
                    <input required="" type="password" class="form-control" name="password">
                </div>
                <div class="col">
                    <label class="text-center">Repetir contraseña</label>
                    <input required="" type="password" class="form-control" name="password1">
                </div>
            </div>
            <div class="text-center">
                <button type="Submit" class="btn btn-primary">Registrarme</button>
            </div>
        </form>
    </div>
</div>