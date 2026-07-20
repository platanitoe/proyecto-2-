<?php

include("sesiones.php");
include("conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$datos=json_decode(file_get_contents("php://input"),true);

$idUsuario=$_SESSION["id"];

$sql="INSERT INTO compras(id_usuario)

VALUES($idUsuario)";

$conexion->query($sql);

$idCompra=$conexion->insert_id;

foreach($datos as $producto){

$id=$producto["id"];

$cantidad=$producto["cantidad"];

$precio=$producto["precio"];

$sql="INSERT INTO detalle_compra(

id_compra,
id_producto,
cantidad,
precio

)

VALUES(

$idCompra,
$id,
$cantidad,
$precio

)";

$conexion->query($sql);

$conexion->query(

"UPDATE productos

SET stock=stock-$cantidad

WHERE id=$id"

);

}

echo "Compra realizada correctamente.";

exit();

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Carrito</title>

<link rel="stylesheet" href="../css/estilos.css">

</head>

<body onload="mostrarCarrito()">

<h2>Carrito de Compras</h2>

<table>

<thead>

<tr>

<th>Producto</th>

<th>Cantidad</th>

<th>Precio</th>

<th>Subtotal</th>

<th>Acción</th>

</tr>

</thead>

<tbody id="tabla">

</tbody>

</table>

<h2>Total:

<span id="total"></span>

</h2>

<button onclick="comprar()">

Finalizar Compra

</button>

<br><br>

<a href="catalogo.php">

Regresar

</a>

<script src="../js/carrito.js"></script>

</body>

</html>