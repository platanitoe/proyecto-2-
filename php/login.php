<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include("conexion.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $correo = $_POST["correo"];
    $password = $_POST["password"];


    $conexion = new mysqli("localhost", "root", "", "proyecto");


    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";


    $resultado = $conexion->query($sql);



    if ($resultado->num_rows > 0) {


        $usuario = $resultado->fetch_assoc();



        if (password_verify($password, $usuario["password"])) {


            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["tipo"] = $usuario["tipo"];
            $_SESSION["usuario"] = $correo;



            if ($usuario["tipo"] == "admin") {


                header("Location: ../admin/dashboard.php");
                exit();


            } else {


                header("Location: catalogoP.php");
                exit();


            }



        } else {


            echo "
            <script>
            alert('Contraseña incorrecta');
            window.location='../index.php';
            </script>";


        }



    } else {


        echo "
        <script>
        alert('Usuario no encontrado');
        window.location='../index.php';
        </script>";


    }



} else {


    header("Location: ../index.php");
    exit();


}


?>