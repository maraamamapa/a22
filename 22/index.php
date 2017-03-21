<?php
include"dbNBA.php";

$nba= new dbNBA();
?>  <!DOCTYPE html>  <htm
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    legend{
      font-family: verdana;
    font-size: 17px;
    }
    h3{
    font-size: 25px;
    }
    </style>
  </head>
  <body>
      <?php
      if (empty($_GET)) {
      ?>
      <center>
      <h1> Base de Datos -NBA</h1>
      <a class="active" href="Index.php">Inicio</a>
      <a href="listaEquipos.php">Lista de equipos</a>
      </center>

      <fieldset>
      <legend>INSERTA UN NUEVO EQUIPO</legend>
        <form action="insertarDB.php" method="post">
          <input type="hidden" value="input" name="tipo" />

          <label>Nombre:</label><br>
          <input type="text" name="Nombre" value=""><br>

          <label>Ciudad:</label><br>
          <input type="text" name="Ciudad" value=""><br>

          <label>Conferencia: </label><br>
          <input type="text" name="Conferencia" value=""><br>

          <label>Division:</label><br>
          <input type="text" name="Division" value=""><br>
          <br>
          <input type="submit" value="Añadir equipo">
        </form>
        </fieldset>
      <?php
      }
       ?>
        <?php
        if (!empty($_GET)) {
        ?>
      <fieldset>
      <legend>Busqueda y Inserccion de Equipos</legend>
        <form action="actualizarDB.php" method="post">
          <input type="hidden" value="input" name="tipo" />
          <label>Nombre:</label><br>
          <input type="text" name="Nombre" value="<?=$_GET['Nombre'];?>" readonly="readonly"><br>
          <label>Ciudad:</label><br>
          <input type="text" name="Ciudad" value="<?=$_GET["Ciudad"]?>"><br>
          <label>Conferencia:</label><br>
          <input type="text" name="Conferencia" value="<?=$_GET["Conferencia"]?>"><br>
          <label>Division:</label><br>
          <input type="text" name="Division" value="<?=$_GET["Division"]?>"><br>
          <br>
          <input type="submit" value="Actualizar">
        </form>
      </fieldset>
        <?php
        }
        ?>

    </section>
</body>
</html>
