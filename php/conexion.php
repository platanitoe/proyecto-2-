<?php

$servidor="localhost";
$usuario="root";
$password="";
$bd="tienda";

$conexion=new mysqli($servidor,$usuario,$password,$bd);

if($conexion->connect_error){

die("Error de conexión");

}

?>