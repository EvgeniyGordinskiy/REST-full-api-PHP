<?php
namespace App\Services\DB;

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

    public function exec($sql = false, array $parameters = null){
	    dump($sql);
        if ($sql){
            $stmt = $this->connection->prepare($sql);
	         if ( $parameters ) {
		         $stmt->execute($parameters);
	         } else {
		         $stmt->setFetchMode(PDO::FETCH_ASSOC);
		         $stmt->execute();
		         $stmt->fetchAll();
		         dump($stmt->fetchAll());
		         dump($sql);
	         }
            return $stmt;
        }
        return false;
    }
}