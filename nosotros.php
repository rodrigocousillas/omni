<?php  
	$cat=5;
	$seccion = 'Nosotros';
	require ('header.php');

?>
<script type="text/javascript">

							 		function mostrarOtra1() {
									document.getElementById('imagen1').src ="img/nosotros/va_over.png";
								}
								
								function mostrarOriginal1() {
									document.getElementById('imagen1').src ="img/nosotros/va.png";
								}

								function mostrarOtra2() {
									document.getElementById('imagen1').src ="img/nosotros/va.png";
									document.getElementById('imagen2').src ="img/nosotros/cp_over.png";
								}
								
								function mostrarOriginal2() {
									document.getElementById('imagen2').src ="img/nosotros/cp.png";
								}

								function mostrarOtra3() {
									document.getElementById('imagen1').src ="img/nosotros/va.png";
									document.getElementById('imagen3').src ="img/nosotros/st_over.png";
								}
								
								function mostrarOriginal3() {
									document.getElementById('imagen3').src ="img/nosotros/st.png";
								}

							  function mostrar(id) {
							    $('#botonazo1').removeClass('activos');
							    $('#botonazo2').removeClass('activos');
							    $('#botonazo3').removeClass('activos');
							    
							    if (id == "va") {
							        $("#va").show();
							        $('#botonazo1').addClass('activos');
							        $("#cp").hide();
							        $("#st").hide();
							    }
							  if (id == "cp") {
							        $("#va").hide();
							        $("#cp").show();
							        $("#st").hide();
							        $('#botonazo2').addClass('activos');
							    }
							  if (id == "st") {
							        $("#va").hide();
							        $("#cp").hide();
							        $("#st").show();
							        $('#botonazo3').addClass('activos');
							    }

							 
							}

							</script>

<div class="container-fluid topNovedades">	
</div>
<div class="container-fluid" style="background-color: background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(249,249,249,1) 36%, rgba(249,249,249,1) 100%);">
</div>
<div class="container nosotros">
	<div class="col-md-8 offset-md-2">
		<div class="tema">
			NOSOTROS
		</div>
		<div class="titulo">
			Comercializamos equipamiento oftalmol??gico de alta precisi??n y fiabilidad. Ofrecemos tecnolog??as innovadoras que transforman la vida de pacientes y m??dicos de todo el mundo.
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row sinpadding">
		<div class="col-12 col-md-6">
			 <section class="regular slider margenSliderMobile1 ">
                <div>
                	<img src="img/nosotros_slider.jpg" alt="" class="img-fluid">
                </div>
                <div>
                 	<img src="img/nosotros_slider.jpg" alt="" class="img-fluid">
                </div>
                <div>
                 	<img src="img/nosotros_slider.jpg" alt="" class="img-fluid">
                </div>
                <div>
                 	<img src="img/nosotros_slider.jpg" alt="" class="img-fluid">
                </div>
          </section>
		</div>
		<div class="col-12 col-md-6">
			<div class="nosotrosTextoDerecha">
				<hr style="background-color: #ff0000; width: 40px; height: 2px; margin-bottom: 25px;">
				<p><strong>OMNI SRL</strong> cuenta con una trayectoria de 40 a??os ininterrumpidos en el mercado, representando a marcas de equipamiento oftalmol??gico de referencia por su liderazgo en el desarrolo de las innovaciones.</p>
				<p>Somos distribuidores exclusivos de <strong>Oculus, Optovue, LumiThera, Diopsys</strong> entre otras.</p>
				<p>La formaci??n permanente, y el s??lido compromiso de asistencia a nuestros clientes se destacan entre los principales pilares de <strong>OMNI SRL</strong>.</p>
			</div>
		</div>
	</div>
</div>
<div class="container logosNosotros">
	  <div class="row">  
    <div class="mx-auto d-block">
      <img src="img/marcas_footer/oculus.jpg" width="100%" class="mx-auto d-block ">
    </div>
    <div class="mx-auto d-block">
      <img src="img/marcas_footer/optovue.jpg" width="100%" class="mx-auto d-block ">
    </div>
    <div class="mx-auto d-block">
      <img src="img/marcas_footer/lumithera.jpg" width="100%" class="mx-auto d-block ">
    </div>
    <div class="mx-auto d-block">
      <img src="img/marcas_footer/crystalvue.jpg" width="100%" class="mx-auto d-block ">
    </div>
    <div class="mx-auto d-block">
      <img src="img/marcas_footer/diopsys.jpg" width="100%" class="mx-auto d-block ">
    </div> 
    <div class="mx-auto d-block">
      <img src="img/marcas_footer/oculus_surgical.jpg" width="100%" class="mx-auto d-block ">
    </div>         
    <div class="mx-auto d-block">
      <img src="img/marcas_footer/olleyes.jpg" width="100%" class="mx-auto d-block ">
    </div>             
  </div>
