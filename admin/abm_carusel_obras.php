<?php 
  include_once("header.php"); 
  $action=(int)limpiarCadena($_REQUEST['action']);


function cargar($nombre, $ruta, $tipo){
  $archivo= "../img/".$ruta.$_FILES[$nombre]["name"];
  $archivo_bbd=$ruta.$_FILES[$nombre]["name"];
  $tipo_archivo = $_FILES[$nombre]['type']; 
  $tamano_archivo= $_FILES[$nombre]['size'];
  if (!($tamano_archivo < 10000000000)) {
      echo"La extensión o el tamaño de los archivos no es correcta";
  
  }else{
      
  if (move_uploaded_file($_FILES[$nombre]["tmp_name"],$archivo)){ 
      return($archivo_bbd);
  }else{
      return("Ocurrió algún error al subir el fichero. No pudo guardarse.");
  } 
  }
}  


$id="";
$titulo="";
$link="";
$imagen="";

if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_OBRAS_CARUSEL . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_carusel_obras.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $titulo=($r['titulo']);
      $link=($r['link']);
      $imagen=$r['imagen'];

    }
  }
}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Carusel Obras <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_carusel_obras.php"><i class="fa fa-bullhorn"></i> Home</a></li>
              <li class="active">Carusel Obras</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <?php
    
    //GUARDAR LOS DATOS

    if(isset($_POST['btn_agregar']) && $action == 2){
        //CARGO LOS ARCHIVOS
        $archivos=array();
        if($_FILES['imagen']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen']=cargar('imagen', $ruta, $tipo); 
        }

     
        $titulo=limpiarCadena($_POST['titulo']);
        $link =limpiarCadena($_POST['link']);

        if(isset($archivos['imagen'])) {
            $imagen=$archivos['imagen'];
        } else {
            $imagen="";
        }

        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_OBRAS_CARUSEL . " SET 
          titulo='$titulo',  
          link='$link',  
          imagen='$imagen',
          fecha = NOW()");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_carusel_obras.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } else {

   
          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_carusel_obras.php" class="alert-link">click aquí</a> para volver</div>';  
          die();
        }

      }        
      //FIN GUARDAR LOS DATOS



    //GUARDAR LOS DATOS MODIFICADOS

    if(isset($_POST['btn_agregar']) && $action == 3){

      //CARGO LOS ARCHIVOS
		  $archivos=array();
      if($_FILES['imagen']['name']!=""){
          $ruta=date('y-h-i');
          $tipo="";
          $archivos['imagen']=cargar('imagen', $ruta, $tipo); 
      }

     
		
		      
      $id=(int)limpiarCadena($id);
      $titulo=limpiarCadena($_POST['titulo']);
      $link=limpiarCadena($_POST['link']); 
 
      $query="UPDATE " . TABLA_OBRAS_CARUSEL . "  SET 
          titulo='$titulo',   
          link='$link', ";

      if(isset($archivos['imagen'])) {
          $imagen=$archivos['imagen'];
          $query.="imagen='$imagen',";
      }

       $query.="fecha=NOW()
                  WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="abm_carusel_obras.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      
      } else {

       

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_carusel_obras.php" class="alert-link">click aquí</a> para volver</div>';  
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_carusel_obras.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">

              <div class="form-group col-lg-6">
                <label for="titulo_esp">Titulo</label>
                <input class="form-control" value="<?php echo $titulo;?>" id="titulo" name="titulo" type="text" required>
              </div>

              <div class="form-group col-lg-6">
                <label for="titulo_esp">Link</label>
                <input class="form-control" value="<?php echo $link;?>" id="link" name="link" type="text" >
              </div>
      

			  
              <div class="form-group col-lg-6">
                 <label>Imagen Producto <span style="color: blue;">1920px por 722px, en formato .jpg o .png</span></label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/" . $imagen . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen\")'>Eliminar</a><br>
                          </div>"; 
                  } ?>
                <?php } ?>
              </div>
 
       

             
              <div class="clearfix"></div>
              
              <div class="form-group col-lg-12 text-center">
                <button name="btn_agregar" type="submit" class="btn btn-default">Agregar</button>
              </div>  
            </form>

          </div>
        </div><!-- /.row -->

    <!-- Fin Agrego -->
  </div><!-- /#page-wrapper -->

<?php include_once('footer.php'); ?>

<script>


function eliminarImagen(id, campo){
  $.ajax(
  {
      type: "POST",
      url: "ajax/eliminarImagenHerraje.php",
      data: "id="+id+"&c="+campo,
      dataType : 'json',
      success: function(respuesta){
          $("#"+campo+"_div").empty();
      }
  });
}
</script>