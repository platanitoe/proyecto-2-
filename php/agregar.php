<?php
include("../proyecto-2-/php/conexionP.php");

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos(nombre,descripcion,precio,stock)
            VALUES('$nombre','$descripcion','$precio','$stock')";

    mysqli_query($conexion,$sql);

    header("Location: inventario.php");
}
?>

<form method="POST">

Nombre:
<input type="text" name="nombre"><br><br>

Descripción:
<input type="text" name="descripcion"><br><br>

Precio:
<input type="number" step="0.01" name="precio"><br><br>

Stock:
<input type="number" name="stock"><br><br>

<input type="submit" name="guardar" value="Guardar">

</form>