<?php
session_start();

require '../../vendor/autoload.php';
require '../src/functions/config.php';
require '../src/functions/header.php';

use App\Connexion;

$conn = new Connexion();
$pdo = $conn->connect($host, $dbname, $username, $password);


?>

    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Connexion</h5>
                    <form action="login.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

<!--                        <div class="form-check mb-3">-->
<!--                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">-->
<!--                            <label class="form-check-label" for="rememberPasswordCheck">-->
<!--                                Remember password-->
<!--                            </label>-->
<!--                        </div>-->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login fw-bold" type="submit">Connexion</button>
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
    require '../src/functions/footer.php';
?>