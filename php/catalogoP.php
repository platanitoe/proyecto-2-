<?php

session_start();


if(!isset($_SESSION['usuario'])){

    header("Location: ../html/login.html");
    exit();

}


include("conexion.php");


$sql = "SELECT * FROM productos";

$resultado = mysqli_query($conexion,$sql);


?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Catálogo</title>

<link rel="stylesheet" href="../css/estilosP.css">

</head>


<body>


<center>

<h1>Catálogo de Productos</h1>


<h3>
Bienvenido:
<?php echo $_SESSION['nombre']; ?>
</h3>


</center>



<div class="contenedor">


<?php while($producto = mysqli_fetch_assoc($resultado)){ ?>


<div class="producto">


<h2>
<?php echo htmlspecialchars($producto['nombre']); ?>
</h2>



<p>
<?php echo htmlspecialchars($producto['descripcion']); ?>
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
'<?php echo htmlspecialchars($producto['nombre']); ?>',
<?php echo $producto['precio']; ?>
)">
Agregar al carrito
</button>



</div>


<?php } ?>


</div>


<br>


<center>


<a href="carrito.php">

<button>
 Ver carrito
</button>

</a>



<a href="historial.php">

<button>
 Mis compras
</button>

</a>



<a href="cerrar_sesion.php">

<button>
 Cerrar sesión
</button>

</a>


</center>




<script src="../js/carrito.js"></script>


</body>

</html>