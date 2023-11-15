<?php include 'header.php';?>
<?php $conexion = new conexion();# es un objeto de tipo conexion,
      $imagenes= $conexion->consultar("SELECT * FROM `imageneslocal` WHERE `Estado` = 1"); 
      $imagenes= $conexion->consultar("SELECT * FROM `imageneslocal` WHERE `Estado` = 1"); ?>
<main class="cards">
    <div class="proyectosView">
        <div class="">
            <h1 class="titulo">Administrador de La Ventana del Café</h1>
            <p class="">Menu cargado en la base de datos</p>
            <hr class="separador">
            <p class="">
                Cualquier duda o consulta que tenga puede enviarnos un mail <a href="mailto:jeanfsole@hotmail.com" class="linkMail">Click para enviar email</a>
            </p>
        </div>
    </div>
    <!-- <div class ="container bg-secondary pb-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php #leemos proyectos 1 por 1
            foreach($proyectos as $proyecto){ ?>
                <div class="col cardsProyectos">
                    <div class="card border border-3 shadow cardsProyectos">
                        <img class="card-img-top" style="object-fit:cover;" src="./assets/img/<?php echo $proyecto['Imagen'];?>" alt="" width="300">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $proyecto['Nombre'];?></h5>
                            <p class="card-text mx-2"><?php echo $proyecto['Descripcion'];?></p>
                        </div>
                    </div>
                </div>
           < <?php } ?>
        </div>
    </div> -->
        <!-- <div class="gridProyectos">
        <?php #leemos proyectos 1 por 1
            foreach($imagenes as $imagen){ ?>
                    <div class="gridCard">
                        <img class="imgCard" src="../assets/img/<?php echo $imagen['Imagen'];?>" alt="<?php echo $imagen['Nombre'];?>" width="300">
                        <h5 class="h5Card"><?php echo $imagen['Nombre'];?></h5>
                        <p class="descripCard"><?php echo $imagen['Descripcion'];?></p>
                    </div>
            <?php } ?>
        </div> -->
        <!-- <div class="gridProyectos">
        <?php #leemos proyectos 1 por 1
            foreach($imagenes as $imagen){ ?>
                    <div class="gridCard">
                        <img class="imgCard" src="../assets/img/<?php echo $imagen['Imagen'];?>" alt="<?php echo $imagen['Nombre'];?>" width="300">
                        <h5 class="h5Card"><?php echo $imagen['Nombre'];?></h5>
                        <p class="descripCard"><?php echo $imagen['Descripcion'];?></p>
                    </div>
            <?php } ?>
        </div> -->
</main>        
<?php include 'footer.php'; ?>
