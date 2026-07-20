let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

function agregar(id,nombre,precio){

    let existe = carrito.find(producto => producto.id == id);

    if(existe){
        existe.cantidad++;
    }else{
        carrito.push({
            id:id,
            nombre:nombre,
            precio:precio,
            cantidad:1
        });
    }

    localStorage.setItem("carrito",JSON.stringify(carrito));

    alert("Producto agregado al carrito");
}