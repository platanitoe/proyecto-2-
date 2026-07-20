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

<link rel="stylesheet" href="../css/estilosP.css">

</head>


<body>


<center>

<h1>Carrito de compras </h1>

</center>



<div id="listaProductos"></div>


<h2 id="total"></h2>



<br>


<a href="catalogoP.php">
Seguir comprando
</a>



<br><br>



<form action="guardarpedido.php" method="POST" onsubmit="enviarCarrito()">


<input 
type="hidden" 
name="carrito" 
id="carrito">


<button type="submit">
Realizar compra
</button>


</form>




<script>


let carrito = JSON.parse(localStorage.getItem("carrito")) || [];


let lista = document.getElementById("listaProductos");

let total = 0;



if(carrito.length === 0){


    lista.innerHTML = 
    "<h3>El carrito está vacío</h3>";


}else{


    carrito.forEach(producto => {



        lista.innerHTML += `


        <div class="producto">


            <h3>
            ${producto.nombre}
            </h3>


            <p>
            Precio: $${producto.precio}
            </p>


        </div>


        `;



        total += Number(producto.precio);



    });



}



document.getElementById("total").innerHTML =
"Total: $" + total;




// Envía los productos al PHP

function enviarCarrito(){


    document.getElementById("carrito").value =
    JSON.stringify(carrito);


}



</script>


</body>

</html>