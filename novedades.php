<?php
$seccion = 'Novedad';  
$cat = 3;
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, 'es_ES.UTF-8');
$meses = array('','Enero','Febrero','Marzo','Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

require ('header.php');
require_once("config/conexion.php");
//Destacada
$query="SELECT * FROM ".TABLA_NOVEDADES." WHERE destacada= 1 AND habilitado = 1";
$respuesta=mysqli_query($conexion, $query); 
$id=0;
while($r=mysqli_fetch_assoc($respuesta)){ 
  $tema=($r['tema']);
  $titulo=($r['titulo']);
  $fecha=($r['fecha']);
  $imagenGrande=($r['imagenGrande']);
  if($imagenGrande == "") $imagenGrande= "novedades_interior.jpg";
  $id=($r['id']);

  $fecha_objeto = date_create($fecha);
}
?>

<div class="container-fluid topNovedades">	
</div>
<div class="container-fluid" style="background-color: background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(249,249,249,1) 36%, rgba(249,249,249,1) 100%);">
	<div class="container">
		<div class="row">
			<div class="col-6" style="padding-left: 15px;">
				<img src="img/novedades/<?php echo $imagenGrande;?>" alt="" style="margin:0;
	padding:0;
	width:100%;">
			</div>
			<div class="col-6 destacadoNovedad">
				<div class="tema">
					<?php echo strtoupper($tema);?>
				</div>
				<div class="titulo">
					<?php echo $titulo;?>
				</div>
				<div class="lineaRoja"></div>
				<div class="fecha">
					<?php echo date_format($fecha_objeto, 'd');?>. <?php echo $meses[(int)date_format($fecha_objeto, 'm')];?>. <?php echo date_format($fecha_objeto, 'Y');?>
				</div>
				<a href="novedad.php?i=<?php echo $id;?>">
				<button type="button" class="btn btn-leerMas">LEER MÁS <i class="fas fa-plus" ></i></button>
			</a>
			</div>
		</div>
	</div>
</div>
<div class="container masNovedades">
	<div class="row">
		<div class="col-12">
			<div class="lineaNegra"></div>
				
				<h3>Más Novedades</h3>
			
		</div>

 <?php
      $query="SELECT * FROM ".TABLA_NOVEDADES." WHERE habilitado = 1 AND id <> '".$id."' ORDER BY orden";
      $respuesta=mysqli_query($conexion, $query); 
      $id=0;
      while($r=mysqli_fetch_assoc($respuesta)){ 
        $tema=($r['tema']);
        $titulo=($r['titulo']);
        $fecha=($r['fecha']);
        $imagen=($r['imagen']);
        //if($imagen == "") $imagen = "novedades.jpg";
        $id=($r['id']);

        $fecha_objeto = date_create($fecha);
      ?>

		<div class="col-md-4 news">
			<img src="img/novedades/<?php echo $imagen;?>" alt="" class="img-fluid">
			<div class="tema">
				<?php echo strtoupper($tema);?>
			</div>
			<div class="titulo">
				<?php echo $titulo;?>
			</div>
			<a class="button" href="novedad.php?i=<?php echo $id;?>">
				<img src="img/ver_mas.png"
         onmouseover="this.src='img/ver_mas_over.png';"
         onmouseout="this.src='img/ver_mas.png';">
			</a>
		</div>
		
		 <?php
      }
      ?>
		
	</div>
	<div class="row">
		<div class="col-12">
			<!--<ul class="pagination justify-content-center">
  <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
    <span class="page-link" aria-hidden="true">&lsaquo;</span>
  </li>

  <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
  <li class="page-item"><a class="page-link" href="x?page=2">2</a></li>

  <li class="page-item">
    <a class="page-link" href="x=2" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
  </li>
</ul>-->
<div class="lineaNegra"></div>
		</div>
	</div>
</div>





<?php 
  require ('footer.php') ;
?>