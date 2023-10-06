<?php include 'header.php'; ?>
    <section class="fondoSeccion" id="Contactanos">
        <div class="container">
            <h2>CONTACTANOS</h2>
            <div class="formGral">
                <div class="formulario">
                    <img src="../assets/img/cafe4.jpg" alt="Cafe3" class="fotoForm">
                </div>
                <div class="formulario">
                    <h3>Cualquier sugerencia, queja o duda siempre será bien recibida.<br>Sus datos no serán compartidos. </h3>
                    <p class="pAclaracion">Todos los campos con * son obligatorios.</p>
                    <form action="formAct" class="form">
                        <div class="datosPersonales">
                            <input type="text"  class="txt datos" id="nombre" name="name"  placeholder="Nombre*" required>
                            <input type="email" class="txt datos" id="email"  name="email" placeholder="Email*"  required>
                            <input type="tel"   class="txt datos" id="phone"  name="phone" placeholder="Número de teléfono" pattern="[0-9]{11}">
                            <input type="text"  class="txt msje asunto" id="asunto" name="asunto" placeholder="Asunto*" required>
                        </div>
                        <div>
                            <textarea type="text"  class="txt msje" id="mensaje" name="message" placeholder="Escriba un mensaje*" cols="90" rows="4" required></textarea>
                        </div>
                        <div class="btnesForm">
                            <!-- <input type="reset" value="Borrar" class="btn btnForm"> -->
                            <input type="submit" value="Enviar" class="btn btnForm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include 'footer.php'; ?>