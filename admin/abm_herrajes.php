<?php 
  include_once("header.php"); 
  $action=(int)limpiarCadena($_REQUEST['action']);


function cargar($nombre, $ruta, $tipo){
  $archivo= "../img/herrajes/".$ruta.$_FILES[$nombre]["name"];
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
$id_categoria="";
$id_subcategoria="";
$id_descripcion="";
$ubicacion="";
$material="";
$color="";
$orden="";
$habilitado="";
$imagen="";
$imagen_corte ="";
$imagen_ubicacion="";
$imagen_tecnico ="";
$complemento="";
$codigo="";
$relacionados=array();
if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_HERRAJES . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_herrajes.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $titulo=($r['titulo']);
      $id_categoria=($r['id_categoria']);
      $id_subcategoria=($r['id_subcategoria']);
      $descripcion=($r['descripcion']);
      $ubicacion=($r['ubicacion']);
      $material=($r['material']);
      $color=($r['color']);
      $orden=($r['orden']);
      $habilitado=($r['habilitado']);
      $imagen=$r['imagen'];
      $imagen_corte =$r['imagen_corte'];
      $imagen_ubicacion=$r['imagen_ubicacion'];
      $imagen_tecnico =$r['imagen_tecnico'];
      $complemento =$r['complemento'];
      $codigo =$r['codigo'];

      $result_rel = mysqli_query($conexion,"SELECT * FROM " . TABLA_HERRAJESRELACIONADOS . " WHERE id_herraje =" . $id);
      if($result_rel){
        while($r_rel=mysqli_fetch_assoc($result_rel)){ 
          $relacionados[]=$r_rel["id_relacionado"];
        }
      }
    }
  }
}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Herrajes <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_herrajes.php"><i class="fa fa-bullhorn"></i> Herrajes</a></li>
              <li class="active">Herrajes</li>
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

        if($_FILES['imagen_corte']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen_corte']=cargar('imagen_corte', $ruta, $tipo); 
        }

        if($_FILES['imagen_ubicacion']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen_ubicacion']=cargar('imagen_ubicacion', $ruta, $tipo); 
        }

        if($_FILES['imagen_tecnico']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen_tecnico']=cargar('imagen_tecnico', $ruta, $tipo); 
        }
    
        $titulo=limpiarCadena($_POST['titulo']);
        $id_categoria=limpiarCadena($_POST['id_categoria']);
		    //$texto=(mysqli_real_escape_string($conexion, $_POST['editor1']));
        $id_subcategoria=limpiarCadena($_POST['id_subcategoria']);
        if($id_subcategoria == "") $id_subcategoria = null;
        $descripcion=limpiarCadena($_POST['descripcion']);
        $ubicacion=limpiarCadena($_POST['ubicacion']);
        $material=limpiarCadena($_POST['material']);
        $color=limpiarCadena($_POST['color']);
        $orden=limpiarCadena($_POST['orden']);
        $complemento =limpiarCadena($_POST['complemento']);
        $codigo =limpiarCadena($_POST['codigo']);

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

        if(isset($archivos['imagen_corte'])) {
            $imagen_corte=$archivos['imagen_corte'];
        } else {
            $imagen_corte="";
        }

        if(isset($archivos['imagen_ubicacion'])) {
            $imagen_ubicacion=$archivos['imagen_ubicacion'];
        } else {
            $imagen_ubicacion="";
        }

        if(isset($archivos['imagen_tecnico'])) {
            $imagen_tecnico=$archivos['imagen_tecnico'];
        } else {
            $imagen_tecnico="";
        }

        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_HERRAJES . " SET 
          titulo='$titulo',  
          id_categoria='$id_categoria', 
          id_subcategoria='$id_subcategoria', 
          descripcion='$descripcion', 
          orden='$orden',  
          ubicacion='$ubicacion', 
          material='$material',
          color='$color',
          imagen='$imagen', 
          habilitado = '$habilitado',
          imagen_corte='$imagen_corte',
          imagen_ubicacion='$imagen_ubicacion',
          imagen_tecnico='$imagen_tecnico',
          complemento = '$complemento',
          codigo = '$codigo',
          fecha_alta = NOW()");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_herrajes.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } else {

          $id_herraje=mysqli_insert_id($conexion);
          for($i=0;count($_POST["relacionados"])>$i;$i++){
            $query="INSERT INTO ".TABLA_HERRAJESRELACIONADOS." (id_herraje, id_relacionado) value ('".$id_herraje."', '".$_POST["relacionados"][$i]."')";
            $query_agregar = mysqli_query($conexion, $query);
          }

          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_herrajes.php" class="alert-link">click aquí</a> para volver</div>';  
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

      if($_FILES['imagen_corte']['name']!=""){
          $ruta=date('y-h-i');
          $tipo="";
          $archivos['imagen_corte']=cargar('imagen_corte', $ruta, $tipo); 
      }

      if($_FILES['imagen_ubicacion']['name']!=""){
          $ruta=date('y-h-i');
          $tipo="";
          $archivos['imagen_ubicacion']=cargar('imagen_ubicacion', $ruta, $tipo); 
      }

      if($_FILES['imagen_tecnico']['name']!=""){
          $ruta=date('y-h-i');
          $tipo="";
          $archivos['imagen_tecnico']=cargar('imagen_tecnico', $ruta, $tipo); 
      }
		
		      
      $id=(int)limpiarCadena($id);
      $titulo=limpiarCadena($_POST['titulo']);
      $id_categoria=limpiarCadena($_POST['id_categoria']);
      //$texto=(mysqli_real_escape_string($conexion, $_POST['editor1']));
      $id_subcategoria=limpiarCadena($_POST['id_subcategoria']);
      if($id_subcategoria == "") $id_subcategoria = null;
      $descripcion=limpiarCadena($_POST['descripcion']);
      $ubicacion=limpiarCadena($_POST['ubicacion']);
      $material=limpiarCadena($_POST['material']);
      $color=limpiarCadena($_POST['color']);
      $orden=limpiarCadena($_POST['orden']);
      $complemento =limpiarCadena($_POST['complemento']);
      $codigo =limpiarCadena($_POST['codigo']);

      if (isset($_POST['habilitado']) != "") {
        $habilitado = 1;
      } else {
        $habilitado = 0;
      }    
      
      if (isset($_POST['habilitado']) != "") {
        $habilitado = 1;
      } else {
        $habilitado = 0;
      }

      $query="UPDATE " . TABLA_HERRAJES . "  SET 
          titulo='$titulo',  
          id_categoria='$id_categoria', 
          id_subcategoria='$id_subcategoria', 
          orden='$orden',  
          descripcion='$descripcion',
          ubicacion='$ubicacion', 
          material='$material',
          codigo = '$codigo',
          habilitado = '$habilitado',
          complemento = '$complemento', ";

      if(isset($archivos['imagen'])) {
          $imagen=$archivos['imagen'];
          $query.="imagen='$imagen',";
      }

      if(isset($archivos['imagen_corte'])) {
          $imagen_corte=$archivos['imagen_corte'];
          $query.="imagen_corte='$imagen_corte',";
      }

      if(isset($archivos['imagen_ubicacion'])) {
          $imagen_ubicacion=$archivos['imagen_ubicacion'];
          $query.="imagen_ubicacion='$imagen_ubicacion',";
      }

      if(isset($archivos['imagen_tecnico'])) {
          $imagen_tecnico=$archivos['imagen_tecnico'];
          $query.="imagen_tecnico='$imagen_tecnico',";
      }


      $query.="color='$color'
                WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="abm_herrajes.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      
      } else {

        $query="DELETE FROM ".TABLA_HERRAJESRELACIONADOS." WHERE id_herraje = '".$id."'";
        $query_borrar = mysqli_query($conexion, $query);
        
        for($i=0;count($_POST["relacionados"])>$i;$i++){
          $query="INSERT INTO ".TABLA_HERRAJESRELACIONADOS." (id_herraje, id_relacionado) value ('".$id."', '".$_POST["relacionados"][$i]."')";         
          $query_agregar = mysqli_query($conexion, $query);
        }

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_herrajes.php" class="alert-link">click aquí</a> para volver</div>';  
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_herrajes.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">

              <div class="form-group col-lg-4">
                <label for="titulo_esp">Titulo</label>
                <input class="form-control" value="<?php echo $titulo;?>" id="titulo" name="titulo" type="text" required>
              </div>

              <div class="form-group col-lg-2">
                <label for="titulo_esp">Codigo</label>
                <input class="form-control" value="<?php echo $codigo;?>" id="codigo" name="codigo" type="text" >
              </div>
              
              <div class="form-group col-lg-3">
                <label for="bajada_esp">Categoria</label>
                <select class="form-control" id="id_categoria" name="id_categoria" onchange="loadSubCategoria(this.value)" required>
                  <option value="0">Seleccionar</option>
                  <?php 
                  $query_cat="SELECT * FROM " . TABLA_CATEGORIAS . " ORDER BY nombre ASC";
                  $respuesta_cat=mysqli_query($conexion, $query_cat); 
                  if (!$respuesta_cat) {
                      die("Error en la consulta"); 
                  } else {
                    while ($r_cat= mysqli_fetch_assoc($respuesta_cat)){
                      $sel="";
                      if($r_cat['id'] == $id_categoria) $sel = " selected ";
                      
                      echo "<option value='" . $r_cat['id'] . "' ".$sel.">" . $r_cat['nombre'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>


              <div class="form-group col-lg-3">
                <label for="bajada_esp">Sub Categoria</label>
                <select class="form-control" id="id_subcategoria" name="id_subcategoria" >
                  <option value="0">Seleccionar</option>
                  <?php 
                  if($action == 3) {
                    $query_cat="SELECT * FROM " . TABLA_SUBCATEGORIAS . " WHERE id_categoria = '".$id_categoria."' ORDER BY nombre ASC";                    $respuesta_cat=mysqli_query($conexion, $query_cat); 
                    if (!$respuesta_cat) {
                        die("Error en la consulta"); 
                    } else {
                      while ($r_cat= mysqli_fetch_assoc($respuesta_cat)){
                        $sel="";
                        if($r_cat['id'] == $id_subcategoria) $sel = " selected ";
                        
                        echo"<option value='" . $r_cat['id'] . "' ".$sel.">" . $r_cat['nombre'] . "</option>";
                      }
                    }
                  }
                  ?>
                </select>
              </div>
			  
             

			        <div class="form-group col-lg-3">
                <label for="editor1">Ubicación</label>
                <input type="text" value="<?php echo $ubicacion;?>" class="form-control" id="ubicacion" name="ubicacion" >
              </div>

              <div class="form-group col-lg-3">
                <label for="editor1">Material</label>
                <input type="text" value="<?php echo $material;?>" class="form-control" id="material" name="material" >
              </div>

              <div class="form-group col-lg-3">
                <label for="editor1">Color</label>
                <input type="text" value="<?php echo $color;?>" class="form-control" id="color" name="color">
              </div>

              <div class="form-group col-lg-3">
                <label for="editor1">Complemento</label>
                <input type="text" value="<?php echo $complemento;?>" class="form-control" id="complemento" name="complemento">
              </div>

               <div class="form-group col-lg-12">
                <label for="editor1">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" ><?php echo $descripcion;?></textarea>
              </div>
			  
              <div class="form-group col-lg-6">
                 <label>Imagen Producto <span style="color: blue;">600px por 480px, en formato .jpg o .png, con color de fondo #EEEEEE.</span></label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/herrajes/" . $imagen . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen\")'>Eliminar</a><br>
                          </div>"; 
                  } ?>
                <?php } ?>
              </div>
 <div class="col-lg-12" style="text-align: left; background-color: #eeeeee; padding: 25px 15px; margin-bottom: 25px;" >
               
                <p><strong>Imágenes características: <span style="color: blue;">375x por 350px, en formato .jpg o .png</span></strong></p>  
                
              <div class="form-group col-lg-4">
                <label>Imagen Corte</label>
                <input type="file" name="imagen_corte">
                <?php if($action == 3) { ?>
                  <input name="imagen_corte_prev" type="hidden" value="<?php echo $imagen_corte;?>" />
                  <?php if ($imagen_corte != "") {
                    echo "<br>
                          <div id='imagen_corte_div'>
                          <img src='../img/herrajes/" . $imagen_corte . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen_corte\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>

              <div class="form-group col-lg-4">
                <label>Imagen Ubicacion</label>
                <input type="file" name="imagen_ubicacion">
                <?php if($action == 3) { ?>
                  <input name="imagen_ubicacion_prev" type="hidden" value="<?php echo $imagen_ubicacion;?>" />
                  <?php if ($imagen_ubicacion != "") {
                    echo "<br>
                          <div id='imagen_ubicacion_div'>
                          <img src='../img/herrajes/" . $imagen_ubicacion . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen_ubicacion\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>

              <div class="form-group col-lg-4">
                <label>Imagen Tecnico</label>
                <input type="file" name="imagen_tecnico">
                <?php if($action == 3) { ?>
                  <input name="imagen_tecnico_prev" type="hidden" value="<?php echo $imagen_tecnico;?>" />
                  <?php if ($imagen_tecnico != "") {
                    echo "<br>
                          <div id='imagen_tecnico_div'>
                          <img src='../img/herrajes/" . $imagen_tecnico . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen_tecnico\")'>Eliminar</a><br>
                          </div>";
                  } ?>
                <?php } ?>                  
              </div>
</div>
              <div class="form-group col-lg-12">
                <label for="categoria">Productos relacionados</label>
                <select multiple="" class="form-control" size="5" name="relacionados[]" id="relacionados">
                  <?php
                    $query_prod="SELECT * FROM " . TABLA_HERRAJES . " ";
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
                        
                        echo"<option value='" . $r_prod['id'] . "' ".$sel.">" . $r_prod['titulo'] . " (".$r_prod["codigo"].")</option>";
                      }
                    }
                    ?>
                </select>
              </div>

              <div class="form-group col-lg-6">
                <label for="categoria">Orden</label>
                <input class="form-control" value="<?php echo $orden;?>" id="orden" name="orden" type="number" required>
              </div>

              <div class="form-group col-lg-6">
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
function loadSubCategoria(id) {
  $.ajax(
  {
      type: "POST",
      url: "ajax/comboSubCategorias.php",
      data: "id="+id,
      dataType : 'json',
      success: function(respuesta){
          $("#id_subcategoria").empty();
          $("#id_subcategoria").append(respuesta.opciones)
      }
  });
}  

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