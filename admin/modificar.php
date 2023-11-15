<?php include 'header.php'; 
if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $proyecto= $conexion->consultar("SELECT * FROM `imagenesLocal` WHERE Id=".$id);
    }
}
if($_POST){
    $id = $_SESSION['id_proyecto'];
    
    $imagen_bd = $conexion->consultar("SELECT Imagen FROM `imagenesLocal` WHERE id=".$id);
    $imagen_seleccionada = $_FILES['imagen']['name']; //imagen_bd
    $nombre_imagen = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    if ($imagen_seleccionada!="") {
        unlink("../assets/img/".$imagen_bd[0]['Imagen']);
        $imagen_temporal=$_FILES['imagen']['tmp_name'];
        $fecha = new DateTime();
        $imagen = $fecha->getTimestamp()."_".$imagen_seleccionada;
        move_uploaded_file($imagen_temporal,"../assets/img/".$imagen);
        $sql = "UPDATE `imagenesLocal` SET `Nombre` = '$nombre_imagen' , `Imagen` = '$imagen', `Descripcion` = '$descripcion' WHERE `imagenesLocal`.`id` = '$id';";
    }
    else{
        $sql = "UPDATE `imagenesLocal` SET `Nombre` = '$nombre_imagen' , `Descripcion` = '$descripcion' WHERE `imagenesLocal`.`id` = '$id';";
    }
    $id_proyecto = $conexion->ejecutar($sql);
    header("location:galeria.php");
    die();
}
?>
<main>
    <section class="sCards">
        <div class="mainAbm">
            <?php #leemos proyectos 1 por 1
            foreach($proyecto as $fila){ ?>
                <div class="Modificar">
                    <div class="card-titulo">
                        <h2>Datos de las imágenes del local</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="formTotal">
                                <div class="formulario">
                                    <div class="infoCard">
                                        <label for="Nombre">Nombre de la Imagen</label>
                                        <input required class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $fila['Nombre'];?>"></input>
                                    </div>
                                    <div class="infoCard">
                                        <label for="Descripcion">Indique Descripción de la Imagen</label>
                                        <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4" ><?php echo $fila['Descripcion'];?></textarea>
                                    </div>
                                    <div>                        
                                        <input class="btn bEnviar" type="submit" value="Modificar"></input>
                                        <a href="galeria.php" class="btn bCancelar" type="button">Cancelar</a>
                                    </div>
                                </div>
                                <div id="lugarImagen">
                                    <div class="infoCard">
                                        <label for="Imagen">Imagen</label>
                                        <img src="../assets/img/<?php echo $fila['Imagen'];?>" alt="" id="imgSinCargar" class = "imgSinCargar">
                                        <input class="form-control" type="file" name ="imagen" id="imagen" accept=".jpg, .jpeg, .png"></input>
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