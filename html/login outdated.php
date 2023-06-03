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
            <div class="content">
            <form action="#" method="POST" class="content">
            <div class="nueva_orden_add_dish2">
                    <div class="nueva_orden_add_dish_container2">
                        <div>
                            <h3>Iniciar Sesión</h3>
                            <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                        </div>
                        <div>
                            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
                        </div>
                        <div>
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
        $Usuario = $_POST ['usuario'];
        $Contraseña = $_POST ['contraseña'];

        if(empty($_POST["usuario"]) and empty($_POST["contraseña"])){
            echo '<div class="alert alert-danger">Los campos están vacíos </div>';
        } else {
            
        if(empty($_POST["usuario"]) or empty($_POST["contraseña"])){
            echo '<div class="alert alert-danger">Hay un campo vacío </div>';
        } else {
            
        if(isset($_POST['send'])){
            
        /*$insertarDatos = "INSERT INTO usuarios VALUES('', '$Usuario', '$Contraseña')";
        $exInsertar = mysqli_query ($conn,$insertarDatos);*/

            $sql = $conn->query("SELECT * FROM usuarios where Usuario='$Usuario' and Contraseña='$Contraseña'");

            if($datos=$sql->fetch_object()){
                header("location:home.php");
            }else{
                echo '<div class="alert alert-danger">Los datos son incorrectos</div>';
            }
        }
        }
    }
    }
    ?>

</html>
