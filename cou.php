<?php  
	$cat=1;
	$seccion = 'Productos';
	require_once("config/conexion.php");	

	$id = "";
	if(isset($_REQUEST["i"]) && $_REQUEST["i"]!="")
  	$id = $_REQUEST["i"];

	$query="SELECT o.* 
        FROM " . TABLA_MODELOS. " o 
        WHERE o.id = '".$id."'";

$respuesta=mysqli_query($conexion, $query); 
if($respuesta){
  while($r=mysqli_fetch_assoc($respuesta)){ 
    $id=($r['id']);
    $nombre_modelo=($r['nombre_modelo']); //modelo
    $overline=($r['overline']); 
    $marca=($r['marca']);
    $titulo=($r['titulo']);
    $bajada=($r['bajada']);
    $titulo_para=($r['titulo_para']);
    $texto=($r['texto']);
    $texto_pa=($r['texto_pa']);
    $texto_op=($r['texto_op']);
    $alink_interes1=($r['alink_interes1']);
    $alink_interes2=($r['alink_interes2']);
    $alink_interes3=($r['alink_interes3']);
    $link_interes1=($r['link_interes1']);
    $link_interes2=($r['link_interes2']);
    $link_interes3=($r['link_interes3']);
    $imagen=($r['imagen']);
    $imagen2=($r['imagen2']);
    $imagen3=($r['imagen3']);
    $imagen4=($r['imagen4']);
    $imagen5=($r['imagen5']);
    $imagen6=($r['imagen6']);
    $imagen7=($r['imagen7']);
    $imagen8=($r['imagen8']);
    $imagen9=($r['imagen9']);
    $video=($r['video']); 
  }
} else {
  header("Location: productos.php");
}

require ('header.php');
?>

<div class="container-fluid fondoProducto" style="background: url('img/productos/<?php echo $imagen ?>') 50% 0 no-repeat; background-size: cover;">
	<div class="container headerProducto">
		<h2 class="animated fadeInUp"><?php echo $nombre_modelo; ?></h2>
	</div>
</div>
<div class="container productos">
	<div class="row">
		<div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
			<hr style="background-color: #000000; height: 2px;">
			<div class="tema">
				_OVERLINE
			</div>
			<h3><?php echo $overline; ?></h3>
		</div>
		<div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
			<hr style="background-color: #000000; height: 2px;">
			<div class="tema">
				_MODELO
			</div>
			<h3><?php echo $nombre_modelo; ?></h3>
		</div>
		<div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
			<hr style="background-color: #000000; height: 2px;">
			<div class="tema">
				_MARCA
			</div>
			<h3><?php echo $marca; ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-12 nombreModelo wow fadeInUp" data-wow-delay="0.3s" style=" animation-duration: 2s; ">
			<h1><?php echo $nombre_modelo; ?> <br>
			<?php echo $titulo; ?></h1>
			<p class="mx-auto"><?php echo $bajada; ?></p>
		</div> 
	</div>
</div>
<div class="container" style="background: url('img/productos/<?php echo $imagen5 ?>') 50% 0 no-repeat; height: 700px;">
	<section class="center slider">
		<div>
			<img src="img/productos/<?php echo $imagen6 ?>" alt="" class="d-block mx-auto">
		</div>
		 <?php if(!empty($imagen7)) { ?>
		<div>
			<img src="img/productos/<?php echo $imagen7 ?>" alt="" class="d-block mx-auto">
		</div>
	<?php } ?>
	 <?php if(!empty($imagen8)) {?>
		<div>
			<img src="img/productos/<?php echo $imagen8 ?>" alt="" class="d-block mx-auto">
		</div>
	<?php } ?>
	</section>
</div>
<div class="container-fluid">
	<div class="row">
		<section id="parallax" style="background-image: url('img/productos/<?php echo $imagen2; ?>'); ">
			<div class="col-6 offset-3 wow fadeInUp" data-wow-delay="0.2s" style="animation-duration: 2s;" >
				<h3>
					<?php echo $titulo_para; ?>
				</h3>
				<div style="padding-bottom: 75px;">
					<?php echo $texto; ?>
				</div>
			</div>
		</section>
	</div>	
</div>


