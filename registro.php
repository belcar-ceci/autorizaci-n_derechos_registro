<?php

$nombre = isset($_POST['txt_nombre']) ? $_POST['txt_nombre'] : '';
$apellidos = isset($_POST['txt_apellido']) ? $_POST['txt_apellido'] : '';
$dni = isset($_POST['txt_dni']) ? $_POST['txt_dni'] : '';
$autorizo = isset($_POST['txt_autoritzo']) ? $_POST['txt_autoritzo'] : '';
$no_autorizo = isset($_POST['txt_noAutoritzo']) ? $_POST['txt_noAutoritzo'] : '';

try {
    $conexion = new PDO("mysql:host=localhost;port=8889;dbname=prueba", "root", "root");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO registro_autorizacion(nombre, apellidos, dni, autorizo, no_autorizo) VALUES(?, ?, ?, ?, ?)');
    $pdo->bindParam(1, $nombre);
    $pdo->bindParam(2, $apellidos);
    $pdo->bindParam(3, $dni);
    $pdo->bindParam(4, $autorizo);
    $pdo->bindParam(5, $no_autorizo);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch (PDOException $error) {
    echo $error->getMessage();
    die();
}
