<?php

namespace Models;

use Models\ActiveRecord;

class Languaje extends ActiveRecord {

    // Base DE DATOS
    protected static $table = 'languajes';
    // Columns database
    protected static $dbColumns = ['id', 'languaje', 'profile_id'];

    public $id;
    public $languaje;
    public $level;
    public $profile_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->languaje = $args['languaje'] ?? '';
        $this->level = $args['level'] ?? '';
        $this->profile_id = $args['profile_id'] ?? null;
    }
}