<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrolloWeb', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try {
    $id = $_GET['id'];
    //Realizamos la consulta con el Id que le mandamos mediente la url
    $consulta = $mbd->prepare("SELECT * FROM tabla2 WHERE id = :id");
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    //Retornamos el valor en un arreglo
    $valueTable2 = $consulta->fetch(PDO::FETCH_ASSOC);
    //Teniendo los datos de la tabla 2, comparamos su FK (Codigo) con su valor en la tabla 1
    $consulta = $mbd->prepare("SELECT * FROM tabla1 WHERE codigo = " . $valueTable2['codigo']);
    $consulta->execute();
    //Retornamos el valor en un arreglo
    $valuesTable1 = $consulta->fetch(PDO::FETCH_ASSOC);
    //Creamos un campo dentro de los valores de la tabla 2 (data_fk) para asignarles los valores de la tabla 1
    $valueTable2['data_fk'] = $valuesTable1;
    //Mostramos el resultado 
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        "data" => $valueTable2
    ]);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}
