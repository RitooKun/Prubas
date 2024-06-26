<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url;?>Assets/css/estilo_login_register.css">
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-register">
                    <img src="Assets/img/imagen.png" alt="IMEVI">
                </div>
            </div>
    <!-- Formulario de Login-->

            <div class="contenedor__Login">

                <!--Login-->
                <br>
                <form action="" class="formulario__login">

                    <h2>Iniciar sesion</h2>
                    <input type="text" placeholder="Nombre completo" required maxlength="50">
                    <input type="text" placeholder="№ identificacion" required maxlength="12">
                    <input type="email" placeholder="Correo electronico" required maxlength="40">
                    <button>Entrar</button>
                    <button class="btn_registrar">Iniciar sesión</button>
                </form>
            </div>
        </div> 
    </main>
    <script src="responsive.js"></script>
</body>
</html>