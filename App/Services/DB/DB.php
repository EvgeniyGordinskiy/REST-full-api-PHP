<?php
namespace App\Services\DB;

use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\PDOException;
use PDO;

class DB {

	private static $state;
    private function __construct() {
            try{
	            self::$state = new PDO(
                    "mysql:host=".env('DB_HOST').";dbname=".env('DB_DATABASE'),
                    env('DB_USERNAME'),
                    env('DB_PASSWORD')
                );
	            self::$state->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            } catch (\PDOException $e) {
                new BaseException($e->getMessage());
            }
    }

	private function __clone()
	{
	}


	public static function exec($sql = false, $param = false) {
	    if (!self::$state) {
			new self();
	    }
	    if ($sql){
	        try {
		        $stmt = self::$state->prepare($sql);
		        if ( !$param ) {
			        $stmt->execute();
		        }
		        return $stmt;
	        } catch (\PDOException $e) {
		        new BaseException($e->getMessage());
	        }
        }
        return false;
    }
}