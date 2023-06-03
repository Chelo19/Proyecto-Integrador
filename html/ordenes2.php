<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'proint';

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
        <title>Órdenes</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/output.css">
        <link rel="stylesheet" href="../css/historial.css">
    </head>

    <script type="text/javascript">
        function confirmarVuelta(){
            var respuesta = confirm("La sesión se cerrará si vuelves al inicio, ¿Realmente quieres volver?");

            if(respuesta == true){
                return true;
            } else{
                return false;
            }
        }
    </script>

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
                    <a href="home.php" class="sidebar-tool" onclick="return confirmarVuelta()">
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
            <!-- <div class="content">
                <div class="titulo"><span class="titulo2">Pedidos</span></div>
                <div class="historial">
                    <div class="historial_dish_container">
                        <div class="historial_dish_select_container">
                            <span class="linea">Orden: <span class="linea2">Total</span>  <span class="linea3">Hora</span> </span>

                            <hr>
                        </div>
                        
                        
                        <div class="nueva_orden_add_dish_send">
                            <a href="nueva_orden.html" >Agregar Platillo</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="content-history">
                <span class="history-title">Órdenes</span>
                <div class="history-container">
                    <div class="history-container-titles" id="history-container-title1">Orden</div>
                    <div class="history-container-titles" id="history-container-title2">Total</div>
                    <div class="history-container-titles" id="history-container-title3">Fecha</div>
                    <div class="history-container-orders">
                        <a href="history.php" class="history-container-order">
                        </a>

                        <?php 
                        
                        $sql = "SELECT * FROM ordenes";
                        $resultado = mysqli_query($conn, $sql);
                        //echo ;

                        if(mysqli_num_rows($resultado) > 0){
                            echo "<table>";
                            while ($fila = mysqli_fetch_assoc($resultado)){
                                echo "<tr class='history-container-order1'>";
                                echo "<td>" , $fila['Producto'] , " </td>";
                                echo "<td> " , $fila['Cantidad'] , "</td>";
                                echo "<td> " , $fila['Fecha'] , "</td>";
                                echo "</tr>";
                               // echo
                            }
                            echo "</table>";
                        }

                         ?>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="history.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                    </div>
                </div>
                <div class="nueva_orden_add_dish_send">
                    <a href="nueva_orden.html" >Agregar Platillo</a>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
/*
            $sql = 'SELECT * FROM Ordenes'
            $res = mysqli_query($conn, $sql);
            while ($fila = mysqli_fetch_assoc($res)) {
                echo 'ID: ' . $fila['ID'] . ', Producto: ' . $fila['Producto'] . 'Cantidad: ' . $fila['Cantidad'] . '<br>';
            }

            mysqli_free_result($res);

            // Cerrar la conexión
            mysqli_close($conn);*/
?>