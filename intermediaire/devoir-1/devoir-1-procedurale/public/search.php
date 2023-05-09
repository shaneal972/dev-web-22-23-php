<?php
    session_start();
    require "../fonctions/header.php";
    $pdo = require_once '../fonctions/connexion.php';

    $user =  $_SESSION['username'];
    $id = $_SESSION['user_id'];
    $resultPost = [];
    $resultGet = [];
    if($_POST){
        $search = $_POST['search'];
    }elseif($_GET){
        $ville_id = $_GET['ville_id'];
        $sql = "SELECT ville_text, ville_nom
                FROM villes
                WHERE ville_id = :ville_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ville_id', $ville_id, PDO::PARAM_INT);

        $stmt->execute();

        $resultGet = $stmt->fetch(PDO::FETCH_OBJ);
    }

    $sql = "SELECT ville_id, ville_text
            FROM villes
            WHERE ville_nom LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);

    $stmt->execute();

    $resultPost = $stmt->fetch(PDO::FETCH_OBJ);
    if($resultPost){
        $success = true;
        $insertSearch = "INSERT INTO search (user_id, ville_id) 
                         VALUES (:user_id, :ville_id)";
        $stmtSearch = $pdo->prepare($insertSearch);
        $stmtSearch->bindParam(':user_id', $id, PDO::PARAM_INT);
        $stmtSearch->bindParam(':ville_id', $resultPost->ville_id, PDO::PARAM_INT);

        $stmtSearch->execute();
    }elseif ($resultGet){
        $successGet = true;
    }else{
        $error = "Cette ville n'est pas répertoriée dans notre base de données !";
    }

    if(isset($success)){
        $select = "SELECT v.ville_id, ville_nom 
                   FROM search s
                   JOIN villes v
                   ON v.ville_id = s.ville_id 
                   GROUP BY v.ville_id";

        $stmt = $pdo->prepare($select);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    }
?>

    <h1 class="text-center">Bienvenue <?= $user ?></h1>
    <p class="text-center fs-4">Ton accès au formulaire de recherche est activé : </p>

    <form class="row g-2 w-25 mx-auto" method="post" >
        <div class="col-md">
            <input type="text" class="form-control" id="search" placeholder="Votre recherche" name="search">
        </div>
        <div class="col-md">
            <button class="form-control btn btn-primary" type="submit" name="btnSearch">Rechercher</button>
        </div>
    </form>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger w-50 mx-auto my-3" role="alert">
            <?= $error ?>
        </div>
    <?php endif ?>

    <?php if(isset($success)): ?>
        <ul class="list-group w-25 mx-auto my-3">
            <?php foreach ($result as $ville): ?>
            <li class="list-group-item">
                <a href="search.php?ville_id=<?= $ville->ville_id ?>"><?= $ville->ville_nom ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>

    <?php if(isset($successGet)): ?>
        <h3 class="w-25 mx-auto my-3"><?= $resultGet->ville_nom ?></h3>
        <p class="w-25 mx-auto">
            <?= $resultGet->ville_text ?>
        </p>
    <?php endif ?>

<?php
    require "../fonctions/footer.php";
?>

