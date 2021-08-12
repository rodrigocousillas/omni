<?php 
  include_once("header.php"); 
  $action=(int)limpiarCadena($_REQUEST['action']);


function cargar($nombre, $ruta, $tipo){
  $archivo= "../img/productos/".$ruta.$_FILES[$nombre]["name"];
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
$titulo2="";
$modelo="";
$imagen="";
$habilitado="";
$proximamente="";
$orden="";


if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_MODELOS_GRANDES . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_destacados_grandes.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 

    $id=($r['id']);
    $titulo=($r['titulo']); 
    $titulo2=($r['titulo2']);
    $modelo=($r['modelo']);
    $imagen=($r['imagen']);
    $habilitado=($r['habilitado']);
    $proximamente=($r['proximamente']);
    $orden=($r['orden']);
    }
  }
}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Marcas<small> Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_destacados_grandes.php"><i class="fa fa-bullhorn"></i> Listar destacados Grandes</a></li>
              <li class="active">ABM Modelos Grandes - Home Productos</li>
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
        $titulo2=limpiarCadena($_POST['titulo2']);
        $modelo=limpiarCadena($_POST['modelo']);
        $orden=limpiarCadena($_POST['orden']);
        
        if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }

        if (isset($_POST['proximamente']) != "") {
          $proximamente = 1;
        } else {
          $proximamente = 0;
        }

        if(isset($archivos['imagen'])) {
            $imagen=$archivos['imagen'];
        } else {
            $imagen="";
        }

        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_MODELOS_GRANDES . " SET 
          titulo='$titulo',
          titulo2='$titulo2',
          modelo='$modelo',
          imagen='$imagen',
          orden='$orden',
          proximamente='$proximamente',
          habilitado = '$habilitado'");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_destacados_grandes.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        die();

        } else {

   
          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_destacados_grandes.php" class="alert-link">click aquí</a> para volver</div>';  
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
      $titulo2=limpiarCadena($_POST['titulo2']);
      $modelo=limpiarCadena($_POST['modelo']);
      $orden=limpiarCadena($_POST['orden']);

       if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }

        if (isset($_POST['proximamente']) != "") {
          $proximamente = 1;
        } else {
          $proximamente = 0;
        }

 
      $query="UPDATE " . TABLA_MODELOS_GRANDES . "  SET  
          titulo='$titulo',
          titulo2='$titulo2',
          modelo='$modelo',
          orden='$orden',
          
           ";

      if(isset($archivos['imagen'])) {
          $imagen=$archivos['imagen'];
          $query.="imagen='$imagen',";
      }


       $query.="
       proximamente = '$proximamente',
       habilitado = '$habilitado'
                  WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_destacados_grandes.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      die();
      } else {

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_destacados_grandes.php" class="alert-link">click aquí</a> para volver</div>';  
        die();
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_destacados_grandes.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">
             
              <div class="form-group col-lg-4">
                <label for="">Modelo (Trae el ID para linkear el modelo)</label>
                <select class="form-control" id="modelo" name="modelo" onchange="loadSubCategoria(this.value)" required>
                  <option value="0">Seleccionar</option>
                  <?php 
                  $query_cat="SELECT * FROM " . TABLA_MODELOS . " ORDER BY nombre_modelo ASC";
                  $respuesta_cat=mysqli_query($conexion, $query_cat); 
                  if (!$respuesta_cat) {
                      die("Error en la consulta"); 
                  } else {
                    while ($r_cat= mysqli_fetch_assoc($respuesta_cat)){
                      $sel="";
                      if($r_cat['id'] == $modelo) $sel = " selected ";
                      
                      echo "<option value='" . $r_cat['id'] . "' ".$sel.">" . $r_cat['nombre_modelo'] . " - " . $r_cat['id'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-lg-4">
                <label for="">Titulo - Renglón 1</label>
                <input class="form-control" value="<?php echo $titulo;?>" id="titulo" name="titulo" type="text" >
              </div>

              <div class="form-group col-lg-4">
                <label for="">Titulo - Renglón 2</label>
                <input class="form-control" value="<?php echo $titulo2;?>" id="titulo2" name="titulo2" type="text" >
              </div>
              
              <div class="form-group col-lg-4">
                <label for="orden">Orden</label>
                <input class="form-control" value="<?php echo $orden;?>" id="orden" name="orden" type="text" >
              </div>

              <div class="form-group col-lg-4">
                <label for="habilitado">Publicar</label>
                <input class="checkbox" id="habilitado" name="habilitado" <?php if($habilitado == 1) echo " checked "; ?> type="checkbox" value="1">
              </div>

              <div class="form-group col-lg-4">
                <label for="destacado">Proximamente</label>
                <input class="checkbox" id="proximamente" name="proximamente" <?php if($proximamente == 1) echo " checked "; ?> type="checkbox" value="1">
              </div>
              <br clear="all">
                <div class="form-group col-lg-6">
                 <label>Imagen Front <span style="color: blue;">1440px x 725px en formato .jpg o .png</span></label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/productos/" . $imagen . "' width='300px'>
                          
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

<?php include_once('footer.php'); ?>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckfinder/ckfinder.js"></script>
<script src="js/ckeditor/adapters/jquery.js"></script>  
