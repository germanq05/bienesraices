<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de la propiedad..." value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propiedad..." value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]" type="file">

    <?php if ($propiedad->imagen) { ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la Propiedad</legend>

    <label for="habitacion">Habitaciones:</label>
    <input type="number" name="propiedad[habitacion]" id="habitacion" placeholder="Ej.: 3" min="1" max="9" value="<?php echo s($propiedad->habitacion); ?>">

    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="Ej.: 1" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamientos:</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej.: 2" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">

</fieldset>

<fieldset>

    <legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[idvendedor]" id="vendedor">
        <option selected disabled value="">-- Seleccione --</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->idvendedor === $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id); ?>"> <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?> </option>
        <?php } ?>
    </select>


</fieldset>