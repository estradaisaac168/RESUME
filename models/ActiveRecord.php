<?php

namespace Models;

class ActiveRecord
{

    // Base DE DATOS
    protected static $db;
    protected static $table = '';
    protected static $dbColumns = [];

    // Alertas y mensajes
    protected static $alerts = [];


    // Definir la conexión a la BD
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public static function setAlerts($type, $message)
    {
        static::$alerts[$type][] = $message;
    }

    // Validación
    public static function getAlerts()
    {
        return static::$alerts;
    }

    public function validate()
    {
        static::$alerts = [];
        return static::$alerts;
    }

    // Registros - CRUD
    public function save()
    {
        if (!is_null($this->id)) {
            // actualizar
            $this->update();
        } else {
            // Creando un nuevo registro
            $this->create();
        }
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$table;

        $result = self::sqlQuery($query);

        return $result;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$table  . " WHERE id = {$id}";

        $result = self::sqlQuery($query);

        return array_shift($result);
    }

    // Busca un registro por su id
    public static function where($column, $value)
    {
        $query = "SELECT * FROM " . static::$table  . " WHERE  {$column} = '{$value}'";
        $result = self::sqlQuery($query);
        // return array_shift($result);
        return $result;
    }

    // Consulta Plana de SQL (Utilizar cuando los métodos del modelo no son suficientes)
    public static function SQL($query)
    {
        $result = self::sqlQuery($query);
        return $result;
    }

    public static function get($limit)
    {
        $query = "SELECT * FROM " . static::$table . " LIMIT {$limit}";

        $result = self::sqlQuery($query);

        return $result;
    }

    // crea un nuevo registro
    public function create()
    {
        // Sanitizar los datos
        $atributes = $this->sanitizeAtributes();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($atributes));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributes));
        $query .= " ') ";

        // Resultado de la consulta
        $result = self::$db->query($query);

        // Mensaje de exito
        if ($result) {
            // Redireccionar al usuario.
            header('Location: /admin?resultado=1');
        }
    }

    public function update()
    {

        // Sanitizar los datos
        $atributes = $this->sanitizeAtributes();

        $values = [];
        foreach ($atributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .=  join(', ', $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $result = self::$db->query($query);

        if ($result) {
            // Redireccionar al usuario.
            header('Location: /admin?resultado=2');
        }
    }

    // Eliminar un registro
    public function delete()
    {
        // Eliminar el registro
        $query = "DELETE FROM "  . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $result = self::$db->query($query);

        if ($result) {
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    public static function sqlQuery($query)
    {
        // Consultar la base de datos
        $result = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($register = $result->fetch_assoc()) {
            $array[] = static::createObject($register);
        }

        // liberar la memoria
        $result->free();

        // retornar los resultados
        return $array;
    }

    protected static function createObject($register)
    {
        $object = new static;

        foreach ($register as $key => $value) {
            if (property_exists($object, $key)) {
                $object->$key = $value;
            }
        }

        return $object;
    }



    // Identificar y unir los atributos de la BD
    public function atributes()
    {
        $atributos = [];
        foreach (static::$dbColumns as $column) {
            if ($column === 'id') continue;
            $atributes[$column] = $this->$column;
        }
        return $atributes;
    }

    public function sanitizeAtributes()
    {
        $atributes = $this->atributes();
        $sanitized = [];
        foreach ($atributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    public function syncUP($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Subida de archivos
    public function setImagen($image)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            $this->deleteImage();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($image) {
            $this->image = $image;
        }
    }

    // Elimina el archivo
    public function deleteImage()
    {
        // Comprobar si existe el archivo
        $fileExist = file_exists(FILE_IMAGE . $this->image);
        if ($fileExist) {
            unlink(FILE_IMAGE . $this->image);
        }
    }
}
