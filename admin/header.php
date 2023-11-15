<?php ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
include '../conexion/conexion.php';
session_start(); #inicializamos variables de sesion
 #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
$conexion = new conexion();
$sucursales = $conexion->consultar("SELECT * FROM `sucursal` WHERE Estado = 1"); 
foreach($sucursales as $sucursal){ 
    $nombre_sucursal = $sucursal['Nombre']; 
    $logo_sucursal = $sucursal['Logo']; 
    $horario_sucursal = $sucursal['Horario'];
}
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
    <link rel="website icon" href="../assets/icons/<?php echo $logo_sucursal ?>" type="image/x-icon">
    <title>Administración</title>
</head>
<body>
    <header class="header">
        <div class="menu">
            <div class="logo">
            <a href="index_admin.php"><img src="../assets/icons/<?php echo $logo_sucursal ?>" alt="<?php echo $nombre_sucursal ?>" class="imgLogo"></a>
                <h2>Administración</h2>
            </div>
            <nav class="navHeader">
                <ul class="navLista">
                    <!-- <li class="listaItem">
                        <a class="link" aria-current="page"  href="../index.php">Index</a>
                    </li> -->
                    <li class="listaItem">
                        <a class="link" aria-current="page"  href="index_admin.php">Inicio</a>
                    </li>
                    <li class="listaItem">
                        <a class="link" aria-current="page"  href="menu.php">Menu</a>
                    </li>
                    <!-- <li class="listaItem">
                        <a class="link" aria-current="page"  href="galeria.php">Imagenes Local</a>
                    </li> -->
                    <li class="listaItem">
                        <a class="link" href="../conexion/cerrar.php">Cerrar Sesión: <?php echo $_SESSION['usuario']; ?></a> 
                    </li>
                </ul>
            </nav>
        </div>
    </header>