<!DOCTYPE html>
<html lang="es">
<head>
  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Rodrigo Cousillas">
    <meta name="generator" content="">
   	<title><?php echo $seccion; ?> Omni SRL - Pasión por la tecnología</title>
	  <link rel="shortcut icon" href="ico/favicon.png" /> 
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="css/slick/slick.css">
    <link rel="stylesheet" href="css/slick/slick-theme.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/xuu4pzc.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/royalslider.css">
    <link rel="stylesheet" href="css/rs-minimal-white.css">
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

     

</head>
<body>

<header class="desktop container <?php if($seccion=='Inicio') { echo 'darkNav'; }; if ($seccion=='Productos') { echo 'darkNav'; } else { echo 'lightNav'; } ?>">
 
<nav class="navbar navbar-expand-lg navbar-light animated fadeInDown">
  <a class="navbar-brand" href="https://www.omnisrl.com.ar/">
    <?php 
      if($seccion=='Inicio') { echo '<img src="img/omni.png" alt="">'; };
      if($seccion=='Productos') { echo '<img src="img/omni.png" alt="">'; } 
      if($seccion=='Representaciones') { echo '<img src="img/omni_black.png" alt="">'; } 
      if($seccion=='Novedades') { echo '<img src="img/omni_black.png" alt="">'; } 
      if($seccion=='Capacitaciones') { echo '<img src="img/omni_black.png" alt="">'; } 
      if($seccion=='Nosotros') { echo '<img src="img/omni_black.png" alt="">'; } 
      if($seccion=='Contacto') { echo '<img src="img/omni_black.png" alt="">'; } 
      
    ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active d-none d-md-block">
         <div class="<?php if($cat == 1) {echo 'activo';} ?>"></div>
          <a class="nav-link btnProductos" href="">Productos +<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown d-block d-md-none">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos +
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div class="dropLabel">OCULUS</div>
          <a href="https://urro.com.ar/omni/newproducto.php?i=1" class="dropdown-item">Pentacam AXL Wave</a>
        

          <div class="dropLabel" style="margin-top: 8px;">OPTOVUE</div>

          <a href="https://urro.com.ar/omni/newproducto.php?i=9" data-img="img/productos/">Solix Fullrange</a>


            <div class="dropLabel" style="margin-top: 8px;">LUMITHERA</div>

 <a href="https://urro.com.ar/omni/newproducto.php?i=14" data-img="img/productos/">Valeda</a>

             <div class="dropLabel">OCULUS SURGICAL</div>
            
 <a href="https://urro.com.ar/omni/newproducto.php?i=16" data-img="img/productos/">BIOM 5</a>
          
        </div>
      </li>

     
  </div>
</nav>

</header>

<header class="mobile container fixed-top">
 


<nav class="navbar navbar-expand-lg navbar-light animated fadeInDown">
  <a class="navbar-brand" href="index.php">
  
      <img src="img/omni_black.png" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    

      <li class="nav-item dropdown d-block d-md-none">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos +
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div class="dropLabel">OCULUS</div>
          <a href="https://urro.com.ar/omni/newproducto.php?i=1" class="dropdown-item">Pentacam AXL Wave</a>
        

          <div class="dropLabel" style="margin-top: 8px;">OPTOVUE</div>

          <a href="https://urro.com.ar/omni/newproducto.php?i=9" data-img="img/productos/">Solix Fullrange</a>


            <div class="dropLabel" style="margin-top: 8px;">LUMITHERA</div>

 <a href="https://urro.com.ar/omni/newproducto.php?i=14" data-img="img/productos/">Valeda</a>

             <div class="dropLabel">OCULUS SURGICAL</div>
            
 <a href="https://urro.com.ar/omni/newproducto.php?i=16" data-img="img/productos/">BIOM 5</a>
          
        </div>
      </li>

    

    </ul>
  </div>
</nav>

</header>

<div id="dropProductos" class="fluid-container dropProductos">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          
          <div class="col-md-3">
            <div class="dropLabel">OCULUS</div>
          <a href="https://urro.com.ar/omni/newproducto.php?i=1">Pentacam AXL Wave</a>
        

          <div class="dropLabel" style="margin-top: 8px;">OPTOVUE</div>

          <a href="https://urro.com.ar/omni/newproducto.php?i=9" data-img="img/productos/">Solix Fullrange</a>


            <div class="dropLabel" style="margin-top: 8px;">LUMITHERA</div>

 <a href="https://urro.com.ar/omni/newproducto.php?i=14" data-img="img/productos/">Valeda</a>

             <div class="dropLabel">OCULUS SURGICAL</div>
            
 <a href="https://urro.com.ar/omni/newproducto.php?i=16" data-img="img/productos/">BIOM 5</a>
          
        </div>
        </div>
      </div>
      <div class="col-md-4 p-0 ">
        
      </div>
    </div>
  </div>
</div>



