<?php include 'header.php'; ?>
<?php 
$tipoAlimentos = $conexion->consultar("SELECT * FROM `tipoalimento` WHERE Estado = 1");
    
foreach($tipoAlimentos as $tipoAlimento){        
$productos = $conexion->consultar("SELECT * FROM `producto` WHERE Estado = 1 AND `idTipoAlimento` = ".$tipoAlimento['id']);
?>
    <div class="fondoSeccion">
        <section class="SeccionMenu" id="<?php $tipoAlimento['Nombre'] ?>">
            <h2><?php echo $tipoAlimento['Nombre'] ?></h2><br/>
            <div class="card-menu">
            <?php #leemos proyectos 1 por 1
                foreach($productos as $producto){ 
            ?>
                <div class="card">
                    <div class="card-valor">
                        <h3 class="">
                            $<?php echo $producto['Valor'];?>
                        </h3>
                    </div>
                    <img src="../assets/img/productos/<?php echo $producto['Imagen'];?>" alt="<?php echo $producto['Nombre'];?>">
                    <div class="card-body">
                        <h3 class="card-titulo">
                            <?php echo $producto['Nombre'];?>
                        </h3>   
                        
                        <p class="card-titulo">
                            <?php echo $producto['Descripcion'];?>
                        </p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </section>
    </div>
    <?php   
    }   
    ?>
<?php include 'footer.php'; ?>