<?php 
	$cat=1;
	$seccion = 'Productos';
	require ('header.php');	
	require_once("config/conexion.php");
?>
<?php
		$query="SELECT * FROM ".TABLA_MODELOS_GRANDES." WHERE habilitado = 1 ORDER BY orden ";
		$respuesta=mysqli_query($conexion, $query); 
		$id=0;
		while($r=mysqli_fetch_assoc($respuesta)){ 
				$titulo=($r['titulo']);
		    $titulo2=($r['titulo2']);
		    $modelo=($r['modelo']);
		    $imagen=($r['imagen']);
		    $proximamente=($r['proximamente']);
		    $id=($r['id']);
		    
		?>
<div class="container-fluid fondoProductos" style="background: url(img/productos/<?php echo $imagen; ?>) 100% 0% no-repeat; background-size: cover;">

	<div class="container headerProductos">
		<div class="lineaRoja desktop"></div>
		<div class="lineaRoja mx-auto mobile"></div>

		<h1 class="wow fadeInUp" data-wow-delay="0.1s" style=" animation-duration: 2s; "><?php echo $titulo ?></h1>
		<h1 class="wow fadeInUp" data-wow-delay="0.2s" style=" animation-duration: 3s; "><?php echo $titulo2 ?></h1>
		<a class="desktop btn btn-coloradoMasInfo wow fadeInUp" style=" animation-duration: 2s; " href="producto.php?i=<?php echo $modelo; ?>">MÁS INFORMACIÓN <i class="fas fa-plus" ></i></a>
		<a class="mobile mx-auto btn btn-coloradoMasInfo1 wow fadeInUp" style=" animation-duration: 2s; " href="producto.php?i=<?php echo $modelo; ?>">MÁS INFORMACIÓN <i class="fas fa-plus" ></i></a>
	</div>

	<?php if($proximamente == "1") { ?>
		<div class="proximamenteDer wow bounceInUp">
			<img src="img/productos/proximamente_der.png" alt="">	
	</div>
	<?php } ?>
</div>
<?php } ?>

<!-- DESTACADOS MEDIANOS -->

<div class="container " >
	
	<div class="row">
	<?php
		$query="SELECT * FROM ".TABLA_MODELOS_MEDIANOS." WHERE habilitado = 1 ORDER BY orden ";
		$respuesta=mysqli_query($conexion, $query); 
		$id=0;
		while($r=mysqli_fetch_assoc($respuesta)){ 
			$marca=($r['marca']);
		    $modelo=($r['modelo']);
		    $imagen=($r['imagen']);
		    $imagen2=($r['imagen2']);
		    $id=($r['id']);
		    
		?>

<div class="col-md-6 HomeProductosDestacadosMedianos" style="margin-top: 20px;">
	<div class="contenedor" >
	   <img src="img/productos/<?php echo $imagen2; ?>" width="100%" /> 
	   <a href="producto.php?i=<?php echo $modelo; ?>"><img class="top" src="img/productos/<?php echo $imagen; ?>" width="100%"/></a>
	</div>
</div>

		

				
<?php } ?>
</div>
</div>


	<div class="container HomeProductosDestacados" >
	
	<div class="row">
	<?php
		$query="SELECT * FROM ".TABLA_MODELOS_HOME." WHERE habilitado = 1 ORDER BY orden ";
		$respuesta=mysqli_query($conexion, $query); 
		$id=0;
		while($r=mysqli_fetch_assoc($respuesta)){ 
			$marca=($r['marca']);
		    $modelo=($r['modelo']);
		    $imagen=($r['imagen']);
		    $imagen2=($r['imagen2']);
		    $id=($r['id']);
		    
		?>

<div class="col-md-4" style="margin-top: 20px;">
	<div class="contenedor" >
	   <img src="img/productos/<?php echo $imagen2; ?>" width="100%" /> 
	   <a href="producto.php?i=<?php echo $modelo; ?>"><img class="top" src="img/productos/<?php echo $imagen; ?>" width="100%"/></a>
	</div>
</div>

		

				
<?php } ?>
</div>
</div>
<div class="container">
	<div class="lineaNegra"></div>
</div>

<?php 
  require ('footer.php') ;
?>