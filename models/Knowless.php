<?php

namespace Models;

use Models\ActiveRecord;

class Knowless extends ActiveRecord {

    // Base DE DATOS
    protected static $table = 'knowless';
    // Columns database
    protected static $dbColumns = ['id', 'knowless', 'profile_id'];

    public $id;
    public $knowless;
    public $profile_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->knowless = $args['knowless'] ?? '';
        $this->profile_id = $args['profile_id'] ?? null;
    }
}