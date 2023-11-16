<?php include 'header.php'; ?>

<?php if($_POST){
    $nombre_producto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $valor = $_POST['valor'];
    $tipoAlimento = $_POST['tipoAlimento'];
    echo $tipoAlimento; die;
    $temperatura = $_POST['temperatura'];
    $imagen_bd = $_FILES['imagen']['name'];
    $imagen_temporal=$_FILES['imagen']['tmp_name']; #tenemos que guardar la imagen en una carpeta 
    $dulce = isset($_POST['dulce']) ? $_POST['dulce'] : false;
    $imagen = $imagen_bd;
    move_uploaded_file($imagen_temporal,"../assets/img/productos/".$imagen);

    #creo una instancia(objeto) de la clase de conexion
    $conexion = new conexion();
    
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
    
    $sql="INSERT INTO `producto` (`Nombre`,`Valor`,`idTipoAlimento`,`idTemperatura`,`Dulce`,`Imagen`, `Descripcion`) 
            VALUES ('$nombre_producto','$valor','$idAlim','$idTemp','$dulce','$imagen', '$descripcion')";
    $id_producto = $conexion->ejecutar($sql);
    #para que no intente borrar muchas veces
    header("Location:menu.php");
    die();
 }
 if($_GET){
    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['eliminar'])){
        $conexion = new conexion();
        $id = $_GET['eliminar'];
        // $imagen = $conexion->consultar("SELECT Imagen FROM `producto` WHERE `producto`.`Id`=".$id);
        // unlink("../assets/img/productos/".$imagen[0]['Imagen']);
        $sql ="UPDATE `producto` SET `estado` = 0 WHERE `producto`.`Id` =".$id; 
        $id_producto = $conexion->ejecutar($sql);
        header("Location:menu.php");
        die();
    }

    if(isset($_GET['menuModificar'])){
        $id = $_GET['menuModificar'];
        header("Location:menuModificar.php?menuModificar=".$id);
        die();
    }
 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new conexion();
  $alimentos = $conexion->consultar("SELECT *
                                        FROM `tipoalimento`
                                        WHERE `Estado` = 1");
  $temperaturas = $conexion->consultar("SELECT *
                                        FROM `temperatura`
                                        WHERE `Estado` = 1");
  $productos = $conexion->consultar("SELECT `P`.*, `A`.`Nombre` AS `Alimento`, `T`.`Nombre` AS `Temperatura`
                                        FROM `producto` as `P`
                                            INNER JOIN `tipoalimento` as `A` ON `A`.`id` = `P`.`idTipoAlimento` AND `A`.`estado` = 1
                                            INNER JOIN `temperatura` as `T` ON `T`.`id` = `P`.`idTemperatura` AND `T`.`estado` = 1
                                        WHERE `P`.`Estado` = 1
                                        ORDER BY `A`.`id`,`P`.`Nombre` ASC");
?> 
    <main>
        <section class="sCards">
            <div class="mainAbm">
                <div class="card-titulo">
                    <h2>Datos del Producto</h2>
                </div>
                <div class="card-body">
                    <form action="menu.php" method="POST" enctype="multipart/form-data">
                        <div class="formTotal">
                            <div class="formulario">
                                <div class="infoCard">
                                    <label for="Nombre">Nombre</label>
                                    <input required class="form-control" type="text" name="nombre" id="nombre">
                                </div>
                                <div class="infoCard">
                                    <label for="Valor">Valor</label>
                                    <input required class="form-control" type="number" name="valor" id="valor">
                                </div>
                                <div class="infoCard">
                                    <label for="TipoAlimento">Tipo de Alimento</label>
                                    <select name="tipoAlimento" class="form-control">
                                        <!-- <option value="0" class="form-control" disabled selected>Seleccione una opción...</option> -->
                                        <?php foreach($alimentos as $alimento){ ?>
                                        <option id="tipoAlimento" value="<?php echo $alimento['Nombre'];?>" class="form-control"><?php echo $alimento['Nombre'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="infoCard">
                                    <label for="Temperatura">Temperatura</label>
                                    <select name="temperatura" class="form-control">
                                        <!-- <option value="0" class="form-control" disabled selected>Seleccione una opción...</option> -->
                                        <?php foreach($temperaturas as $temperatura){ ?>
                                        <option value="<?php echo $temperatura['Nombre'];?>" class="form-control"><?php echo $temperatura['Nombre'];}?></option>
                                    </select>
                                </div>
                                <div class="infoCard">
                                    <label for="Dulce">Dulce<input class="form-control chk" type="checkbox" name="dulce" id="dulce" value="true"></label>
                                </div>
                                <div class="infoCard">
                                    <label for="Descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"></textarea>
                                </div>
                                <div>                        
                                    <input class="btn bEnviar" type="submit" value="Guardar">
                                </div>
                            </div>
                            <div class="lugarImagen">
                                <div class="infoCard">
                                    <label for="Imagen">Imagen</label>
                                    <img src="../assets/img/GetImagenProducto.jpg" alt="No hay imagen cargada" id="imgSinCargar" class = "imgSinCargar">
                                    <input required class="form-control" type="file" name ="imagen" id="imagen" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!--cierra el body-->
            </div><!--cierra el card-->
        </section>
        <div class="prodIng">
            <h2 class="titListado card-titulo2">Listado de productos ingresados: </h2>
            <div class="contenedorTabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Valor</th>
                            <th>Tipo de Alimento</th>
                            <th>Temperatura</th>
                            <th>Dulce</th>
                            <th>Descripcion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php #leemos productos 1 por 1
                        foreach($productos as $producto){ ?>
                        <tr >
                            <td><?php echo $producto['Nombre'];?></td>
                            <td><img width="200px" style="max-height:200px; object-fit:cover;" src="../assets/img/productos/<?php echo $producto['Imagen'];?>" alt="">  </td>
                            <td>$<?php echo $producto['Valor'];?></td>
                            <td><?php echo $producto['Alimento'];?></td>
                            <td><?php echo $producto['Temperatura'];?></td>
                            <td><?php echo $producto['Dulce'] ? 'SI' : 'NO';?></td>
                            <td><?php echo $producto['Descripcion'];?></td>
                            <td><a name="menuModificar" id="menuModificar" class="logoModificar" href="?menuModificar=<?php echo $producto['id'];?>">   
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" 
                                    viewBox="0 0 512 512" alt="Modificar" ><path class="logoModificar" alt="Modificar" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 
                                    121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 
                                    100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 
                                    25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 
                                    0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg></a>
                            <a name="eliminar" id="eliminar" class="eliminar" href="?eliminar=<?php echo $producto['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" 
                                viewBox="0 0 448 512" alt="Eliminar" class="logoEliminar" ><path class="logoEliminar" alt="Eliminar" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 
                                0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 
                                0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a></td>
                        </tr>
                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
            </div>
        </div><!--cierra el col-->  
    </main>

<script>
    //   $(document).ready(function() {
    //     $('.eliminar').click(function() {
    //         alert("¿Desea eliminar la imagen?");
    //     });
    // });
</script>

<?php include 'footer.php'; ?>