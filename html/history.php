<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial</title>
        <link rel="stylesheet" href="../css/home.css">
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
            <div class="content-history">
                <span class="history-title">Historial de Pedidos</span>
                <div class="history-container">
                    <div class="history-container-titles" id="history-container-title1">Orden</div>
                    <div class="history-container-titles" id="history-container-title2">Total</div>
                    <div class="history-container-titles" id="history-container-title3">Fecha</div>
                    <div class="history-container-orders">
                        <a href="orden_individual.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                        <a href="orden_individual.html" class="history-container-order">
                            <span id="history-container-order-title1">{REFERENCIA ORDEN}</span>
                            <span id="history-container-order-title2">{TOTAL}</span>
                            <span id="history-container-order-title3">{FECHA}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>