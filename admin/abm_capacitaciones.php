<?php 
  include_once("header.php"); 
  $action=(int)limpiarCadena($_REQUEST['action']);


function cargar($nombre, $ruta, $tipo){
  $archivo= "../img/capacitaciones/".$ruta.$_FILES[$nombre]["name"];
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
$marca="";
$modelo="";
$youtubevideo="";
$orden="";
$habilitado="";
$imagen="";
$texto="";
$relacionados_mar=array();
$relacionados_mod=array();
$relacionados=array();
if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_CAPACITACIONES . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_capacitaciones.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $titulo=($r['titulo']);
      $modelo=($r['modelo']);
      $marca=($r['marca']);
      $youtubevideo=($r['youtubevideo']);
      $orden=($r['orden']);
      $habilitado=($r['habilitado']);
      $imagen=$r['imagen'];
      $texto =$r['texto'];

      $result_rel = mysqli_query($conexion,"SELECT * FROM " . TABLA_CAPACITACIONESMARCA . " WHERE id_capacitacion =" . $id);
      if($result_rel){
        while($r_rel=mysqli_fetch_assoc($result_rel)){ 
          $relacionados_mar[]=$r_rel["id_marca"];
        }
      }

      $result_rel = mysqli_query($conexion,"SELECT * FROM " . TABLA_CAPACITACIONESRELACIONADOS . " WHERE id_capacitacion =" . $id);
      if($result_rel){
        while($r_rel=mysqli_fetch_assoc($result_rel)){ 
          $relacionados[]=$r_rel["id_relacionado"];
        }
      }

       $result_rel = mysqli_query($conexion,"SELECT * FROM " . TABLA_CAPACITACIONESMODELOS . " WHERE id_capacitacion =" . $id);
      if($result_rel){
        while($r_rel=mysqli_fetch_assoc($result_rel)){ 
          $relacionados_mod[]=$r_rel["id_modelo"];
        }
      }
      
     
    }
  }
}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Capacitaciones <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_capacitaciones.php"><i class="fa fa-bullhorn"></i> Capacitaciones</a></li>
              <li class="active">Capacitaciones</li>
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
        $modelo=limpiarCadena($_POST['modelo']);
        $marca=limpiarCadena($_POST['marca']);
        $orden=limpiarCadena($_POST['orden']);
        $youtubevideo =limpiarCadena($_POST['youtubevideo']);
        $texto =limpiarCadena($_POST['texto']);

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

        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_CAPACITACIONES . " SET 
          titulo='$titulo',  
          orden='$orden',  
          modelo='$modelo',
          marca='$marca',
          imagen='$imagen', 
          habilitado = '$habilitado',
          youtubevideo = '$youtubevideo',
          texto = '$texto',
          fecha_alta = NOW()");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_capacitaciones.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } else {
          $id_capacitacion=mysqli_insert_id($conexion);

          if(isset($_POST["relacionados_mar"])){
            for($i=0;count($_POST["relacionados_mar"])>$i;$i++){
              $query="INSERT INTO ".TABLA_CAPACITACIONESMARCA." (id_capacitacion, id_marca) value ('".$id_capacitacion."', '".$_POST["relacionados_mar"][$i]."')";
              $query_agregar = mysqli_query($conexion, $query);
            }
          }

           if(isset($_POST["relacionados_mod"])){
            for($i=0;count($_POST["relacionados_mod"])>$i;$i++){
              $query="INSERT INTO ".TABLA_CAPACITACIONESMODELOS." (id_capacitacion, id_modelo) value ('".$id_capacitacion."', '".$_POST["relacionados_mod"][$i]."')";
              $query_agregar = mysqli_query($conexion, $query);
            }
          }

          if(isset($_POST["relacionados"])){
            for($i=0;count($_POST["relacionados"])>$i;$i++){
              $query="INSERT INTO ".TABLA_CAPACITACIONESRELACIONADOS." (id_capacitacion, id_relacionado) value ('".$id_capacitacion."', '".$_POST["relacionados"][$i]."')";
              $query_agregar = mysqli_query($conexion, $query);
            }
          }

          

          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_capacitaciones.php" class="alert-link">click aquí</a> para volver</div>';  
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
      $marca=limpiarCadena($_POST['marca']);
      $modelo=limpiarCadena($_POST['modelo']);
      $youtubevideo=limpiarCadena($_POST['youtubevideo']);
      $orden=limpiarCadena($_POST['orden']);
      $texto =limpiarCadena($_POST['texto']);

      if (isset($_POST['habilitado']) != "") {
        $habilitado = 1;
      } else {
        $habilitado = 0;
      }    
      

      $query="UPDATE " . TABLA_CAPACITACIONES . "  SET 
          
          titulo='$titulo',  
          orden='$orden',  
          modelo='$modelo',
          marca='$marca',
          habilitado = '$habilitado',
          youtubevideo = '$youtubevideo',
         

          ";

      if(isset($archivos['imagen'])) {
          $imagen=$archivos['imagen'];
          $query.="imagen='$imagen',";
      }

   

      $query.="texto = '$texto'
                WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="abm_capacitaciones.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      
      } else {
        
        $query="DELETE FROM ".TABLA_CAPACITACIONESMARCA." WHERE id_capacitacion = '".$id."'";
        $query_borrar = mysqli_query($conexion, $query);
        
        if(isset($_POST["relacionados_mar"])){
          for($i=0;count($_POST["relacionados_mar"])>$i;$i++){
            $query="INSERT INTO ".TABLA_CAPACITACIONESMARCA." (id_capacitacion, id_marca) value ('".$id."', '".$_POST["relacionados_mar"][$i]."')";
            $query_agregar = mysqli_query($conexion, $query);
          }
        }

         $query="DELETE FROM ".TABLA_CAPACITACIONESRELACIONADOS." WHERE id_capacitacion = '".$id."'";
        $query_borrar = mysqli_query($conexion, $query);

        if(isset($_POST["relacionados"])){
          for($i=0;count($_POST["relacionados"])>$i;$i++){
              $query="INSERT INTO ".TABLA_CAPACITACIONESRELACIONADOS." (id_capacitacion, id_relacionado) value ('".$id."', '".$_POST["relacionados"][$i]."')";
              $query_agregar = mysqli_query($conexion, $query);
          }
        }
        
         $query="DELETE FROM ".TABLA_CAPACITACIONESMODELOS." WHERE id_capacitacion = '".$id."'";
        $query_borrar = mysqli_query($conexion, $query);
        
        if(isset($_POST["relacionados_mod"])){
          for($i=0;count($_POST["relacionados_mod"])>$i;$i++){
            $query="INSERT INTO ".TABLA_CAPACITACIONESMODELOS." (id_capacitacion, id_modelo) value ('".$id."', '".$_POST["relacionados_mod"][$i]."')";
            $query_agregar = mysqli_query($conexion, $query);
          }
        }

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_capacitaciones.php" class="alert-link">click aquí</a> para volver</div>';  
         die();
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_capacitaciones.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">

              <div class="form-group col-lg-6">
                <label for="titulo_esp">Titulo</label>
                <input class="form-control" value="<?php echo $titulo;?>" id="titulo" name="titulo" type="text" required>
              </div>

              <div class="form-group col-lg-6">
                <label for="marca">Marca</label>
                <input type="text" value="<?php echo $marca;?>" class="form-control" id="marca" name="marca" >
              </div>

              <div class="form-group col-lg-6">
                <label for="modelo">Modelo</label>
                <input type="text" value="<?php echo $modelo;?>" class="form-control" id="modelo" name="modelo">
              </div>

              <div class="form-group col-lg-6">
                <label for="youtubevideo">YouTube</label>
                <input type="text" value="<?php echo $youtubevideo;?>" class="form-control" id="youtubevideo" name="youtubevideo">
              </div>

              <div class="form-group col-lg-12">
                <label for="titulo_esp">Texto</label>
                <textarea class="form-control" id="texto" rows="8" name="texto" ><?php echo $texto;?></textarea>
              </div>

         
              <div class="form-group col-lg-12">
                <label for="categoria">Marca relacionada</label>
                  <div class="row">
                  <?php
                    $query_mar="SELECT * FROM " . TABLA_MARCAS . " ";
                    $query_mar.=" ORDER BY nombre ASC";
                    $respuesta_mar=mysqli_query($conexion, $query_mar); 
                    if (!$respuesta_mar) {
                    } else {
                      while ($r_mar= mysqli_fetch_assoc($respuesta_mar)){
                        $sel="";
                        if(in_array($r_mar['id'], $relacionados_mar)) $sel = " checked ";
                      ?>
                      <div class="col-lg-3">
                        <input type='checkbox' name='relacionados_mar[]' value='<?php echo $r_mar['id'];?>' <?php echo $sel;?>> &nbsp;&nbsp;<?php echo $r_mar['nombre'];?>
                      </div>
                      <?php
                      }
                    }
                    ?>
                  </div>
              </div>

              <div class="form-group col-lg-12">
                <label for="categoria">Modelos relacionados</label>
                  <div class="row">
                  <?php
                    $query_mod="SELECT * FROM " . TABLA_MODELOS . " ";
                    $query_mod.=" ORDER BY nombre ASC";
                    $respuesta_mod=mysqli_query($conexion, $query_mod); 
                    if (!$respuesta_mod) {
                    } else {
                      while ($r_mod= mysqli_fetch_assoc($respuesta_mod)){
                        $sel="";
                        if(in_array($r_mod['id'], $relacionados_mod)) $sel = " checked ";
                      ?>
                      <div class="col-lg-3">
                        <input type='checkbox' name='relacionados_mod[]' value='<?php echo $r_mod['id'];?>' <?php echo $sel;?>> &nbsp;&nbsp;<?php echo $r_mod['nombre'];?>
                      </div>
                      <?php
                      }
                    }
                    ?>
                  </div>
              </div>


<div class="form-group col-lg-12">
                <label for="categoria">Capacitaciones relacionadas</label>
                <select multiple="" class="form-control" size="5" name="relacionados[]" id="relacionados">
                  <?php
                    $query_prod="SELECT * FROM " . TABLA_CAPACITACIONES . " ";
                    if($action == 3) {
                      $query_prod.=" WHERE id <> '".$id."' ";
                    }
                    $query_prod.=" ORDER BY titulo ASC";
                    $respuesta_prod=mysqli_query($conexion, $query_prod); 
                    if (!$respuesta_prod) {
                    } else {
                      while ($r_prod= mysqli_fetch_assoc($respuesta_prod)){
                        $sel="";
                        if(in_array($r_prod['id'], $relacionados)) $sel = " selected ";
                        
                        echo"<option value='" . $r_prod['id'] . "' ".$sel.">" . $r_prod['titulo'] . "</option>";
                      }
                    }
                    ?>
                </select>
              </div>
             
                <div class="form-group col-lg-4">
                <label>Imagen</label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/capacitaciones/" . $imagen . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen\")'>Eliminar</a><br>
                          </div>"; 
                  } ?>
                <?php } ?>
              </div>
             
              <div class="form-group col-lg-4">
                <label for="categoria">Orden</label>
                <input class="form-control" value="<?php echo $orden;?>" id="orden" name="orden" type="number" required>
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
      url: "ajax/eliminarImagenCapacitacion.php",
      data: "id="+id+"&c="+campo,
      dataType : 'json',
      success: function(respuesta){
          $("#"+campo+"_div").empty();
      }
  });
}
</script>