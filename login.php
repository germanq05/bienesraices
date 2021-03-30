<?php

//Base de datos
require 'includes/app.php';
$db = conectarDB();

//Errores
$errores = [];

//Autenticar el usuario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[] = "El email es Obligatorio o No es Valido";
    }
    if(!$password){
        $errores[] = "El Password es Obligatorio o No es Valido";
    }

    if(empty($errores)){

        //Revisar si el usuario existe
        $query = "SELECT * FROM usuario WHERE email = '${email}' ";
        $resultado = mysqli_query($db, $query);

        if($resultado->num_rows){ //Como $resultado es un Object, se utiliza sintaxis de flecha
            
            //Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            //Verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);
            if($auth){
                //El usuario esta autenticado
                session_start(); //Iniciar sesion

                //Llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');


            }else{
                $errores[] = "El Password es incorrecto";
            }
        
        }else{
            $errores[] = "El Usuario no Existe";
        }

    }

}


incluirTemplate('header');
?>



<main class="contenedor seccion contenido-centrado">

    <h1>Iniciar Sesion</h1>

    <?php foreach($errores as $error):?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach ?>

    <form method="POST" class="formulario">
        <fieldset>

            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu email..." require>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Tu password..." require>

        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">


    </form>

</main>


<?php
incluirTemplate('footer');
?>