<?php

namespace Models;

use Models\ActiveRecord;

class PersonalSkill extends ActiveRecord {

    // Base DE DATOS
    protected static $table = 'personal_skills';
    // Columns database
    protected static $dbColumns = ['id', 'skill', 'profile_id'];

    public $id;
    public $skill;
    public $profile_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->skill = $args['skill'] ?? '';
        $this->profile_id = $args['profile_id'] ?? null;
    }
}