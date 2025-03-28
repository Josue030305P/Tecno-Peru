<?php

require_once '../config/Database.php';

class Producto {
  private $conexion;

  public function __construct()  {
    $this->conexion = Database::getConexion();
  }

  public function getAll():array{
    $result = [];

    try {

      $sql = "SELECT * FROM  vs_productos_todos ORDER BY id";
      // Consultas prerparadas (Seguridad, evitar inyecciones SQL)
      $smt = $this->conexion->prepare($sql);
      $smt->execute();

      $result = $smt->fetchAll(PDO::FETCH_ASSOC); 

    }

    
    catch(PDOException $e){
      throw new Exception($e->getMessage());
    
    }
    return $result;

  }

  public function add($params = []):int{
    $rowsAffects = 0;

    try {
      $sql = "INSERT INTO productos(idmarca, tipo, descripcion, precio,garantia,esnuevo) VALUES (?,?,?,?,?,?)";
      $smt = $this->conexion->prepare($sql);
      $smt->execute(array(
       $params["idmarca"],
       $params["tipo"],
       $params["descripcion"],
       $params["precio"],
       $params["garantia"],
       $params["esnuevo"],
      ));

      $rowsAffects =  $smt->rowCount();
    }

    catch(PDOException $e) {
      throw new Exception($e->getMessage());
    }

    return $rowsAffects;


  }

  public function adit():int {

  }

  public function delete():int{ 

  }

  public function getById():array {

  }

}


//$pr = new Producto();

// $registro = [
//   "idmarca" => 1,
//   "tipo" => "Tablet",
//   "descripcion" => "Modelo A7",
//   "precio" => 910,
//   "garantia" => 12,
//   "esnuevo" => "S"
// ];

// $n = $pr->add($registro);

// var_dump($n);