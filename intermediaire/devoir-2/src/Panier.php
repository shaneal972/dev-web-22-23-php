<?php

namespace App;

use App\Produit;

class Panier
{

    /**
     * Si le panier n'existe pas en Session, il le crée
     * @return bool
     */
    public function createPanierInSession(): void
    {
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['nomProduit'] = array();
            $_SESSION['panier']['prixProduit'] = array();
            $_SESSION['panier']['qteProduit'] = array();
        }
    }

    /**
     * Ajoute un produit dans le panier qui est en Session
     * @param $nomProduit
     * @param $qteProduit
     * @param $prixProduit
     * @return void
     */
    public function ajoutProduitDansPanier(string $nom, int $prix, int $qte): void
    {

        $this->createPanierInSession();

        // Si le produit existe déjà on ajoute seulement la quantité
        $positionProduit = array_search($nom, $_SESSION['panier']['nomProduit']);
        if($positionProduit !== false)
        {
            $_SESSION['panier']['qteProduit'][$positionProduit] += $qte ;
        }
        else
        {
            $_SESSION['panier']['nomProduit'][] = $nom;
            $_SESSION['panier']['prixProduit'][] = $prix;
            $_SESSION['panier']['qteProduit'][] = $qte;
        }

    }

    /**
     * Montant total du panier
     * @return int
     */
    public function totalPanier(): int
    {
        $total = 0;
        for ($i = 0; $i < count($_SESSION['panier']['nomProduit']); $i++){
            $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
        }
        return $total;
    }
}