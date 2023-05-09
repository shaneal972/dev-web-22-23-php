<?php

namespace App;

class Produit
{
    /** @var int  */
    private int $id;

    /** @var string  */
    private string $nom;

    /** @var int  */
    private int $prix;

    /** @var int  */
    private int $qte;

    private string $toto;



    public function __construct(string $nom, int $prix, ?int $qte = 1)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->qte = $qte;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getPrix(): int
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return int
     */
    public function getQte(): int
    {
        return $this->qte;
    }

    /**
     * @param int $qte
     */
    public function setQte(int $qte): void
    {
        $this->qte = $qte;
    }


}