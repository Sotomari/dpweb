<?php
require_once("../library/conexion.php");
$conexion = new Conexion();
$conexion = $conexion->connect();

$query = "DESCRIBE persona";
$result = $conexion->query($query);
echo "persona table:\n";
while ($row = $result->fetch_assoc()) {
    echo $row['Field'] . " - " . $row['Type'] . "\n";
}

$query2 = "DESCRIBE cliente";
$result2 = $conexion->query($query2);
if ($result2) {
    echo "\ncliente table:\n";
    while ($row = $result2->fetch_assoc()) {
        echo $row['Field'] . " - " . $row['Type'] . "\n";
    }
} else {
    echo "\ncliente table does not exist\n";
}

$query3 = "SELECT * FROM persona WHERE rol = 'Cliente' LIMIT 1";
$result3 = $conexion->query($query3);
if ($result3->num_rows > 0) {
    echo "\nSample client in persona:\n";
    $row = $result3->fetch_assoc();
    print_r($row);
} else {
    echo "\nNo clients in persona\n";
}
?>