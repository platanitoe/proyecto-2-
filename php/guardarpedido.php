<?php

session_start();

include("conexion.php");


if(!isset($_SESSION['id'])){

    header("Location: ../index.php");
    exit();

}



$id_usuario = $_SESSION['id'];


$carrito = json_decode($_POST['carrito'], true);



$total = 0;



foreach($carrito as $producto){

    $total += $producto['precio'];

}




$sql = "INSERT INTO pedidos(id_usuario,total)
VALUES('$id_usuario','$total')";


mysqli_query($conexion,$sql);



$id_pedido = mysqli_insert_id($conexion);





foreach($carrito as $producto){


    $sql = "INSERT INTO detalle_pedido
    (id_pedido,id_producto,cantidad,precio)

    VALUES

    (
    '$id_pedido',
    '".$producto['id']."',
    1,
    '".$producto['precio']."'
    )";


    mysqli_query($conexion,$sql);


}





echo "

<script>

alert('Compra realizada correctamente');

localStorage.removeItem('carrito');

window.location='catalogoP.php';

</script>

";


?>