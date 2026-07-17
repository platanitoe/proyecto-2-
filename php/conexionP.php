<?php

$conexion = mysqli_connect("localhost","root","","proyecto");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

echo "Conexión exitosa";
?>