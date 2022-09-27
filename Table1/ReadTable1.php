<?php

// Conexión a la base de datos
try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrolloWeb', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


// Ejecución de la consulta
try {    
    $sql = "SELECT * from tabla1";

    // Creo una sentencia preparada
    $statement=$mbd->prepare("SELECT * from tabla1");

    // Ejecuto la sentencia preparada
    $statement->execute();

    // Obtengo todos los datos en un array
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Desconexión de la base de datos
    $mbd = null;
    
    // Retorno resultados
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($results);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>