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
                            <!--<select id="selector" name="selector" for="selector" class="nueva_orden_add_dish_select">
                                <option value="0">Seleccione una opción</option>
                                Valores antiguos en orden: 50, 60, 30, 45, 40
                                <option value="Tacos de Trompo">Tacos de trompo</option>
                                <option value="Tacos de Bistec">Tacos de bistec</option>
                                <option value="Sopes">Sopes</option>
                                <option value="Enchiladas">Enchiladas</option>
                                <option value="Quesadillas">Quesadillas</option>
                            </select>-->
                            <input type="text" name="selector" id="selector"  placeholder="Platillo">
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $timezone = 'America/Monterrey';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $Fecha = $date -> format('Y-m-d');
        $Selector = $_POST ['selector'];
        $Contador = $_POST ['contador'];
        
            
        /*$insertarDatos = "INSERT INTO usuarios VALUES('', '$Usuario', '$Contraseña')";
        $exInsertar = mysqli_query ($conn,$insertarDatos);*/

            /*$sql = $conn->query("SELECT * FROM usuarios where Usuario='$Usuario' and Contraseña='$Contraseña'");

            if($datos=$sql->fetch_object()){
                header("location:nueva_orden.php");
            }else{
                echo '<div class="alert alert-danger">Los datos son incorrectos</div>';
            }*/
            //CURRENT_TIMESTAMP
            $insertarDatos = "INSERT INTO ordenes ('Producto', 'Cantidad', 'Fecha') VALUES ('$Selector', '$Contador', '$Fecha')";
            }
        echo "<div class='alert alert-2-success'>";
            echo "<h3 class='alert-title'>Orden creada correctamente</h3>";
            echo "<p class='alert-content'>Se ha agregado la orden {id}</p>";
        echo "</div>";
    ?>

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
