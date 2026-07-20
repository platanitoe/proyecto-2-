<?php

include("../php/sesiones.php");

if($_SESSION["tipo"]!="admin"){
    header("Location:../php/catalogo.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Administrador</title>
<link rel="stylesheet" href="../css/estilos.css">

</head>

<body>

<header>

<h1>Panel del Administrador</h1>

<p>Bienvenido <?php echo $_SESSION["nombre"]; ?></p>

<nav>

<a href="inventario.php">Inventario</a>

<a href="../php/historial.php">Historial</a>

<a href="../php/cerrar_sesion.php">Cerrar Sesión</a>

</nav>

</header>

<div class="panel">

<div class="card">

<h2>Inventario</h2>

<p>Agregar, editar y eliminar productos.</p>

<a href="inventario.php">

<button>Entrar</button>

</a>

</div>

<div class="card">

<h2>Historial</h2>

<p>Consultar compras realizadas.</p>

<a href="../php/historial.php">

<button>Ver</button>

</a>

</div>

</div>

</body>

</html>