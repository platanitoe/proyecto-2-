<?php

include("../php/sesiones.php");
include("../php/conexion.php");

if($_SESSION["tipo"]!="admin"){
    header("Location:../php/catalogo.php");
    exit();
}

/* Agregar producto */

if(isset($_POST["agregar"])){

$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$precio=$_POST["precio"];
$stock=$_POST["stock"];

$sql="INSERT INTO productos(nombre,descripcion,precio,stock)

VALUES('$nombre','$descripcion','$precio','$stock')";

$conexion->query($sql);

}

/* Eliminar */

if(isset($_GET["eliminar"])){

$id=$_GET["eliminar"];

$conexion->query("DELETE FROM productos WHERE id=$id");

}

$resultado=$conexion->query("SELECT * FROM productos");

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Inventario</title>

<link rel="stylesheet" href="../css/estilos.css">

</head>

<body>

<h1>Inventario</h1>

<form method="POST">

<input
type="text"
name="nombre"
placeholder="Nombre"
required>

<input
type="text"
name="descripcion"
placeholder="Descripción"
required>

<input
type="number"
name="precio"
placeholder="Precio"
required>

<input
type="number"
name="stock"
placeholder="Stock"
required>

<button
name="agregar">

Agregar Producto

</button>

</form>

<br>

<table>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Precio</th>

<th>Stock</th>

<th>Acción</th>

</tr>

<?php

while($fila=$resultado->fetch_assoc()){

?>

<tr>

<td><?php echo $fila["id"]; ?></td>

<td><?php echo $fila["nombre"]; ?></td>

<td>$<?php echo $fila["precio"]; ?></td>

<td><?php echo $fila["stock"]; ?></td>

<td>

<a href="?eliminar=<?php echo $fila["id"]; ?>">

<button>

Eliminar

</button>

</a>

</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="dashboard.php">

Regresar

</a>

</body>

</html>