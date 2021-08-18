<?php  
	$seccion = 'Capacitaciones';
	$cat=4;
	require ('header.php');
	require_once("config/conexion.php");
	

//filtro
$tipo_url = "";
$id_url="";
if(isset($_REQUEST["t"]) && $_REQUEST["t"]!="")
  $tipo_url = $_REQUEST["t"];

if(isset($_REQUEST["i"]) && $_REQUEST["i"]!="")
  $id_url = $_REQUEST["i"];

?>		

<div class="container-fluid topNovedades">	
</div>
<div class="container-fluid" style="background-color: background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(249,249,249,1) 36%, rgba(249,249,249,1) 100%);">
</div>
<div class="container capacitaciones">
	<div class="col-md-8 offset-md-2">
		<div class="tema">
			CAPACITACIONES
		</div>
		<div class="titulo">
			Todo lo que necesita saber sobre los productos que comercializamos
		</div>
	</div>
</div>

<div class="container capacitaciones">
	<div class="row">
		<div class="col-12">
			<div class="lineaNegra"></div>	
				<div class="row">		
				<div class="col-5 col-md-2 mt-0 mt-md-2 mt-md-0 pt-0 pt-md-2">
			     	<select name="marcas" id="marcas" onchange="filtrar('marcas', this.value)">
			        	<option value="">Marcas</option>
			        	<?php
        $query_prod="SELECT * FROM " . TABLA_MARCAS . " ORDER BY nombre ASC";
        $respuesta_prod=mysqli_query($conexion, $query_prod); 
        if (!$respuesta_prod) {
        } else {
          while ($r_prod= mysqli_fetch_assoc($respuesta_prod)){
            $id_combo = $r_prod['id'];
            $nombre = $r_prod['nombre'];
            $sel="";
            if($tipo_url == "marcas" && $id_url == $id_combo) $sel=" selected ";
            echo "<option value='".$id_combo."' ".$sel.">".$nombre."</option>";
          }
        }

        ?>
			    	</select>
          </div>
          <div class="col-5 col-md-2 mt-0 mt-md-2 mt-md-0 pt-0 pt-md-2">

            <select name="modelos" id="modelos" onchange="filtrar('modelos', this.value)">
                <option value="">Modelos</option>
                <?php
        $query_prod="SELECT * FROM " . TABLA_MODELOS . " ORDER BY nombre_modelo ASC";
        $respuesta_prod=mysqli_query($conexion, $query_prod); 
        if (!$respuesta_prod) {
        } else {
          while ($r_prod= mysqli_fetch_assoc($respuesta_prod)){
            $id_combo = $r_prod['id'];
            $nombre = $r_prod['nombre_modelo'];
            $sel="";
            if($tipo_url == "modelos" && $id_url == $id_combo) $sel=" selected ";
            echo "<option value='".$id_combo."' ".$sel.">".$nombre."</option>";
          }
        }

        ?>
            </select> 
          
    			</div>
    		
			</div>
			</div>

<?php
	
			$regVistos = 4;
			$query="SELECT o.* FROM " . TABLA_CAPACITACIONES . " o ";
			 if($tipo_url == "marcas" && $id_url != ""){
        $query.=" INNER JOIN ".TABLA_CAPACITACIONESMARCA." op ON op.id_capacitacion = o.id AND op.id_marca ='".$id_url."' ";
      }

      if($tipo_url == "modelos" && $id_url != ""){
        $query.=" INNER JOIN ".TABLA_CAPACITACIONESMODELOS." oi ON oi.id_capacitacion = o.id AND oi.id_modelo ='".$id_url."' ";
      }

        $query.=" WHERE o.habilitado = 1 ";
      $query.=" ORDER BY o.orden ASC";
      $respuesta=mysqli_query($conexion, $query); 
      if (!$respuesta) {
      } else {
        while ($r= mysqli_fetch_assoc($respuesta)){
          $id_capacitacion = $r['id'];
          $titulo = $r['titulo'];
          $marca = $r['marca'];
          $imagen = $r['imagen'];
          
    ?>


		<div class="col-md-4 mb-5">
		<a href="capacitacion.php?i=<?php echo $id_capacitacion;?>">
			<img src="img/capacitaciones/<?php echo $imagen;?>" alt="" class="img-fluid">


		<div class="tema pt-4 mb-1">
				<?php echo $marca;?>
			</div>

			
				<?php echo $titulo;?>
		
		
		<div class="mt-1">
	
				<img src="img/ver_mas.png"
         onmouseover="this.src='img/ver_mas_over.png';"
         onmouseout="this.src='img/ver_mas.png';">
		</a>
	</div>
		
		
		</div>
	
			 <?php
        }
      }
    ?>	
		
	</div>
</div>	


<script>
  $( document ).ready(function() {
    $(".btnFiltro").on("click", function(){
      var tipo = $(this).attr("data-tipo");
      var id = $(this).attr("data-id");

      window.location.href='?t='+tipo+'&i='+id;
    });

    $(".btnLimpiarFiltro").on("click", function(){
      window.location.href='capacitaciones.php';
    })
  });

  function filtrar(tipo, id){
    if(id != ""){
      window.location.href='?t='+tipo+'&i='+id;
    }
  }
</script>


<?php 
  require ('footer.php') ;
?>