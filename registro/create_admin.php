<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Administrador</title>
</head>
<body>
    <h2>Crear Administrador</h2>
    <form action="create_admin.php" method="post">
        <label for="username">Nombre del Administrador:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Crear">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require 'database.php';

        $username = $conn->real_escape_string($_POST['username']);
        $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(16)); // Generar el token

        $sql = "INSERT INTO administrador (username, password, token) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $token);

        if ($stmt->execute()) {
            echo "Usuario creado exitosamente.";
        } else {
            echo "Error al crear el usuario: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>