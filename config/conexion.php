<?php
session_start();

class Conectar{
  protected $dbh;

  protected function Conexion(){
    try {
      $conectar = $this->dbh=new PDO("mysql:host=localhost; dbname=sistema_bodega", "root", "root");
      return $conectar;
    } catch (Exception $e) {
      print "Error Conexion BD". $e->getMessage() ."<br/>";
      die();
    }
  }

  public static function ruta(){
    return "http://localhost:3000/";
  }
}
?>