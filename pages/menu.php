<?php include 'header.php'; ?>
<?php 
$tipoAlimentos = $conexion->consultar("SELECT * FROM `tipoalimento` WHERE Estado = 1");?>
<nav class="navMenu" id="navMenu">
    <ul class="ul">
        <?php
        $primerItem = true;
        foreach($tipoAlimentos as $tipoAlimento){
        ?>
        <!-- <?php if($primerItem == true) echo "active" ?> -->
        <!-- <li><a href="#<?php echo $tipoAlimento['Nombre']?>"  class<li class="<?php if($tipoAlimento['Nombre'] === "Café") echo 'active'?>"><a href="#<?php echo $tipoAlimento['Nombre']?>" class="linkTipoAlimento link"><?php echo $tipoAlimento['Nombre'] ?></a></li> -->
        <li><a href="#<?php echo $tipoAlimento['Nombre']?>" class="linkTipoAlimento link <?php if($primerItem == true) echo "active" ?>"><?php echo $tipoAlimento['Nombre'] ?></a></li>
        <?php
        $primerItem = false;
         } ?>
    </ul>
</nav>
<div class="fondoSeccion">
    <div class="container">
<?php
foreach($tipoAlimentos as $tipoAlimento){        
$productos = $conexion->consultar("SELECT * FROM `producto` WHERE Estado = 1 AND `idTipoAlimento` = ".$tipoAlimento['id']);
?>
        <section class="seccionMenu" id="<?php echo $tipoAlimento['Nombre']?>">
            <h2><?php echo $tipoAlimento['Nombre'] ?></h2><br/>
            <div class="card-menu">
            <?php 
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
        <?php   
    }   
    ?>
    </div>
</div>
<?php include 'footer.php'; ?>