<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>..</title>
</head>
<body>
    <?php
    include"dbNBA.php";
    $nba= new dbNBA();
    if ($nba->getErrorConexion()==true) {
      echo "No hay conexion";
    }
    else {
      if(isset($_POST) && (!empty($_POST))){
        $actualiza=$nba->Actualizar($_POST["Nombre"],$_POST["Ciudad"],$_POST["Conferencia"],$_POST["Division"]);
        ?>

        <center>
          <h2>Correcta actualización</h2>
          <a  href="Index.php">Inicio</a>
          <a  href="listaEquipos.php">Lista de equipos</a>
          <table >
            <tr>
              <th>Nombre</th>
              <th>Ciudad</th>
              <th>Conferencia</th>
              <th>Division</th>
              <th>Actualizar</th>
              <th>Borrar</th>
            </tr>

            <?php
                while ($fila=$actualiza->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$fila["Nombre"]."</td>";
                        echo "<td>".$fila["Ciudad"]."</td>";
                        echo "<td>".$fila["Conferencia"]."</td>";
                        echo "<td>".$fila["Division"]."</td>";

                          /*Actaliza*/
                        echo "<td>"."<a href='Index.php?
                            Nombre=".$fila["Nombre"].
                            "&Ciudad=".$fila["Ciudad"].
                            "&Conferencia=".$fila["Conferencia"].
                            "&Division=".$fila["Division"].
                            "'>Actualiza Registro</a>"."</td>";
                          /* Borra*/
                        echo "<td>"."<a href='borrarDB.php?
                            Nombre=".$fila['Nombre'].
                            "&Ciudad=".$fila['Ciudad'].
                            "&Conferencia=".$fila['Conferencia'].
                            "&Division=".$fila['Division'].
                            "'>Borrar</a>"."</td>";
                        echo "</tr>";
                      }
                  }
                }
        ?>
    </body>
    </html>
