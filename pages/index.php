<?php include 'header.php'; ?>
<?php 
 $imagenes= $conexion->consultar("SELECT * FROM `imageneslocal` WHERE Estado = 1");
?>
    <main>
        <section class="" id="Inicio">
            <!-- <div class="tit">
                <h2>La ventana del Café</h2>
            </div>
            <div class="cardsProyectos">
            <?php #leemos proyectos 1 por 1
                    foreach($imagenes as $imagen){ 
                        ?>
                    <div class="card">
                        <img width="200px" src="../assets/img/<?php echo $imagen['Imagen'];?>" alt="<?php echo $imagen['Nombre'];?>">
                        <?php echo $imagen['Imagen']; ?>
                    </div>
                <?php } ?>
            </div> -->
            <div class="fotoPrincipal">
                <!-- <img src="../assets/img/cafe.jpg" alt="Café" class="fotoCafe"> -->
                <h1 class="textoCafe">
                    Disfruta de un buen<br> café de especialidad! 
                </h1>
            </div>
            <div class="petFriendly">
                <div class="pet">
                    <img src="../assets/img/petfriendly.png" alt="PetFriendly" class="imgPet">
                    <!-- <img src="../assets/img/petfriendly2.jpg" alt="PetFriendly" class="imgPet"> -->
                </div>
                <div class="pet petTexto">
                    <p class="pPet">
                        Aquí recibimos muy bien a las mascotas como si fueran nuestras!
                        <br>Tenemos agua y comida para ellos sin costo alguno.
                    </p>
                </div>
            </div>
        </section>
    </main>

<?php include 'footer.php'; ?>
