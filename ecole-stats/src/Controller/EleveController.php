<?php
namespace App\Controller;

use App\Models\Db;

class EleveController {

    public function create(){
        $db = new Db;

        for($i = 1; $i <= 50; $i++){
            $nom = "Nom" . $i;
            $prenom = "Prenom" . $i;

            $db->insertEleve($nom, $prenom);
        }
    }
}