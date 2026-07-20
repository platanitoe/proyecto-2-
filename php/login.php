<?php

session_start();

include("conexion.php");

$correo=$_POST["correo"];

$password=$_POST["password"];

$sql="SELECT * FROM usuarios

WHERE correo='$correo'";

$resultado=$conexion->query($sql);

if($resultado->num_rows>0){

$usuario=$resultado->fetch_assoc();

if(password_verify($password,$usuario["password"])){

$_SESSION["id"]=$usuario["id"];

$_SESSION["nombre"]=$usuario["nombre"];

$_SESSION["tipo"]=$usuario["tipo"];

if($usuario["tipo"]=="admin"){

header("Location:../admin/dashboard.php");

}else{

header("Location:catalogo.php");

}

}else{

echo "Contrasena incorrecta";

}

}else{

echo "Usuario no encontrado";

}

?>