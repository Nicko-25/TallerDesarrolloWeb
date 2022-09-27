<?php
// Conexión a la base de datos
try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrolloWeb', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
try {

    $statement = $mbd->prepare("SELECT * FROM tabla1 WHERE id = :id");

    $statement->bindParam(':id', $id);

    $id = $_GET['id'];      
    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_ASSOC);

    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        "datos" => $results        
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

?>