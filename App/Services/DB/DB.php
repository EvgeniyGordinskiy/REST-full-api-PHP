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

	private function __call($method, $parameters)
	{
		if ( method_exists($this, $method) ) {
			$this->$method($parameters);
		}
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
	 * @return bool or \PDOStatement
	 */
	public static function select($sql = '') : \PDOStatement
	{
	   self::getState();
		
	    if ($sql){
	        try {
		        $stmt = self::$_state->prepare($sql);
			    $stmt->execute();
		        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	        } catch (\PDOException $e) {
		        new BaseException($e->getMessage());
	        }
        }
        return false;
    }

    public static function prepare($sql = '') : \PDOStatement
	{
	   self::getState();

	    if ($sql){
	        try {
		        $stmt = self::$_state->prepare($sql);
	        } catch (\PDOException $e) {
		        new BaseException($e->getMessage());
	        }
        }
        return false;
    }

    public function bind ($property, $variable)
    {
	    self::$_state->bind($property, $variable);
    }


    public function exec ()
    {
	    $stmt = self::$_state->execute();
	    return $stmt;
    }
}