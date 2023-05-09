<?php 

namespace App\Models;

use App\Models\Ecole;
use App\Models\Connexion;

class Db {

    private $conn;
    private $pdo; 

    public function __construct(){
        $this->conn = new Connexion;

        $this->pdo = $this->conn->connect("localhost", "ecole_stats", "root", "");
    }

    public function insertEcole($nom) { // $db->insertEcole("Ecole A");
        $ecole = new Ecole($nom); // $this->nom = "Ecole A";
        $nomEcole = $ecole->getNom(); // $nomEcole = "Ecole A"; 
        $sql = "INSERT INTO ecole (nom) VALUES ($nomEcole)";

        $this->pdo->query($sql);
    }




    
}


