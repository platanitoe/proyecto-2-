<?php

session_start();

include("conexion.php");


if(!isset($_SESSION['usuario'])){

    header("Location: ../html/login.html");
    exit();

}


$id = $_SESSION['id'];


$sql = "SELECT * FROM pedidos WHERE id_usuario=$id";


$resultado = mysqli_query($conexion,$sql);


?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Historial de compras</title>

<link rel="stylesheet" href="../css/estilosP.css">

</head>


<body>


<center>

<h1>Historial de compras</h1>


<h3>
Usuario:
<?php echo $_SESSION['nombre']; ?>
</h3>


</center>



<div class="contenedor">


<?php if(mysqli_num_rows($resultado) > 0){ ?>


<?php while($pedido=mysqli_fetch_assoc($resultado)){ ?>


<div class="producto">


<h2>
Pedido #<?php echo $pedido['id']; ?>
</h2>


<p>
Fecha:
<?php echo $pedido['fecha']; ?>
</p>


<p>
Total:
$<?php echo $pedido['total']; ?>
</p>


<p>
Estado:
<?php echo $pedido['estado']; ?>
</p>


</div>



<?php } ?>


<?php }else{ ?>


<center>

<h3>
Aún no tienes compras realizadas
</h3>

</center>


<?php } ?>


</div>



<br>


<center>


<a href="catalogoP.php">

<button>
⬅ Regresar al catálogo
</button>

</a>


</center>



</body>

</html>