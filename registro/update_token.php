<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Token</title>
</head>
<body>
    <h2>Actualizar Token de Usuario</h2>
    <form action="update_token.php" method="post">
        <label for="user_id">ID de Usuario:</label>
        <input type="text" id="user_id" name="user_id" required><br><br>
        
        <input type="submit" value="Actualizar Token">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require 'database.php';

        $user_id = $conn->real_escape_string($_POST['user_id']);
        $token = bin2hex(random_bytes(16)); // Generar el token

        $sql = "UPDATE usuarios SET token = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $token, $user_id);

        if ($stmt->execute()) {
            echo "Token actualizado exitosamente para el usuario con ID: " . $user_id;
        } else {
            echo "Error al actualizar el token: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>