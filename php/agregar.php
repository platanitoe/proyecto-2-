<?php

include("../php/conexion.php");


if(isset($_POST['guardar'])){


$nombre=$_POST['nombre'];

$descripcion=$_POST['descripcion'];

$precio=$_POST['precio'];

$stock=$_POST['stock'];



$sql="INSERT INTO productos
(nombre,descripcion,precio,stock)

VALUES

('$nombre','$descripcion','$precio','$stock')";


mysqli_query($conexion,$sql);



header("Location: productos.php");


}



?>


<h1>Agregar producto</h1>


<form method="POST">


Nombre:

<input name="nombre">


<br>


Descripción:

<input name="descripcion">


<br>


Precio:

<input name="precio">


<br>


Stock:

<input name="stock">


<br>


<button name="guardar">

Guardar

</button>


</form>