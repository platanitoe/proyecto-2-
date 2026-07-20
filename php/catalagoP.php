<?php

include("../proyecto-2-/php/conexionP.php");

$sql = "SELECT * FROM productos";

$resultado = mysqli_query($conexion,$sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Catálogo</title>

<link rel="stylesheet" href="../css/estilos.css">

</head>


<body>

<h1>Catálogo de Productos</h1>


<div class="contenedor">


<?php while($producto=mysqli_fetch_assoc($resultado)){ ?>


<div class="producto">


<h2>
<?php echo $producto['nombre']; ?>
</h2>


<p>
<?php echo $producto['descripcion']; ?>
</p>


<h3>
$<?php echo $producto['precio']; ?>
</h3>


<p>
Stock disponible:
<?php echo $producto['stock']; ?>
</p>



<button onclick="agregar(
<?php echo $producto['id']; ?>,
'<?php echo $producto['nombre']; ?>',
<?php echo $producto['precio']; ?>
)">
Agregar al carrito
</button>


</div>


<?php } ?>


</div>


<script src="carrito.js"></script>


</body>

</html>