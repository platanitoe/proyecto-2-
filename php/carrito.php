<?php

session_start();


if(!isset($_SESSION['usuario'])){

    header("Location: ../html/login.html");
    exit();

}

?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Carrito</title>

</head>


<body>


<h1>Carrito de compras</h1>


<div id="productos"></div>


<h2 id="total"></h2>


<a href="catalogoP.php">
Seguir comprando
</a>


<script>


let carrito = JSON.parse(localStorage.getItem("carrito")) || [];


let lista = document.getElementById("productos");

let total = 0;



carrito.forEach(producto => {


lista.innerHTML += `

<p>
${producto.nombre} 
- $${producto.precio}

</p>

`;


total += Number(producto.precio);


});



document.getElementById("total").innerHTML =
"Total: $" + total;


</script>
<script src="../js/carrito.js"></script>


</body>

</html>