<?php

include("sesiones.php");
include("conexion.php");

if($_SESSION["tipo"]=="admin"){

$sql="SELECT

compras.id,
usuarios.nombre,
productos.nombre AS producto,
detalle_compra.cantidad,
detalle_compra.precio,
compras.fecha

FROM compras

INNER JOIN usuarios

ON compras.id_usuario=usuarios.id

INNER JOIN detalle_compra

ON compras.id=detalle_compra.id_compra

INNER JOIN productos

ON detalle_compra.id_producto=productos.id";

}else{

$id=$_SESSION["id"];

$sql="SELECT

compras.id,
productos.nombre AS producto,
detalle_compra.cantidad,
detalle_compra.precio,
compras.fecha

FROM compras

INNER JOIN detalle_compra

ON compras.id=detalle_compra.id_compra

INNER JOIN productos

ON detalle_compra.id_producto=productos.id

WHERE compras.id_usuario=$id";

}

$resultado=$conexion->query($sql);

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Historial</title>

<link rel="stylesheet" href="../css/estilos.css">

</head>

<body>

<h1>Historial de Compras</h1>

<table>

<tr>

<th>Compra</th>

<?php

if($_SESSION["tipo"]=="admin"){

echo "<th>Usuario</th>";

}

?>

<th>Producto</th>

<th>Cantidad</th>

<th>Precio</th>

<th>Fecha</th>

</tr>

<?php

while($fila=$resultado->fetch_assoc()){

?>

<tr>

<td><?php echo $fila["id"]; ?></td>

<?php

if($_SESSION["tipo"]=="admin"){

echo "<td>".$fila["nombre"]."</td>";

}

?>

<td><?php echo $fila["producto"]; ?></td>

<td><?php echo $fila["cantidad"]; ?></td>

<td>$<?php echo $fila["precio"]; ?></td>

<td><?php echo $fila["fecha"]; ?></td>

</tr>

<?php

}

?>

</table>

<br>

<?php

if($_SESSION["tipo"]=="admin"){

?>

<a href="../admin/dashboard.php">

Volver

</a>

<?php

}else{

?>

<a href="catalogo.php">

Volver

</a>

<?php

}

?>

</body>

</html>