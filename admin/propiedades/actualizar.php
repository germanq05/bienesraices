<?php

use App\Propiedad;
use App\Vendedor;

require '../../includes/app.php';

use Intervention\Image\ImageManagerStatic as Image;


estaAutenticado();

//Tomas ID de la propeidad a actualizar
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //Valida que sea un numero y no un script o string
//Valida que sea un id valido, si no lo es lo redirecciona a index
if (!$id) {
    header('Location: /admin');
}

//Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);


//Consultar para obtener vendedores
$vendedores = Vendedor::all();

//Arreglo con mensajes de errores
$errores = Propiedad::getErrores();


//Ejecutar el codigo despues que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Asignar los atributos
    $args = $_POST['propiedad'];


    $propiedad->sincronizar($args);

    //Validacion
    $errores = $propiedad->validar();

    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Subida de Archivos
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    //Revisar que el arreglo de errores este vacio
    if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            //Almacenar imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }
        //Insertar en la bd
        $propiedad->guardar();
    }
}


incluirTemplate('header');
?>



<main class="contenedor seccion">
    <h1 class="titulo">Actualizar</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" class="boton boton-verde" value="Actualizar Propiedad">

    </form>

</main>


<?php
incluirTemplate('footer');
?>