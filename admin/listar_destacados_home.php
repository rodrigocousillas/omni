<?php include_once('header.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Modelos<small> Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-bullhorn"></i> Modelos Home</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <button type="button" class="btn btn-success" onclick="location.href = 'abm_destacados_modelos.php?action=2'"> Agregar </button> <br><br>

        <?php
              $query="SELECT * FROM " . TABLA_MODELOS_HOME . " ORDER BY id DESC";
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
                   
                    <th>ID Modelo <i class="fa fa-sort"></i></th>
                    <th>Marca (Solo Referencia) <i class="fa fa-sort"></i></th>
                    <th>Orden <i class="fa fa-sort"></i></th>
                    <th>Imagen</th>
                    <th width="100">Modificar</th>
                    <th width="100">Eliminar</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  while($r=mysqli_fetch_assoc($respuesta)){ 
                    $id=($r['id']);
                    $modelo=($r['modelo']);
                    $marca=($r['marca']);
                    $orden=($r['orden']);
                    $imagen=($r['imagen']);  
                  ?>
                  <tr>
                          
                    <td> <?php echo $modelo; ?> </td>
                    <td> <?php echo $marca; ?> </td>
                    <td> <?php echo $orden; ?> </td>
                    <?php if($imagen != "") { ?>
                      <td> <img src="../img/productos/<?php echo $imagen; ?>" width="200px;"></td>
                    <?php } else { ?>
                      <td> </td>
                    <?php } ?>
                  
                    <td> <button type="button" class="btn btn-primary" onclick="location.href = 'abm_destacados_modelos.php?action=3&id=<?php echo $r['id'] ?>'"> Modificar </button> </td>
                    <td> <button type="button" class="btn btn-danger" onclick="location.href = 'eliminar_destacados_home.php?id=<?php echo $r['id'] ?>'"> Eliminar </button> </td>
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
