<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);

    // ✅ ELIMINADO: ya tienes la conexión desde conexion.php
    // $conexion = new mysqli("localhost", "root", "", "proyecto");

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

    // ✅ CORREGIDO: Eliminada la columna 'tipo' que no existe
    $sql = "INSERT INTO usuarios(nombre, correo, password)
            VALUES('$nombre', '$correo', '$passwordHash')";

    if ($conexion->query($sql)) {
        echo "<script>
                alert('✅ Usuario registrado correctamente');
                window.location='../index.php?registro=exitoso';
              </script>";
    } else {
        echo "❌ Error al registrar: " . $conexion->error;
    }

} else {
    header("Location: ../html/registro.html");
    exit();
}
?>