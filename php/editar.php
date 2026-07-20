<?php

include("../php/conexion.php");


$id=$_GET['id'];



$producto=mysqli_fetch_assoc(

mysqli_query($conexion,

"SELECT * FROM productos WHERE id=$id")

);



if(isset($_POST['actualizar'])){


$nombre=$_POST['nombre'];

$precio=$_POST['precio'];

$stock=$_POST['stock'];



mysqli_query($conexion,
"UPDATE productos SET

nombre='$nombre',

precio='$precio',

stock='$stock'

WHERE id=$id");



header("Location: productos.php");


}



?>


<h1>Editar producto</h1>


<form method="POST">


Nombre:

<input name="nombre"
value="<?php echo $producto['nombre']; ?>">


<br>


Precio:

<input name="precio"
value="<?php echo $producto['precio']; ?>">


<br>


Stock:

<input name="stock"
value="<?php echo $producto['stock']; ?>">


<br>


<button name="actualizar">

Actualizar

</button>


</form>