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
                    </div>
                    <div class="mapa">
                        <?php echo  $local['IframeMaps']; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="container-carousel carruselAncho">
                <div class="carruseles " id="slider">
                    <section class="slider-section">
                        <img src="../assets/img/Local/puerta.jpg" alt="Entrada cafetería">
                    </section>
                    <section class="slider-section">
                        <img src="../assets/img/Local/Interior.jpg" alt="Interior cafetería">
                    </section>
                    <section class="slider-section">
                        <img src="../assets/img/Local/cafe.jpg" alt="Café">
                    </section>
                </div>
                <div class="btn-left"><</div>
                <div class="btn-right">></div>
            </div>
        </div>
    </section>
<?php include './footer.php'; ?>