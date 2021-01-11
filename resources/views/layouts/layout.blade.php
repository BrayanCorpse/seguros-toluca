<!DOCTYPE html>
<html>
<head>
	<title>Seguros | Toluca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/logoSeguros.png')}}" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/toastr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/toastr.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/cotizador.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/cart.js')}}"></script>
  <script type="text/javascript" src="https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @toastr_css
</head>
<body>
    @section('sidebar')
        <nav id="navigate">
    			<li id="logo-seguros">
              <img src="{{asset('img/logoSeguros.png')}}" id="logoSeguros">
        			<b><a class="nav-link" href="/">SEGUROS TOLUCA</a></b><br>
              <p id="number">+52 1 722 248 1733</p>
      		</li>
    			<ul class="nav justify-content-end nav-pills">
  				<li class="nav-item">
    				<a class="nav-link" href="#nosotros">Conocenos</a>
  				</li>
  				<li class="nav-item">
    				<a class="nav-link" href="#contacto">Contactanos</a>
  				</li>
  				<li class="nav-item">
    				<a class="nav-link" href="#cotizaciones">Seguros</a>
  				</li>
          <li class="nav-item">
            <a class="nav-link" href="/catalogo" hidden>Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/carrito"><img src="{{asset('img/cart.svg')}}" width="25px" hidden> <span id="cart" class="text-danger" hidden>
              @if(Session::has('cart'))
                {{ count(Session::get('cart')) }}
              @else
                {{ 0 }}
              @endif
            </span></a>
          </li>
  				<li class="nav-item">
            @if(empty(Session::has('user')) and empty(Session::has('admin')))
              <a class="nav-link" href="{{ route('iniciar') }}">Iniciar Sesión</a>
            @else
              <a class="nav-link" href="{{ route('salir') }}">Cerrar Sesión</a>
            @endif
  				</li>
			</ul>
      <img src="{{asset('img/logoSeguros.png')}}" id="logoSeguros">
      <p id="number-responsive">+52 1 722 248 1733</p>
      <div class="hamburger">
        <div class="hamburger-inner"></div>
      </div>
		</nav>
    <div class="menu-responsive">
      <center>
        <p><a href="">Conocenos</a></p>
        <p><a href="#contacto">Contactanos</a></p>
        <p><a href="#cotizaciones">Seguros</a></p>
        <p><a href="/catalogo" hidden>Catálogo</a></p>
        <p><a href="/carrito" hidden>
          <img src="{{asset('img/cart.svg')}}" width="25px"> <span id="cart" class="text-danger">
                  @if(Session::has('cart'))
                    {{ count(Session::get('cart')) }}
                  @else
                    {{ 0 }}
                  @endif
                </span>
        </a></p>
        @if(empty(Session::has('user')) and empty(Session::has('admin')))
          <p><a href="/login">Iniciar Sesión</a></p>
        @else
          <p><a href="{{ route('salir') }}">Cerrar Sesión</a></p>
        @endif
      </center>
    </div>
    <div class="overlay"></div>
    @show
    <div class="container">
      @jquery
      @toastr_js
      @toastr_render
      @yield('content')
    </div>

</body>
</html>
