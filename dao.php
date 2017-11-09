<?php

$host = "localhost";
$user = "root";
$pswd = "lokosvatos1996";
$db = "nw201703";
$platform = 'mssql';

$conexion = new mysqli($host, $user,$pswd,$db);

if($conexion->errno){
  //die($conexion->error);
  die();
}

function obtenerRegistros($strsql, &$conexion=NULL){
  if(is_null($conexion)){
    GLOBAL $conexion;
  }
  $registros = array();
  $cursor = $conexion->query($strsql);
  foreach($cursor as $registro){
    $registros[]=$registro;
  }
  return $registros;
}
function obtenerUnRegistro($strsql, &$conexion=NULL){
  if(is_null($conexion)){
    GLOBAL $conexion;
  }
  $cursor = $conexion->query($strsql);
  foreach($cursor as $registro){
    return $registro;
  }
  return array();
}
function ejecutarNonQuery($strsql, &$conexion = NULL){
  if(is_null($conexion)){
    GLOBAL $conexion;
  }
  $conexion->query($strsql);
  return $conexion->affected_rows;
}
function obtenerUltimoID(&$conexion = NULL){
  if(is_null($conexion)){
    GLOBAL $conexion;
  }
  return $conexion->insert_id;
}
?>
