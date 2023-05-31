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
        <title>Home</title>
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/output.css">
        <!--Si les da error, hagan lo siguiente un comentario-->
        <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
        <script>
        import { createClient } from '@supabase/supabase-js'

        const supabaseUrl = 'https://vemlyvaobeituwkpsbvy.supabase.co'
        const supabaseKey = process.env.SUPABASE_KEY
        const supabase = createClient(supabaseUrl, supabaseKey)
        
        supabase
        .from(Ordenes)
        .select(Contenido)
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
            <div class="content">
            <form action="php/conexion.php" method="POST" class="content">
            <div class="nueva_orden_add_dish">
                    <div class="nueva_orden_add_dish_container">
                        <div class="nueva_orden_add_dish_select_container">
                            <span>Iniciar Sesión</span>
                            <input type="text" name="user" id="user" placeholder="Usuario">
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
            </div>
            </form>
        </div>
    </body>
</html>