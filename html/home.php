<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "proint";

// Conexión a la base de datos
$conn = mysqli_connect($host, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}
?>

    <script type="text/javascript">
        function No(){
            var respuesta = alert("Debe iniciar sesión para acceder a esto");
        }
    </script>

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
                    <a class="sidebar-tool" onclick="return No()">
                        Nueva Orden
                    </a>
                    <div class="horizontal-gap"></div>
                    <a class="sidebar-tool" onclick="return No()">
                        Órdenes
                    </a>
                    <div class="horizontal-gap"></div>
                    <a class="sidebar-tool" onclick="return No()">
                        Historial
                    </a>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="content">
            <form action="#" method="POST" class="content">
            <div class="nueva_orden_add_dish">
                    <div class="nueva_orden_add_dish_container">
                        <div class="nueva_orden_add_dish_select_container">
                            <span>Iniciar Sesión</span>
                            <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                        </div>
                        <div class="nueva_orden_add_dish_considerations_container">
                            <span>Consideraciones:</span>
                            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
                        </div>
                        <div class="nueva_orden_add_dish_send">
                            <input type="submit" name="send" id="send" placeholder="Entrar">
                            <input type="reset">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </body>
    <?php 
    if(!empty($_POST['send'])){
        if(empty($_POST["usuario"]) and empty($_POST["contraseña"])){
        echo '<div class="alert alert-danger">Los campos están vacíos </div>';
        } else {
        if(isset($_POST['send'])){
            $Usuario = $_POST ['usuario'];
            $Contraseña = $_POST ['contraseña'];
        /*$insertarDatos = "INSERT INTO usuarios VALUES('', '$Usuario', '$Contraseña')";
        $exInsertar = mysqli_query ($conn,$insertarDatos);*/

            $sql = $conn->query("SELECT * FROM usuarios where ID='$Usuario' and Contraseña='$Contraseña'");

            if($datos=$sql->fetch_object()){
                header("location:nueva_orden.php");
            }else{
                echo '<div class="alert alert-danger">Los datos son incorrectos</div>';
            }
        }
        }
    }
?>
</html>

