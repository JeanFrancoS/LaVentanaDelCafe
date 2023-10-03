<?php ob_start(); ?>
<?php set_error_handler("var_dump");
include '../conexion/conexion.php';
session_start();
// var_dump($conexion);    die;
if (isset($_POST['entrar'])){
    $conexion = new conexion();

    $usuario = $_POST['usuario'];    
    $contraseña = $_POST['pass'];
    $consulta = "SELECT * FROM `admin` WHERE `Estado` = 1 AND `Usuario` = '$usuario' AND `Contraseña` = '$contraseña' ";
    
    if ($results = $conexion->consultar($consulta)){
        foreach($results as $row) {
                $userOk = $row['Usuario'];
                $passOk = $row['Contraseña'];
                $idOk = $row['id'];
            }    
        $_SESSION['usuario'] = $userOk;
        header("location:../admin/index_admin.php");
        die();
    }
    else{
        echo $msje="<script> alert('Usuario y/o Contraseña incorrecta');</script>";
        // header("location:login.php");
    } 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-login.css">
    <title>Login-CRUD</title>
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Inicia Sesión</h2>
                <form action="login.php" method="post">
                    <input type="text" name="usuario" id="usuario" class="field" placeholder="Usuario" required>
                    <input type="text" name="pass" id="subject" class="field" placeholder="Password" required>
                    <a href="index.php"><input type="button" value="Volver" class="btn btnVolver"></a>
                    <input type="submit" name="entrar" value="Enviar" class="btn">
                    <!-- <p>Usuario: Admin <br> Pass: 123 </p> -->
                </form>
        </div>
    </div>
    
</body>
</html>