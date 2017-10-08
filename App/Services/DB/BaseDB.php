<?php 

namespace App\Services\DB;

abstract class BaseDB
{
	/**
	* This method connects to the database
	*
	**/
	abstract protected function connect();

	/**
	*This method runs sql query to the database for the select data
	*
	**/
	abstract protected function get();

	/**
	*This method runs sql query to the database for the put data
	*
	**/
	abstract protected function put();
}