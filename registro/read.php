<?php
require 'database.php';

$sql = "SELECT id, username, reg_date FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Usuarios</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Nombre de usuario</th><th>Fecha de registro</th><th>Acciones</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . "</td><td>" . $row["reg_date"] . "</td><td><a href='update.php?id=" . $row["id"] . "'>Editar</a> | <a href='delete.php?id=" . $row["id"] . "'>Eliminar</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay usuarios registrados.";
}

$conn->close();
?>