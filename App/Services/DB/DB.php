<?php
namespace App\Services\DB;

use App\Services\DB\Connects\IConnect;
use App\Services\Exceptions\BaseException;
use PDO;

class DB {

	private static $_state;
	
	/**
	 * Initialize new PDO instance and set attributes. 
	 * DB constructor.
	 */
    private function __construct(IConnect $connect)
	{
        self::$_state = $connect->connect();
    }
	
	private function __clone()
	{
	}

	private function __wakeup()
	{
	}

	/**
	 * If !self::$_state,
	 * creating new instance of the connect current Data Base and create new self.
	 */
	private static function getState()
	{
		if (!self::$_state) {
			$connect = 'App\\Services\\DB\\Connects\\'.ucfirst(strtolower(env('DB_CONNECTION')));
			$connect = new $connect();
		  	new self($connect);
		}
	}
	
	/**
	 * Execute sql. If $param not empty - binding before.
	 * @param string $sql
	 * @param array $param
	 * @return bool or \PDOStatement
	 */
	public static function exec($sql = '', array $param = []) : \PDOStatement
	{
	   self::getState();
		
	    if ($sql){
	        try {
		        $stmt = self::$_state->prepare($sql);
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