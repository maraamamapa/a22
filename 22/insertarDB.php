<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Equipo Insertado</title>
</head>
<body>
  <a  href="Index.php">Inicio</a>
  <a  href="listaEquipos.php">Lista de equipos</a>

    <?php
    include"dbNBA.php";
    $nba= new dbNBA();
    if ($nba->getErrorConexion()==true) {
      echo "No hay conexion";
    }
    else {
      if(isset($_POST) && (!empty($_POST))){
        $insertar=$nba->InsertarEquipos($_POST["Nombre"],$_POST["Ciudad"],$_POST["Conferencia"],$_POST["Division"]);
        ?>
        <center>
          <table border="1">
            <tr>
              <th>Nombre</th>
              <th>Ciudad</th>
              <th>Conferencia</th>
              <th>Division</th>
              <th>Actualizar</th>
              <th>Borrar</th>
            </tr>

            <?php
            while ($fila=$insertar->fetch_assoc()) {
                  echo "<tr>";
                  /*Muestra los datos que has añadido, en este caso, el equipo y sus características*/
                echo "<td>".$fila["Nombre"]."</td>";
                echo "<td>".$fila["Ciudad"]."</td>";
                echo "<td>".$fila["Conferencia"]."</td>";
                echo "<td>".$fila["Division"]."</td>";
                  /*Actualizar */
                echo "<td>"."<a href='Index.php?
                  Nombre=".$fila["Nombre"].
                  "&Ciudad=".$fila["Ciudad"].
                  "&Conferencia=".$fila["Conferencia"].
                  "&Division=".$fila["Division"].
                  "'>Actualizar</a>"."</td>";
                  /*Borrar */
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
