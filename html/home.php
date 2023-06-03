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
                    <a class="sidebar-tool" style="background-color:rgba(2, 172, 2, 1); color: #fff">
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
                    <a href="login.php" class="sidebar-tool" onclick="return confirmarVuelta()">
                        Cerrar Sesión
                    </a>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="content">
                <div class="home_bg">
                    <div class="home_display">
                        <span class="home_title">Es un gusto verte de nuevo, Marcelo</span>
                        <span class="home_text">2 de Junio del 2023</span>
                        <div class="home_indicators_display">
                            <div class="home_indicators_container">
                                <div class="home_indicator_title_container">
                                    <span class="home_indicator_title">Hoy</span>
                                </div>
                                <div class="home_indicator">
                                    <span class="home_indicator_item">Órdenes pendientes | 4</span>
                                </div>
                                <div class="home_indicator">
                                    <span class="home_indicator_item">Órdenes completadas | 10</span>
                                </div>
                            </div>
                            <div class="home_indicators_container">
                                <div class="home_indicator_title_container">
                                    <span class="home_indicator_title">Esta semana</span>
                                </div>
                                <div class="home_indicator">
                                    <span class="home_indicator_item">Órdenes completadas | 105</span>
                                </div>
                                <a href="history.php" class="home_nueva_orden_button" id="button_350px">
                                    Ver historial
                                </a>
                            </div>
                        </div>
                        <a href="nueva_orden.php" class="home_nueva_orden_button">
                            Nueva orden
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>