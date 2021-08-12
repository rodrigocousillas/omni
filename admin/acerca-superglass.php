<?php 
  $cat = 2;
  require ('header.php');
  require_once("config/conexion.php");
?>

<div class="container-fluid fondoAcerca">
  <div class="container">
   <div class="col-md-10 offset-md-1 headerAcerca">
      <div class="row">
        <div class="col-md-4">
          <h2>Mucho más<br /> de lo que se ve.</h2>    
        </div>  
        <div class="col-md-8">
          <p>Superglass es el principal procesador de cristal plano para usos arquitectónicos e industriales, que brinda la mejor calidad y servicio.</p>
        </div>
      </div>
   </div>
  </div>    
</div>
<div class="container-fluid">
  <div class="row sinpadding">
    <div class="col-md-5">
      <img src="img/acerca/vidrios.jpg" alt="" class="img-fluid">
    </div>
    <div class="col-md-7 acercaTextos">
      <h6>Calidad</h6>
      <h2>Somos reconocidos<br />como los de mejor calidad <br />en el mercado</h2>
        <ul>
        <li><span>Nuestros Templados están fabricados con la mejor tecnología por lo que somos lideres en el mercado</span></li>
        <li><span>Nuestros DVH y Laminados se entregan con Garantía de 5 años y no tenemos reclamos del mercado</span></li>
        <li><span>Nuestros procesos están controlados por estrictas Normas y Especificaciones</span></li>
        </ul>
    </div>
  </div>
  <div class="row sinpadding" style="background-color: #eeeeee; padding-top: 130px; padding-bottom: 130px;">
    <div class="col-md-7 acercaTextos">
      <h6>Confiabilidad</h6>
      <h2>Nos comprometemos<br />con fechas y cantidades<br />y cumplimos</h2>
        <ul>
        <li><span>Nuestros Clientes nos eligen diariamente porque confían en nosotros.</span></li>
        <li><span>30 años en el mercado nos avalan</span></li>
        <li><span>Nuestros plazos son los mejores, tenemos un servicio de reemplazo de templados en 24 horas.</span></li>
        <li><span>Atención y asesoramiento técnico personalizados</span></li>
        <li><span>Somos razonables y nuestros Precios apuntan a que cada venta contenga un agregado de Valor diferencial</span></li>
        </ul>
    </div>
      <div class="col-md-5">
      <img src="img/acerca/hombres-vidrios.jpg" alt="" class="img-fluid">
    </div>
  </div>
   <div class="row sinpadding" style="background-color: #eeeeee; padding-bottom: 130px;">
    <div class="col-md-5">
      <img src="img/acerca/innovacion.jpg" alt="" class="img-fluid">
    </div>
    
    <div class="col-md-7 acercaTextos" >

      <h6>INNOVACIÓN</h6>
      <h2>Marcamos el ritmo de la<br />industria y somos pioneros en<br />nuevos productos</h2>
        <ul>
        <li><span>Somos capaces de elaborar las mayores medidas del mercado (templados superjumbo hasta  2440 x 3900 mm por 20 mm de espesor</span></li>
        <li><span>Sentry Glas, fuimos los primeros en desarrollar esta tecnología superadora en resistencia y prestaciones</span></li>
        <li><span>Nuestros procesos están controlados por estrictas Normas y Especificaciones</span></li>
        </ul>
    </div>
  </div>
  <div class="row sinpadding" style="margin-bottom: 130px;">
    
    
    <div class="col-md-7 acercaTextos">

      <h6 style="margin-top: 60px;">Equipo</h6>
      <h2>Nuestra gente<br />Nuestro Activo</h2>
        <ul>
        <li><span>Un mix de Gente experimentada y Gente Joven nos hacen primeros en Calidad Cumplimiento e Innovacion</span></li>
        <li><span>Capacitacion, Auditorias y buen Clima de trabajo son nuestro secreto
</span></li>
        <li><span>
COVID 19: extremamos nuestros protocolos para cuidar a nuestro personal pero manteniendo nuestro nivel de cumplimiento</span></li>
        </ul>
    </div>
    <div class="col-md-5">
      <img src="img/acerca/equipo.jpg" alt="" class="img-fluid">
    </div>
  </div>
</div>
<div class="coontainer-fluid queDicen">
  <div class="testimonio" style="height: 500px; ">

  <h4>QUE DICEN NUESTROS CLIENTES</h4>
  <div class="col-md-6 offset-md-3 ">
    <section class="lazy slider">

       <?php
          $query="SELECT * FROM ".TABLA_TESTIMONIOS." WHERE habilitado = 1 ORDER BY orden ";
          $respuesta=mysqli_query($conexion, $query); 
          $id=0;
          while($r=mysqli_fetch_assoc($respuesta)){ 
            $frase=($r['frase']);
            $cliente=($r['cliente']);
           
            
          ?>

        <div class="testimonios">
          <p>"<?php echo $frase;?>"</p>
          <h5><?php echo $cliente;?></h5>      
        </div> 
             <?php 
      } 
      ?>  
      </section>
    </div>
</div>
</div>
<div class="container-fluid fondoObras">
  <div class="container">
    <p>¿Consultas sobre productos o soluciones?<br />
    <strong>Contactese con un asesor</strong></p>
    <div style="margin-top: 50px;">
    <p><i class="fas fa-phone"></i> (5411)4871.5483 &nbsp;&nbsp;&nbsp; 
      <a href="https://api.whatsapp.com/send?phone=541136107448&text=Te escribo desde el website" target="_blank"><i class="fab fa-whatsapp"></i> (54911) 3610.7448 </p> </a>
      <p><i class="far fa-envelope"></i> <a href="mailto:turnos@bessonepiel.com.ar">ventas@superglass.com.ar</a></p>
      </div>
  </div>  
</div>
<?php 
  require ('footer.php') 
?>