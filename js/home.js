import {supabase} from './client.js'

const fecha_span = document.getElementById('fecha');
const pendientes_span = document.getElementById('pendientes');
const completadas_span = document.getElementById('completadas');

var fecha = new Date();
var formatoHora = fecha.toLocaleTimeString();
var opcionesFecha = { day: 'numeric', month: 'long', year: 'numeric' };
var formatoFecha = fecha.toLocaleDateString('es-ES', opcionesFecha);

window.onload = async function() {
    getOrdenes();
    fecha_span.innerHTML = `Hoy es ${formatoFecha} ${formatoHora}`;
};

const getOrdenes = async () => {
    const { data, error } = await supabase
    .from('ordenes')
    .select('*');
    filterOrdenes(data);
}

function filterOrdenes(ordenes) {
    console.log(ordenes);
    var pendientes = ordenes.filter(function(orden){
        return orden.isdone == false;
    });
    var completadas = ordenes.filter(function(orden){
        return orden.isdone == true;
    });
    pendientes_span.innerHTML += pendientes.length;
    completadas_span.innerHTML += completadas.length;
}