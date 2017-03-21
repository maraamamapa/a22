<?php

class dbNBA{
  private $IP="localhost";
  private $USUARIO="root";
  private $CONTRASEÑA="";
  private $DB="nba";

  private $conexion;
  private $error=false;


  function __construct(){
    $this->conexion = new mysqli($this->IP, $this->USUARIO, $this->CONTRASEÑA, $this->DB);
    if ($this->conexion->connect_errno){
      $this->error=true;
    }
  }
  public function getErrorConexion(){
    return $this->error;
  }
  public function InsertarEquipos($nombre,$ciudad,$conferencia,$division){
    $sqlInsercion="INSERT INTO equipos(Nombre,Ciudad,Conferencia,Division) Values('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
    $this->conexion->query($sqlInsercion);
    return $this->conexion->query("SELECT * FROM equipos WHERE Nombre='".$nombre."' AND Ciudad='".$ciudad."' AND Conferencia='".$conferencia."' AND Division='".$division."'");
  }
  public function MostrarEquipos(){
    return $this->conexion->query("SELECT * FROM equipos");
  }
  public function DeleteEquipos($nombre){//Eliminar equipo
    $delete="DELETE FROM equipos WHERE Nombre='".$nombre."'";
    $this->conexion->query($delete);
  }
  public function Actualizar($nombre,$ciudad,$conferencia,$division){//Actualizar equipo
    $update="UPDATE equipos SET Nombre='".$nombre."',Ciudad='".$ciudad."',Conferencia='".$conferencia."',Division='".$division."' WHERE Nombre='".$nombre."'";
    $this->conexion->query($update);
    return $this->conexion->query("SELECT * FROM equipos WHERE Nombre='".$nombre."' AND Ciudad='".$ciudad."' AND Conferencia='".$conferencia."' AND Division='".$division."'");
  }
}
