<?php  
	require_once("config/conexion.php");
	$seccion = 'Capacitaciones';
	$cat=4;
$id = "";
if(isset($_REQUEST["i"]) && $_REQUEST["i"]!="")
  $id = $_REQUEST["i"];

$query="SELECT o.* 
        FROM " . TABLA_CAPACITACIONES. " o 
        WHERE o.id = '".$id."'";

$respuesta=mysqli_query($conexion, $query); 
if($respuesta){
  while($r=mysqli_fetch_assoc($respuesta)){ 
    $id=($r['id']);
    $titulo=($r['titulo']);
    $imagen=($r['imagen']);
    if($imagen == "") $imagen = "obras.jpg";
    $marca=($r['marca']);
    $modelo=($r['modelo']);
    $youtubevideo=($r['youtubevideo']);
    $texto=($r['texto']);
  }
} else {
  header("Location: obras.php");
}

require ('header.php');
?>

<div class="container-fluid topNovedades">	
</div>
<div class="container-fluid" style="background-color: background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(249,249,249,1) 36%, rgba(249,249,249,1) 100%);">
</div>
<div class="container capacitaciones">
	<div class="row">

	<div class="col-md-8 offset-md-2">
		<div class="tema">
			<?php echo $marca;?>
		</div>
		<div class="titulo">
			<?php echo $titulo;?>
		</div>
		<p><?php echo $texto;?></p>
	</div>
	<div class="col-md-10 offset-md-1" style="margin-top: 100px; margin-bottom: 130px;">
		<iframe width="100%" height="580" src="https://www.youtube.com/embed/<?php echo $youtubevideo;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

		
	</div>
</div>
</div>

<?php
$query="SELECT h.*
        FROM " . TABLA_CAPACITACIONESRELACIONADOS. " pr 
          INNER JOIN ".TABLA_CAPACITACIONES." h ON h.id = pr.id_relacionado
        WHERE pr.id_capacitacion = '".$id."' AND h.habilitado = 1";

$prod_relacionados=mysqli_query($conexion, $query); 

if($prod_relacionados){


?>

<div class="container-fluid" style="background-color: #f0f0f0;">
	<div class="container capacitaciones">
		<div class="row">
	<div class="col-12 ">

			<div class="lineaNegra"></div>
				
				<h3>Otros videos relacionados</h3>
			
		</div>
 <?php 



    while($r=mysqli_fetch_assoc($prod_relacionados)){ 
      $id_capacitacion=($r['id']);
      $titulo=($r['titulo']);
      $marca=($r['marca']);
      $imagen=($r['imagen']);
      if($imagen == "") $imagen = "obras.jpg";
    ?>		

		<div class="col-md-4">
			<img src="img/capacitaciones/<?php echo $imagen;?>" alt="" class="img-fluid">
			<div class="tema pt-4">
				<?php echo $marca;?>
			</div>
			<div class="tituloCapacitaciones">
				<?php echo $titulo;?>
				<div class="mt-1">
		<a href="capacitacion.php?i=<?php echo $id_capacitacion;?>">	
				<img src="img/ver_mas.png"
         onmouseover="this.src='img/ver_mas_over.png';"
         onmouseout="this.src='img/ver_mas.png';">
		</a>
	</div>
			</div>
			
		</div>
		<?php } ?>
	
	</div>
</div>
</div>
<?php } ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="lineaNegra1"></div>
		</div>
	</div>
</div>



<?php 
  require ('footer.php') ;
?>