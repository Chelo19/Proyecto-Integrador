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
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/output.css">
        <link rel="stylesheet" href="../css/historial.css">
        <link rel="stylesheet" href="../css/login.css">
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
                    <a class="sidebar-tool" style="background-color:rgba(2, 172, 2, 1); color: #fff">
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
            
            <div class="content-history">
                <span class="history-title">Órdenes</span>
                <form class="login-container-input-box" action="#" method="POST">
                    <div class="login-container-input2">
                        <input type="text" name="orden" id="orden" placeholder="Pedido">
                        <input type="submit" name="send" id="send" class="nueva_orden_add_dish_select2" value="Completar">
                        <input type="submit" name="del" id="del" class="nueva_orden_add_dish_select2" value="Cancelar">
                        <input type="reset" value="Limpiar texto">
                    </div>
                </form>

                <div class="history-container">
                    <div class="history-container-titles" id="history-container-title1">Orden</div>
                    <div class="history-container-titles" id="history-container-title2">Total</div>
                    <div class="history-container-titles" id="history-container-title3">Fecha</div>
                    <div class="history-container-orders">
                        <a href="history.php" class="history-container-order">
                        </a>

                        <?php 
                        //Aquí es donde se muestra la información de la base de datos
                        $sql = "SELECT * FROM ordenes";
                        $resultado = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($resultado) > 0){
                            echo "<table>";
                            while ($fila = mysqli_fetch_assoc($resultado)){
                                echo "<tr>";
                                //echo "<td>" , "<input type='image' src='../src/check.png' width='30px' height='30px' alt='send' name='send' id='send'>" , " </td>";
                                echo "<td> #" , $fila['ID'] , " </td>";
                                echo "<td>" , $fila['Cantidad'] , " </td>";
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
        <script> src="../js/confirmación.js" </script>
    </body>
</html>

<?php
if(!empty($_POST['send']) or !empty($_POST['del'])){
$id = $_POST['orden'];

if(empty($_POST['orden'])){
    echo "<script languaje='JavaScript'>alert('Debe introducir una orden primero') </script>";
} else {
    if(isset($_POST['send']) or isset($_POST['del']) != $id){
        echo "<script languaje='JavaScript'>alert('Debe introducir un número de orden válido') </script>";
    }
        
        if(isset($_POST['send'])){
            $sel = $id;
            $sql2 = "SELECT `ID`, `Producto`, `Cantidad`, `Precio`, `Consideraciones`, `Fecha` FROM `ordenes` WHERE ID = $sel";
            $resel = mysqli_query($conn, $sql2);

            // Insertar los datos en la tabla de destino
            //if(mysqli_num_rows($resel) == $id){
                //$id2 = $fila['ID'];
                if(isset($row['Producto'])){
                $prod = $row['Producto'];
                }
                if(isset($row['Cantidad'])){
                $cant = $row['Cantidad'];
                }
                if(isset($row['Precio'])){
                $price = $row['Precio'];
                }
                if(isset($row['Consideraciones'])){
                $cons = $row['Consideraciones'];
                }
                if(isset($row['Fecha'])){
                $date = $row['Fecha'];
                }
            //}
            echo "<script languaje='JavaScript'>alert('La orden se completó correctamente') </script>";
            $agregar = "INSERT INTO historial (ID, Producto, Cantidad, Precio, Consideraciones, Fecha) VALUES ('$prod', '$cant', '$price', '$cons', '$date')";
            mysqli_query($conn, $agregar);

        } 
        if(isset($_POST['del'])){
            echo "<script languaje='JavaScript'>alert('La orden se canceló correctamente') </script>";
            
        }
    }

$eliminar = "DELETE FROM ordenes WHERE ID = '$id' ";

$res=mysqli_query($conn, $eliminar);
            mysqli_close($conn);
            
}
      
?>