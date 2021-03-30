<?php

namespace App;

class ActiveRecord
{


    //Base de datos
    protected static $db;

    protected static $columnasDB = [];

    protected static $tabla = '';


    //Errores
    protected static $errores = [];



    //Definir la conexion a la bd
    public static function setDB($database)
    {
        self::$db = $database;
    }

    //Subida de archivos
    public function setImagen($imagen)
    {

        //Elimina imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen el nombre de la imagen (para tener la referencia y guardarlo en la bd)
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //Borrar el archivo
    public function borrarImagen()
    {
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();
        } else {
            //Creando un nuevo registro
            $this->crear();
        }
    }

    public function actualizar()
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";


        $resultado = self::$db->query($query);
        if ($resultado) {
            //Redireccionar el usuario
            header('Location: /admin?resultado=2');
        }
    }

    public function crear()
    {
        //Sanitizar la entrada de los datos
        $atributos = $this->sanitizarDatos();

        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        if ($resultado) {
            //Redireccionar el usuario
            header('Location: /admin?resultado=1');
        }
    }

    //Identiicar e unir los datos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue; //Ignora ese elemento
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    //Eliminar un registro
    public function eliminar()
    {
        //Elimina el registro
        $query = "DELETE FROM " . static::$tabla . " WHERE id = '" . self::$db->escape_string($_POST['id']) . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }


    //Validaciones
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = []; //Limpia el arreglo y genera nuevos errores si es necesario
        return static::$errores;
    }

    //Lista todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla; //static busca en la tabla que lo van a heradar, ese atributo

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Obtiene determinado numero de registros
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad; //static busca en la tabla que lo van a heradar, ese atributo

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Buscar un registro por si id
    public static function find($id)
    {

        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        //consultar base de datos
        $resultado = self::$db->query($query);

        //iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        //liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static; //Crea un registro de donde se herede

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
