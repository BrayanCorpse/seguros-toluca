<!DOCTYPE html>
<html>
<head>
  <title>Sistema</title>
  <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/system.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/ajax.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('/css/system.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.css')}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <div class="menu-responsive">
    <h3>Menú</h3>
    <div class="hamburger">
        <div class="hamburger-inner"></div>
    </div>
    <ul id="menu-responsive">
      <a class="item-menu" href="/sistema"><li><i class="fas fa-home"></i>Inicio</li></a>
      <a class="item-menu" href="{{ route('carrito') }}"><li><i class="fa fa-shopping-cart"></i></i>Carrito</li></a>
      <a class="item-menu" href="{{ route('datos_carrito') }}"><li><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></i>Articulos</li></a>
      <a class="item-menu" href="{{ route('mis_compras') }}"><li><i class="fa fa-credit-card" aria-hidden="true"></i></i>Mis compras</li></a>
      <a class="item-menu" href="/salir"><li><i class="fas fa-sign-out-alt"></i>Salir</li></a>      
    </ul>
  </div>
  <div class="menu">
    <h3>Dashboard</h3>
    <ul>
      <a href=""><li><i class="fas fa-home"></i>Inicio</li></a>
      <a class="" href="{{ route('carrito') }}"><li><i class="fa fa-shopping-cart"></i></i>Carrito</li></a>
      <a class="" href="{{ route('datos_carrito') }}"><li><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></i>Articulos</li></a>
      <a class="" href="{{ route('mis_compras') }}"><li><i class="fa fa-credit-card" aria-hidden="true"></i></i>Mis compras</li></a>
      <a href="/salir"><li><i class="fas fa-sign-out-alt"></i>Salir</li></a>      
    </ul>
  </div>
  <div class="content-system">
    <div class="content">
      @yield("content")
    </div>
  </div>
</body>
</html>