<?php

namespace App;

use PDO;

class Database
{
    public const HOST = 'localhost';
    public const DBNAME = 'php_inter_2';
    public const USERNAME = 'root';
    public const PASSWORD = '';

    /** @var PDO  */
    private PDO $pdo;
    private string $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host=" .self::HOST. ";dbname=" .self::DBNAME. ";charset=UTF8";
        $this->pdo = new PDO($this->dsn, self::USERNAME, self::PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    /**
     * @param string $table
     * @param string $nom
     * @param int $prix
     * @return void
     */
    public function insert(string $table, string $nom, int $price): void
    {
        $req = "INSERT INTO $table
                (nom, prix)
                VALUES (:nom, :price)";
        $stmt = $this->pdo->prepare($req);

        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':price', $price );

        $stmt->execute();
    }

    public function select(string $table, string $cols, ?array $options): array
    {
        $req = "SELECT " . $cols . " FROM $table";

        $result = $this->pdo->query($req);

        return $result->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     * @param string $table
     * @param string $col
     * @param int $id
     * @return array
     */
    public function selectById(string $table, string $col, int $id): array
    {
        $req = "SELECT * FROM $table 
                WHERE $col = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}