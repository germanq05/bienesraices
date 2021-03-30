<?php

//Importar la Conexion
require 'includes/app.php';
$db = conectarDB();

//Crear un email y password
$email = "german@gmail.com";
$password = "1234";

//Hashear password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Query para crear usuario
$query = "INSERT INTO usuario (email, password) VALUES ( '${email}', '${passwordHash}' )";

//Agregarlo a la base de datos
mysqli_query($db, $query);