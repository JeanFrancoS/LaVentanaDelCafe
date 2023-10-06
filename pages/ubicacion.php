<?php include './header.php'; ?>
<?php
 $imagenes = $conexion->consultar("SELECT * FROM `imagenesLocal` WHERE Estado = 1");
 $imagenes = $conexion->consultar("SELECT * FROM `imagenesLocal` WHERE Estado = 1 LIMIT 1");
 $locales = $conexion->consultar("SELECT * FROM `sucursal` WHERE Estado = 1 ORDER BY fechaAlta DESC LIMIT 1");
?>
    <section class="fondoSeccion Ubicacion" id="Ubicacion">
        <div class="container">
                <h2>Nuestra sucursal</h2>                
                <?php foreach($locales as $local){ ?>
                <div class="ruta">
                    <div class="direccion">
                        <p> <?php echo $local['Direccion']; ?> </p>
                        <img src="..\assets\icons\LogoLaVentanaDelCafé.png" alt="La Ventana Del Café">
                        <!-- Montevideo 719, Recoleta, CABA -->
                    </div>
                    <div class="mapa">
                        <?php echo  $local['IframeMaps']; ?>
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d821.0365153862642!2d-58.390174330342695!3d-34.60046789830969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccac0ba9e8b93%3A0xa08b9f716c7460ec!2sMontevideo%20719%2C%20C1019%20San%20Nicolas%2C%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1693774288645!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                </div>
            <?php } ?>
            
                <div class="nuestroLocal">
                    <h2>Conocé nuestro local</h2>
                    <div class="carrousel">
                        <div class="grande">
                            <?php #leemos imagenes 1 por 1
                                foreach($imagenes as $imagen){ 
                            ?>
                                <div class="card-imagen">
                                    <img src="../assets/img/<?php echo $imagen['Imagen'];?>" alt="La Ventana Del Café">
                                </div>
                                <ul class="puntos">
                                    <li class="punto"></li>
                                </ul>
                            <?php 
                                } 
                            ?> 
                        </div>
                    </div>
            </div>
        </div>
    </section>
<?php include './footer.php'; ?>