<?php
namespace App\Controller;

use App\Models\Db;

class EleveController {

    private Db $db;

    public function __construct(){
        $this->db = new Db;
    }

    public function create(){
        
        for($i = 1; $i <= 50; $i++){
            $nom = "Nom" . $i;
            $prenom = "Prenom" . $i;

            $this->db->insertEleve($nom, $prenom);
        }
    }

    public function addEleve(){
        $this->db->addEleveToEcole();
    }

    public function addEleveSport(){
        $this->db->addSportToEleve();
    }

    public function elevesByEcole(){
        $this->db->getElevesByEcole();
    }


}