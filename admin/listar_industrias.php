<?php include_once('header.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Industrias <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-bullhorn"></i> Industrias</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <button type="button" class="btn btn-success" onclick="location.href = 'abm_industrias.php?action=2'"> Agregar </button> <br><br>

        <?php
              $query="SELECT * FROM " . TABLA_INDUSTRIAS . " ORDER BY id DESC";
              //$respuesta=mysql_query($query);
              $respuesta=mysqli_query($conexion, $query);    

            // si hay un error en la conexión
            if(!$respuesta) {
              echo "<div class='alert alert-dismissable alert-danger'>
                    <strong>Se produjo un error.</strong> <a href='index.php' class='alert-link'>Por favor vuelva a intentarlo más tarde</a>.
                    </div>";
              echo mysqli_error();
            } else {

            // Chequeo si hay resultados
            $total = mysqli_num_rows($respuesta);
            
            if($total==0){
                echo "<div class='alert alert-dismissable alert-warning'>
                <h4>Atención</h4>
                <p>No hay resultados cargados en esta sección</p>
                </div>";
            } else {

        ?>
        <div class="row">
          <div class="col-lg-12">
            <h2>Listar <small><?php echo "(" . $total . ")"; ?></small></h2>
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th>ID <i class="fa fa-sort"></i></th>
                    
                    <th>Industria</i></th>
                    <th width="100"></th>
                    <th width="100"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  while($r=mysqli_fetch_assoc($respuesta)){ 
                    $id=($r['id']);
                    $nombre=($r['nombre']);
                     
                  ?>
                  <tr>                    
                    <td><?php echo $id; ?></td>
                    <td> <?php echo $nombre; ?> </td>
                  
                                  
                    <td> <button type="button" class="btn btn-primary" onclick="location.href = 'abm_industrias.php?action=3&id=<?php echo $r['id'] ?>'"> Modificar </button> </td>
                    <td> <button type="button" class="btn btn-danger" onclick="location.href = 'eliminar_industrias.php?id=<?php echo $r['id'] ?>'"> Eliminar </button> </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->

        <?php } } ?>

      </div><!-- /#page-wrapper -->

<?php include_once('footer.php'); ?>
