<?php include_once('header.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Modelos <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li><a href="listar_carusel_home.php"><i class="fa fa-bullhorn"></i> Modelos</a></li>
              <li class="active">Eliminar destacado mediano</li>
            </ol>
          </div>
        </div><!-- /.row -->

        
        <div class="row">
          <div class="col-lg-6">
            <h2>Eliminar</h2>
            <?php

               $id=(int)limpiarCadena($_REQUEST['id']);

              if(!isset($_POST['btn_si'])){

              $result = mysqli_query($conexion,"SELECT * FROM " . TABLA_MODELOS_MEDIANOS . " WHERE id=" . $id);
              
                 while($r=mysqli_fetch_assoc($result)){
                
              ?>

                    <form role="form" method='post' action='eliminar_destacados_medianos.php'>
                    
                    ¿Está seguro que desea eliminar el modelo:<strong> <?php echo ($r['marca']); ?> </strong> de destacados medianos? <br><br>

                    <button type="submit" class="btn btn-default" name="btn_si">SI, ELIMINAR</button>
                    <button type="button" class="btn btn-danger" onclick="location.href = 'listar_destacados_medianos.php'">NO, NO ELIMINAR</button>
                    <input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                    </form>
             <?php   }

              } else {

                  
                $query_modificar_eliminar = mysqli_query($conexion,"DELETE FROM " . TABLA_MODELOS_MEDIANOS . " WHERE id=" . $id);
               
                 

                  if(!$query_modificar_eliminar){
                      echo "<div class='alert alert-dismissable alert-danger'>  
                             <strong>Se ha producido un error</strong> <a href='listar_destacados_medianos.php' class='alert-link'>Volver al listado</a>.
                          </div>"; 
                      die ();

                  } else {
                      echo "<div class='alert alert-dismissable alert-success'>
                              <strong>¡El item ha sido eliminado con éxito!</strong> <a href='listar_destacados_medianos.php' class='alert-link'>Volver al listado</a>.
                            </div>";  
                      die ();
                  }
              }

          ?>

          </div>
        </div><!-- /.row -->


        

      </div><!-- /#page-wrapper -->

<?php include_once('footer.php'); ?>
