<?php
session_start();

require '../fonctions/header.php';

$pdo = require_once '../fonctions/connexion.php';
$message = '';

//Récupération des informations postées via le formulaire
if($_POST){
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    if(($username === '') || ($password === ''))
    {
        $error = "Vous devez renseigner un username et un mot de passe !";
    }elseif((strlen($_POST['username']) < 3) || (strlen($_POST['password']) < 3)){
        $error = "Vous devez renseigner une taille de votre username et de votre mot de passe supérieur à 3 caractères !";
    }
}

$password = SHA1($password);

// Récupération des informations stockées dans la table users
$sql = "SELECT * 
        FROM users
        WHERE user_login = :username AND user_password = :password";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_OBJ);

if($user){
    $_SESSION['username'] = $user->user_login;
    $_SESSION['user_id'] = $user->user_id;
    header('location:search.php');
}

?>

    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Connexion</h5>
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif ?>
                    <form method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>

<!--                        <div class="form-check mb-3">-->
<!--                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">-->
<!--                            <label class="form-check-label" for="rememberPasswordCheck">-->
<!--                                Remember password-->
<!--                            </label>-->
<!--                        </div>-->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login fw-bold" type="submit" name="submit_form">Connexion</button>
                        </div>
                        <!--<hr class="my-4">
                        <div class="d-grid mb-2">
                            <button class="btn btn-google btn-login text-uppercase fw-bold" type="submit">
                                <i class="fab fa-google me-2"></i> Sign in with Google
                            </button>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-facebook btn-login text-uppercase fw-bold" type="submit">
                                <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                            </button>
                        </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    require '../fonctions/footer.php';
?>