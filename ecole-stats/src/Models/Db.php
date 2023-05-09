<?php 

namespace App\Models;

use App\Models\Ecole;
use App\Models\Eleve;
use App\Models\Sport;
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
        // $sql = "INSERT INTO ecole (nom) VALUES ('" . $nomEcole . "')";
        $sql = "INSERT INTO ecole (nom) VALUES (:nom)";


        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('nom', $nomEcole);
        $stmt->execute();
    }

    public function insertEleve($nom, $prenom) { // $db->insertEcole("Ecole A");
        $eleve = new Eleve($nom, $prenom);
        $nomEleve = $eleve->getNom(); // $nomEcole = "Ecole A"; 
        $prenomEleve = $eleve->getPrenom();
        // $sql = "INSERT INTO ecole (nom) VALUES ('" . $nomEcole . "')";
        $sql = "INSERT INTO eleve (nom) VALUES (:nom, :prenom)";


        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('nom', $nomEleve);
        $stmt->bindParam('prenom', $prenomEleve);
        $stmt->execute();
    }

    public function insertSport($libelle) { // $db->insertEcole("Ecole A");
        $sport = new Sport($libelle);
        $libelle = $sport->getLibelle();
        // $sql = "INSERT INTO ecole (nom) VALUES ('" . $nomEcole . "')";
        $sql = "INSERT INTO sport (libelle) VALUES (:libelle)";


        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('libelle', $libelle);
        $stmt->execute();
    }




    
}


