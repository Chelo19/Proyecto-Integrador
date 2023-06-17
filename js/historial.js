import {supabase} from './client.js'

window.onload = async function() {
    getOrdenes();
};

const getOrdenes = async () => {
    const { data, error } = await supabase
    .from('ordenes')
    .select('*')
    .eq('isdone', true);
    if(data.length > 0){
        getEntradas(data);
    }
}

const getEntradas = async (ordenes) => {
    const { data, error } = await supabase
    .from('entradas')
    .select('*, platillo(*)');
    if(data.length > 0){
        displayOrdenes(ordenes, data);
    }
}

const gallery = document.getElementById('gallery');
const displayOrdenes = async (ordenes, entradas) => {
    for(let i = 0 ; i < ordenes.length ; i++){
        let total = getTotalPrice(ordenes[i], entradas);
        var fecha = new Date(ordenes[i].created_at);
        var formatoFecha = fecha.toLocaleDateString();
        var formatoHora = fecha.toLocaleTimeString();
        var orden = `<a href="orden_individual.html?id=${ordenes[i].id}" class="history-container-order">
            <span id="history-container-order-title1">id: ${ordenes[i].id}</span>
            <span id="history-container-order-title2">$${total}</span>
            <span id="history-container-order-title3">${formatoFecha}</span>
        </a>`
        if(total != 0){
            gallery.innerHTML += orden;
        }
    }
}

const getTotalPrice = (orden, entradas) => {
    let total = 0;
    for(let i = 0 ; i < entradas.length ; i++){
        if(entradas[i].orden_id == orden.id){
            total += (entradas[i].platillo.precio * entradas[i].cantidad);
        }
    }
    return total;
}