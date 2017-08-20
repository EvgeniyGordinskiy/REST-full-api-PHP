<?php
namespace Services;

use PDO;

class DB {

    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        if ($this->connection === null) {
            $this->connection = new PDO(
                "mysql:host=".env('DB_HOST').";dbname=".env('DB_DATABASE'),
                env('DB_USERNAME'),
                env('DB_PASSWORD')
            );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }
    }

    public function get($sql = 0){
        if ($sql){
            $stmt = $this->connection->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
//            $stmt->bindParam(':username', $user->username);
//            $stmt->bindParam(':firstname', $user->firstname);
//            $stmt->bindParam(':lastname', $user->lastname);
//            $stmt->bindParam(':email', $user->email);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        return false;
    }
}