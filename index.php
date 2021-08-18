<?php  
$seccion = 'Inicio';
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, 'es_ES.UTF-8');
$meses = array('','Enero','Febrero','Marzo','Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

require ('header.php');
require_once("config/conexion.php");
?>


  <div class="container-fluid hero p-0 sliderHero royalSlider rsMinW rsWithBullets">
    
    <?php
		      $query="SELECT * FROM ".TABLA_CARUSELHOME." WHERE habilitado = 1 ORDER BY orden ";
		      $respuesta=mysqli_query($conexion, $query); 
		      $id=0;
		      while($r=mysqli_fetch_assoc($respuesta)){ 
		        $subtitulo=($r['subtitulo']);
		        $titulo=($r['titulo']);
		        $vermas=($r['vermas']);
		        $imagen=($r['imagen']);
		        $id=($r['id']);
		      ?>
      <div class="rsContent">
                  <img src="img/slider_principal/<?php echo $imagen;?>" class="img-fluid slideDesktop">
            
                  <div class="texto">
                  	<h5 class="animated fadeInUp"><?php echo $subtitulo ?></h5>
                    <h1 class="animated fadeInUp"><?php echo $titulo;?></h1>
                   </div>
                  
       </div>
       <?php } ?>
       <div class="rsContent mobile">
                    
            			<video id="video-background" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    							<source src="https://couandcou.com.ar/img/video.mp4" type="video/mp4">
  								</video>

                  <div class="texto">
                  	<h5 class="animated fadeInUp">Etiqueta H5</h5>
                    <h1 class="animated fadeInUp">Etiqueta H1</h1>
                   </div>
                  
       </div>
  
  
</div>
<div class="container-fluid" style="margin-top: 25px; margin-bottom: 25px;">
	<div class="row sinpadding">
		<div class="col-12">
			<div class="HomeNuestrasMarcas">
				<h2>Nuestras Marcas</h2>
				<p>Somos representantes exclusivos<br>de marcas internacionales de primera línea </p>
				<a href="productos.php" class="btn btn-coloradoMasInfo">VER PRODUCTOS <i class="fas fa-plus" ></i></a>
			</div>
	   <section class="variable slider">
         <?php
		      $query="SELECT * FROM ".TABLA_MARCAS." WHERE habilitado = 1 ORDER BY orden ";
		      $respuesta=mysqli_query($conexion, $query); 
		      $id=0;
		      while($r=mysqli_fetch_assoc($respuesta)){ 
		        $imagen=($r['imagen']);
		        if($imagen == "") $imagen = "novedades.jpg";
		        $id=($r['id']);
		      ?>
                  <div>
                    <img src="img/productos_home/<?php echo $imagen;?>" alt="" class="mx-auto" width="100%">
                  </div>
                  <?php } ?>
          </section>
      </div>
</div>
</div>

<div class="container-fluid fondoHomeCapacitacion">
	<div class="HomeCapacitacion">
		<h2 class="animated fadeInUp">El mejor equipo <br> de Capacitación <br>y postventa</h2>
		<a href="capacitaciones.php"><button type="button" class="btn btn-coloradoMasInfo">MÁS INFORMACIÓN <i class="fas fa-plus" ></i></button></a>
	</div>
</div>

<!-- DESTACADOS CARDS -->

<div class="container HomeProductosDestacados">
	<div class="lineaNegra"></div>
	<h3>Productos Destacados</h3>
	<div class="row">
	<?php
		$query="SELECT * FROM ".TABLA_MODELOS_HOME." WHERE habilitado = 1 AND destacado = 1 ORDER BY orden limit 0,3";
		$respuesta=mysqli_query($conexion, $query); 
		$id=0;
		while($r=mysqli_fetch_assoc($respuesta)){ 
			$marca=($r['marca']);
		    $modelo=($r['modelo']);
		    $imagen=($r['imagen']);
		    $imagen2=($r['imagen2']);
		    $id=($r['id']);
		    
		?>

<div class="col-md-4 mt-4 mt-md-0">
	<div class="contenedor" >
	   <img src="img/productos/<?php echo $imagen2; ?>" width="100%" />
	   <a href="producto.php?i=<?php echo $id; ?>"><img class="top" src="img/productos/<?php echo $imagen; ?>" width="100%"/></a>
	</div>
</div>

		

				
<?php } ?>
</div>
</div>

<!-- FIN DESTACADOS CARDS -->

<div class="container-fluid ultimasNovedades">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="lineaBlanca"></div>
				<h3>Últimas novedades</h3>
			</div>
		</div>
		<div class="row">

<?php
		      $query="SELECT * FROM ".TABLA_NOVEDADES." WHERE habilitado = 1 ORDER BY orden limit 0,3";
		      $respuesta=mysqli_query($conexion, $query); 
		      $id=0;
		      while($r=mysqli_fetch_assoc($respuesta)){ 
		        $tema=($r['tema']);
		        $titulo=($r['titulo']);
		        $fecha=($r['fecha']);
		        $imagen=($r['imagen']);
		        if($imagen == "") $imagen = "novedades.jpg";
		        $id=($r['id']);
		      ?>

			<div class="col-md-4 mobileMarginBottom">
				<a class="button" href="novedad.php?i=<?php echo $id;?>">
					<img src="img/novedades/<?php echo $imagen;?>" width="100%" onmouseout="this.style.opacity=1;this.filters.alpha.opacity='100';" onmouseover="this.style.opacity=0.2;this.filters.alpha.opacity='20';" alt="" class="img-fluid">
				</a>
				<div class="tema">
					<?php echo strtoupper($tema);?>
				</div><a class="button" href="novedad.php?i=<?php echo $id;?>">
				<div class="titulo">
					<?php echo $titulo;?>
				</div>
			</a>
			<a class="button" href="novedad.php?i=<?php echo $id;?>">
				<img src="img/leer_mas.png"
         onmouseover="this.src='img/leer_mas_over.png';"
         onmouseout="this.src='img/leer_mas.png';">
			</a>
			</div>

		<?php } ?>

		
		</div>
	</div>
</div>







<?php 
  require ('footer.php') ;
?>