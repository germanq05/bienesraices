<?php
    session_start();

    //Reescribir el arreglo de $_SESSION para que no contenga informacion
    $_SESSION = [];

    header('Location: /');

?>