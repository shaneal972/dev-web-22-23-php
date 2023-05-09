<?php
require 'partials/header.php';
require '../vendor/autoload.php';


use App\Database;
use App\Panier;
use App\Produit;

$panier = new Panier();
$db = new Database();
$nomProduit = '';
$prixProduit = 0;

if(isset($_GET) && $_GET['id'] != null ){
    $id = $_GET['id'];

    $produitBdd = $db->selectById('produit', 'id', $id);
    foreach ($produitBdd as $p){
        $nomProduit = $p->nom;
        $prixProduit = $p->prix;
    }
    $produit = new Produit($nomProduit, $prixProduit);
}

// Ajout du produit dans le panier en Session
$panier->ajoutProduitDansPanier($produit->getNom(), $produit->getPrix(), $produit->getQte());

?>

<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Nom du produit</th>
            <th>Prix du produit</th>
            <th>Quantité du produit</th>
        </tr>
        <?php for($i = 0; $i < count($_SESSION['panier']['nomProduit']); $i++): ?>
        <tr>
            <?php foreach ($_SESSION['panier'] as $produit): ?>
                <td><?php echo $produit[$i] ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endfor; ?>
    </table>
</div>
<div class="alert alert-danger"><?php echo $panier->totalPanier() ?></div>

<?php
    require 'partials/footer.php';
?>
