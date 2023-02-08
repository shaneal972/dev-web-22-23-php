<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon contact</title>
    <link rel="stylesheet" href="../../vendor/twitter/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center fs-3">Mes coordonnées</h1>
        <section class="d-flex justify-content-center">
            <form method="post" action="../exercice-2/index.php" class="w-50 bg-secondary bg-opacity-25 p-3">
            <div class="row mb-3">
                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Téléphone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <label for="city" class="form-label">Ville de départ</label>
                    <select id="city" name="city" class="form-select">
                        <option selected>Choisissez votre ville ...</option>
                        <option value="Paris">Paris</option>
                        <option value="Orléans">Orléans</option>
                        <option value="Dublin">Dublin</option>
                        <option value="Nice">Nice</option>
                        <option value="Tours">Tours</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        </section>
    </div>
</body>
</html>