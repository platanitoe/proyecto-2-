<?php

session_start();

include("../php/conexion.php");


if($_SESSION['tipo']!="admin"){

header("Location: ../index.php");

exit();

}



$sql="SELECT * FROM productos";


$resultado=mysqli_query($conexion,$sql);


?>


<!DOCTYPE html>

<html>

<head>

<title>Inventario</title>

</head>


<body>


<h1>Inventario</h1>


<a href="agregarProducto.php">
Agregar producto
</a>



<table border="1">


<tr>

<th>ID</th>
<th>Nombre</th>
<th>Precio</th>
<th>Stock</th>
<th>Acciones</th>

</tr>



<?php while($p=mysqli_fetch_assoc($resultado)){ ?>


<tr>


<td>
<?php echo $p['id']; ?>
</td>


<td>
<?php echo $p['nombre']; ?>
</td>


<td>
$<?php echo $p['precio']; ?>
</td>


<td>
<?php echo $p['stock']; ?>
</td>


<td>

<a href="editarProducto.php?id=<?php echo $p['id']; ?>">
Editar
</a>


<a href="eliminarProducto.php?id=<?php echo $p['id']; ?>">
Eliminar
</a>


</td>


</tr>



<?php } ?>


</table>



</body>

</html>