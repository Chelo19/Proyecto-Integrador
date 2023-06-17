import {supabase} from './client.js'

const user_name = document.getElementById('user_name');
async function getUser(){
    const { data: { user } } = await supabase.auth.getUser();
    if(user){
        const { data, error } = await supabase
        .from('usuarios')
        .select('*')
        .eq('guid', user.id);
        console.log(data[0]);
        user_name.innerHTML = data[0].name;
    }
}

window.onload = async function() {
    var params = new URLSearchParams(window.location.search);
    var ordenId = params.get("id");
    getOrden(ordenId);
    getOrdenEntradas(ordenId);
    getUser();
};

const endButton = document.getElementById('orden_individual_end_button');

const getOrden = async (ordenId) => {
    const { data, error } = await supabase
    .from('ordenes')
    .select('*')
    .eq('id', ordenId);
    if(data[0].isdone == true){
        endButton.style.display = "none";
    }
}

const getOrdenEntradas = async (ordenId) => {
    const { data, error } = await supabase
    .from('entradas')
    .select('*, platillo(*)')
    .eq('orden_id', ordenId);
    displayEntradas(data);
}

const gallery = document.getElementById('gallery');
const total_span = document.getElementById('total_span');
const displayEntradas = (entradas) => {
    var total = 0;
    for(let i = 0 ; i < entradas.length ; i++){
        total += (entradas[i].platillo.precio * entradas[i].cantidad);
        var entrada = `<div class="nueva_orden_ticket_final_item">
            <span>${entradas[i].platillo.name} ${entradas[i].especificacion}</span>
            <span>$${(entradas[i].platillo.precio * entradas[i].cantidad)}</span>
        </div>`
        gallery.innerHTML += entrada;
        total_span.innerHTML = `$${total}`;
    }
}

document.getElementById("orden_individual_end_button").addEventListener("click", endOrden);

async function endOrden(){
    var params = new URLSearchParams(window.location.search);
    var ordenId = params.get("id");
    const { error } = await supabase
    .from('ordenes')
    .update({ isdone: true })
    .eq('id', ordenId);
    if(!error){
        window.location.reload();
    }
    else{
        console.log(error);
    }
}