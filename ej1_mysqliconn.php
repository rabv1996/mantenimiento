<?php
require_once('logs.model.php');

  $id = 0;

    if(isset($_POST["btnEnviar"])){

      $nom = $_POST["nombre"];
      $ape = $_POST["apellido"];
      $ed = $_POST["edad"];
      $nota = $_POST["notaparcial"];
      $id = agregarLog($nom, $ape, $ed, $nota);

    }// end btnEnviar


  if(isset($_POST["btnAprobar"])){
    actualizarLog($_POST["codigo"]);
  }
  if(isset($_POST["btnEliminar"])){
    eliminarLog($_POST["codigo"]);
  }

  if(isset($_POST["btnReprobar"])){
    actualizarLog2($_POST["codigo"]);
  }


  $logs = obtenerLogs() //obtenerRegistros($sqlqry);


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conexiones con MYSQL</title>
  </head>
  <body>
    <table border="1"><tr>
      <?php
      $row = 0;
      foreach($logs as $log){
        if($row===0){
            foreach($log as $colname => $colval){
        ?>
            <th>
              <?php  echo $colname; ?>
            </th>
      <?php
                } // end for colname
                echo '<th>Acciones</th></tr>';
              } // end if
      ?>

      <tr>
          <?php
          $colnum = 0;
          $codigo = 0;
          foreach($log as $col){ ?>
            <td>
              <?php if($colnum==0) {
                        $codigo = $col;
                        $colnum=1;
                      }
                      echo $col;
                ?>
            </td>
          <?php } //end foreach log?>
          <td>
            <form action="ej1_mysqliconn.php" method="post">
              <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" />
              <input type="submit" value="Aprobado" name="btnAprobar" />
              <input type="submit" value="Reprobado" name="btnReprobar" />
              <input type="submit" value="Eliminar" name="btnEliminar" />
            <form>
              </form>
          </td>
      </tr>
    <?php
          $row ++;
          } //end foreach logs
      ?>
    </table>
    <form action="ej1_mysqliconn.php" method="post">
      <textarea name="nombre" placeholder="nombre"></textarea>
      <textarea name="apellido" placeholder="apellido"></textarea>
      <textarea name="edad" placeholder="edad"></textarea>
      <textarea name="notaparcial" placeholder="notaParcial"></textarea>
      <input type="submit" value="Enviar" name="btnEnviar"  />
    </form>
    <div>
      <?php echo $id; ?>
    </div>
  </body>
</html>
