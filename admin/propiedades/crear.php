<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();


//Obtener todos los vendedores
$vendedores = Vendedor::all();

$propiedad = new Propiedad;


//Arreglo con mensajes de errores
$errores = Propiedad::getErrores();


//Ejecutar el codigo despues que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);


    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Setear imagen
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }
    
    //Validar
    $errores = $propiedad->validar();

    //Revisar que el arreglo de errores este vacio
    if (empty($errores)) {

        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //Guardar imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        //Guarda en la base de datos
        $propiedad->guardar();

    }
}


incluirTemplate('header');
?>



<main class="contenedor seccion">
    <h1 class="titulo">Crear Propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" class="boton boton-verde" value="Crear Propiedad">

    </form>

</main>


<?php
incluirTemplate('footer');
?>