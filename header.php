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
 

 <?php
  require_once("config/conexion.php");

  $oculus="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'oculus'";
  $respOculus=mysqli_query($conexion, $oculus);
  $respOculus2=mysqli_query($conexion, $oculus);

  $optovue="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'optovue'";
  $respOptovue=mysqli_query($conexion, $optovue);
  $respOptovue2=mysqli_query($conexion, $optovue);

  $lumithera="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'lumithera'";
  $respLumithera=mysqli_query($conexion, $lumithera);
  $respLumithera2=mysqli_query($conexion, $lumithera);

  $oculusS="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'oculus surgical'";
  $respOculusS=mysqli_query($conexion, $oculusS); 
  $respOculusS2=mysqli_query($conexion, $oculusS); 

  $crystalvue="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'crystalvue'";
  $respCrystalvue=mysqli_query($conexion, $crystalvue); 
  $respCrystalvue2=mysqli_query($conexion, $crystalvue); 

  $diopsys="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'diopsys'";
  $respDiopsys=mysqli_query($conexion, $diopsys); 
  $respDiopsys2=mysqli_query($conexion, $diopsys); 

  $olleyes="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'olleyes'";
  $respOlleyes=mysqli_query($conexion, $olleyes); 
  $respOlleyes2=mysqli_query($conexion, $olleyes); 

?>


