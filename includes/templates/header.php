<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="gdlwebcamp">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Ubuntu+Condensed" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css">

  <!--CARGAR CODIGO CSS DE ACUERDO A LA PAGINA ACTUAL-->
  <?php $archivo = basename($_SERVER['PHP_SELF']);//RETORNA EL NOMBRE DEL ARCHIVO ACTUAL
        $pagina = str_replace(".php","", $archivo);
        if ($pagina == "invitados") {
          echo '<link rel="stylesheet" href="css/colorbox.css">';
        }else if($pagina == "index"){
          echo '<link rel="stylesheet" href="css/colorbox.css">';
        }else if($pagina == "conferencias" ){
          echo '<link rel="stylesheet" href="css/lightbox.css">';
        }
  ?>
  
 
  
  
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body class = "<?php echo $pagina; ?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  
  <header class="site-header">
    <div class="hero">
      <div class="contenido-hero">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-twitter-square"></i></a>
          <a href="#"><i class="fab fa-pinterest-square"></i></a>
          <a href="#"><i class="fab fa-youtube-square"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <p class="fecha"><i class="far fa-calendar-alt"></i> 05 de Julio 2019</p>
          <p class="Ciudad"><i class="fas fa-map-marker-alt"></i> Valledupar - Cesar</p>
          
        </div><!--.informacion-evento-->
        <h1 class="nombre-sitio">vallewebcamp</h1>
        <p class="slogan"> La mejor conferencia de <span>diseño web</span></p>
      </div><!--.contenido-hero-->
    </div><!--.hero-->
  </header><!--.site-header-->
  <div class="barra">
    <div class="contenedor"><!--clearfix-->
      <div class="logo">
        <a href="index.php">
          <img src="img/logov.svg" alt="logo vallewebcamp">
        </a>
      </div><!--.logo-->
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div><!--.menu-movil-->

      <nav class="navegacion-principal">
        <a href="conferencias.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav><!--.navegacion-principal-->
    </div><!--.contenedor-->
  </div><!--.barra-->