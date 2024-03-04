<?php include 'header.php'; 
if($_GET){
    if(isset($_GET['menuModificar'])){
        $id = $_GET['menuModificar'];
        $_SESSION['id_producto'] = $id;
        
        $conexion = new conexion();
        $producto = $conexion->consultar("SELECT * FROM `producto` WHERE Id=".$id);
    }
}
if($_POST){
    $id = $_SESSION['id_producto'];
    
    $imagen_bd = $conexion->consultar("SELECT Imagen FROM `producto` WHERE id=".$id);
    $imagen_seleccionada = $_FILES['imagen']['name']; //imagen_bd
    $nombre_imagen = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $valor = $_POST['Valor'];
    $tipoAlimento = $_POST['tipoAlimento'];
    $temperatura = $_POST['temperatura'];
    $dulce = isset($_POST['Dulce']);
    $activo = isset($_POST['Estado']);
    

    $sqlTemp = "SELECT id 
        FROM `Temperatura`
        WHERE `Estado` = 1
            AND `Nombre` = '$temperatura'";
    $sqlAlim = "SELECT id
        FROM `tipoalimento`
        WHERE `Estado` = 1
            AND `Nombre` = '$tipoAlimento'";
    $tempSelec = $conexion->consultar($sqlTemp);
    $alimSelec = $conexion->consultar($sqlAlim);
    foreach($tempSelec as $ts){
        $idTemp = $ts['id'];
    }
    foreach($alimSelec as $as){
        $idAlim = $as['id'];
    }

    if ($imagen_seleccionada!="") {
        unlink("../assets/img/productos/".$imagen_bd[0]['Imagen']);
        $imagen_temporal=$_FILES['imagen']['tmp_name'];
        $imagen = $imagen_seleccionada;
        move_uploaded_file($imagen_temporal,"../assets/img/productos/".$imagen);
        $sql = "UPDATE `producto` AS `P`
                    INNER JOIN `tipoalimento` as `A` ON `A`.`id` = `P`.`idTipoAlimento`
                    INNER JOIN `temperatura` as `T` ON `T`.`id` = `P`.`idTemperatura`
                    SET `P`.`Nombre` = '$nombre_imagen' , 
                                    `P`.`Imagen` = '$imagen', 
                                    `P`.`Valor` = '$valor', 
                                    `P`.`idTipoAlimento` =  '$idAlim', 
                                    `P`.`idTemperatura` =  '$idTemp',  
                                    `P`.`Dulce` = '$dulce', 
                                    `P`.`Estado` = '$activo', 
                                    `P`.`Descripcion` = TRIM('$descripcion')
                    WHERE `P`.`id` = '$id';";
    }
    else{
        $sql = "UPDATE `producto` as `P` 
                    INNER JOIN `tipoalimento` as `A` ON `A`.`id` = `P`.`idTipoAlimento`
                    INNER JOIN `temperatura` as `T` ON `T`.`id` = `P`.`idTemperatura`
                    SET `P`.`Nombre` = '$nombre_imagen', 
                                    `P`.`Valor` = '$valor', 
                                    `P`.`idTipoAlimento` = $idAlim,
                                    `P`.`idTemperatura` = $idTemp,
                                    `P`.`Dulce` = '$dulce', 
                                    `P`.`Estado` = '$activo', 
                                    `P`.`Descripcion` = TRIM('$descripcion')
                    WHERE `P`.`id` = '$id'";
    }
    $id_producto = $conexion->ejecutar($sql);
    echo $sql;
    header("location:menu.php");
    die();
}
$alimentos = $conexion->consultar("SELECT *
                                    FROM `tipoalimento`
                                    WHERE `Estado` = 1");
$temperaturas = $conexion->consultar("SELECT *
                                        FROM `temperatura`
                                        WHERE `Estado` = 1");
?>
<main>
    <section class="sCards" >
        <div class="mainAbm modifAbm">
            <?php #leemos proyectos 1 por 1
            foreach($producto as $campo){ 
                $ta = $campo["idTipoAlimento"];
                $t = $campo["idTemperatura"];
                $d = $campo['Dulce'];
                $e = $campo['Estado'];
                $productoSeleccionado = $conexion->consultar("SELECT `P`.*, `A`.`Nombre` AS `Alimento`, `T`.`Nombre` AS `Temperatura`
                                                                FROM `producto` as `P`
                                                                    INNER JOIN `tipoalimento` as `A` ON `A`.`id` = `P`.`idTipoAlimento` AND `A`.`estado` = 1
                                                                    INNER JOIN `temperatura` as `T` ON `T`.`id` = `P`.`idTemperatura` AND `T`.`estado` = 1
                                                                WHERE `P`.`Estado` = 1
                                                                    AND '$ta' = `A`.`id` 
                                                                    AND '$t' = `T`.`id` 
                                                                LIMIT 1");
                foreach($productoSeleccionado as $ps){
                        $prodSelecAlimento = $ps['Alimento']; 
                        $prodSelecTemperatura = $ps['Temperatura'];
                }?>
                        
                <div class="Modificar">
                    <div class="card-titulo">
                        <h2>Datos del Producto</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="formTotal modif">
                                <div class="formulario">
                                    <div class="infoCard">
                                        <label for="Nombre">Nombre</label>
                                        <input required class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $campo['Nombre']?>">
                                    </div>
                                    <div class="infoCard">
                                        <label for="Valor">Valor</label>
                                        <input required class="form-control" type="text" name="Valor" id="Valor" value="<?php echo $campo['Valor']?>">
                                    </div>
                                    <div class="infoCard">
                                        <label for="TipoAlimento">Tipo de Alimento</label>
                                        <select name="tipoAlimento" class="form-control">
                                            <?php foreach($alimentos as $alimento){ ?>
                                            <option value="<?php echo $alimento['Nombre'];?>" class="form-control" id="tipoAlimento" <?php if ($prodSelecAlimento == $alimento['Nombre']) { echo 'selected="selected"';} ?>><?php echo $alimento['Nombre'];}?></option>
                                        </select>
                                    </div>
                                    <div class="infoCard">
                                        <label for="Temperatura">Temperatura</label>
                                        <select name="temperatura" class="form-control">
                                            <?php foreach($temperaturas as $temperatura){ ?>
                                            <option value="<?php echo $temperatura['Nombre'];?>" class="form-control" id="temperatura" <?php if ($prodSelecTemperatura == $temperatura['Nombre']) { echo 'selected="selected"';} ?>><?php echo $temperatura['Nombre'];}?></option>
                                        </select>
                                    </div>
                                    <div class="infoCard">
                                        <label for="Dulce">Dulce<input class="form-control chk" type="checkbox" name="Dulce" id="Dulce" <?php echo ($campo['Dulce'] == 1) ? 'checked' : ''; ?>></label>
                                    </div>
                                    <div class="infoCard">
                                        <label for="Activo">Activo<input class="form-control chk" type="checkbox" name="Activo" id="Activo" <?php echo ($campo['Estado'] == 1) ? 'checked' : ''; ?>></label>
                                    </div>
                                    <div class="infoCard">
                                        <label for="Descripcion">Descripción</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"><?php echo $campo['Descripcion']?></textarea>
                                    </div>
                                    <div>                        
                                        <input class="btn bEnviar" type="submit" value="Modificar"></input>
                                        <a href="menu.php" class="btn bCancelar" type="button">Cancelar</a>
                                    </div>
                                    </div>
                                    <div id="lugarImagen">
                                        <div class="infoCard">
                                            <label for="Imagen">Imagen</label>
                                            <img src="../assets/img/productos/<?php echo $campo['Imagen'];?>" alt="" id="imgSinCargar" class = "imgSinCargar">
                                            <input class="form-control" type="file" name ="imagen" id="imagen" accept=".jpg, .jpeg, .png"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php #cerramos la llave del foreach
            } ?>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>