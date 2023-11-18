<?php include 'header.php';?>
<?php $conexion = new conexion();# es un objeto de tipo conexion,
      $productos = $conexion->consultar("SELECT `P`.*, `A`.`Nombre` AS `Alimento`, `T`.`Nombre` AS `Temperatura`
      FROM `producto` as `P`
          INNER JOIN `tipoalimento` as `A` ON `A`.`id` = `P`.`idTipoAlimento` AND `A`.`estado` = 1
          INNER JOIN `temperatura` as `T` ON `T`.`id` = `P`.`idTemperatura` AND `T`.`estado` = 1
      WHERE `P`.`Estado` = 0
      ORDER BY `A`.`id`,`P`.`Nombre` ASC");
      
      
    if($_GET){
        if(isset($_GET['alta'])){
            $id = $_GET['alta'];
            $sql ="UPDATE `producto` SET `estado` = 1 WHERE `producto`.`Id` =".$id; 
            $id_producto = $conexion->ejecutar($sql);
            header("Location:index_admin.php");
            die();
        }
        if(isset($_GET['menuModificar'])){
            $id = $_GET['menuModificar'];
            header("Location:menuModificar.php?menuModificar=".$id);
            die();
        }
    }
      ?>


<main class="cards">
    <div class="proyectosView">
        <div class="">
            <h1 class="titulo">Administrador de La Ventana del Café</h1>
            <!-- <p class="">Menu cargado en la base de datos</p> -->
            <hr class="separador">
            <p class="">
                Cualquier duda o consulta que tenga puede enviarnos un correo <a href="mailto:jeanfsole@hotmail.com" class="linkMail">Click para enviar email</a>
                <br><br> O enviarnos un mensaje al Whatsapp <a href="https://web.whatsapp.com/send?phone=54%C2%A09%C2%A011%C2%A03617-2154&text=Hola!%20Quería%20pedirte%20[ingrese%20lo%20que%20desea%20pedir]%20a%20nombre%20de%20[nombre].%20En%20cuanto%20tiempo%20estará%20mi%20pedido?&#128513]"
                    target="_blank" class="linkMail">Click para enviar mensaje</a>
            </p>
        </div>
    </div>
    <div class="prodIng">
            <h2 class="titListado card-titulo2">Listado de productos dados de baja: </h2>
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
                            <td><a name="menuModificar" id="menuModificar" class="logoModificar btnTabla" href="?menuModificar=<?php echo $producto['id'];?>">   
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" 
                                    viewBox="0 0 512 512" alt="Modificar" ><path class="logoModificar" alt="Modificar" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 
                                    121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 
                                    100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 
                                    25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 
                                    0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg></a>
                            <a name="alta" id="alta" class="alta btnTabla" alt="ALTA" href="?alta=<?php echo $producto['id'];?>">   
                            <svg xmlns="http://www.w3.org/2000/svg"  height="1em" viewBox="0 0 384 512"><path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 
                                        45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg></a></td>
                        </tr>
                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>        
<?php include 'footer.php'; ?>
