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
            <div class="fotoPrincipal margen-b">
                <!-- <img src="../assets/img/cafe.jpg" alt="Café" class="fotoCafe"> -->
                <h1 class="textoCafe">
                    Disfruta de un buen<br> café de especialidad! 
                </h1>
            </div>
            <div class="margen">
                <div class="petFriendly">
                    <div class="pet petTexto border">
                        <p class="pCombos">
                            Disfruta de nuestros <br> combos de hoy! <br>
                            <img src="../assets/img/logo-cafecito.jpg" alt="logo cafecito" class="cafecito">
                        </p>
                    </div>
                    <div class="pet">
                        <div class="container-carousel carousel-index">
                            <div class="carruseles" id="slider">
                                <section class="slider-section">
                                    <img src="../assets/img/Combos/cafe+croissant.jpg" alt="Combo Café más croissant" class="imgPet">
                                </section>
                                <section class="slider-section">
                                    <img src="../assets/img/Combos/Sandwich+Cafe.jpg" alt="Combo Café más sandwich" class="imgPet">
                                </section>
                                <section class="slider-section">
                                    <img src="../assets/img/Combos/cafe+torta.jpg" alt="Combo Café más torta" class="imgPet">
                                </section>
                            </div>
                            <div class="btn-left"><</div>
                            <div class="btn-right">></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="margen">
                <div class="petFriendly">
                    <div class="pet">
                        <img src="../assets/img/petfriendly.png" alt="PetFriendly" class="imgPet">
                        <!-- <img src="../assets/img/petfriendly2.jpg" alt="PetFriendly" class="imgPet"> -->
                    </div>
                    <div class="pet petTexto border">
                        <p class="pPet">
                            Aquí recibimos muy bien a las mascotas como si fueran nuestras!
                            <br>Tenemos agua y comida para ellos sin costo alguno.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php include 'footer.php'; ?>
