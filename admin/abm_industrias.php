<?php 
  include_once("header.php"); 
  $action=(int)limpiarCadena($_REQUEST['action']);


$id="";
$nombre="";

if($action == 3) {
  $id=(int)limpiarCadena($_REQUEST['id']);
  $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_INDUSTRIAS . " WHERE id=" . $id);
  
  if (!$result) {
    echo '<div class="alert alert-danger" role="alert">No se ha encontrado ningun elemento. Haga <a href="listar_industrias.php" class="alert-link">click aquí</a> para volver</div>';
    echo mysqli_error($conexion);
  } else {
    while($r=mysqli_fetch_assoc($result)){ 
      $id=($r['id']);
      $nombre=($r['nombre']);
  

    }
  }
}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Industrias <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-bullhorn"></i> Home</a></li>
              <li class="active">Industrias</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <?php
    
     if(isset($_POST['btn_agregar']) && $action == 2){
        //CARGO LOS ARCHIVOS
        
     
        $nombre=limpiarCadena($_POST['nombre']);
        
        
        
        $query_agregar = mysqli_query($conexion,"INSERT INTO " . TABLA_INDUSTRIAS . " SET 
          nombre='$nombre'
        ");

        if (!$query_agregar) {
          echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="listar_industrias.php" class="alert-link">click aquí</a> para volver</div>';
          echo mysqli_error($conexion);
        
        } else {

   
          echo '<div class="alert alert-success" role="alert">El item ha sido agregado con éxito. Haga <a href="listar_industrias.php" class="alert-link">click aquí</a> para volver</div>';  
          die();
        }

      }        
      //FIN GUARDAR LOS DATOS


    //GUARDAR LOS DATOS MODIFICADOS

    if(isset($_POST['btn_agregar']) && $action == 3){

     
		
		      
      $id=(int)limpiarCadena($id);
      $nombre=limpiarCadena($_POST['nombre']);
     
 
      $query="UPDATE " . TABLA_INDUSTRIAS . "  SET 
          nombre='$nombre'   
                      WHERE id=" . $id;
        
      $query_agregar = mysqli_query($conexion,$query);
       
      
      if (!$query_agregar) {
        echo '<div class="alert alert-danger" role="alert">Se ha producido un error. Intentenlo más tarde. Haga <a href="abm_industrias.php" class="alert-link">click aquí</a> para volver</div>';
        echo mysqli_error($conexion);
      
      } else {

       

        echo '<div class="alert alert-success" role="alert">El item ha sido modificado con éxito. Haga <a href="listar_industrias.php" class="alert-link">click aquí</a> para volver</div>';  
      }

    }
    //FIN GUARDAR LOS DATOS MODIFICADOS
        
  ?>

    <!-- Agrego -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Agregar</h2>

            <form role="form" enctype="multipart/form-data" method="post" action="abm_industrias.php?action=<?php echo $action;?><?php if($action==3) { echo "&id=".$id; } ?>">

              <div class="form-group col-lg-6">
                <label for="nombre">Industria</label>
                <input class="form-control" value="<?php echo $nombre;?>" id="nombre" name="nombre" type="text" required>
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

