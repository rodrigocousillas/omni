<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');

include_once('header.php'); 
  $action=(int)limpiarCadena($_REQUEST['action']);

function cargar($nombre, $ruta, $tipo){
    $archivo= "../img/testimonios/".$ruta.$_FILES[$nombre]["name"];
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
$frase="";
$cliente="";
$orden="";
$habilitado="";
$relacionados_tes=array();
if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_TESTIMONIOS . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_testimonios.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $frase=($r['frase']);
      $nombre=($r['nombre']);
      $imagen=($r['imagen']);
      $titulo=($r['titulo']);
      $empresa=($r['empresa']);
      $orden=($r['orden']);
      $habilitado=($r['habilitado']);
      
  
  $result_rel = mysqli_query($conexion,"SELECT * FROM " . TABLA_TESTIMONIOS_MODELO . " WHERE id_testimonio =" . $id);
      if($result_rel){
        while($r_rel=mysqli_fetch_assoc($result_rel)){ 
          $relacionados_tes[]=$r_rel["id_modelo"];
        }
      }




}

  }
  }


?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Testimonios <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_testimonios.php"><i class="fa fa-bullhorn"></i> Home</a></li>
              <li class="active">Testimonios</li>
            </ol>
          </div>
        </div><!-- /.row -->

    <?php
    
    if(isset($_POST['btn_agregar']) && $action == 2){
        //CARGO LOS ARCHIVOS
         
        $archivos=array();
        if($_FILES['imagen']['name']!=""){
          $ruta=date('y-h-i');
          $tipo="";
          $archivos['imagen']=cargar('imagen', $ruta, $tipo); 
        }

        $frase=limpiarCadena($_POST['frase']);
        $nombre=limpiarCadena($_POST['nombre']);
        $titulo=limpiarCadena($_POST['titulo']);
        $empresa=limpiarCadena($_POST['empresa']);
        $orden=limpiarCadena($_POST['orden']);
        

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

       $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_TESTIMONIOS . " SET 
          frase='$frase',
          nombre='$nombre',
          imagen='$imagen',
          empresa='$empresa',
          titulo='$titulo',
          orden='$orden',  
          habilitado = '$habilitado'");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_testimonios.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } else {
        
            $id_testimonio=mysqli_insert_id($conexion);

          if(isset($_POST["relacionados_tes"])){
            for($i=0;count($_POST["relacionados_tes"])>$i;$i++){
              $query="INSERT INTO ".TABLA_TESTIMONIOS_MODELO." (id_testimonio, id_modelo) value ('".$id_testimonio."', '".$_POST["relacionados_tes"][$i]."')";
              $query_agregar = mysqli_query($conexion, $query);
            }
          }

          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_testimonios.php" class="alert-link">click aquí</a> para volver</div>';  
          die();
        }

      }        
      //FIN GUARDAR LOS DATOS

      //GUARDAR LOS DATOS MODIFICADOS
      if(isset($_POST['btn_agregar']) && $action == 3){

         $archivos=array();
        if($_FILES['imagen']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen']=cargar('imagen', $ruta, $tipo); 
        }
               
        $id=(int)limpiarCadena($id);
        $frase=limpiarCadena($_POST['frase']);
        $nombre=limpiarCadena($_POST['nombre']);
        $titulo=limpiarCadena($_POST['titulo']);
        $empresa=limpiarCadena($_POST['empresa']);
        $orden=limpiarCadena($_POST['orden']);
        
        if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }   

       
        $query="UPDATE " . TABLA_TESTIMONIOS . "  SET 
            frase='$frase',
            nombre='$nombre',  
            orden='$orden',  
            habilitado = '$habilitado', ";

            if(isset($archivos['imagen'])) {
            $imagen=$archivos['imagen'];
            $query.="imagen='$imagen',";
        }
              $query.="empresa='$empresa',
              titulo='$titulo'
                  WHERE id=" . $id;
          
        $query_agregar = mysqli_query($conexion,$query);
         
        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_testomonios.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } else {
          
            $query="DELETE FROM ".TABLA_TESTIMONIOS_MODELO." WHERE id_testimonio = '".$id."'";
        $query_borrar = mysqli_query($conexion, $query);
        
        if(isset($_POST["relacionados_tes"])){
          for($i=0;count($_POST["relacionados_tes"])>$i;$i++){
            $query="INSERT INTO ".TABLA_TESTIMONIOS_MODELO." (id_testimonio, id_modelo) value ('".$id."', '".$_POST["relacionados_tes"][$i]."')";
            $query_agregar = mysqli_query($conexion, $query);
          }
        }
      
          echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_testimonios.php" class="alert-link">click aquí</a> para volver</div>';  
          die();
        }

      }
      //FIN GUARDAR LOS DATOS MODIFICADOS
        
    ?>

        <div class="row">
          <div class="col-lg-12">
            <?php if($action == 3) { ?>
              <h2>Editar</h2>
            <?php } else { ?>
              <h2>Agregar</h2>
            <?php } ?>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_testimonios.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">

            			  
			        <div class="form-group col-lg-12">
                <label for="Frase">Testimonio</label>
                <p class="help-block">Agregar contenido con comillas. </p>
                <textarea class="form-control" id="frase" name="frase" rows="3" ><?php echo $frase;?></textarea>
                
              </div>

              <div class="form-group col-lg-4">
                <label for="titulo_esp">Titulo</label>
                <input class="form-control" id="titulo" name="titulo" type="text" value="<?php echo $titulo;?>" required>
              </div>

              <div class="form-group col-lg-4">
                <label for="titulo_esp">Nombre del profesional</label>
                <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $nombre;?>" required>
              </div>

              <div class="form-group col-lg-4">
                <label for="titulo_esp">Empresa</label>
                <input class="form-control" id="empresa" name="empresa" type="text" value="<?php echo $empresa;?>" required>
              </div>

              <div class="form-group col-lg-12">
                <label for="categoria">Aplicar testimonio al o a los modelos:</label>
                  <div class="row">
                  <?php
                    $query_tes="SELECT * FROM " . TABLA_MODELOS . " ";
                    $query_tes.=" ORDER BY nombre_modelo ASC";
                    $respuesta_tes=mysqli_query($conexion, $query_tes); 
                    if (!$respuesta_tes) {
                    } else {
                      while ($r_tes= mysqli_fetch_assoc($respuesta_tes)){
                        $sel="";
                        if(in_array($r_tes['id'], $relacionados_tes)) $sel = " checked ";
                      ?>
                      <div class="col-lg-3">
                        <input type='checkbox' name='relacionados_tes[]' value='<?php echo $r_tes['id'];?>' <?php echo $sel;?>> &nbsp;&nbsp;<?php echo $r_tes['nombre_modelo'];?>
                      </div>
                      <?php
                      }
                    }
                    ?>
                  </div>
              </div>

              <div class="form-group col-lg-4">
                <label>Imagen Categoría Novedades <span style="color: blue;">150px por 150px, en formato .jpg o .png</span></label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/testimonios/" . $imagen . "' width='150px'>
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
      </div><!-- /#page-wrapper -->

<?php include_once('footer.php'); ?>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckfinder/ckfinder.js"></script>
<script src="js/ckeditor/adapters/jquery.js"></script>  
<script>
function eliminarImagen(id, campo){
  $.ajax(
  {
      type: "POST",
      url: "ajax/eliminarImagenTestimonio.php",
      data: "id="+id+"&c="+campo,
      dataType : 'json',
      success: function(respuesta){
          $("#"+campo+"_div").empty();
      }
  });
}


</script>