<div class="container-fluid pacienteOperador">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="lineaNegra"></div>
				<div class="tema wow fadeInUp" data-wow-delay="0.3s" style=" animation-duration: 2s;">
					<?php echo $nombre_modelo; ?>
				</div>

			</div>
		</div>

		<script type="text/javascript">
  		function mostrar(id) {
    		$('#botonazo1').removeClass('btnActivos');
    		$('#botonazo2').removeClass('btnActivos');

    		if (id == "va") {
        	$("#va").show();
        	$("#vaimagen1").show();
        	$("#vaimagen").hide();
        	$('#botonazo1').addClass('btnActivos');
        	$("#cp").hide();
        	$("#cpimagen").hide();

    		}
  			if (id == "cp") {
        	$("#va").hide();
        	$("#vaimagen1").hide();
        	$("#vaimagen").hide();
        	$("#cp").show();
        	$("#cpimagen").show();
        	$('#botonazo2').addClass('btnActivos');
    		}
			}
		</script>
		<div class="row">
			<div class="col-10 offset-1">
				<div class="row">
					<div class="col-12 col-md-7 wow fadeInUp" data-wow-delay="0.2s" style=" animation-duration: 2s;">
						<p id="va" style="display: block;"><?php echo $texto_pa; ?></p>
						<p id="cp" style="display: none;"><?php echo $texto_op; ?></p>
						<div class="" style="border:1px solid #ff0000; border-radius:25px; padding: 5px; width: 260px;">
							
							<button  type="button" id="botonazo1" class="btnActivos btn btn-blanco" value="va" onClick=" mostrar(this.value); this.blur();">PACIENTE</button>

							<button  type="button" id="botonazo2" class="btn btn-blanco" value="cp" onClick=" mostrar(this.value); this.blur();">OPERADOR</button>
							
						</div>
					</div>
					<div id="vaimagen" class="col-12 col-md-5 wow fadeInUp" data-wow-delay="0.3s" style=" animation-duration: 3s; padding-bottom: 80px; display: block;">
						<img src="img/productos/<?php echo $imagen3; ?>" alt="" class="img-fluid" >
					</div>
					<div id="vaimagen1" class="col-12 col-md-5" style="padding-bottom: 80px; display: none;">
						<img src="img/productos/<?php echo $imagen3; ?>" alt="" class="img-fluid" >
					</div>
					<div id="cpimagen" class="col-12 col-md-5" style=" padding-bottom: 80px; display: none;">
						<img src="img/productos/<?php echo $imagen9; ?>" alt="" class="img-fluid" >
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>

<div class="container productosSlider" style="background-color: #f7f7f7;">
	<?php
	$query="SELECT * FROM ".TABLA_MODELOS_SLIDERS." WHERE modelo_id = '".$id."' ORDER BY orden ";
	$franjas=mysqli_query($conexion, $query); 

	if ($franjas) {
		$iFranjas=0;
		while ($franja= mysqli_fetch_assoc($franjas)){
			$modelo_slider_id = $franja['id'];
			$query="SELECT * FROM ".TABLA_MODELOS_SLIDERS_ITEMS." WHERE modelo_slider_id = '".$modelo_slider_id."' ORDER BY orden";
			$sliders=mysqli_query($conexion, $query); 
			if ($sliders) {
				$seccionHtml="";
				$seccionHtml1="";
				$imagenUno="";
				while ($slider= mysqli_fetch_assoc($sliders)){
					$titulo = $slider['titulo'];
					$texto = $slider['texto'];
					$imagen = $slider['imagen'];
					if($imagen!= "" && $imagenUno=="")
						$imagenUno = $imagen;

					$seccionHtml.='
					
					<div style="margin-top:50px; ">
					<div>

	        	<div class="row">
							<div class="col-12 col-md-8">
								<img src="img/productos/sliders/'.$imagen.'" alt="" class=" wow fadeInRight" data-wow-delay="0.3s" style=" animation-duration: 2s;">
							</div>
							<div class="col-12 col-md-4 textoDerecha">
								<div class="lineaRoja"></div>
									<div class="wow fadeInUp" data-wow-delay="0.3s" style=" animation-duration: 2s;">
							 			<h2>'.$titulo.'</h2>
	          				<p>'.nl2br($texto).'</p>
									</div>
							</div>
						</div>
				 	</div>
				 	</div>';

				 	$seccionHtml1.='
					<div style="margin-top:50px;">
					<div>
	        	<div class="row">
						
							<div class="col-12 col-md-5 textoIzquierda">
								<div class="lineaRoja"></div>
									<div class="wow fadeInUp" data-wow-delay="0.3s" style=" animation-duration: 2s;">
							 			<h2>'.$titulo.'</h2>
	          				<p>'.nl2br($texto).'</p>
									</div>
							</div>
							<div class="col-12 col-md-7">
								<img src="img/productos/sliders/'.$imagen.'" alt=""  class="wow fadeInRight" data-wow-delay="0.3s" style="animation-duration: 2s; float: right; margin-right:25px;">
							</div>
						</div>
				 	</div>
				 	</div>';

				}

				if (($iFranjas%2) == 0){
	?>
					<div class="row">
						<div class="col-12"> 
							<section class="regular slider">
							 	<?php echo $seccionHtml;?>
						 	</section>
						</div>
					</div>
	<?php
				} else {
	?>
					<div class="row">
						<div class="col-12"> 
							<section class="regular slider">
							 	<?php echo $seccionHtml1;?>
						 	</section>
						</div>
					</div>
	<?php
				}
			}
			$iFranjas++;
		}
	}
	?>
	

