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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/output.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body class="login-bg">
        <div class="alert alert-2-success">
            <h3 class="alert-title">Inicio de sesión correcto</h3>
            <p class="alert-content">¡Bienvenido Marcelo!</p>
        </div>
        <div class="login-component">
            <div class="login-container">
                <div class="login-container-title">
                    ¡Es un gusto verte de nuevo!
                </div>
                <form class="login-container-input-box" action="#" method="POST">
                    <div class="login-container-input-div">
                        <span>Usuario</span>
                        <div class="login-container-input">
                            <img src="../src/user-icon-mini.png"/>
                            <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="login-container-input-div">
                        <span>Contraseña</span>
                        <div class="login-container-input">
                            <img src="../src/lock-icon-mini.png"/>
                            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"/>
                        </div>
                    </div>
                </div>
            </div>
        <div class="login-component">
            <input type="submit" name="send" id="send" class="login-container-send" value="Iniciar Sesión">
        </div>
                </form>
            
        <div class="login-component">
            <span class="login-title">Inicia sesión para comenzar a usar el sistema</span>
        </div>
    </body>
    <?php 
    if(!empty($_POST['send'])){
        $Usuario = $_POST ['usuario'];
        $Contraseña = $_POST ['contraseña'];

        if(empty($_POST["usuario"]) and empty($_POST["contraseña"])){
            echo "<script languaje='JavaScript'>alert('Los campos están vacíos')</script>";
        } else {
            
        if(empty($_POST["usuario"]) or empty($_POST["contraseña"])){
            echo "<script languaje='JavaScript'>alert('Hay un campo vacío')</script>";
        } else {
            
        if(isset($_POST['send'])){
            
        /*$insertarDatos = "INSERT INTO usuarios VALUES('', '$Usuario', '$Contraseña')";
        $exInsertar = mysqli_query ($conn,$insertarDatos);*/

            $sql = $conn->query("SELECT * FROM usuarios where Usuario='$Usuario' and Contraseña='$Contraseña'");

            if($datos=$sql->fetch_object()){
                header("location:home.php");
            }else{
                echo "<script languaje='JavaScript'>alert('Los campos son incorrectos')</script>";
            }
        }
        }
    }
    }
    ?>
</html>