<?php
include("../proyecto-2-/php/conexionP.php");

$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE id=$id";

mysqli_query($conexion,$sql);

header("Location: inventario.php");
?>