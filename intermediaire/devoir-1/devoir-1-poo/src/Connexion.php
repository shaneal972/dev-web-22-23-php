<?php

namespace App;

use PDO;
use PDOException;

require_once 'functions/config.php';

class Connexion
{

    public $test;

    public static function make($host, $dbname, $username, $password)
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

            return new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


return Connexion::make($host, $dbname, $username, $password);