<?php
namespace App\Services\DB;

use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\PDOException;
use PDO;

class DB {

    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        if ($this->connection === null) {
            try{
                $this->connection = new PDO(
                    "mysql:host=".env('DB_HOST').";dbname=".env('DB_DATABASE'),
                    env('DB_USERNAME'),
                    env('DB_PASSWORD')
                );
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            } catch (\PDOException $e) {
                new BaseException($e->getMessage());
            }

        }
    }

    public function exec($sql = false, array $parameters = null){
	    dump($sql , 'Exec function sql');
        if ($sql){
            $stmt = $this->connection->prepare($sql);
	         if ( $parameters === null ) {
		         $stmt->execute($parameters);
	         } else {
		         $stmt->setFetchMode(PDO::FETCH_ASSOC);
		         $stmt->execute();
		         $stmt->fetchAll();
		         dump($stmt->fetchAll());
		         dump($sql);
	         }
            return $stmt->fetchAll();
        }
        return false;
    }
}