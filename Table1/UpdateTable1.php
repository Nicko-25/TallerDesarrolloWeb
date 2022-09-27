<?php

// Conexión a la base de datos
try {
  $mbd = new PDO('mysql:host=localhost;dbname=desarrolloWeb', 'root', '');
} catch (PDOException $e) {
  print "¡Error!: " . $e->getMessage() . "<br/>";
  die();
}


$id = $_GET['id'];
$sentencia = $mbd->prepare("UPDATE tabla1 SET nombre = :nombre, ciudad = :ciudad,
     telefono = :telefono, codigo = :codigo WHERE id = :id");
$sentencia->bindParam(':id', $id);
//insertando la primera fila
$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
$codigo = $_POST['codigo'];

//'bindamos' ó enlazamos los registros con bindParam
$sentencia->bindValue(':nombre', $nombre);
$sentencia->bindValue(':ciudad', $ciudad);
$sentencia->bindValue(':telefono', $telefono);
$sentencia->bindValue(':codigo', $codigo);
// mostrando el mensaje de # de registros actualizados satisfactoriamente
header('Content-type:application/json;charset=utf-8');
echo json_encode([
  "mensaje" =>  $sentencia->rowCount() . " Registros actualizado satisfactoriamente",
  "data" => [$_POST]
]);
