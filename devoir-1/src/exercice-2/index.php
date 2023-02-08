<?php

    $travels = [
        ['departure' => 'Paris', 'arrival' => 'Nantes', 'departureTime' => '11:00', 'arrivalTime' => '12:34', 'driver' => 'Thomas'],
        ['departure' => 'Orléans', 'arrival' => 'Nantes', 'departureTime' => '05:15', 'arrivalTime' => '09:32', 'driver' => 'Mathieu'],
        ['departure' => 'Dublin', 'arrival' => 'Tours', 'departureTime' => '07:23', 'arrivalTime' => '08:50', 'driver' => 'Nathanaël'],
        ['departure' => 'Paris', 'arrival' => 'Orléans', 'departureTime' => '03:00', 'arrivalTime' => '05:26', 'driver' => 'Clément'],
        ['departure' => 'Paris', 'arrival' => 'Nice', 'departureTime' => '10:00', 'arrivalTime' => '12:09', 'driver' => 'Audrey'],
        ['departure' => 'Nice', 'arrival' => 'Nantes', 'departureTime' => '10:40', 'arrivalTime' => '13:00', 'driver' => 'Pollux'],
        ['departure' => 'Nice', 'arrival' => 'Tours', 'departureTime' => '11:00', 'arrivalTime' => '16:10', 'driver' => 'Edouard'],
        ['departure' => 'Tours', 'arrival' => 'Nantes', 'departureTime' => '16:00', 'arrivalTime' => '18:40', 'driver' => 'Priscilla'],
        ['departure' => 'Nice', 'arrival' => 'Nantes', 'departureTime' => '12:00', 'arrivalTime' => '16:00', 'driver' => 'Charlotte'],
    ];

    if(isset($_POST['city'])){
        $city = $_POST['city'];
    }

    $count = 0;
    foreach ($travels as $travel) {
        if ($city === $travel['departure']) {
            $count++;
        }
    }
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShanCar - Itinéraires</title>
    <link rel="stylesheet" href="../../vendor/twitter/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <?php if ($count == 1): ?>
            <h1>Votre itinéraire</h1>
        <?php else: ?>
            <h1>Vos itinéraires</h1>
        <?php endif; ?>
<!--        <div class="card w-50">-->
            <?php
                foreach ($travels as $travel) {
                    if ($city === $travel['departure']){
            ?>
                            <ul class="list-group w-50 mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span> Départ de : <?= $travel['departure'] ?></span>
                                    <span class="badge bg-primary rounded-pill"><?= $travel['departureTime'] ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span> Arrivée à : <?= $travel['arrival'] ?></span>
                                    <span class="badge bg-success rounded-pill"><?= $travel['arrivalTime'] ?></span>
                                </li>
                                <li class="list-group-item bg-secondary d-flex justify-content-between align-items-center text-end">
                                    <span class="text-white fw-bolder"> Conduit par : <?= $travel['driver'] ?></span>
                                </li>
                            </ul>
            <?php
                    }
                }
            ?>
<!--        </div>-->
    </div>
</body>
</html>