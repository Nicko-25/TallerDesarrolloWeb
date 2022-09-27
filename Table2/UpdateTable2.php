<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrolloWeb', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try {
    $id = $_GET['id'];
    $sentencia = $mbd->prepare("UPDATE tabla2 SET codigo = :codigo, nombre = :nombre,
     apellido = :apellido, fechaNacimiento = :fechaNacimiento, correo = :correo WHERE id = :id");
    $sentencia->bindParam(':id', $id);

    //insertando la primera fila
   $codigo = $_POST['codigo'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];  
   $fechaNacimiento = $_POST['fechaNacimiento'];  
   $correo = $_POST['correo'];  
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}
