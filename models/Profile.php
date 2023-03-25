<?php

namespace Models;

use Models\ActiveRecord;

class Profile extends ActiveRecord {

    // Base DE DATOS
    protected static $table = 'profiles';
    // Columns database
    protected static $dbColumns = ['id', 'name', 'lastname', 'image', 'profession' ,'age', 'phone', 'email', 'description'];

    public $id;
    public $name;
    public $lastname;
    public $image;
    public $profession;
    public $age;
    public $phone;
    public $email;
    public $description;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->profession = $args['profession'] ?? '';
        $this->age = $args['age'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->description = $args['description'] ?? '';
    }
}