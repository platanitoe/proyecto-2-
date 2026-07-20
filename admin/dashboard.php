<?php

session_start();

include("../php/conexion.php");


if(!isset($_SESSION['tipo']) || $_SESSION['tipo']!="admin"){

    header("Location: ../index.php");
    exit();

}


?>

<!DOCTYPE html>
<html>

<head>

<title>Administrador</title>

<link rel="stylesheet" href="../css/estilos.css">

</head>


<body>


<h1>Panel Administrador</h1>


<h2>
Bienvenido 
<?php echo $_SESSION['nombre']; ?>
</h2>



<div class="contenedor">


<div class="producto">

<h3>Productos</h3>

<a href="productos.php">
Gestionar productos
</a>

</div>



<div class="producto">

<h3>Inventario</h3>

<a href="productos.php">
Ver inventario
</a>

</div>



<div class="producto">

<h3>Pedidos</h3>

<a href="pedidos.php">
Ver pedidos
</a>

</div>


</div>



<a href="../php/cerrarSesion.php">
Cerrar sesión
</a>


</body>

</html>