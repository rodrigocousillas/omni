<?php
require_once("../../config/conexion.php");

$id = (isset($_POST["id"]))?$_POST["id"]:"";
$campo = (isset($_POST["c"]))?$_POST["c"]:"";

if($id!= "" && $campo != ""){
	$query_cat="SELECT ".$campo." as img FROM " . TABLA_CARUSELHOME . " WHERE id = '".$id."' ORDER BY titulo ASC";                    
	$carusel=mysqli_query($conexion, $query_cat); 
	while ($r_herraje= mysqli_fetch_assoc($carusel)){
    	if($r_herraje['img'] != ""){
    		@unlink("../../img/slider_home/".$r_carusel['img']);
    	}
  	}
  	$query = "UPDATE " . TABLA_CARUSELHOME . " SET ".$campo." = '' WHERE id = '".$id."'";
  	mysqli_query($conexion, $query);
}
$data=array();
$data["ok"] = 1;
echo json_encode($data);