</div>

<div class="container linksDeInteres">
	<div class="row">
		<div class="col-12">
			<h3>Links de interes</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p>
				1.<br>
				<a href="<?php echo $alink_interes1; ?>" target="_blank">
					<?php echo $link_interes1; ?>
				</a>	
			</p>
		</div>
		<div class="col-md-4">
			<p>
				2.<br>
				<a href="<?php echo $alink_interes2; ?>" target="_blank">
					<?php echo $link_interes2; ?>
				</a>
			</p>
		</div>
		<div class="col-md-4">
			<p>
				3.<br>
				<a href="<?php echo $alink_interes3; ?>" target="_blank">
					<?php echo $link_interes3; ?>
				</a> 
			</p>
		</div>
	</div>
</div> <!-- FIN container linksDeInteres -->
<div class="container testimoniosDeExpertos">
	<div class="row">
		<div class="col-12">
			<h2>Testimonios de Expertos</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-8 offset-2">
			<section class="lazy slider">
				<?php
	

  $query="SELECT * FROM " . TABLA_TESTIMONIOS_MODELO . " op
              INNER JOIN " . TABLA_TESTIMONIOS . " p ON p.id = op.id_testimonio
                      WHERE id_modelo =" . $id;

        
		      		$respuesta=mysqli_query($conexion, $query); 
		      		$id=0;
		      		while($r=mysqli_fetch_assoc($respuesta)){ 
		        		$imagen=($r['imagen']);
		        		if($imagen == "") $imagen = "testimonio.jpg";
		        		$frase=($r['frase']);
		        		$nombre=($r['nombre']);
		        		$titulo=($r['titulo']);
		        		$empresa=($r['empresa']);
		        		$id=($r['id']);
		      	?>
                <div class="col-12">
                    <img src="img/testimonios/<?php echo $imagen;?>" alt="' . '" class="mx-auto rounded-circle" width="150">
                	<div class="texto_testimonials">  
                    	<h4><?php echo $titulo;?></h4>
                    	<p><?php echo $frase;?></p>
                    	<h5><?php echo $nombre;?></h5>
                    	<h5><?php echo $empresa;?></h5> 
                	</div>
                </div>
                <?php }  ?>
            </section>
		</div>
	</div>

</div> <!-- Fin container testimoniosDeExpertos -->
<div class="container-fluid contactarProductos">
	<div class="row sinpadding">
		<div class="col-12 col-md-5 texto">
			<hr style="background-color: #ffffff; width: 30px; height: 2px;">
			<p>Por consultas acerca de <?php echo $nombre_modelo; ?> contactese con un asesor</p>
			<button type="button" class="btn btn-contactarAsesor">CONTACTAR ASESOR <i class="fas fa-plus" ></i></button>
		</div>
		<div class="col-12 col-md-7">
			<img src="img/productos/<?php echo $imagen4; ?>" alt="" width="100%">
		</div>
	</div>
</div> <!-- Fin container-fluid contactarProductos -->
<?php 
  require ('footer.php') ;
?>