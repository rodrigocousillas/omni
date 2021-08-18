<?php  
$seccion = 'Novedades'; 
$cat = 3;
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, 'es_ES.UTF-8');
$meses = array('','Enero','Febrero','Marzo','Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

require ('header.php');
require_once("config/conexion.php");

$id = "";
if(isset($_REQUEST["i"]) && $_REQUEST["i"]!="")
  $id = $_REQUEST["i"];

$query="SELECT o.* 
        FROM " . TABLA_NOVEDADES. " o 
        WHERE o.id = '".$id."'";

$respuesta=mysqli_query($conexion, $query); 
if($respuesta){
  while($r=mysqli_fetch_assoc($respuesta)){ 
    $id=($r['id']);
    $titulo=($r['titulo']);
    $imagen1=($r['imagen1']);
    $imagen2=($r['imagen2']);
    $imagen3=($r['imagen3']);
    $imagenGrande=($r['imagenGrande']);
    if($imagenGrande == "") $imagenGrande = "novedades_interior.jpg";
    $tema=($r['tema']);
    $texto=html_entity_decode ($r['texto']);
    $fecha=($r['fecha']);
    $fecha_objeto = date_create($fecha);
  }
} else {
  header("Location: novedades.php");
}
?>
<div class="container-fluid topNovedades">	
</div>
<div class="container-fluid" style="background-color: background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(249,249,249,1) 36%, rgba(249,249,249,1) 100%);">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 pl-15">
				<img src="img/novedades/<?php echo $imagenGrande;?>" alt="" style="margin:0;
	padding:0;
	width:100%;">
			</div>
			<div class="col-12 col-md-6 destacadoNovedad">
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

			</div>
		</div>
	</div>
</div>
<div class="container desarrolloNovedad">
	<div class="row">
		<div class="col-12 offset-md-3 col-md-6">
			<?php echo $texto;?>
			  <section class="regular slider" style="margin-top: 50px; margin-bottom: 160px;">
           
                  
                  <div>
                    <img src="img/novedades/<?php echo $imagen1;?>" alt="">
                  </div>

                  	<?php if(!empty($imagen2)) {?>
                  <div>
                    <img src="img/novedades/<?php echo $imagen2;?>" alt="">
                  
                  </div>
               	<?php } ?>
               	<?php if(!empty($imagen3)) {?>

               		                  <div>
                    <img src="img/novedades/<?php echo $imagen3;?>" alt="">
                  
                  </div>

               	<?php } ?>	


          </section>
		</div>
	</div>
	<div class="row">
	<div class="col-12">

			<div class="lineaNegra"></div>
				
				<h3>Más Novedades</h3>
			
		</div>
	</div>
</div>
 
	<div class="container masNovedades">
	<div class="row">
	 <?php
      //ultimas 3
      $query="SELECT * FROM ".TABLA_NOVEDADES." WHERE habilitado = 1 AND id <> '".$id."' ORDER BY orden LIMIT 0, 3";
      $respuesta=mysqli_query($conexion, $query); 
      $id=0;
      while($r=mysqli_fetch_assoc($respuesta)){ 
        $tema=($r['tema']);
        $titulo=($r['titulo']);
        $fecha=($r['fecha']);
        $imagen=($r['imagen']);
        if($imagen == "") $imagen = "novedades.jpg";
        $id=($r['id']);

        $fecha_objeto = date_create($fecha);
      
      ?>
		<div class="col-md-4 mb-5 mb-md-0">
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

	<?php } ?>

</div>
<div class="row masNovedades">
	<div class="col-12">
	<div class="lineaNegra"></div>
</div>
</div>
</div>

<?php 
  require ('footer.php') ;
?>