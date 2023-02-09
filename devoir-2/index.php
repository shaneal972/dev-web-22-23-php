<?php
    $movies = [
            [
                'title' => 'Les Évadés',
                'year' => '1994',
                'duration' => '2h 22min',
                'note' => '9,3',
                'description' => "Le banquier Andy Dufresne est arrêté pour avoir tué sa femme et son amant. Après une dure adaptation, il tente d'améliorer les conditions de la prison et de redonner de l'espoir à ses compagnons.",
                'image' => 'evades.jpg'
            ],
            [
                'title' => 'Le Parrain',
                'year' => '1972',
                'duration' => '2h 55min',
                'note' => '9,2',
                'description' => "Le patriarche vieillissant d'une dynastie de la mafia New Yorkaise passe le flambeau de son empire clandestin à son fils réticent.",
                'image' => 'parrain.jpg'
            ],
            [
                'title' => 'Pulp Fiction',
                'year' => '1994',
                'duration' => '2h 34min',
                'note' => '8,9',
                'description' => "Les vies de deux hommes de main, d'un boxeur, de la femme d'un gangster et de deux braqueurs s'entremêlent dans quatre histoires de violence et de rédemption.",
                'image' => 'pulp-fiction.jpg'
            ],
            [
                'title' => 'Forrest Gump',
                'year' => '1994',
                'duration' => '2h 22min',
                'note' => '8,8',
                'description' => "Les présidences de Kennedy et Johnson, le Vietnam, le Watergate et d'autres histoires se déroulent à travers la perspective d'un homme d'Alabama avec un QI de 75.",
                'image' => 'forrest-gump.jpg'
            ],
            [
                'title' => 'The Dark Knight : Le Chevalier noir',
                'year' => '2008',
                'duration' => '2h 32min',
                'note' => '9,0',
                'description' => "Lorsqu'une menace mieux connue sous le nom du Joker émerge de son passé mystérieux et déclenche le chaos sur la ville de Gotham, Batman doit faire face au plus grand des défis psychologique et physique afin de combattre l'injustice.",
                'image' => 'dark-knight.jpg'
            ],
            [
                'title' => 'Interstellar',
                'year' => '2014',
                'duration' => '2h 49min',
                'note' => '8,6',
                'description' => "Dans un monde post-apocalyptique et en famine, une équipe d'explorateurs cherche une nouvelle planète habitable pour l'espèce humaine.",
                'image' => 'interstellar.jpg'
            ],
            [
                'title' => 'Whiplash',
                'year' => '2014',
                'duration' => '1h 46min',
                'note' => '8,5',
                'description' => "Un jeune batteur prometteur s'inscrit dans un conservatoire de musique renommé où ses rêves de grandeur sont encadrés par un professeur qui ne recule devant rien pour réaliser le potentiel de ses étudiants.",
                'image' => 'whiplash.jpg'
            ],
            [
                'title' => 'WALL·E',
                'year' => '2008',
                'duration' => '1h 38min',
                'note' => '8,4',
                'description' => "Dans un avenir lointain, un petit robot collecteur de déchets entreprendra par inadvertance un voyage dans l'espace qui décidera en fin de compte du sort de l'humanité.",
                'image' => 'wall-e.jpg'
            ],
    ];

    // Suppression des doublons dans la liste des dates récupérées.
    foreach ($movies as $movie){
        $years[] = $movie['year'];
    }

    $years = array_unique($years);

    // Récupération de la date depuis l'URL
    if (isset($_GET['year'])){
        $yearSearch = htmlspecialchars($_GET['year']);
    }else{
        $yearSearch = '';
    }

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShanCiné - Votre site de films préféré.</title>
    <!--  Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <section>
            <h1 class="text-uppercase">ShanCiné</h1>
            <p class="text-muted">Votre site de films préféré.</p>
        </section>
        <main>
            <section class="search">
                <h2 class="text-center fs-4 text-success">Nos meilleurs films par année : </h2>
                <ul class="list-group list-group-horizontal justify-content-center my-4 ">
                    <?php foreach ($years as $year): ?>
                        <li class="list-group-item text-bg-info"><a href="index.php?year=<?php echo $year; ?>" class="btn btn-primary text-white"> <?php echo $year; ?> </a></li>
                    <?php endforeach; ?>
                </ul>
            </section>
            <section class="result d-flex justify-content-evenly my-2">
                <?php
                    foreach ($movies as $movie){
                        if ($yearSearch === $movie['year']){
                ?>
                            <div class="card" style="width: 18rem;">
                                <img src="./images/<?= $movie['image'] ?>" class="card-img-top" alt="Image du film, <?= $movie['image'] ?>" width="183" height="275">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $movie['title'] ?></h5>
                                    <p class="card-text">
                                        <?= $movie['description'] ?>
                                    </p>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>

            </section>
        </main>
    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>