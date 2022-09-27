<?php
// Conexión a la base de datos
try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrolloWeb', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try {
    //usando Sentencias Preparadas 'Prepared Statement'
    $sentencia = $conexion->prepare ("INSERT INTO tabla1 (nombre, ciudad, telefono, codigo) VALUES (:nombre, :ciudad, :telefono, :codigo)");
    //'bindamos' ó enlazamos los registros con bindParam
    $sentencia -> bindParam(':nombre', $nombre);
    $sentencia -> bindParam(':ciudad', $ciudad);
    $sentencia -> bindParam(':telefono', $telefono);
    $sentencia -> bindParam(':codigo', $codigo);

    //insertando la primera fila
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];  
    $codigo = $_POST['codigo'];  

    $sentencia->execute();
    $_POST['codigo'] = $mbd->lastInsertId();
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($_POST);
}
//para un try tiene que existir un catch que atrapa las exceptions
catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}

$conexion = null;
?>