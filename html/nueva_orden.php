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
        <title>Nueva Orden</title>
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/output.css">
        <link rel="stylesheet" href="../css/nueva_orden.css">
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
        <?php
        
        ?>
        
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
                    <a class="sidebar-tool" style="background-color:rgba(2, 172, 2, 1); color: #fff">
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
            <form method="POST" class="content">
                <div class="nueva_orden_add_dish">
                    <div class="nueva_orden_add_dish_container">
                        <div class="nueva_orden_add_dish_select_container">
                            <span>Platillo:</span>
                            <select id="plato" name="plato" for="plato" class="nueva_orden_add_dish_select">
                                <option value="0">Seleccione una opción</option>
                                <!--Valores antiguos en orden: 50, 60, 30, 45, 40-->
                                <option value="1">Tacos de trompo</option>
                                <option value="2">Tacos de bistec</option>
                                <option value="3">Sopes</option>
                                <option value="4">Enchiladas</option>
                                <option value="5">Quesadillas</option>
                            </select>
                            <!--<input type="text" name="plato" id="plato"  placeholder="Platillo">-->
                        </div>
                        
                        <div class="nueva_orden_add_dish_considerations_container">
                            <span>Consideraciones:</span>
                            <textarea id="consideracion" name="consideracion" class="nueva_orden_add_dish_considerations" placeholder="Consideraciones (Dejar vacío en caso de no haberlas)"></textarea>
                        </div>

                        <div class="nueva_orden_add_dish_qty_container">
                            <span>Cantidad (por defecto es 5):</span>
                            <input id="contador" name="contador" type="number" value="5">
                        </div>
                        <div class="nueva_orden_add_dish_send">
                        <input href="nueva_orden.php" type="submit" id="send" name="send" value="Confirmar Pedido">
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
                        <div class="nueva_orden_add_dish_send2">
                            <input href="nueva_orden.php" type="submit" id="send" name="send" value="Confirmar Pedido">
                            <!--<a href="nueva_orden.html">Confirmar Pedido</a>-->
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php 
    if(!empty($_POST['send'])){
        if (isset($_POST['send'])) {
            
            $sel = $_POST ['plato'];
            $Contador = $_POST ['contador'];
            $Consideracion = $_POST ['consideracion'];

            if($sel=='0'){
                echo "<script language='JavaScript'> alert('Debe Seleccionar que producto desea')</script>";
            } else {
            if($Contador<='0'){
                echo "<script language='JavaScript'> alert('Debe llevar por lo menos una unidad')</script>";
            } else {
                $cont2 = $_REQUEST['contador'];

                //Precios en orden: 50, 60, 30, 45, 40
                switch ($sel){
                    case "1":
                        $Precio = 10;
                        $Selector = "Tacos de Trompo";
                    break;

                    case "2":
                        $Precio = 12;
                        $Selector = "Tacos de Bistec";
                    break;

                    case "3":
                        $Precio = 6;
                        $Selector = "Sopes";
                    break;

                    case "4":
                        $Precio = 9;
                        $Selector = "Enchiladas";
                    break;

                    case "5":
                        $Precio = 8;
                        $Selector = "Quesadillas";
                    break;

                }
                if($Consideracion == ''){
                    $Consideracion = "Regular";
                }
                $suma = $Precio*$Contador;
                
            $sql = "INSERT INTO ordenes (Producto, Cantidad, Precio, Consideraciones) VALUES ('$Selector', '$Contador', '$suma', '$Consideracion' )";

            $res=mysqli_query($conn,$sql);
                if($res){
                    echo "<script language='JavaScript'> alert('Orden creada correctamente')</script>";
                }
            }
        }
    }
}
    ?>
    </body>

</html>
