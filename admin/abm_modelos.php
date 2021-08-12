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
$nombre_modelo="";
$overline=""; 
$marca="";
$titulo="";
$bajada="";
$titulo_para="";
$texto="";
$texto_pa="";
$texto_op="";
$alink_interes1="";
$alink_interes2="";
$alink_interes3="";
$link_interes1="";
$link_interes2="";
$link_interes3="";
$imagen="";
$imagen2="";
$imagen3="";
$imagen4="";
$imagen5="";
$imagen6="";
$imagen7="";
$imagen8="";
$imagen9="";
$imagen9="";
$video="";
$habilitado="";

if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_MODELOS . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_marcas.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 

    $id=($r['id']);
    $nombre_modelo=($r['nombre_modelo']); //modelo
    $overline=($r['overline']); 
    $marca=($r['marca']);
    $titulo=($r['titulo']);
    $bajada=($r['bajada']);
    $titulo_para=($r['titulo_para']);
    $texto=($r['texto']);
    $texto_pa=($r['texto_pa']);
    $texto_op=($r['texto_op']);
    $alink_interes1=($r['alink_interes1']);
    $alink_interes2=($r['alink_interes2']);
    $alink_interes3=($r['alink_interes3']);
    $link_interes1=($r['link_interes1']);
    $link_interes2=($r['link_interes2']);
    $link_interes3=($r['link_interes3']);
    $imagen=($r['imagen']);
    $imagen2=($r['imagen2']);
    $imagen3=($r['imagen3']);
    $imagen4=($r['imagen4']);
    $imagen5=($r['imagen5']);
    $imagen6=($r['imagen6']);
    $imagen7=($r['imagen7']);
    $imagen8=($r['imagen8']);
    $imagen9=($r['imagen9']);
    $imagen10=($r['imagen10']);
    $video=($r['video']); 
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
              <li><a href="listar_modelos.php"><i class="fa fa-bullhorn"></i> Listar Modelos</a></li>
              <li class="active">ABM Modelos</li>
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

        if($_FILES['imagen4']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen4']=cargar('imagen4', $ruta, $tipo); 
        }

        if($_FILES['imagen5']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen5']=cargar('imagen5', $ruta, $tipo); 
        }

        if($_FILES['imagen6']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen6']=cargar('imagen6', $ruta, $tipo); 
        }

        if($_FILES['imagen7']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen']=cargar('imagen', $ruta, $tipo); 
        }

        if($_FILES['imagen8']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen8']=cargar('imagen8', $ruta, $tipo); 
        }

          if($_FILES['imagen9']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen9']=cargar('imagen9', $ruta, $tipo); 
        }

        if($_FILES['imagen10']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen10']=cargar('imagen10', $ruta, $tipo); 
        }

        $nombre_modelo=limpiarCadena($r['nombre_modelo']); //modelo
        $overline=limpiarCadena($_POST['overline']); 
        $marca=limpiarCadena($_POST['marca']);
        $titulo=limpiarCadena($_POST['titulo']);
        $bajada=limpiarCadena($_POST['bajada']);
        $titulo_para=limpiarCadena($_POST['titulo_para']);
        $texto=(mysqli_real_escape_string($conexion, $_POST['texto']));
        $texto_pa=limpiarCadena($_POST['texto_pa']);
        $texto_op=limpiarCadena($_POST['texto_op']);
        $alink_interes1=limpiarCadena($_POST['alink_interes1']);
        $alink_interes2=limpiarCadena($_POST['alink_interes2']);
        $alink_interes3=limpiarCadena($_POST['alink_interes3']);
        $link_interes1=limpiarCadena($_POST['link_interes1']);
        $link_interes2=limpiarCadena($_POST['link_interes2']);
        $link_interes3=limpiarCadena($_POST['link_interes3']);
        $video=limpiarCadena($_POST['video']);

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

        if(isset($archivos['imagen4'])) {
            $imagen4=$archivos['imagen4'];
        } else {
            $imagen4="";
        }

        if(isset($archivos['imagen5'])) {
            $imagen5=$archivos['imagen5'];
        } else {
            $imagen5="";
        }

        if(isset($archivos['imagen6'])) {
            $imagen6=$archivos['imagen6'];
        } else {
            $imagen6="";
        }

        if(isset($archivos['imagen7'])) {
            $imagen7=$archivos['imagen7'];
        } else {
            $imagen7="";
        }

        if(isset($archivos['imagen8'])) {
            $imagen8=$archivos['imagen8'];
        } else {
            $imagen8="";
        }

        if(isset($archivos['imagen9'])) {
            $imagen9=$archivos['imagen9'];
        } else {
            $imagen9="";
        }

         if(isset($archivos['imagen10'])) {
            $imagen10=$archivos['imagen10'];
        } else {
            $imagen10="";
        }

        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_MODELOS . " SET 
          nombre_modelo='$nombre_modelo',
          overline='$overline',
          marca='$marca',
          titulo='$titulo',
          bajada='$bajada',
          titulo_para='$titulo_para',
          texto = '$texto',
          texto_pa='texto_pa',
          texto_op='texto_op',
          alink_interes1='alink_interes1',
          alink_interes2='alink_interes2',
          alink_interes3='alink_interes3',
          link_interes1='link_interes1',
          link_interes2='link_interes2',
          link_interes3='link_interes3',
          imagen='$imagen',
          imagen2='$imagen2',
          imagen3='$imagen3',
          imagen4='$imagen4',
          imagen5='$imagen5',
          imagen6='$imagen6',
          imagen7='$imagen7',
          imagen8='$imagen8', 
          imagen9='$imagen9',
          imagen10='$imagen10',
          video='$video',  
          habilitado = '$habilitado'");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_modelos.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        die();

        } else {

   
          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_modelos.php" class="alert-link">click aquí</a> para volver</div>';  
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

        if($_FILES['imagen4']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen4']=cargar('imagen4', $ruta, $tipo); 
        }

        if($_FILES['imagen5']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen5']=cargar('imagen5', $ruta, $tipo); 
        }

        if($_FILES['imagen6']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen6']=cargar('imagen6', $ruta, $tipo); 
        }

        if($_FILES['imagen7']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen7']=cargar('imagen7', $ruta, $tipo); 
        }

        if($_FILES['imagen8']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen8']=cargar('imagen8', $ruta, $tipo); 
        }

         if($_FILES['imagen9']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen9']=cargar('imagen9', $ruta, $tipo); 
        }

        if($_FILES['imagen10']['name']!=""){
            $ruta=date('y-h-i');
            $tipo="";
            $archivos['imagen10']=cargar('imagen10', $ruta, $tipo); 
        }

        $id=(int)limpiarCadena($id);
        $nombre_modelo=limpiarCadena($_POST['nombre_modelo']); //modelo
        $overline=limpiarCadena($_POST['overline']); 
        $marca=limpiarCadena($_POST['marca']);
        $titulo=limpiarCadena($_POST['titulo']);
        $bajada=limpiarCadena($_POST['bajada']);
        $titulo_para=limpiarCadena($_POST['titulo_para']);
        $texto=$_POST['texto'];
        $texto_pa=limpiarCadena($_POST['texto_pa']);
        $texto_op=limpiarCadena($_POST['texto_op']);
        $alink_interes1=limpiarCadena($_POST['alink_interes1']);
        $alink_interes2=limpiarCadena($_POST['alink_interes2']);
        $alink_interes3=limpiarCadena($_POST['alink_interes3']);
        $link_interes1=limpiarCadena($_POST['link_interes1']);
        $link_interes2=limpiarCadena($_POST['link_interes2']);
        $link_interes3=limpiarCadena($_POST['link_interes3']);
        $video=limpiarCadena($_POST['video']);

       if (isset($_POST['habilitado']) != "") {
          $habilitado = 1;
        } else {
          $habilitado = 0;
        }   

 
      $query="UPDATE " . TABLA_MODELOS . "  SET  
        nombre_modelo='$nombre_modelo',
        overline='$overline',
        marca='$marca',
        titulo='$titulo',
        bajada='$bajada',
        titulo_para='$titulo_para',
        texto = '$texto',
        texto_pa='$texto_pa',
        texto_op='$texto_op',
        alink_interes1='$alink_interes1',
        alink_interes2='$alink_interes2',
        alink_interes3='$alink_interes3',
        link_interes1='$link_interes1',
        link_interes2='$link_interes2',
        link_interes3='$link_interes3',  
        video='$video',
           ";

      if(isset($archivos['imagen'])) {
          $imagen=$archivos['imagen'];
          $query.="imagen='$imagen',";
      }

      if(isset($archivos['imagen2'])) {
          $imagen2=$archivos['imagen2'];
          $query.="imagen2='$imagen2',";
      }

      if(isset($archivos['imagen3'])) {
          $imagen3=$archivos['imagen3'];
          $query.="imagen3='$imagen3',";
      }

      if(isset($archivos['imagen4'])) {
          $imagen4=$archivos['imagen4'];
          $query.="imagen4='$imagen4',";
      }

      if(isset($archivos['imagen5'])) {
          $imagen5=$archivos['imagen5'];
          $query.="imagen5='$imagen5',";
      }

      if(isset($archivos['imagen6'])) {
          $imagen6=$archivos['imagen6'];
          $query.="imagen6='$imagen6',";
      }

      if(isset($archivos['imagen7'])) {
          $imagen7=$archivos['imagen7'];
          $query.="imagen7='$imagen7',";
      }

      if(isset($archivos['imagen8'])) {
          $imagen8=$archivos['imagen8'];
          $query.="imagen8='$imagen8',";
      }

       if(isset($archivos['imagen9'])) {
          $imagen9=$archivos['imagen9'];
          $query.="imagen9='$imagen9',";
      }

      if(isset($archivos['imagen10'])) {
          $imagen10=$archivos['imagen10'];
          $query.="imagen10='$imagen10',";
      }

       $query.="habilitado = '$habilitado'
                  WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_modelos.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      die();
      } else {

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_modelos.php" class="alert-link">click aquí</a> para volver</div>';  
        die();
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_modelos.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">
              <div class="cow">
              <div class="form-group col-lg-4">
                <label for="titulo_esp">Modelo</label>
                <input class="form-control" value="<?php echo $nombre_modelo;?>" id="nombre_modelo" name="nombre_modelo" type="text" required>
              </div>

              <div class="form-group col-lg-4">
                <label for="titulo_esp">Producto (overline)</label>
                <input class="form-control" value="<?php echo $overline;?>" id="overline" name="overline" type="text" >
              </div>
      

              <div class="form-group col-lg-4">
                <label for="">Marca</label>
                <input class="form-control" value="<?php echo $marca;?>" id="marca" name="marca" type="text" >
              </div>

              <div class="form-group col-lg-6">
                <label for="titulo">Titulo</label>
                <input class="form-control" value="<?php echo $titulo;?>" id="titulo" name="titulo" type="text" >
              </div>

              <div class="form-group col-lg-6">
                <label for="bajada">Bajada</label>
                <input class="form-control" value="<?php echo $bajada;?>" id="bajada" name="bajada" type="text" >
              </div>

              <div class="form-group col-lg-6">
                <label for="titulo_para">Titulo sección Parallax</label>
                 <textarea class="form-control" id="titulo_para" name="titulo_para" rows="10" type="text" required> <?php echo $titulo_para; ?></textarea>
                
              </div>

             <div class="form-group col-lg-6">
                <label for="editor1">Bajada sección Parallax</label>
                <textarea class="form-control" id="texto" name="texto" rows="6" type="text" required> <?php echo $texto;?></textarea>
              </div>


              <div class="form-group col-lg-6">
                <label for="texto_pa">Texto Paciente</label>
               
                  <textarea class="form-control" id="texto_pa" name="texto_pa" rows="10" type="text" required> <?php echo $texto_pa;?></textarea>
              </div>


                <div class="form-group col-lg-6">
                <label for="texto_op">Texto Operador</label>
                   <textarea class="form-control" id="texto_op" name="texto_op" rows="10" type="text" required> <?php echo $texto_op;?></textarea> 

              </div>
              
                 <div class="form-group col-lg-6">                
                <label>Imagen Paciente</label>
                <input type="file" name="imagen3">
                <?php if($action == 3) { ?>
                  <input name="imagen3_prev" type="hidden" value="<?php echo $imagen3;?>" />
                  <?php if ($imagen3 != "") {
                    echo "<br>
                          <div id='imagen3_div'>
                          <img src='../img/productos/" . $imagen3 . "' width='100px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen3\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>

             



                 <div class="form-group col-lg-6">                
                <label>Imagen Operador</label>
                <input type="file" name="imagen9">
                <?php if($action == 3) { ?>
                  <input name="imagen9_prev" type="hidden" value="<?php echo $imagen9;?>" />
                  <?php if ($imagen9 != "") {
                    echo "<br>
                          <div id='imagen9_div'>
                          <img src='../img/productos/" . $imagen9 . "' width='100px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen9\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>
              <div class="form-group col-lg-6">
                 <label>Imagen Header <span style="color: blue;"> en formato .jpg o .png</span></label>
                <input type="file" name="imagen">
                <?php if($action == 3) { ?>
                  <input name="imagen_prev" type="hidden" value="<?php echo $imagen;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen_div'>
                          <img src='../img/productos/" . $imagen . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen\")'>Eliminar</a><br>
                          </div>"; 
                  } ?>
                <?php } ?>
              </div>


              <div class="form-group col-lg-6">
                 <label>Imagen Fondo Parallax <span style="color: blue;"> en formato .jpg o .png</span></label>
                <input type="file" name="imagen2">
                <?php if($action == 3) { ?>
                  <input name="imagen2_prev" type="hidden" value="<?php echo $imagen2;?>" />
                  <?php if ($imagen != "") {
                    echo "<br>
                          <div id='imagen2_div'>
                          <img src='../img/productos/" . $imagen2 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen2\")'>Eliminar</a><br>
                          </div>"; 
                  } ?>
                <?php } ?>
              </div>
           
              <div class="form-group col-lg-6">                
                <label>Imagen contacto</label>
                <input type="file" name="imagen4">
                <?php if($action == 3) { ?>
                  <input name="imagen4_prev" type="hidden" value="<?php echo $imagen4;?>" />
                  <?php if ($imagen4 != "") {
                    echo "<br>
                          <div id='imagen4_div'>
                          <img src='../img/productos/" . $imagen4 . "' width='100px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen4\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>

<div class="form-group col-lg-6">                
                <label>Imagen Menú principal</label>
                <input type="file" name="imagen10">
                <?php if($action == 3) { ?>
                  <input name="imagen10_prev" type="hidden" value="<?php echo $imagen10;?>" />
                  <?php if ($imagen10 != "") {
                    echo "<br>
                          <div id='imagen10_div'>
                          <img src='../img/productos/" . $imagen10 . "' width='100px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen10\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>

            </div>
            <br clear="all">
            <div class="row" style=" padding: 20px 0; margin-bottom: 30px; background-color: #cccccc;  ">
              <div class="form-group col-lg-12">                
                <label>Imagen fondo slider</label>
                <input type="file" name="imagen5">
                <?php if($action == 3) { ?>
                  <input name="imagen5_prev" type="hidden" value="<?php echo $imagen5;?>" />
                  <?php if ($imagen5 != "") {
                    echo "<br>
                          <div id='imagen5_div'>
                          <img src='../img/productos/" . $imagen5 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen5\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>
              <div class="form-group col-lg-3">                
                <label>Imagen 1 slider</label>
                <input type="file" name="imagen6">
                <?php if($action == 3) { ?>
                  <input name="imagen6_prev" type="hidden" value="<?php echo $imagen6;?>" />
                  <?php if ($imagen6 != "") {
                    echo "<br>
                          <div id='imagen6_div'>
                          <img src='../img/productos/" . $imagen6 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen6\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>
              <div class="form-group col-lg-3">                
                <label>Imagen 2 slider</label>
                <input type="file" name="imagen7">
                <?php if($action == 3) { ?>
                  <input name="imagen7_prev" type="hidden" value="<?php echo $imagen7;?>" />
                  <?php if ($imagen7 != "") {
                    echo "<br>
                          <div id='imagen7_div'>
                          <img src='../img/productos/" . $imagen7 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen7\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>
              <div class="form-group col-lg-3">                
                <label>Imagen 3 slider</label>
                <input type="file" name="imagen8">
                <?php if($action == 3) { ?>
                  <input name="imagen8_prev" type="hidden" value="<?php echo $imagen8;?>" />
                  <?php if ($imagen8 != "") {
                    echo "<br>
                          <div id='imagen8_div'>
                          <img src='../img/productos/" . $imagen8 . "' width='150px'>
                          <a href='Javascript:void(0);' onclick='eliminarImagen(".$id.",\"imagen8\")'>Eliminar</a><br>
                          </div>";                    
                  } ?>
                <?php } ?>                
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                 <label for="titulo_para">Links de Interes 1</label>
                 <textarea class="form-control" id="link_interes1" name="link_interes1" rows="4" type="text" required> <?php echo $link_interes1; ?></textarea>
                  <br>
                  <input class="form-control" value="<?php echo $alink_interes1;?>" id="alink_interes1" name="alink_interes1" type="text" placeholder="Link completo">
              </div>
              <div class="form-group col-lg-4">
                 <label for="titulo_para">Links de Interes 2</label>
                 <textarea class="form-control" id="link_interes2" name="link_interes2" rows="4" type="text" required> <?php echo $link_interes2; ?></textarea>
                <br>
                  <input class="form-control" value="<?php echo $alink_interes2;?>" id="alink_interes2" name="alink_interes2" type="text" placeholder="Link completo">
              </div>
              <div class="form-group col-lg-4">
                 <label for="titulo_para">Links de Interes 3</label>
                 <textarea class="form-control" id="link_interes3" name="link_interes3" rows="4" type="text" required> <?php echo $link_interes3; ?></textarea>
                  <br>
                  <input class="form-control" value="<?php echo $alink_interes3;?>" id="alink_interes3" name="alink_interes3" type="text" placeholder="Link completo">
              </div>
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
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckfinder/ckfinder.js"></script>
<script src="js/ckeditor/adapters/jquery.js"></script>  
<script>


function eliminarImagen(id, campo){
  $.ajax(
  {
      type: "POST",
      url: "ajax/eliminarImagenModelo.php",
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