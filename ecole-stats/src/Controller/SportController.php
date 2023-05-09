<?php
namespace App\Controller;



use App\Models\Db;

class SportController{

    public function create(){

        $sports = [
            'boxe',
            'judo',
            'football',
            'natation',
            'cyclisme'
        ];

        $db = new Db;

        // foreach ($sports as $sport) {
        //     $db->insertSport($sport);
        // }

        
    }
}