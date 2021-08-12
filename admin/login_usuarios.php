<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema administrador</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>
    <div class="container">
	
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel">
					<div class="panel-body"><br />
              
	               
	                <?php

          require_once("../config/conexion.php");

          if(isset($_POST['btn_ingresar'])){
      
            $nombre=limpiarCadena($_REQUEST['nombre']);
            $clave=sha1($_REQUEST['clave']);

            $registro=mysqli_query($conexion, "SELECT * FROM  " . TABLA_USUARIOS . "  WHERE usuario_user='$nombre' AND usuario_pass='$clave'") or die('Error:'.mysqli_error($conexion));

                
                if ($reg=mysqli_fetch_array($registro)){
                    $_SESSION['nombre_usuario']=$reg['name'];
                    $_SESSION['id']=$reg['id'];
                    
                  
                   echo "<div class='alert alert-dismissable alert-success col-lg-12'>  
                          Bienvenido: <strong>" . $_SESSION['nombre_usuario'] . " </strong> <br>
                          <button type='button' class='btn btn-success' onclick='goIndex()'>Ingresar</button>
                        </div><div class='clearfix'></div>"; 

							echo  "<script>
							  function goIndex() {
								window.location.href = 'index.php'; 
							  }
							  </script>";
                          die();

                } else {
                    echo "<div class='alert alert-dismissable alert-danger col-lg-12'>  
                              <strong>Usted no esta autorizado a ingresar al sitio</strong> <br>
                          </div><div class='clearfix'></div>"; 
                }
            }

        ?>
	                <br>

					<form action="login_usuarios.php" method="post" id="registro" >
						
						<div class="form-group">
		                	<label for="nombre">Usuario</label>
		                	<input class="form-control" id="nombre" name="nombre" type="text" required>
		              	</div>

					  	<div class="form-group">
		                	<label for="clave">Contraseña</label>
		                	<input class="form-control" id="clave" name="clave" type="password" required>
		              	</div>

					  	<br>

					 	<button name="btn_ingresar" type="submit" class="btn btn-default">Ingresar</button>
					  
					</form>
	              </div> <!-- Panel body-->
	            </div> <!-- Panel panel-default -->            
	          </div>
	        
	        </div><!-- /.row -->
 
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

    

  </body>
</html>


