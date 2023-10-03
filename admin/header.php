<?php ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
include '../conexion/conexion.php';
session_start(); #inicializamos variables de sesion
 #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
 if ( isset( $_SESSION['usuario'] )!='ADMIN'){
    header("location:../pages/login.php");
    die();
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-admin.css"> 
    <script src="https://kit.fontawesome.com/45b2b8f4cd.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../assets/img/favicon_io/favicon.ico" type="image/x-icon">
    <title>Administración</title>
</head>
<body>
    <header class="header">
        <div class="menu">
            <div class="logo">
                <a href="index_admin.php"><img src="../assets/img/logo-circular.png" alt="La Ventana del Café" class="imgLogo"></a>
                <h2>Administración</h2>
            </div>
            <nav class="navHeader">
                <ul class="navLista">
                    <li class="listaItem">
                        <a class="link" aria-current="page"  href="../index.php">Index</a>
                    </li>
                    <li class="listaItem">
                        <a class="link" aria-current="page"  href="index_admin.php">Ver proyectos</a>
                    </li>
                    <li class="listaItem">
                        <a class="link" aria-current="page"  href="galeria.php">ABM</a>
                    </li>
                    <li class="listaItem">
                        <a class="link" href="../conexion/cerrar.php">Cerrar Sesión de User: <?php echo $_SESSION['usuario']; ?></a> 
                    </li>
                </ul>
            </nav>
        </div>
    </header>