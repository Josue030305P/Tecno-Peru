<?php

if (isset($_SERVER['REQUEST_METHOD'])) {
  header('Content-Type:application/json; charset=utf-8');

  require_once '../models/Producto.php';
  $producto = new Producto();

  switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
      echo json_encode($producto->getAll());
      break;

    case 'POST':
        // Los datos llegan del cliente en formato: JSON/XML/TXT
        $input = file_get_contents('php://input'); // Capturar los datos de entrada
        $dataJSON = json_decode($input, true);  
        
        $registro = [
         'idmarca' => htmlspecialchars($dataJSON['idmarca']),
         'tipo' => htmlspecialchars($dataJSON['tipo']),
         'descripcion' => htmlspecialchars($dataJSON['descripcion']),
         'precio' => htmlspecialchars($dataJSON['precio']),
         'garantia' => htmlspecialchars($dataJSON['garantia']),
         'esnuevo' => htmlspecialchars($dataJSON['esnuevo']),
        ];

        $n = $producto->add($registro);
        echo json_encode(["rows" => $n]);

        break;
  }

}
