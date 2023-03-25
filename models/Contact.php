<?php

namespace Models;

use Models\ActiveRecord;

class Contact extends ActiveRecord {

    // Base DE DATOS
    protected static $table = 'contact';
    // Columns database
    protected static $dbColumns = ['id', 'company', 'name', 'email', 'message'];

    public $id;
    public $company;
    public $name;
    public $email;
    public $message;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->company = $args['company'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->message = $args['message'] ?? '';

    }

    public function validateEmail(){

        if (!$this->company) {
            self::$alerts['alert-danger'][] = 'El nombre de la compania es obligatorio';
        }

        if (!$this->name) {
            self::$alerts['alert-danger'][] = 'El nombre del reclutador es obligatorio';
        }

        if (!$this->email) {
            self::$alerts['alert-danger'][] = 'El email es obligatorio';
        }

        if (!is_valid_email($this->email)) {
            self::$alerts['alert-danger'][] = 'El email debe de ser valido';
        }

        if (!$this->message) {
            self::$alerts['alert-danger'][] = 'Escribe un texto para el mensaje';
        }

        return self::$alerts;
    }
}