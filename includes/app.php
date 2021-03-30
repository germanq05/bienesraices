<?php 

//ESTE ARCHIVO VA A MANDAR A LLAMAR FUNCIONES Y CLASES

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos a la base de datos
$db = conectarDB();


use App\ActiveRecord;
ActiveRecord::setDB($db);
