<!DOCTYPE html>
<html>
<head>
  <title>Sistema</title>
  <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/system.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/ajax.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('css/system.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.css')}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.28/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>
<body>
  <div class="menu-responsive">
    <h3>Menú</h3>
    <div class="hamburger">
        <div class="hamburger-inner"></div>
    </div>
    <ul id="menu-responsive">
      <a class="item-menu" href="/sistema"><li><i class="fas fa-home"></i>Inicio</li></a>
      <a class="item-menu" id="sistema-responsive"><li><i class="fas fa-bars"></i>Sistema</li></a>
      <ul id="enlaces-responsive">
        <a href="/Aseguradoras"><li><i class="fas fa-building"></i>Aseguradoras</li></a>
        <a href="/Autos"><li><i class="fas fa-car"></i>Autos</li></a>
        <a href="/Clientes"><li><i class="fas fa-user"></i>Clientes</li></a>
        <a href="/Descripciones"><li><i class="fas fa-file-alt"></i>Descripciones</li></a>
        <a href="/Detalles"><li><i class="far fa-file-alt"></i>Detalles de auto</li></a>
        <a href="/Estados"><li><i class="far fa-file-alt"></i>Estados</li></a>
        <a href="/Marcas"><li><i class="far fa-file-alt"></i>Marcas</li></a>
        <a href="/Modelos"><li><i class="far fa-file-alt"></i>Modelos</li></a>
        <a href="/Municipios"><li><i class="far fa-file-alt"></i>Municipios</li></a>
        <a href="/Polizas"><li><i class="far fa-file-alt"></i>Polizas</li></a>
        <a href="/Submarcas"><li><i class="far fa-file-alt"></i>Submarcas</li></a>
      </ul>
      <a class="item-menu" href=""><li><i class="fas fa-envelope-open"></i>Correos</li></a>
      <a class="item-menu" href="/banner"><li><i class="fas fa-envelope-open"></i>Publicidad</li></a>
      <a class="item-menu" href="/ficheros"><li><i class="fas fa-file-alt"></i>Archivos</li></a>
      <a class="item-menu" href="/salir"><li><i class="fas fa-sign-out-alt"></i>Salir</li></a>      
    </ul>
  </div>
  <div class="menu">
    <h3>Dashboard</h3>
    <ul>
      <a href=""><li><i class="fas fa-home"></i>Inicio</li></a>
      <a id="sistema" class=""><li><i class="fas fa-bars"></i>Sistema</li></a>
      <ul id="enlaces">
        <a href="/Aseguradoras"><li><i class="fas fa-building"></i>Aseguradoras</li></a>
        <a href="/Autos"><li><i class="fas fa-car"></i>Autos</li></a>
        <a href="/Clientes"><li><i class="fas fa-user"></i>Clientes</li></a>
        <a href="/Descripciones"><li><i class="fas fa-file-alt"></i>Descripciones</li></a>
        <a href="/Detalles"><li><i class="far fa-file-alt"></i>Detalles de auto</li></a>
        <a href="/Estados"><li><i class="far fa-file-alt"></i>Estados</li></a>
        <a href="/Marcas"><li><i class="far fa-file-alt"></i>Marcas</li></a>
        <a href="/Modelos"><li><i class="far fa-file-alt"></i>Modelos</li></a>
        <a href="/Municipios"><li><i class="far fa-file-alt"></i>Municipios</li></a>
        <a href="/Polizas"><li><i class="far fa-file-alt"></i>Polizas</li></a>
        <a href="/Submarcas"><li><i class="far fa-file-alt"></i>Submarcas</li></a>
      </ul>
      <a href=""><li><i class="fas fa-envelope-open"></i>Correos</li></a>
      <a class="item-menu" href="/banner"><li><i class="fas fa-ad"></i>Publicidad</li></a>
      <a class="item-menu" href="/ficheros"><li><i class="fas fa-file-alt"></i>Archivos</li></a>
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