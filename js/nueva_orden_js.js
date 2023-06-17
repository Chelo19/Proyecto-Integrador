import {supabase} from './client.js'

document.getElementById("new_order_button").addEventListener("click", addOrden);
document.getElementById("new_order_dish_button").addEventListener("click", addEntrada);

var platillos = [];
window.onload = async function() {
    const { data, error } = await supabase
    .from('platillos')
    .select('*');
    platillos = data;
};

const gallery = document.getElementById('gallery');
let entradas = [];
const dish_selector = document.getElementById("selector");
const especificacion_textarea = document.getElementById("textarea1");
const contador_input = document.getElementById("contador");
async function addEntrada() {
    var option = dish_selector.value;
    var especificacion = especificacion_textarea.value;
    var cantidad = contador_input.value;
    var entrada = {
        cantidad: cantidad,
        platillo: option,
        especificacion: especificacion
    }
    entradas.push(entrada);
    // console.log(entradas);
    let platillo = platillos.filter(function(platillo){
        return platillo.id == option;
    });
    var new_entrada = `<div class="nueva_orden_ticket_final_item">
        <span class="nueva_orden_ticket_final_item_name">${cantidad} ${platillo[0].name}</span>
        <span class="nueva_orden_ticket_final_item_name">$${(platillo[0].precio) * cantidad}</span>
    </div>`
    gallery.innerHTML += new_entrada;
    getTotal();
}

async function addOrden(){
    const { data, error } = await supabase
    .from('ordenes')
    .insert({  })
    .select();
    if(error) {
        console.log(error);
    }
    else{
        addingEntriestoDb(data[0].id);
    }
}

async function addingEntriestoDb(orden_id){
    let iserror = false;
    for(let i = 0 ; i < entradas.length ; i++){
        const { error } = await supabase
        .from('entradas')
        .insert({ orden_id: orden_id, cantidad: entradas[i].cantidad, platillo: entradas[i].platillo, especificacion: entradas[i].especificacion})
        if(error){
            iserror = true;
        }
    }
    if(!iserror){
        window.location.reload();
    }
}

const total_div = document.getElementById('total');
function getTotal(){
    let total = 0;
    for(let i = 0 ; i < entradas.length ; i++){
        let precio_platillo = getPlatillo(entradas[i].platillo)
        total += entradas[i].cantidad * precio_platillo;
    }
    total_div.innerHTML = `$${total}`;
}

function getPlatillo(option){
    for(let i = 0 ; i < platillos.length ; i++){
        if(platillos[i].id == option){
            return platillos[i].precio;
        }
    }
}