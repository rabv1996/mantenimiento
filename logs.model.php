<?php
  require_once('dao.php');

  function obtenerLogs(){
    $alumnos = array();
    $sqlqry  = "SELECT * from alumnos;";
    $alumnos = obtenerRegistros($sqlqry);
    return $alumnos;
  }

  function agregarLog($nom, $ape, $ed, $nota){
    $insertSql = "Insert into alumnos(nomAlumno, apeAlumno, edadAlumno, notaParcial, estadoAlumno) value ('%s','%s', '%s', '%s', '')";
    $rslt = ejecutarNonQuery(sprintf($insertSql,$nom, $ape, $ed, $nota));
    if($rslt) return obtenerUltimoID();
    return 0;
  }

  function actualizarLog($codigo){
      $upstr = "update alumnos set estadoAlumno = 'APROBADO' where idAlumnos = %d;";
      $rlst = ejecutarNonQuery(sprintf($upstr,$codigo));
      return $rlst && true;
  }

  function actualizarLog2($codigo){
      $upstr = "update alumnos set estadoAlumno = 'REPROBADO' where idAlumnos = %d;";
      $rlst = ejecutarNonQuery(sprintf($upstr,$codigo));
      return $rlst && true;
  }
  /*function reemplazarLog(){

  }*/

  function eliminarLog($codigo){
        $strdelete = "delete from alumnos where idAlumnos=%d;";
        $rlst = ejecutarNonQuery(sprintf($strdelete,$codigo));
        return $rlst && true;
  }
?>
