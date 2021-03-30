<?php

require '../../includes/app.php';
//Anda git
use App\Vendedor;

estaAutenticado();

//Tomas ID del vendedor a actualizar
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //Valida que sea un numero y no un script o string
//Valida que sea un id valido, si no lo es lo redirecciona a index
if (!$id) {
    header('Location: /admin');
}

$vendedor = Vendedor::find($id);

//Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Asignar los atributos
    $args = $_POST['vendedor'];

    $vendedor->sincronizar($args);

    //Validacion
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $vendedor->guardar();

    }


}

incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1 class="titulo">Actualizar Vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" class="boton boton-verde" value="Guardar Cambios">

    </form>

</main>


<?php
    incluirTemplate('footer');
?>
