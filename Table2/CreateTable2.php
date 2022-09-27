<?php
$servidor = "localhost";
$usuario = "root";
$contrasenia = "";
$basededatos = "desarrolloWeb";

// Ejecución de la consulta
try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contrasenia);
    // Configurando la información de errores PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //usando Sentencias Preparadas 'Prepared Statement'
    $sentencia = $conexion->prepare ("INSERT INTO tabla2 (codigo, nombre, apellido, fechaNacimiento, correo) VALUES (:codigo, :nombre, :apellido, :fechaNacimiento, :correo)");
    //'bindamos' ó enlazamos los registros con bindParam
    $sentencia -> bindParam(':codigo', $codigo);
    $sentencia -> bindParam(':nombre', $nombre);
    $sentencia -> bindParam(':apellido', $apellido);
    $sentencia -> bindParam(':fechaNacimiento', $fechaNacimiento);
    $sentencia -> bindParam(':correo', $correo);

    //insertando la primera fila
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];  
    $fechaNacimiento = $_POST['fechaNacimiento'];  
    $correo = $_POST['correo'];  

    $sentencia->execute();
    $_POST['codigo'] = $mbd->lastInsertId();
    $sentencia = $mbd->prepare("SELECT * FROM tabla1 WHERE id = ". $_POST['codigo']);
    $sentencia->execute();
    $data = $sentencia->fetch(PDO::FETCH_ASSOC);
    $_POST['data_fk'] = $data;
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