</div>
<div class="container-fluid nosEnfocamos">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 offset-md-2">
				<h3>Nos enfocamos en ofrecer formaci??n cl??nica y soporte t??cnico especializado para cada producto que comercializamos.</h3>	
				<div class="desktop">
					<div class="row nosotrosBotones" >
						

						<div class="col-12 col-md-4"> 
							<button  type="button" class="btn boton mx-auto" value="va" onClick="mostrar(this.value); this.blur();"><img src="img/nosotros/va_over.png" class="d-block mx-auto" id="imagen1" onmouseOver="mostrarOtra1()" onmouseOut="mostrarOriginal1()"><br>
							<div id="botonazo1" class="activos d-block mx-auto"></div></button>
						</div>
						

						<div class="col-md-4">
							<button type="button"  class="btn boton mx-auto desktop" value="cp" onClick=" mostrar(this.value); this.blur();">
							<img src="img/nosotros/cp.png" class="d-block mx-auto" id="imagen2" onmouseOver="mostrarOtra2()" onmouseOut="mostrarOriginal2()" >
							<br>
							<div id="botonazo2" class=" d-block mx-auto"></div></button>
						</div>
						<div class="col-md-4">
							<button type="button" class="btn boton mx-auto desktop" value="st" onClick="mostrar(this.value); this.blur();"><img src="img/nosotros/st.png" class="d-block mx-auto" id="imagen3" onmouseOver="mostrarOtra3()" onmouseOut="mostrarOriginal3()"><br>
							<div id="botonazo3"  class=" d-block mx-auto"></div></button>
						</div>
					</div>	
						<div id="va" style="display: block;">
							<h4>Venta y Asesoramiento:</h4>
							<p>Entendemos que las tecnolog??as que comercializamos requieren un fuerte compromiso de nuestra parte para asistir a nuestros clientes. Ofrecemos un canal de atenci??n espec??fica, tanto en servicio t??cnico como para mantener actualizadas las funciones del equipamiento. </p>
						</div>
						<div id="cp" style="display: none;">
							<h4>Capacitaci??n Personalizada</h4>
							<p>Ofrecemos capacitaci??n personalizada y ponemos el foco en difundir los m??s recientes avances tecnol??gicos a trav??s de cursos de formaci??n, webinars y publicaciones en medios especializados del sector para que los profesionales oftalm??logos optimicen el manejo del equipamiento adquirido. </p>
						</div>
						<div id="st" style="display: none;">
							<h4>Servicio T??cnico</h4>
							<p>Contamos con un equipo de consultores especializados para brindar asesoramiento t??cnico sobre el equipamiento comercializado por nuestra empresa y dispuestos a interpretar las necesidades de cada profesional y guiarlo en el momento de decidir la adquisici??n de nueva tecnolog??a.  </p>
						</div>
					</div>
					<div class="mobile">
						<section class="lazy slider">
                <div class="col-12">
                  <img src="img/nosotros/va.png" class="d-block mx-auto my-5">
                	<div>  
                  	<h4>Venta y Asesoramiento:</h4>
										<p>Entendemos que las tecnolog??as que comercializamos requieren un fuerte compromiso de nuestra parte para asistir a nuestros clientes. Ofrecemos un canal de atenci??n espec??fica, tanto en servicio t??cnico como para mantener actualizadas las funciones del equipamiento.</p>
                	</div>
                </div>

                <div class="col-12">
                  <img src="img/nosotros/cp.png" class="d-block mx-auto my-5">
                	<div>  
                  	<h4>Capacitaci??n Personalizada</h4>
										<p>Ofrecemos capacitaci??n personalizada y ponemos el foco en difundir los m??s recientes avances tecnol??gicos a trav??s de cursos de formaci??n, webinars y publicaciones en medios especializados del sector para que los profesionales oftalm??logos optimicen el manejo del equipamiento adquirido. </p>
                	</div>
                </div>

                <div class="col-12">
                  <img src="img/nosotros/st.png" class="d-block mx-auto my-5">
                	<div>  
                  	<h4>Servicio T??cnico</h4>
										<p>Contamos con un equipo de consultores especializados para brindar asesoramiento t??cnico sobre el equipamiento comercializado por nuestra empresa y dispuestos a interpretar las necesidades de cada profesional y guiarlo en el momento de decidir la adquisici??n de nueva tecnolog??a.  </p>
                	</div>
                </div>
               
            </section>
					</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row sinpadding">
		
		<div class="col-12 col-md-6">
			<div class="nosotrosTextoDerecha">
				<hr style="background-color: #ff0000; width: 40px; height: 2px; margin-bottom: 15px;">
				<h3 style="color: #e30613; font-weight: 500; font-size: 28px; letter-spacing: 0px; margin-bottom:35px;">Nuestra Visi??n</h3>
				<p>Nuestra mayor fortaleza radica en el compromiso que asumimos cada d??a al servicio de nuestros clientes, y con las marcas representadas</p>
				<p>Priorizamos siempre el profesionalismo y la atenci??n personalizada. Nos formamos y conocemos a fondo cada uno de los productos.</p>
				
			</div>
		</div>

		<div class="col-12 col-md-6">
			 <section class="regular slider margenSliderMobile3 ">
                <div>
                	<img src="img/nosotros_slider.jpg" alt="" class="img-fluid">
                </div>
                
          </section>
		</div>

	</div>
</div>
<div class="container-fluid politicaDeCalidad">
	<div class="row sinpadding">
		<div class="col-12 col-md-7">
			<img src="img/politicadecalidad.jpg" alt="" width="100%">		
		</div>
		<div class="col-12 col-md-5 texto"> 
			<hr style="background-color: #ffffff; width: 30px; height: 2px;">
			<h4>Politica de Calidad</h4>
			<p>Nuestra pol??tica de calidad se manifiesta mediante el firme compromiso con nuestros CLIENTES de satisfacer plenamente sus requerimientos y expectativas, para ello garantizamos impulsar una cultura de calidad basada en los principios de honestidad, liderazgo y desarrollo del recurso humano, solidaridad, compromiso con mejora continua y seguridad en nuestras operaciones.</p>
			
		</div>
	</div>	
</div>

<?php 
  require ('footer.php') ;
?>