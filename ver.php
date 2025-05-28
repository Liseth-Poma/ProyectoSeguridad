<?php
$conn = new mysqli("localhost", "root", "", "tarjetas");

$resultado = $conn->query("SELECT * FROM tarjetas");

echo "<h2>Registros Guardados</h2><table border='1'><tr><th>ID</th><th>Tarjeta</th><th>Titular</th><th>Tipo</th><th>Exp</th><th>CVV</th><th>Dirección</th><th>Fecha</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>{$fila['id']}</td>
        <td>{$fila['numero']}</td>
        <td>{$fila['titular']}</td>
        <td>{$fila['tipo']}</td>
        <td>{$fila['exp']}</td>
        <td>{$fila['cvv']}</td>
        <td>{$fila['direccion']}</td>
        <td>{$fila['fecha']}</td>
    </tr>";
}

echo "</table>";
$conn->close();
?>