<?php ob_start(); ?>
<?php set_error_handler("var_dump");
include '../conexion/conexion.php';
if (!ISSET($_SESSION['usuario'])){
if ($_SESSION['usuario'] != 'ADMIN'){
    session_start();
    if (isset($_POST['entrar'])){
        $conexion = new conexion();
        $usuario = $_POST['usuario'];    
        $contraseña = $_POST['password'];
        $consulta = "SELECT * FROM `admin` WHERE `Estado` = 1 AND `Usuario` = '$usuario' AND `Contraseña` = '$contraseña' ";
        
        if ($results = $conexion->consultar($consulta)){
            foreach($results as $row) {
                    $userOk = $row['Usuario'];
                    $passOk = $row['Contraseña'];
                    $idOk = $row['id'];
                }    
            $_SESSION['usuario'] = $userOk;
            header("location:../admin/index_admin.php");
            // die();
        }
        else{
            echo $msje="<script> alert('Usuario y/o Contraseña incorrecta');</script>";
        } 
    }
}
else
    header("location:../admin/index_admin.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/45b2b8f4cd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style-login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left">
                <!-- SE AGREGA EN EL ESTILO -->
            </div>
            <div class="right">
                <h2>Inicia Sesión</h2>
                <form action="login.php" method="post">
                    <input type="text" name="usuario" id="usuario" class="field" placeholder="Usuario" required>
                    <div class="divPw">
                        <input type="password" name="password" id="password" class="field" placeholder="Contraseña" required>    
                        <i class="fa-regular fa-eye-slash btnPw" id="togglePassword"></i>
                    </div>
                    <a href="index.php"><input type="button" value="Volver" class="btn btnVolver"></a>
                    <input type="submit" name="entrar" value="Enviar" class="btn btnEnviar">
                </form>
        </div>
    </div>
    <script src="../js/jsLogin.js"></script>
</body>
</html>