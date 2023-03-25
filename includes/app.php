<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'functions.php';
require 'config/database.php';


// Conectarnos a la base de datos
$db = conectarDB();

use Models\ActiveRecord;

ActiveRecord::setDB($db);