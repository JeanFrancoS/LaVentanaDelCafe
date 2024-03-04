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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="website icon" href="../assets/icons/<?php echo $logo_sucursal ?>" type="image/x-icon">
</head>
<body class="body">
    <header class="header">
        <div class="horario">
            <h3>Lunes a Sábados <?php echo $horario_sucursal ?></h3>
        </div>
        <div class="menu">
            <div class="logo">
                <a href="index.php"><img src="../assets/icons/<?php echo $logo_sucursal ?>" alt="<?php echo $nombre_sucursal ?>" class="imgLogo"></a>
                <h2><?php echo $nombre_sucursal ?></h2>
            </div>
            <button class="btnHamburguesa" id="btnHamburguesa"><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></button>
            <nav class="navHeader" id="navHeader">
                <button class="btnCerrarHamburguesa" id="btnCerrarHamburguesa"><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg></button>
                <ul class="navLista">
                    <li class="listaItem"><a href="index.php" class="link">Inicio</a></li>
                    <li class="listaItem"><a href="menu.php" class="link">Menú</a></li>
                    <li class="listaItem"><a href="ubicacion.php" class="link">Ubicacion</a></li>
                    <li class="listaItem"><a href="contactanos.php" class="link">Contactanos</a></li>
                    <!-- <li class="listaItem"><a href="login.php" class="link">Acceder</a></li> -->
                </ul>
            </nav>
        </div>
    </header>
