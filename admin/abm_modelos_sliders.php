<?php 
  include_once("header.php"); 
  $action=(int)limpiarCadena($_REQUEST['action']);


function cargar($nombre, $ruta, $tipo){
  $archivo= "../img/productos/sliders/".$ruta.$_FILES[$nombre]["name"];
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
$modelo_id="";
$nombre="";
$orden="";

if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_MODELOS_SLIDERS . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_modelos_sliders.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $modelo_id=($r['modelo_id']); 
      $nombre=($r['nombre']);
      $orden=($r['orden']);
    }
  }
}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Sliders Modelo <small> Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_destacados_home.php"><i class="fa fa-bullhorn"></i> Listar sliders modelos</a></li>
              <li class="active">ABM Sliders Modelos</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <?php
    
    //GUARDAR LOS DATOS

    if(isset($_POST['btn_agregar']) && $action == 2){
        //CARGO LOS ARCHIVOS
        $archivos=array();
        
        /*if($_FILES['imagen']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen']=cargar('imagen', $ruta, $tipo); 
        }*/

        $modelo_id=limpiarCadena($_POST['modelo_id']);
        $nombre="Sliders ".limpiarCadena($_POST['orden']);
        $orden=limpiarCadena($_POST['orden']);
        
        /*if(isset($archivos['imagen'])) {
            $imagen=$archivos['imagen'];
        } else {
            $imagen="";
        }*/
        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_MODELOS_SLIDERS . " SET 
          modelo_id='$modelo_id',
          nombre='$nombre',
          orden='$orden',
          fecha_alta=NOW()");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_modelos_sliders.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        die();

        } else {
          $modelo_slider_id = mysqli_insert_id($conexion);

          /*ITEMS*/
          $cantTotal = $_POST["hidCantIte"];
          for($i=0;$i<$cantTotal;$i++)
          {                  
              $data = Array ();
              if((isset($_POST["txtItemTitulo_".$i])  && $_POST["txtItemTexto_".$i] != "")){
                  $txtItemTitulo = limpiarCadena($_POST["txtItemTitulo_".$i]);
                  $txtItemTexto = limpiarCadena($_POST["txtItemTexto_".$i]);
                  $txtItemOrden = limpiarCadena($_POST["txtItemOrden_".$i]);
                  $imagen="";
                  if(isset($_FILES["imagen_".$i]) && $_FILES["imagen_".$i]['tmp_name'] != ""){
                    $ruta=date('y-h-i')."_";
                    $tipo="";
                    $imagen=cargar("imagen_".$i, $ruta, $tipo); 
                  }

                  $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_MODELOS_SLIDERS_ITEMS . " SET 
                    modelo_slider_id='$modelo_slider_id',
                    titulo='$txtItemTitulo',
                    texto='$txtItemTexto',
                    imagen='$imagen',
                    orden='$orden',
                    fecha_alta=NOW()");
              } 
          }
   
          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_modelos_sliders.php" class="alert-link">click aquí</a> para volver</div>';  
          die();
        }
}
        
      //FIN GUARDAR LOS DATOS



    //GUARDAR LOS DATOS MODIFICADOS

    if(isset($_POST['btn_agregar']) && $action == 3){

      //CARGO LOS ARCHIVOS
		  $archivos=array();
      /*if($_FILES['imagen']['name']!=""){
          $ruta=date('y-h-i');
          $tipo="";
          $archivos['imagen']=cargar('imagen', $ruta, $tipo); 
      }*/
      
      $id=(int)limpiarCadena($id);
      $modelo_id=limpiarCadena($_POST['modelo_id']); 
      $nombre="Sliders ".limpiarCadena($_POST['orden']);
      $orden=limpiarCadena($_POST['orden']);
 
      $query="UPDATE " . TABLA_MODELOS_SLIDERS . "  SET  
          modelo_id='$modelo_id',
          nombre='$nombre',
          orden='$orden'          
        WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_modelos_sliders.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      die();
      } else {
        /*ITEMS*/
          $cantTotal = $_POST["hidCantIte"];
          for($i=0;$i<$cantTotal;$i++)
          {                  
              $hidID="";
              if(isset($_POST["id_item_".$i]) && $_POST["id_item_".$i]!="")
                  $hidID = $_POST["id_item_".$i];

              if((isset($_POST["txtItemTitulo_".$i])  && $_POST["txtItemTexto_".$i] != "")){
                  $txtItemTitulo = limpiarCadena($_POST["txtItemTitulo_".$i]);
                  $txtItemTexto = limpiarCadena($_POST["txtItemTexto_".$i]);
                  $txtItemOrden = limpiarCadena($_POST["txtItemOrden_".$i]);
                  $imagenWhere="";
                  if(isset($_FILES["imagen_".$i]) && $_FILES["imagen_".$i]['tmp_name'] != ""){
                    $ruta=date('y-h-i')."_";
                    $tipo="";
                    $imagen=cargar("imagen_".$i, $ruta, $tipo); 
                    $imagenWhere="imagen='".$imagen."',";
                  }

                  if($hidID != ""){
                    $query="UPDATE " . TABLA_MODELOS_SLIDERS_ITEMS . "  SET  
                        modelo_slider_id='$id',
                        titulo='$txtItemTitulo',
                        texto='$txtItemTexto',
                        ".$imagenWhere."
                        orden='$txtItemOrden'     
                      WHERE id=" . $hidID;
                      
                    $query_agregar = mysqli_query($conexion,$query);
                  } else {
                    $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_MODELOS_SLIDERS_ITEMS . " SET 
                      modelo_slider_id='$id',
                      titulo='$txtItemTitulo',
                      texto='$txtItemTexto',
                      ".$imagenWhere."
                      orden='$txtItemOrden',
                      fecha_alta=NOW()");
                  }
              } else {
                if($hidID != ""){
                  $query_agregar = mysqli_query($conexion,"DELETE FROM " . TABLA_MODELOS_SLIDERS_ITEMS . " WHERE id = '".$hidID."'");
                }
              }
          }

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_modelos_sliders.php" class="alert-link">click aquí</a> para volver</div>';  
        die();
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_modelos_sliders.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">
             
              <div class="form-group col-lg-6">
                <label for="">Modelo (Trae el ID para linkear el modelo)</label>
                <select class="form-control" id="modelo_id" name="modelo_id" required>
                  <option value="0">Seleccionar</option>
                  <?php 
                  $query_cat="SELECT * FROM " . TABLA_MODELOS . " ORDER BY nombre_modelo ASC";
                  $respuesta_cat=mysqli_query($conexion, $query_cat); 
                  if (!$respuesta_cat) {
                      die("Error en la consulta"); 
                  } else {
                    while ($r_cat= mysqli_fetch_assoc($respuesta_cat)){
                      $sel="";
                      if($r_cat['id'] == $modelo_id) $sel = " selected ";
                      
                      echo "<option value='" . $r_cat['id'] . "' ".$sel.">" . $r_cat['nombre_modelo'] . " - " . $r_cat['id'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>

              <input class="form-control" value="<?php echo $nombre;?>" id="nombre" name="nombre" type="hidden" >

            
             <div class="form-group col-lg-3">
                <label for="orden">Orden</label>
                <input class="form-control" value="<?php echo $orden;?>" id="orden" name="orden" type="number" >
              </div>

              <div class="clearfix"></div>

              <!--Items-->
              <div class="col-lg-12 col-md-12 col-xs-12" style="background-color: #463131; color:#fff; margin-bottom: 10px">
                  
                  <div class="col-lg-12 col-md-12 col-xs-12"  style="margin-top:10px; margin-bottom: 10px">
                      <div class="col-lg-4 col-md-4 col-xs-12 ">
                          <div class="form-group ">
                              <label>Items</label>
                          </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-xs-12 text-right">
                          <div class="btn btn-default btn-danger btn-xs" style="width: 170px" onclick="agregarItems()">Agregar Items</div>
                      </div>

                      <div id="items" class="col-lg-12 col-md-12 col-xs-12">


                      <?php
                      $cantItem=0;
                      if($action == 3) {
                        $query_cat="SELECT * FROM " . TABLA_MODELOS_SLIDERS_ITEMS . " WHERE modelo_slider_id = '".$id."' ORDER BY orden ASC";
                        $respuesta_cat=mysqli_query($conexion, $query_cat); 
                        if (!$respuesta_cat) {
                            die("Error en la consulta"); 
                        } else {
                          $i=0;
                          while ($r_cat= mysqli_fetch_assoc($respuesta_cat)){
                            $id_item = $r_cat['id'];
                            $titulo = $r_cat['titulo'];
                            $texto = $r_cat['texto'];
                            $orden = $r_cat['orden'];
                            $imagen = $r_cat['imagen'];
                            
                        ?>
                            <input type="hidden" id="id_item_<?php echo $i;?>" name="id_item_<?php echo $i;?>" value="<?php echo $id_item;?>">
                            <div class="row" style="margin-top:5px;" id="item_<?php echo $i;?>">
                              <div class="col-lg-6"><div class="form-group">
                                  <label>Titulo</label>
                                  <input required type="text" class="form-control" value="<?php echo $titulo;?>" name="txtItemTitulo_<?php echo $i;?>" id="txtItemTitulo_<?php echo $i;?>" style="font-size:12px"/>
                              </div></div>
                              <div class="col-lg-6" style=""><div class="form-group">
                                  <label>Orden:</label>
                                   <input class="form-control" type="number" name="txtItemOrden_<?php echo $i;?>" value="<?php echo $orden;?>" id="txtItemOrden_<?php echo $i;?>"  style="width:100%; font-size: 12px"/>
                              </div></div>
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label>Imagen </label>
                                      <input type="file" class="form-control" value="" name="imagen_<?php echo $i;?>" id="imagen_<?php echo $i;?>">
                                      <?php
                                      if($imagen!=""){
                                          echo "<div id='div_imagen_".$i."' style='float: left;margin-top: 10px;margin-bottom: 20px;'>
                                                  <input type='hidden' id='imagen_name_".$i."' name='imagen_name_".$i."' value='".$imagen."'>
                                                  <a href='../img/productos/sliders/".$imagen."' class=''>
                                                    <img src='../img/productos/sliders/".$imagen."' width=80px>
                                                  </a>&nbsp;&nbsp;&nbsp;
                                                  <a href='Javascript:eliminarImagenModelosSliders(\"".$id_item."\", \"imagen\", \"div_imagen_".$i."\")' class='btn btn-xs btn-danger'><i class='fa fa-trash-o'></i> Eliminar</a></div>";
                                      }
                                      ?>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label>Texto </label>
                                      <textarea class="form-control" name="txtItemTexto_<?php echo $i;?>" id="txtItemTexto_<?php echo $i;?>"><?php echo $texto;?></textarea>
                                  </div>
                              </div>
                              <div class="col-lg-12"><div class="form-group">
                                      <a href="Javascript:eliminarItems(<?php echo $i;?>);" style="text-decoration:none; color:white">[X Eliminar Item]</a>
                                  </div></div>
                              <div class="col-lg-12">
                                  <hr style="color:red; border: 1px solid">
                              </div>
                          </div>
                        <?php
                            $i++;
                            $cantItem++;
                          }
                        }
                      }
                      ?>
                                  
                      </div>
                      <input type="hidden" name="hidCantIte" id="hidCantIte" value="<?php echo $cantItem;?>">
                      <input type="hidden" name="hidTotal" id="hidTotal" value="<?php echo $cantItem;?>">

                      <div class="col-lg-12 col-md-12 col-xs-12 text-right">
                          <div class="btn btn-default btn-danger btn-xs" style="width: 170px" onclick="agregarItems()">Agregar Items</div>
                      </div>
                  </div>
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

<script>


function eliminarImagen(id, campo){
  $.ajax(
  {
      type: "POST",
      url: "ajax/eliminarImagenModeloDestacado.php",
      data: "id="+id+"&c="+campo,
      dataType : 'json',
      success: function(respuesta){
          $("#"+campo+"_div").empty();
      }
  });
}



/*******************************ITEMS******************************/
function agregarItems()
{
      $("#hidTotal").val(parseInt($("#hidTotal").val())+1);

      var i = $("#hidCantIte").val();
      
      var fileTxt = '';
          fileTxt+= '\n\
                  <div class="row" style="margin-top:5px;" id="item_'+i+'">\n\
                      <div class="col-lg-6"><div class="form-group">\n\
                          <label>Titulo</label>\n\
                          <input required type="text" class="form-control" name="txtItemTitulo_'+i+'" id="txtItemTitulo_'+i+'" style="font-size:12px"/>\n\
                      </div></div>\n\
                      <div class="col-lg-6" style=""><div class="form-group">\n\
                          <label>Orden:</label>\n\
                           <input class="form-control" type="number" name="txtItemOrden_'+i+'" id="txtItemOrden_'+i+'"  style="width:100%; font-size: 12px"/>\n\
                      </div></div>\n\
                      <div class="col-lg-12">\n\
                          <div class="form-group">\n\
                              <label>Imagen </label>\n\
                              <input type="file" class="form-control" value="" name="imagen_'+i+'" id="imagen_'+i+'">\n\
                          </div>\n\
                      </div>\n\
                      <div class="col-lg-12">\n\
                          <div class="form-group">\n\
                              <label>Texto </label>\n\
                              <textarea class="form-control" name="txtItemTexto_'+i+'" id="txtItemTexto_'+i+'"></textarea>\n\
                          </div>\n\
                      </div>\n\
                      <div class="col-lg-12"><div class="form-group">\n\
                              <a href="Javascript:eliminarItems('+i+');" style="text-decoration:none; color:white">[X Eliminar Item]</a>\n\
                          </div></div>\n\
                      <div class="col-lg-12">\n\
                          <hr style="color:red; border: 1px solid">\n\
                      </div>\n\
                  </div>';
      $("#items").append(fileTxt);
      $("#hidCantIte").val(parseInt($("#hidCantIte").val())+1);
}
function eliminarItems(id)
{
    $("#hidTotal").val(parseInt($("#hidTotal").val())-1);
    $("#item_"+id).remove();
}

function eliminarImagenModelosSliders(id_item, campo, div){
    $.ajax(
    {
        type: "POST",
        url: "ajax/eliminarImagenModelosSliders.php",
        data: "id="+id_item+"&c="+campo,
        success: function(respuesta){
            $("#"+div).remove();
        }
    });
}
</script>