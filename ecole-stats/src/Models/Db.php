<?php 

namespace App\Models;

use PDO;
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
        $sql = "INSERT INTO eleve (nom, prenom) VALUES (:nom, :prenom)";


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

    public function getEleves(): array{
        $sql = "SELECT id_eleve FROM eleve";

        $stmt = $this->pdo->query($sql, null, PDO::FETCH_OBJ);

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getEcoles(): array{
        $sql = "SELECT id_ecole FROM ecole";

        $stmt = $this->pdo->query($sql, null, PDO::FETCH_OBJ);

        return $stmt->fetchAll();
    }

    public function updateEleveById($id_eleve, $id_ecole){
        $sql = "UPDATE eleve
                SET id_ecole = $id_ecole
                WHERE id_eleve = $id_eleve";
        
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
    }

    public function updateSportEleveById($id_eleve, $id_sport){
        $sql = "UPDATE eleve
                SET id_sport = $id_sport
                WHERE id_eleve = $id_eleve";
        
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
    }

    public function insertEleveSPort($id_eleve, $id_sport){
        $sql = "INSERT INTO eleve_sport (id_eleve, id_sport)
                VALUES (:idEleve, :idSport)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('idEleve', $id_eleve);
        $stmt->bindParam('idSport', $id_sport);

        $stmt->execute();
    }

    public function addEleveToEcole(){

        $eleves = $this->getEleves();

        foreach ($eleves as $id_eleve) {
            foreach ($id_eleve as $id) {
                //Générer un nombre aléatoire entre 1 et 3.
                $id_ecole = rand(1, 3);
                $this->updateEleveById($id, $id_ecole);
                
            }
        }

    }

    public function verifyDuplicateSport($id_eleve, $id_sport): bool{
        $sql = "SELECT id_eleve 
                FROM eleve_sport
                WHERE id_eleve = :idEleve AND id_sport = :idSport";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('idEleve', $id_eleve);
        $stmt->bindParam('idSport', $id_sport);

        $stmt->execute();
        $result = $stmt->fetchAll();
        if(count($result) >= 1){
            return true;
        }
        
        return false;
    }

    public function addSportToEleve(){

        // $eleves = $this->getEleves();
        for($i = 0; $i < 50; $i++){

            //Générer une nombre aléatoire entre 1 et 50
            $id_eleve = rand(1, 50); //1
            //Générer un nombre aléatoire entre 0 et 5.
            $id_sport = rand(1, 5); //3
            //Compter le nombre de fois qu'apparait un id_eleve doit être <= 3.
            if($this->verifyDuplicateSport($id_eleve, $id_sport) === false){
                $this->insertEleveSPort($id_eleve, $id_sport);
            }
            $sql = "SELECT COUNT(id_eleve)
                    FROM eleve_sport
                    WHERE id_eleve = :idEleve;
                    ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam('idEleve', $id_eleve);
            $stmt->execute();
            $nbre = $stmt->fetch();
            // var_dump($nbre);
            if($nbre <= 3){
                if($this->verifyDuplicateSport($id_eleve, $id_sport) === false){
                    $this->insertEleveSPort($id_eleve, $id_sport);
                }
            }
        }
               
    }

    public function getElevesByEcole(){
        $sql = "SELECT COUNT(id_eleve) as nbreEleve, id_ecole
                FROM eleve
                GROUP BY id_ecole";
        
        $stmt = $this->pdo->query($sql);
        $res = $stmt->fetchAll(PDO::FETCH_CLASS);
        var_dump($res);
    }






    
}


