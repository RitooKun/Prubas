<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Presentación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Tarjeta de Presentación</h1>
        <form id="businessCardForm">
            <label for="name">Nombre:</label>
            <input type="text" id="name" required><br>

            <label for="position">Cargo:</label>
            <input type="text" id="position" required><br>

            <label for="location">Sede:</label>
            <input type="text" id="location" required><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" required><br>

            <button type="submit">Crear Tarjeta</button>
        </form>

        <div id="businessCardContainer" style="display: none;">
            <h2>Tu Tarjeta de Presentación</h2>
            <div id="qrCode"></div>
            <div id="businessCard"></div>
        </div>
    </div>

    <!-- Incluir la librería QRCode.js desde un CDN -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script defer src="script.js"></script>
</body>
</html>