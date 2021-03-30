<?php 
    require 'includes/app.php';

    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="webp">
        <source srcset="build/img/destacada3.jpg" type="jpeg">
        <img src="build/img/destacada3.jpg" alt="Imagen destacada" loading="lazy">
    </picture>
    <h2>Llene el Formulario de Contacto</h2>

    <form class="formulario">
        <fieldset>

            <legend>Informacion Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Tu nombre...">

            <label for="email">E-mail</label>
            <input type="email" id="email" placeholder="Tu email...">

            <label for="telefono">Telefono</label>
            <input type="tel" id="telefono" placeholder="Tu telefono...">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" cols="30" rows="10"></textarea>

        </fieldset>

        <fieldset>
            <legend> Informacion Sobre la Propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="venta">Venta</option>
                </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" id="presupuesto" placeholder="Tu Precio o Presupuesto...">

        </fieldset>

        <fieldset>

            <legend>Informacion sobre la Propiedad</legend>
            <p>¿Como desea ser Contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email">
            </div>

            <p>Si eligio telefono, ¿en que horario lo podriamos contactar?</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="08:00" max="20:00">


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>

</main>


<?php 
incluirTemplate('footer');
?>