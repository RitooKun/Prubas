<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT username, email FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($username, $email);
    $stmt->fetch();
    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);

    $sql = "UPDATE usuarios SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $id);

    if ($stmt->execute()) {
        echo "Usuario actualizado exitosamente.";
    } else {
        echo "Error al actualizar el usuario: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo "Solicitud inválida.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
</head>
<body>
    <h2>Actualizar Usuario</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>