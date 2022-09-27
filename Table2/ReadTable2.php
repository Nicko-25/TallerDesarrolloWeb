<?php 

try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrolloWeb', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try {

    $consulta = $mbd->prepare("SELECT * FROM tabla2");
    $consulta->execute();
    $valuesTable2 = $consulta->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < count($valuesTable2); $i++) {
        $consulta = $mbd->prepare("SELECT * FROM tabla1 where codigo = ". $valuesTable2[$i]['codigo']);
        $consulta->execute();
        $valuesTable1 = $consulta->fetch(PDO::FETCH_ASSOC);
        $valuesTable2[$i]['data_fk'] = $valuesTable1;
    }

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($valuesTable2);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}