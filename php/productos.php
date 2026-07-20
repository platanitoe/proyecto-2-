<?php

include("conexion.php");

$sql = "SELECT * FROM productos";

$resultado = $conexion->query($sql);

?>