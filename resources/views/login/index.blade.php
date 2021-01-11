@extends('layouts.layout')
@section('navigate')
    @parent
@stop
<div class="container-catalogo">
    <div class="login-access">
        <form method="POST" action="{{ route('login.store') }}">
            {{ csrf_field() }}
            <h3 class="text-center">Iniciar sesión</h3>
            <hr>
            <label class="text-center">Correo electrónico</label>
            <input type="email" class="form-control" name="user" placeholder="example@example.com"><br>
            <label class="text-center">Contraseña</label>
            <input type="password" class="form-control" name="pass"><br>
            <div class="text-center">
                <a href="{{ route('registrar') }}">Registrarme</a>
            </div><br>
            <div class="text-center">
                <button type="Submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>
