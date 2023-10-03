<?php include 'header.php'; ?>
    <section class="SeccionMenu Contactame" id="Contactame">
        <div class="formulario">
            <div class="titulo">
                <h2>CONTACTANOS</h2>
            </div>
            <h3>¡Cualquier sugerencia, queja, duda o lo que necesite, siempre será bien recibido para seguir mejorando!<br>Sus datos no serán compartidos. </h3>
            <p class="pAclaracion">*Todos los campos son obligatorios a excepción del número de teléfono.</p>
            <form action="formAct" class="form">
                <div class="datosPersonales">
                    <input type="text"  class="txt datos" id="nombre" name="name"  placeholder="Nombre*" required>
                    <input type="email" class="txt datos" id="email"  name="email" placeholder="Email*"  required>
                    <input type="tel"   class="txt datos" id="phone"  name="phone" placeholder="Número de teléfono" pattern="[0-9]{11}">
                </div>
                <div>
                    <input type="text"  class="txt msje asunto" id="asunto" name="asunto" placeholder="Asunto*" required>
                </div>
                <div>
                    <textarea type="text"  class="txt msje" id="mensaje" name="message" placeholder="Escriba un mensaje*" cols="90" rows="4" required></textarea>
                </div>
                <div class="btnesForm">
                    <input type="reset" value="Borrar" class="btn btnForm">
                    <input type="submit" value="Enviar" class="btn btnForm">
                </div>
            </form>
        </div>
    </section>
<?php include 'footer.php'; ?>