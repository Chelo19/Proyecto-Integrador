const BtnPlatillo = document.querySelector('.nueva_orden_add_dish_send');
const orden = document.createElement('span');
const precio = document.createElement('span');
const cobrar = document.createElement('span');
var totalord = 0;
var total = 0;
let carrito = [];

BtnPlatillo.addEventListener('click', validar);

function validar(){
    //Reinicia el precio de la orden de comida a $0
    totalord = 0;

    //Obtiene el precio de la orden
    var precioord = document.getElementById('selector').value; 
    //Obtiene la orden de comida
    var combo = document.getElementById('selector');
    var textord = combo.options[combo.selectedIndex].text;
    //obtiene cuantas ordenees serian
    var cantidad = document.getElementById('contador').value; 
    
    totalord = precioord * cantidad;
    total = total + totalord;

    //En las siguientes lineas hace que se muestre el total a pagar de los platillos que pidieron
    cobrar.textContent = '$'+total;

    const cobrarhtml = document.querySelector('#PrecioTotal');
    cobrarhtml.appendChild(cobrar);

    //en un array llamado "carrito" guarda el detalle de las ordenes
    carrito.push({cantidad, textord, totalord});
    //actualiza las ordenes en el carrito y las pone en el HTML
    carrito.forEach((e) => {
        const ordenComp = document.createElement('div');
        ordenComp.classList.add('nueva_orden_ticket_final_item');
        ordenComp.innerHTML = `
            <span>${e.cantidad} ${e.textord}</span>   
            <span>$ ${e.totalord}</span>
        `; 
        const ordenDiv = document.querySelector('.nueva_orden_ticket_final_items');
        ordenDiv.appendChild(ordenComp);
    })
    

    //"borra" el array anterior para que no se repita en el HTML 
    delete carrito [0]
    delete carrito [1]
    delete carrito [2]
    
}
