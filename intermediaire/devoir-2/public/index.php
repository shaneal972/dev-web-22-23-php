<?php

use App\Database;

require '../vendor/autoload.php';
require 'partials/header.php';

$db = new Database();
$produits = $db->select('produit', 'id, nom, prix', []);

?>


        <section class="row pt-3">
            <?php foreach ($produits as $produit): ?>
            <div class="card w-25 mx-auto mb-3 col-6 col-md-4 col-lg-3">
                <div class="card-header">
                    Notre collection
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $produit->nom ?></h5>
                    <p class="card-text"><?= $produit->prix ?> €</p>
                    <a href="panier.php?id=<?= $produit->id ?>" class="btn btn-primary">Ajouter au panier</a>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
<?php
    require 'partials/footer.php';
?>