<nav class="navbar navbar-expand-lg navbar-light animated fadeInDown">
  <a class="navbar-brand" href="index.php">
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
          <?php
              while($r=mysqli_fetch_assoc($respOculus2)){
                echo '<a href="producto.php?i='.$r['id'].'" class="dropdown-item">'.$r['nombre_modelo'].'</a>';
              }
          ?>
          <div class="dropLabel" style="margin-top: 8px;">OPTOVUE</div>
            <?php
              while($r=mysqli_fetch_assoc($respOptovue2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel" style="margin-top: 8px;">LUMITHERA</div>
            <?php
              while($r=mysqli_fetch_assoc($respLumithera2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel">OCULUS SURGICAL</div>
            <?php
              while($r=mysqli_fetch_assoc($respOculusS2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel" style="margin-top: 8px;">CRYSTALVUE</div>
            <?php
              while($r=mysqli_fetch_assoc($respCrystalvue2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel" style="margin-top: 8px;">DIOPSYS</div>
            <?php
              while($r=mysqli_fetch_assoc($respDiopsys2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          
            <div class="dropLabel" style="margin-top: 8px;">OLLEYES</div>
            <?php
              while($r=mysqli_fetch_assoc($respOlleyes2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>

          
        </div>
      </li>

      <li class="nav-item">
        <div class="<?php if($cat == 2) {echo 'activo';} ?>"></div>
        <a class="nav-link" href="representaciones.php">Representaciones</a>
      </li>
      <li class="nav-item">
        <div class="<?php if($cat == 3) {echo 'activo';} ?>"></div>
        <a class="nav-link" href="novedades.php">Novedades</a>
      </li>
      <li class="nav-item">
         <div class="<?php if($cat == 4) {echo 'activo';} ?>"></div>
        <a class="nav-link" href="capacitaciones.php">Capacitación</a>
      </li>
      <li class="nav-item">
         <div class="<?php if($cat == 5) {echo 'activo';} ?>"></div>
        <a class="nav-link" href="nosotros.php">Nosotros</a>
      </li>
     <li class="nav-item">
       <div class="<?php if($cat == 6) {echo 'activo';} ?>"></div>
        <a class="nav-link" href="contacto.php">Contacto</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="btn btn-colorado" href="https://api.whatsapp.com/send?phone=541144445555&text=Te escribo desde el website" target="_blank"> <i class="fab fa-whatsapp"></i> ASESORAMIENTO Y VENTAS </a>
      </li>

    </ul>
  </div>
</nav>

</header>

<header class="mobile container fixed-top">
 

 <?php
  require_once("config/conexion.php");

  $oculus="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'oculus'";
  $respOculus=mysqli_query($conexion, $oculus);
  $respOculus2=mysqli_query($conexion, $oculus);

  $optovue="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'optovue'";
  $respOptovue=mysqli_query($conexion, $optovue);
  $respOptovue2=mysqli_query($conexion, $optovue);

  $lumithera="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'lumithera'";
  $respLumithera=mysqli_query($conexion, $lumithera);
  $respLumithera2=mysqli_query($conexion, $lumithera);

  $oculusS="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'oculus surgical'";
  $respOculusS=mysqli_query($conexion, $oculusS); 
  $respOculusS2=mysqli_query($conexion, $oculusS); 

  $crystalvue="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'crystalvue'";
  $respCrystalvue=mysqli_query($conexion, $crystalvue); 
  $respCrystalvue2=mysqli_query($conexion, $crystalvue); 

  $diopsys="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'diopsys'";
  $respDiopsys=mysqli_query($conexion, $diopsys); 
  $respDiopsys2=mysqli_query($conexion, $diopsys); 

  $olleyes="SELECT * FROM ".TABLA_MODELOS." WHERE marca like 'olleyes'";
  $respOlleyes=mysqli_query($conexion, $olleyes); 
  $respOlleyes2=mysqli_query($conexion, $olleyes); 

?>


<nav class="navbar navbar-expand-lg navbar-light animated fadeInDown">
  <a class="navbar-brand" href="index.php">
  
      <img src="img/omni_black.png" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos +
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div class="dropLabel">OCULUS</div>
          <?php
              while($r=mysqli_fetch_assoc($respOculus2)){
                echo '<a href="producto.php?i='.$r['id'].'" class="dropdown-item">'.$r['nombre_modelo'].'</a>';
              }
          ?>
          <div class="dropLabel" style="margin-top: 8px;">OPTOVUE</div>
            <?php
              while($r=mysqli_fetch_assoc($respOptovue2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel" style="margin-top: 8px;">LUMITHERA</div>
            <?php
              while($r=mysqli_fetch_assoc($respLumithera2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel">OCULUS SURGICAL</div>
            <?php
              while($r=mysqli_fetch_assoc($respOculusS2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel" style="margin-top: 8px;">CRYSTALVUE</div>
            <?php
              while($r=mysqli_fetch_assoc($respCrystalvue2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          <div class="dropLabel" style="margin-top: 8px;">DIOPSYS</div>
            <?php
              while($r=mysqli_fetch_assoc($respDiopsys2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>
          
            <div class="dropLabel" style="margin-top: 8px;">OLLEYES</div>
            <?php
              while($r=mysqli_fetch_assoc($respOlleyes2)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a>';
              }
            ?>

          
        </div>
      </li>

      <li class="nav-item">
        
        <a class="nav-link" href="representaciones.php">Representaciones</a>
      </li>
      <li class="nav-item">
        
        <a class="nav-link" href="novedades.php">Novedades</a>
      </li>
      <li class="nav-item">
        
        <a class="nav-link" href="capacitaciones.php">Capacitación</a>
      </li>
      <li class="nav-item">
        
        <a class="nav-link" href="nosotros.php">Nosotros</a>
      </li>
     <li class="nav-item">
      
        <a class="nav-link" href="contacto.php">Contacto</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="btn btn-colorado" href="https://api.whatsapp.com/send?phone=541144445555&text=Te escribo desde el website" target="_blank"> <i class="fab fa-whatsapp"></i> ASESORAMIENTO Y VENTAS </a>
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
            <?php
              while($r=mysqli_fetch_assoc($respOculus)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a><br>';
              }
            ?>
          </div>
          <div class="col-md-3">
            <div class="dropLabel">OPTOVUE</div>
            <?php
              while($r=mysqli_fetch_assoc($respOptovue)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a><br>';
              }
            ?>
            <br>
            <div class="dropLabel" style="margin-top: 8px;">LUMITHERA</div>
            <?php
              while($r=mysqli_fetch_assoc($respLumithera)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a><br>';
              }
            ?>
          </div>
          <div class="col-md-3">
            <div class="dropLabel">OCULUS SURGICAL</div>
            <?php
              while($r=mysqli_fetch_assoc($respOculusS)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a><br>';
              }
            ?>
            <br>
            <div class="dropLabel" style="margin-top: 8px;">CRYSTALVUE</div>
            <?php
              while($r=mysqli_fetch_assoc($respCrystalvue)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a><br>';
              }
            ?>
          </div>
          <div class="col-md-3">
            <div class="dropLabel">DIOPSYS</div>
            <?php
              while($r=mysqli_fetch_assoc($respDiopsys)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a><br>';
              }
            ?>
            <br>
            <div class="dropLabel" style="margin-top: 8px;">OLLEYES</div>
            <?php
              while($r=mysqli_fetch_assoc($respOlleyes)){
                echo '<a href="producto.php?i='.$r['id'].'" data-img="img/productos/'.$r['imagen10'].'">'.$r['nombre_modelo'].'</a><br>';
              }
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-4 p-0 imagen">
        
      </div>
    </div>
  </div>
</div>



