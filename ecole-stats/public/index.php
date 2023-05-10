<?php
require "../vendor/autoload.php";


use App\Controller\EcoleController;
use App\Controller\EleveController;
use App\Controller\SportController;

$ecoleController = new EcoleController;
$sc = new SportController;
$ec = new EleveController;

// $ecoleController->create();
// $ec->addEleve();
// $ec->addEleveSport();
$ec->elevesByEcole();
