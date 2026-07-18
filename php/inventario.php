<?php
include("../proyecto-2-/php/conexionP.php");

$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Gestión de Inventario</h1>

<a href="agregar.php">Agregar Producto</a>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Producto</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>

<?php while($producto = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $producto['id']; ?></td>

<td><?php echo $producto['nombre']; ?></td>

<td><?php echo $producto['descripcion']; ?></td>

<td>$<?php echo $producto['precio']; ?></td>

<td><?php echo $producto['stock']; ?></td>

<td>
<a href="editar.php?id=<?php echo $producto['id']; ?>">Editar</a> |
<a href="eliminar.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>