<?php

namespace App;

class Vendedor extends ActiveRecord
{

    public static $tabla = 'vendedor';

    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;


    public function __construct($args = [])
    {

        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        
    }

    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir el nombre del vendedor.";
        }

        if (!$this->apellido) {
            self::$errores[] = "Debes añadir el apellido del vendedor";
        }

        if (!$this->telefono) {
            self::$errores[] = "El telefono es obligatorio";
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)){ //Busca un patron dentro de un texto
            self::$errores[] = "Formato no valido";

        }

        return self::$errores;
    }

}
