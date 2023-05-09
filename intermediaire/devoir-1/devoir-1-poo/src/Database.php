<?php

namespace App;

class Database
{
    /** @var Connexion  */
    public Connexion $conn;

    public function __construct()
    {
        $this->conn = new Connexion();
    }




}