<?php
namespace App\Models;

use PDO;
use PDOException;

class Connexion {

    private $pdo;

      

    public function connect($host, $dbname, $username, $password){
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            return $this->pdo;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    

    
}