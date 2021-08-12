<?php 
  include_once("header.php"); 
  $action=(int)limpiarCadena($_REQUEST['action']);


function cargar($nombre, $ruta, $tipo){
  $archivo= "../img/productos_home/".$ruta.$_FILES[$nombre]["name"];
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
$nombre="";
$imagen="";
$orden="";
$habilitado="";

if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_MARCAS . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_marcas.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $nombre=($r['nombre']);
      $imagen=$r['imagen'];
      $orden=($r['orden']);
      $habilitado=($r['habilitado']);
    }
  }
}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Marcas<small> Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_marcas.php"><i class="fa fa-bullhorn"></i> Listar Marcas</a></li>
              <li class="active">ABM Marcas</li>
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

        $nombre=limpiarCadena($_POST['nombre']);
        $orden =limpiarCadena($_POST['orden']);

        if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }

        if(isset($archivos['imagen'])) {
            $imagen=$archivos['imagen'];
        } else {
            $imagen="";
        }

        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_MARCAS . " SET 
          nombre='$nombre',
          imagen='$imagen',
          orden='$orden',  
          habilitado = '$habilitado'");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_marcas.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        die();
        } else {

   
          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_marcas.php" class="alert-link">click aquí</a> para volver</div>';  
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
      $nombre=limpiarCadena($_POST['nombre']);
      $orden=limpiarCadena($_POST['orden']); 

       if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }   

 
      $query="UPDATE " . TABLA_MARCAS . "  SET 
          nombre='$nombre', 
           habilitado = '$habilitado',  
           ";

      if(isset($archivos['imagen'])) {
          $imagen=$archivos['imagen'];
          $query.="imagen='$imagen',";
      }

      
       $query.="orden='$orden'
                  WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_marcas.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      die();
      } else {

       

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_marcas.php" class="alert-link">click aquí</a> para volver</div>';  
        die();
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_marcas.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">

              <div class="form-group col-lg-6">
                <label for="titulo_esp">Marca</label>
                <input class="form-control" value="<?php echo $nombre;?>" id="nombre" name="nombre" type="text" required>
              </div>

        

              <div class="form-group col-lg-6">
                <label for="titulo_esp">Orden</label>
                <input class="form-control" value="<?php echo $orden;?>" id="orden" name="orden" type="text" >
              </div>
      

			  
              <div class="form-group col-lg-6">
                 <label>Imagen  <span style="color: blue;">1440px por 862px, en formato .jpg o .png</span></label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/productos_home/" . $imagen . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen\")'>Eliminar</a><br>
                          </div>"; 
                  } ?>
                <?php } ?>
              </div>
 

        
               <div class="form-group col-lg-4">
                <label for="habilitado">Publicar</label>
                <input class="checkbox" id="habilitado" name="habilitado" <?php if($habilitado == 1) echo " checked "; ?> type="checkbox" value="1">
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
      url: "ajax/eliminarImagenMarca.php",
      data: "id="+id+"&c="+campo,
      dataType : 'json',
      success: function(respuesta){
          $("#"+campo+"_div").empty();
      }
  });
}
</script>