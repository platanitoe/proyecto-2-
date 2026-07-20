let carrito = JSON.parse(localStorage.getItem("carrito")) || [];


function agregar(id,nombre,precio){


    let producto = {

        id:id,
        nombre:nombre,
        precio:precio

    };


    carrito.push(producto);


    localStorage.setItem(
        "carrito",
        JSON.stringify(carrito)
    );


    alert("Producto agregado al carrito");

}