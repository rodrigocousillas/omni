<?php  
	$seccion = 'Capacitaciones';
	$cat=1;
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
				<div class="col-12 col-md-2 mt-2 mt-md-0 pt-2">
			     	<select name="marcas" id="marcas" onchange="filtrar('marcas', this.value)">
			        	<option value="">Marca</option>
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
    		
			</div>
			</div>

<?php
	// LA CONSULTA
			$regVistos = 4;
			$query="SELECT o.* FROM " . TABLA_CAPACITACIONES . " o ";
			 if($tipo_url == "marcas" && $id_url != ""){
        $query.=" INNER JOIN ".TABLA_CAPACITACIONESMARCA." op ON op.id_capacitacion = o.id AND op.id_marca ='".$id_url."' ";
      }
        $query.=" WHERE o.habilitado = 1 ";
      $query.=" ORDER BY o.orden ASC";
      $respuesta=mysqli_query($conexion, $query); 
      if (!$respuesta) {
      } else {
        while ($r= mysqli_fetch_assoc($respuesta)){
          $id_obra = $r['id'];
          $titulo = $r['titulo'];
          $marca = $r['marca'];
          $imagen = $r['imagen'];
          //if($imagen == "") $imagen="obras.jpg";
    ?>


		<div class="col-md-4 mb-5">
		<a href="capacitacion.php?i=<?php echo $id_obra;?>">
			<img src="img/capacitaciones/<?php echo $imagen;?>" alt="" class="img-fluid">
		
		</a>

		<div class="tema pt-4 mb-1">
				<?php echo $marca;?>
			</div>
		<a href="capacitacion.php?i=<?php echo $id_obra;?>">
			
				<?php echo $titulo;?>
		</a>		
		
		<div class="mt-1">
		<a href="capacitacion.php?i=<?php echo $id_obra;?>">	
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
<br clear="all">
	<div class="container">
		
		
		<?php
		// EL PAGINADOR

// Se inicia el listado de páginas

				
                            echo '<div class="row">
							<div class="col-6 offset-3">
							<ul class="pagination justify-content-center">';

                            // Si la página actual no es la primera, se muestra el enlace a la página anterior
                              if ($pagAnterior>0) {echo '<li class="page-link"><a href="capacitaciones.php?pag='.$pagAnterior.'">&laquo;</a></li>';}

                            // Se saca el listado de páginas mediante un bucle
                            $pgIntervalo = 5; // Páginas que aparecen antes y después de la actual
                            $pgMaximo = ($pgIntervalo*2)+1; // Máximo de páginas en el listado
                            $pg=$pagActual-$pgIntervalo;$i=0;
                            while ($i<$pgMaximo) {
                             if ($pg==$pagActual) {$strong=array('class="active page-link"', '');} else {$strong=array('', '');}
                             if ($pg>0 and $pg<=$pagTotal) {
                                echo '<li '.$strong[0].' class="page-link" ><a href="capacitaciones.php?pag='.$pg.'">'.$pg.'</a>'.$strong[1].'</li>';
                              $i++;
                             }
                             if ($pg>$pagTotal) {$i=$pgMaximo;} // Si la página que se va a mostrar se pasa de la cantidad de páginas definidas en $pagTotal se para la generación de elementos de lista
                             $pg++;
                            }

                            // Si la página actual no es la última, se muestra el enlace a la página siguiente
                              if ($pagSiguiente<=$pagTotal) {echo '<li class="page-link"><a href="capacitaciones.php?pag='.$pagSiguiente.'">&raquo;</a></li>';}
                    
                            // Se finaliza el listado de páginas
                            echo '</ul></div></div>';
							?>
			
		
</div>


<script>
  $( document ).ready(function() {
    $(".btnFiltro").on("click", function(){
      var tipo = $(this).attr("data-tipo");
      var id = $(this).attr("data-id");

      window.location.href='?t='+tipo+'&i='+id;
    });

    $(".btnLimpiarFiltro").on("click", function(){
      window.location.href='obras.php';
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