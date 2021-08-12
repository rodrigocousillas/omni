<?php
require_once("../../config/conexion.php");

$id = (isset($_POST["id"]))?$_POST["id"]:"";
$campo = (isset($_POST["c"]))?$_POST["c"]:"";

if($id!= "" && $campo != ""){
	$query_cat="SELECT ".$campo." as img FROM " . TABLA_TESTIMONIO . " WHERE id = '".$id."' ORDER BY titulo ASC";                    
	$herraje=mysqli_query($conexion, $query_cat); 
	while ($r_testimonio= mysqli_fetch_assoc($testimonio)){
    	if($r_testimonio['img'] != ""){
    		@unlink("../../img/testimonios/".$r_testimonio['img']);
    	}
  	}
  	$query = "UPDATE " . TABLA_TESTIMONIO . " SET ".$campo." = '' WHERE id = '".$id."'";
  	mysqli_query($conexion, $query);
}
$data=array();
$data["ok"] = 1;
echo json_encode($data);