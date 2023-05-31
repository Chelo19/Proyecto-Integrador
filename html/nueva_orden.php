<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'Proint';

// Conexión a la base de datos
$conn = mysqli_connect($host, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nueva Orden</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/output.css">
        <link rel="stylesheet" href="../css/nueva_orden.css">

        <!--Si les da error, hagan lo siguiente un comentario-->
        <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
        
        <script>
        
        import { createClient } from '@supabase/supabase-js'

        const supabaseUrl = 'https://vemlyvaobeituwkpsbvy.supabase.co'
        const supabaseKey = process.env.SUPABASE_KEY
        const supabase = createClient(supabaseUrl, supabaseKey)
        
        supabase
        .from('Ordenes')
        .select('Contenido')
        .then(response => {
            const data = response.data;
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        })
        </script>

        <!--Hasta aquí c:-->
    </head>
    <body class="main-bg">
        <div class="alert alert-2-success">
            <h3 class="alert-title">Orden creada correctamente</h3>
            <p class="alert-content">Se ha agregado la orden {id}</p>
        </div>
        <div class="main-display">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="sidebar-user">
                    <div class="sidebar-user-img">
                        <img src="../src/user-icon.png"/>
                    </div>
                    <div class="sidebar-user-name">
                        Marcelo
                    </div>
                </div>
                <div class="sidebar-tools">
                    <a href="home.php" class="sidebar-tool">
                        Inicio
                    </a>
                    <div class="horizontal-gap"></div>
                    <a href="nueva_orden.php" class="sidebar-tool">
                        Nueva Orden
                    </a>
                    <div class="horizontal-gap"></div>
                    <a href="ordenes.php" class="sidebar-tool">
                        Órdenes
                    </a>
                    <div class="horizontal-gap"></div>
                    <a href="history.php" class="sidebar-tool">
                        Historial
                    </a>
                </div>
            </div>
            <!-- Sidebar -->
            <form action="php/conexion.php" method="POST" class="content">
                <div class="nueva_orden_add_dish">
                    <div class="nueva_orden_add_dish_container">
                        <div class="nueva_orden_add_dish_select_container">
                            <span>Platillo:</span>
                            <select id="selector" class="nueva_orden_add_dish_select">
                                <option></option>
                                <option value="50">Tacos de trompo</option>
                                <option value="60">Tacos de bistec</option>
                                <option value="30">Sopes</option>
                                <option value="45">Enchiladas</option>
                                <option value="40">Quesadillas</option>
                            </select>
                        </div>
                        <div class="nueva_orden_add_dish_considerations_container">
                            <span>Consideraciones:</span>
                            <textarea id="textarea1" class="nueva_orden_add_dish_considerations" placeholder="Consideraciones"></textarea>
                        </div>
                        <div class="nueva_orden_add_dish_qty_container">
                            <span>Cantidad (por defecto es 5):</span>
                            <input id="contador" type="number" value="5">
                        </div>
                        <div class="nueva_orden_add_dish_send">
                            <span>Agregar Platillo</span>
                        </div>
                    </div>
                </div>
                <div class="nueva_orden_ticket">
                    <div class="nueva_orden_ticket_container">
                        <div class="nueva_orden_ticket_final">
                            <div class="nueva_orden_ticket_final_items_title">
                                <span class="nueva_orden_ticket_final_items_title_left">Platillo</span>
                                <span>Precio</span>
                            </div>
                            <div class="nueva_orden_ticket_final_items">
                            </div>
                            <div id="PrecioTotal" class="nueva_orden_ticket_final_items_title">
                                <span class="nueva_orden_ticket_final_items_title_left">Total</span>
                            </div>
                            
                        </div>
                        <div class="nueva_orden_add_dish_send">
                            <input href="nueva_orden.html" type="submit" value="Confirmar Pedido">
                            <!--<a href="nueva_orden.html">Confirmar Pedido</a>-->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            // Capturar el evento de envío del formulario
document.getElementById('nOrd').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

  // Obtener los valores de los campos del formulario
  const nombre = document.getElementById('nombre').value;
  const email = document.getElementById('email').value;

  // Enviar los datos a la base de datos de Supabase
  supabase
    .from('NOMBRE_DE_LA_TABLA')
    .insert([{ nombre, email }])
    .then(response => {
      console.log('Datos enviados correctamente');
      // Hacer algo después de enviar los datos, como redireccionar o mostrar un mensaje de éxito
    })
    .catch(error => {
      console.error('Error al enviar los datos:', error);
      // Manejar el error, como mostrar un mensaje de error al usuario
    });
});

        </script>
    </body>
</html>
