<?php 

function conectarDB() : mysqli {
    // $db = new mysqli('localhost', 'root', '', 'db_profile');
    $db = new mysqli(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS'],
        $_ENV['DB_DATABASE']
    );


    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}