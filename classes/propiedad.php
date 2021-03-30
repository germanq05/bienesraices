<?php

namespace App;

class Propiedad extends ActiveRecord
{

    public static $tabla = 'propiedad';

    
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitacion', 'wc', 'estacionamiento', 'creado', 'idvendedor'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitacion;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $idvendedor;

    public function __construct($args = [])
    {

        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitacion = $args['habitacion'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->idvendedor = $args['idvendedor'] ?? '';
    }


    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo para la propiedad.";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio para la propiedad.";
        }

        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria.";
        }


        if (!$this->habitacion) {
            self::$errores[] = "Debes añadir la cantidad de habitaciones que tiene la propiedad.";
        }

        if (!$this->wc) {
            self::$errores[] = "Debes añadir la cantidad de baños de la propiedad.";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir la cantidad de estacionamientos disponible de la propiedad.";
        }

        if (!$this->idvendedor) {
            self::$errores[] = "Debes añadir que vendedor crea la propiedad.";
        }


        return self::$errores;
    }
}
