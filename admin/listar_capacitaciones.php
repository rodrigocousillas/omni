<?php include_once('header.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Capacitaciones <small>Sistema Administrador</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-bullhorn"></i> Capacitaciones</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <button type="button" class="btn btn-success" onclick="location.href = 'abm_capacitaciones.php?action=2'"> Agregar </button> <br><br>

        <?php
              $query="SELECT h.* FROM " . TABLA_CAPACITACIONES . " h 
                      ORDER BY h.id DESC";
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
                    <th>Título <i class="fa fa-sort"></i></th>
                    <th>Marca <i class="fa fa-sort"></i></th>
                    <th>Orden <i class="fa fa-sort"></i></th>
                    <th>Habilitado <i class="fa fa-sort"></i></th>
                    <th width="100"></th>
                    <th width="100"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  while($r=mysqli_fetch_assoc($respuesta)){ 
                    $id=($r['id']);
                    $titulo=($r['titulo']);
					          $marca=($r['marca']);
                    $orden=($r['orden']);
                   
                    $imagen=($r['imagen']); 
                    $habilitado=($r['habilitado']); 
                    if($habilitado == 1) $habilitado="SI"; else $habilitado = "NO";
                  ?>
                  <tr>                    
                    <td> <?php echo $titulo; ?> </td>
                   
                    <td> <?php echo $marca; ?> </td>
                    <td> <?php echo $orden; ?> </td>
                    <td> <?php echo $habilitado; ?> </td>
                    <?php if($imagen != "") { ?>
                      <td> <a href="../img/capacitaciones/<?php echo $imagen; ?>" target="blank"><i class="fa fa-camera"></a></td>
                    <?php } else { ?>
                      <td> </td>
                    <?php } ?>
                    
                    <td> <button type="button" class="btn btn-primary" onclick="location.href = 'abm_capacitaciones.php?action=3&id=<?php echo $r['id'] ?>'"> Modificar </button> </td>
                    <td> <button type="button" class="btn btn-danger" onclick="location.href = 'eliminar_capacitaciones.php?id=<?php echo $r['id'] ?>'"> Eliminar </button> </td>
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
