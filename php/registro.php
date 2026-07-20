<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);
    $conexion = new mysqli("localhost", "root", "", "proyecto");

    // Verificar si el correo ya existe
    $consulta = "SELECT id FROM usuarios WHERE correo='$correo'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {

        echo "<script>
                alert('El correo ya está registrado');
                window.location='../html/registro.html';
              </script>";
        exit();

    }

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Guardar usuario
    $sql = "INSERT INTO usuarios(nombre, correo, password, tipo)
            VALUES('$nombre', '$correo', '$passwordHash', 'usuario')";

    if ($conexion->query($sql)) {

        echo "<script>
                alert('Usuario registrado correctamente');
                window.location='../index.php';
              </script>";

    } else {

        echo "Error al registrar: " . $conexion->error;

    }

} else {

    header("Location: ../html/registro.html");
    exit();

}

?>