<?php
require_once("../../config/conexion.php");

$id_categoria = (isset($_POST["id"]))?$_POST["id"]:"";
$html="<option value='0'>Seleccionar</option>";
$data=array();
if($id_categoria != ""){
	$query_cat="SELECT * FROM " . TABLA_SUBCATEGORIAS . " WHERE id_categoria = '".$id_categoria."' ORDER BY nombre ASC";                    $respuesta_cat=mysqli_query($conexion, $query_cat); 
    if (!$respuesta_cat) {
        die("Error en la consulta"); 
    } else {
      while ($r_cat= mysqli_fetch_assoc($respuesta_cat)){
        $html.="<option value='" . $r_cat['id'] . "'>" . $r_cat['nombre'] . "</option>";
      }
    }
}
$data["opciones"] = $html;
echo json_encode($data);