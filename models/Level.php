<?php

namespace Models;

use Models\ActiveRecord;

class Level extends ActiveRecord {

    // Base DE DATOS
    protected static $table = 'levels';
    // Columns database
    protected static $dbColumns = ['id', 'level', 'languaje_id'];

    public $id;
    public $level;
    public $languaje_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->level = $args['level'] ?? '';
        $this->languaje_id = $args['languaje_id'] ?? null;
    }
}