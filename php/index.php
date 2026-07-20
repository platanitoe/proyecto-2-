<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tienda de Celulares</title>

    <link rel="stylesheet" href="../css/estilos.css">


</head>

<body>

    <div class="contenedor-login">

        <h1>📱 Tienda de Celulares</h1>

        <p>Inicia sesión para acceder a la tienda.</p>

        <form action="login.php" method="POST">

            <input
                type="email"
                name="correo"
                placeholder="Correo electrónico"
                required>

            <input
                type="password"
                name="password"
                placeholder="Contraseña"
                required>

            <button type="submit">
                Iniciar Sesión
            </button>

        </form>

        <br>

        <p>¿No tienes una cuenta?</p>

        <a class="registro" href="html/registro.html">
            Crear Cuenta
        </a>

    </div>

</body>

</html>