<!DOCTYPE html>
<html lang="es">
<head>
<?php include '../conexion/conexion.php';
$conexion = new conexion();
$sucursales = $conexion->consultar("SELECT * FROM `sucursal` WHERE Estado = 1"); 
foreach($sucursales as $sucursal){ 
    $nombre_sucursal = $sucursal['Nombre']; 
    $logo_sucursal = $sucursal['Logo']; 
    $horario_sucursal = $sucursal['Horario'];
}?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre_sucursal ?></title>
    <link rel="stylesheet" href="../css/styles-index.css">
    <script src="https://kit.fontawesome.com/45b2b8f4cd.js" crossorigin="anonymous"></script>
    <link rel="website icon" href="../assets/icons/<?php echo $logo_sucursal ?>" type="image/x-icon">
</head>
<body class="body">
    <header class="header">
        <div class="horario">
            <h3>Abiertos de <?php echo $horario_sucursal ?></h3>
        </div>
        <div class="menu">
            <div class="logo">
                <a href="index.php"><img src="../assets/icons/<?php echo $logo_sucursal ?>" alt="<?php echo $nombre_sucursal ?>" class="imgLogo"></a>
                <h2><?php echo $nombre_sucursal ?></h2>
            </div>
            <nav class="navHeader">
                <ul class="navLista">
                    <li class="listaItem"><a href="index.php" class="link">Inicio</a></li>
                    <li class="listaItem"><a href="menu.php" class="link">Menú</a></li>
                    <li class="listaItem"><a href="ubicacion.php" class="link">Ubicacion</a></li>
                    <!-- <li class="listaItem"><a href="nosotros.php" class="link">Nosotros</a></li> -->
                    <li class="listaItem"><a href="contactanos.php" class="link">Contactanos</a></li>
                    <li class="listaItem"><a href="login.php" class="link">Acceder</a></li>
                </ul>
            </nav>
        </div>
    </header>
