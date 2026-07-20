<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Registro</title>

<link rel="stylesheet" href="../css/estilos.css">

</head>

<body>

<div class="contenedor-login">

<h2>Crear Cuenta</h2>

<form action="../php/registro.php" method="POST">

<input
type="text"
name="nombre"
placeholder="Nombre"
required>

<input
type="email"
name="correo"
placeholder="Correo"
required>

<input
type="password"
name="password"
placeholder="Contrasena"
required>

<button>

Registrarse

</button>

</form>

<br>

<a href="../index.php">

Volver

</a>

</div>

</body>

</html>