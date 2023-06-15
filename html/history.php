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
                    <a class="sidebar-tool" style="background-color:rgba(2, 172, 2, 1); color: #fff">
                        Historial
                    </a>
                    <a href="login.php" class="sidebar-tool" onclick="return confirmarVuelta()">
                        Cerrar Sesión
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
                    <?php 
                        //Aquí es donde se muestra la información de la base de datos
                        $sql = "SELECT * FROM historial";
                        $resultado = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($resultado) > 0){
                            echo "<table>";
                            while ($fila = mysqli_fetch_assoc($resultado)){
                                echo "<tr>";
                                //echo "<td>" , "<input type='image' src='../src/check.png' width='30px' height='30px' alt='send' name='send' id='send'>" , " </td>";
                                echo "<td> #" , $fila['ID'] , " </td>";
                                echo "<td>" , $fila['Producto'] , " </td>";
                                echo "<td> (" , $fila['Consideraciones'] , ") </td>";
                                echo "<td> $" , $fila['Precio'] , "</td>";
                                //Probablemente había una forma menos tediosa de arreglar el formato, pero esto funciona
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td>" , " </td>";
                                echo "<td> " , $fila['Fecha'] , "</td>";
                                echo "</tr>";
                               // echo
                            }
                            echo "</table>";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>