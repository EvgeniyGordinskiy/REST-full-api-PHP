<?php
namespace App\Services\DB;

use App\Services\DB\Connects\IConnect;
use App\Services\Exceptions\BaseException;
use PDO;

class DB {

	private static $_state;
	private static $_stmt;
	
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

	public function __call($method, $parameters = null)
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

    public static function prepare($sql = '')
	{
	   self::getState();

	    if ($sql){
	        try {
		        $stmt = self::$_state->prepare($sql);
		        self::$_stmt = $stmt;
		        return $stmt;

	        } catch (\PDOException $e) {
		        new BaseException($e->getMessage());
	        }
        }
        return false;
    }


    public static function execute(array $params = null)
    {
	    if ($params) {
		  return self::$_stmt->execute($params);
	    } else {
		    self::$_stmt->execute();
			return self::$_stmt->fetchAll(\PDO::FETCH_ASSOC);
	    }

    }
	
	public static function select(array $params = null)
    {
		  	 self::$_stmt->execute($params);
			return self::$_stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
	
	
	public static function insert(array $params = null)
    {
		  return self::$_stmt->execute($params);
    }
}