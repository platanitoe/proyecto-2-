<?php
include("../proyecto-2-/php/conexionP.php");

$id = $_GET['id'];

if(isset($_POST['actualizar'])){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "UPDATE productos
            SET nombre='$nombre',
                descripcion='$descripcion',
                precio='$precio',
                stock='$stock'
            WHERE id=$id";

    mysqli_query($conexion,$sql);

    header("Location: inventario.php");
}

$sql = "SELECT * FROM productos WHERE id=$id";
$resultado = mysqli_query($conexion,$sql);
$producto = mysqli_fetch_assoc($resultado);
?>

<form method="POST">

Nombre:
<input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br><br>

Descripción:
<input type="text" name="descripcion" value="<?php echo $producto['descripcion']; ?>"><br><br>

Precio:
<input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>"><br><br>

Stock:
<input type="number" name="stock" value="<?php echo $producto['stock']; ?>"><br><br>

<input type="submit" name="actualizar" value="Actualizar">

</form>