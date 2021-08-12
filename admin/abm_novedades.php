<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');

include_once('header.php'); 
  $action=(int)limpiarCadena($_REQUEST['action']);

function cargar($nombre, $ruta, $tipo){
    $archivo= "../img/novedades/".$ruta.$_FILES[$nombre]["name"];
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
$tema="";
$fecha="";
$orden="";
$habilitado="";
$imagen="";
$imagen1="";
$imagen2="";
$imagen3="";
$imagenGrande ="";
$texto="";
$destacada="";
$relacionados_prod=array();
$relacionados_solu=array();
if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_NOVEDADES . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_novedades.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $titulo=($r['titulo']);
      $tema=($r['tema']);
      $fecha=($r['fecha']);
      $orden=($r['orden']);
      $habilitado=($r['habilitado']);
      $destacada=($r['destacada']);
      $imagen=$r['imagen'];
      $imagen1=$r['imagen1'];
      $imagen2=$r['imagen2'];
      $imagen3=$r['imagen3'];
      $imagenGrande =$r['imagenGrande'];
      //$texto =$r['texto'];
      $texto= $r['texto'];

    
    }
  }
}

?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Novedades <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_Novedades.php"><i class="fa fa-bullhorn"></i> Novedades</a></li>
              <li class="active">Novedades</li>
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

        if($_FILES['imagen1']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen1']=cargar('imagen1', $ruta, $tipo); 
        }

        if($_FILES['imagen2']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen2']=cargar('imagen2', $ruta, $tipo); 
        }

        if($_FILES['imagen3']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen3']=cargar('imagen3', $ruta, $tipo); 
        }


        if($_FILES['imagenGrande']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagenGrande']=cargar('imagenGrande', $ruta, $tipo); 
        }
    
        $titulo=limpiarCadena($_POST['titulo']);
        //$texto= $_POST['texto'];
        $texto=(mysqli_real_escape_string($conexion, $_POST['texto']));
        $tema=limpiarCadena($_POST['tema']);
        $fecha=limpiarCadena($_POST['fecha']);
        $orden=limpiarCadena($_POST['orden']);

        if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }

        if (isset($_POST['destacada']) != "") {
          $destacada = 1;
        } else {
          $destacada = 0;
        }

        if(isset($archivos['imagen'])) {
            $imagen=$archivos['imagen'];
        } else {
            $imagen="";
        }

        if(isset($archivos['imagen1'])) {
            $imagen1=$archivos['imagen1'];
        } else {
            $imagen1="";
        }

        if(isset($archivos['imagen2'])) {
            $imagen2=$archivos['imagen2'];
        } else {
            $imagen2="";
        }

        if(isset($archivos['imagen3'])) {
            $imagen3=$archivos['imagen3'];
        } else {
            $imagen3="";
        }

        if(isset($archivos['imagenGrande'])) {
            $imagenGrande=$archivos['imagenGrande'];
        } else {
            $imagenGrande="";
        }
        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_NOVEDADES . " SET 
          titulo='$titulo',  
          orden='$orden',  
          tema='$tema',
          fecha='$fecha',
          imagen='$imagen', 
          imagen1='$imagen1', 
          imagen2='$imagen2', 
          imagen3='$imagen3', 
          habilitado = '$habilitado',
          destacada = '$destacada', 
          imagenGrande='$imagenGrande',
          texto = '$texto',
          fecha_alta = NOW()");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_novedades.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } 

       
          if($destacada == 1){
            $query="UPDATE ".TABLA_NOVEDADES." SET destacada = 0 WHERE id <> '".$id_novedad."'";
            $query_agregar = mysqli_query($conexion, $query);
          }

          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_novedades.php" class="alert-link">click aquí</a> para volver</div>';  
          die();
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

        if($_FILES['imagen1']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen1']=cargar('imagen1', $ruta, $tipo); 
        }

        if($_FILES['imagen2']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen2']=cargar('imagen2', $ruta, $tipo); 
        }

        if($_FILES['imagen3']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen3']=cargar('imagen3', $ruta, $tipo); 
        }

        if($_FILES['imagenGrande']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagenGrande']=cargar('imagenGrande', $ruta, $tipo); 
        }

        
        $id=(int)limpiarCadena($id);
        $titulo=limpiarCadena($_POST['titulo']);
        $texto=$_POST['texto'];
         
        $tema=limpiarCadena($_POST['tema']);
        $fecha=limpiarCadena($_POST['fecha']);
        $orden=limpiarCadena($_POST['orden']);
        

        if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }   

        if (isset($_POST['destacada']) != "") {
          $destacada = 1;
        } else {
          $destacada = 0;
        }   
        

        $query="UPDATE " . TABLA_NOVEDADES . "  SET 
            titulo='$titulo',  
            orden='$orden',  
            tema='$tema',
            texto = '$texto',
            habilitado = '$habilitado', 
            destacada = '$destacada', ";

        if(isset($archivos['imagen'])) {
            $imagen=$archivos['imagen'];
            $query.="imagen='$imagen',";
        }

        if(isset($archivos['imagen1'])) {
            $imagen1=$archivos['imagen1'];
            $query.="imagen1='$imagen1',";
        }

        if(isset($archivos['imagen2'])) {
            $imagen2=$archivos['imagen2'];
            $query.="imagen2='$imagen2',";
        }

        if(isset($archivos['imagen3'])) {
            $imagen3=$archivos['imagen3'];
            $query.="imagen3='$imagen3',";
        }

        if(isset($archivos['imagenGrande'])) {
            $imagenGrande=$archivos['imagenGrande'];
            $query.="imagenGrande='$imagenGrande',";
        }

        $query.="fecha='$fecha'
                  WHERE id=" . $id;
          
        $query_agregar = mysqli_query($conexion,$query);
         
        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="abm_obras.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } else {
          
         
          

          if($destacada == 1){
            $query="UPDATE ".TABLA_NOVEDADES." SET destacada = 0 WHERE id <> '".$id."'";
            $query_agregar = mysqli_query($conexion, $query);
          }

          echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_novedades.php" class="alert-link">click aquí</a> para volver</div>';  
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

            <form role="form" enctype="multipart/form-data" method="post" action="abm_novedades.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">
              <div class="row">
              <div class="form-group col-lg-6">
                <label for="fecha">Fecha</label>
                <input class="form-control" id="fecha" name="fecha" type="date" value="<?php echo $fecha;?>" required> 
              </div>
			  
			        <div class="form-group col-lg-6">
                <label for="fecha">Tema</label>
                <input class="form-control" id="tema" name="tema" type="text" value="<?php echo $tema;?>" required>
              </div>

              <div class="form-group col-lg-12">
                <label for="titulo_esp">Titulo</label>
                <input class="form-control" id="titulo" name="titulo" type="text" value="<?php echo $titulo;?>" required>
              </div>

			         <div class="form-group col-lg-12">
                <label for="editor1">Descripcion</label>
                <textarea class="form-control" id="texto" name="texto" rows="15" type="text" required> <?php echo $texto;?></textarea>
              </div>
			  
			        <div class="form-group col-lg-6">
                <label>Imagen Categoría Novedades <span style="color: blue;">400px por 300px, en formato .jpg o .png</span></label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/novedades/" . $imagen . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen\")'>Eliminar</a><br>
                          </div>"; 
                  } ?>
                <?php } ?>
              </div>

              <div class="form-group col-lg-6">
                 <label>Imagen Interior Novedades <span style="color: blue;">610px por 640px, en formato .jpg o .png</span></label>
                <input type="file" name="imagenGrande">
                <?php if($action == 3) { ?>
                  <input name="imagenGrande_prev" type="hidden" value="<?php echo $imagenGrande;?>" />
                  <?php if ($imagenGrande != "") {
                    echo "<br>
                          <div id='imagenGrande_div'>
                          <img src='../img/novedades/" . $imagenGrande . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagenGrande\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>
            </div>
              <div class="row" style="padding: 30px; margin: 30px 0; background-color: #F9F9F9;">

              <div class="form-group col-lg-4">
                <label>Imagen (1) Slider Novedades</label>
                <input type="file" name="imagen1">
                <?php if($action == 3) { ?>
                  <input name="imagen1_prev" type="hidden" value="<?php echo $imagen1;?>" />
                  <?php if ($imagen1 != "") {
                    echo "<br>
                          <div id='imagen1_div'>
                          <img src='../img/novedades/" . $imagen1 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen1\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>


              <div class="form-group col-lg-4">
                <label>Imagen (2) Slider Novedades</label>
                <input type="file" name="imagen2">
                <?php if($action == 3) { ?>
                  <input name="imagen2_prev" type="hidden" value="<?php echo $imagen2;?>" />
                  <?php if ($imagen2 != "") {
                    echo "<br>
                          <div id='imagen2_div'>
                          <img src='../img/novedades/" . $imagen2 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen2\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>
            
              <div class="form-group col-lg-4">
                
                
                <label>Imagen (3) Slider Novedades</label>
                <input type="file" name="imagen3">
                <?php if($action == 3) { ?>
                  <input name="imagen3_prev" type="hidden" value="<?php echo $imagen3;?>" />
                  <?php if ($imagen3 != "") {
                    echo "<br>
                          <div id='imagen3_div'>
                          <img src='../img/novedades/" . $imagen3 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen3\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>

            </div> <!-- fin row -->

              <div class="form-group col-lg-4">
                <label for="categoria">Orden</label>
                <input class="form-control" value="<?php echo $orden;?>" id="orden" name="orden" type="number" required>
              </div>

              <div class="form-group col-lg-4">
                <label for="habilitado">Novedad destacada</label>
                <input class="checkbox" id="destacada" name="destacada" <?php if($destacada == 1) echo " checked "; ?> type="checkbox" value="1">
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
      url: "ajax/eliminarImagenNovedad.php",
      data: "id="+id+"&c="+campo,
      dataType : 'json',
      success: function(respuesta){
          $("#"+campo+"_div").empty();
      }
  });
}

CKEDITOR.disableAutoInline = true;
CKEDITOR.config.skin = 'bootstrapck';

$( document ).ready( function() {
    var editor = CKEDITOR.replace( 'texto' );
    CKFinder.setupCKEditor( editor, 'js/ckfinder/' );
} );

function setValue() {
    $( '#texto' ).val( $( 'input#val' ).val() );
}
</script>