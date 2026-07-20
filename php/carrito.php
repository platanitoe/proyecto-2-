<?php

session_start();


if(!isset($_SESSION['usuario'])){

    header("Location: ../html/login.html");
    exit();

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Carrito</title>

</head>


<body>


<h1>Carrito de compras</h1>


<div id="lista"></div>


<h2 id="total"></h2>


<script>


let carrito =
JSON.parse(localStorage.getItem("carrito")) || [];


let lista=document.getElementById("lista");

let total=0;


carrito.forEach(producto=>{


lista.innerHTML +=
`
<p>
${producto.nombre}
- $${producto.precio}
</p>
`;


total += producto.precio;


});


document.getElementById("total").innerHTML =
"Total: $" + total;



</script>


</body>

</html>