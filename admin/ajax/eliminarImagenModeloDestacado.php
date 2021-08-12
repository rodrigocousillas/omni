<?php
require_once("../../config/conexion.php");

$id = (isset($_POST["id"]))?$_POST["id"]:"";
$campo = (isset($_POST["c"]))?$_POST["c"]:"";

if($id!= "" && $campo != ""){
	$query_cat="SELECT ".$campo." as img FROM " . TABLA_MODELOS_HOME . " WHERE id = '".$id."' ORDER BY modelo ASC";                    
	$modelo=mysqli_query($conexion, $query_cat); 
	while ($r_modelo= mysqli_fetch_assoc($modelo)){
    	if($r_modelo['img'] != ""){
    		@unlink("../../img/productos/".$r_modelo['img']);
    	}
  	}
  	$query = "UPDATE " . TABLA_MODELOS_HOME . " SET ".$campo." = '' WHERE id = '".$id."'";
  	mysqli_query($conexion, $query);
}
$data=array();
$data["ok"] = 1;
echo json_encode($data);