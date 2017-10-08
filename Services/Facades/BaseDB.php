<?php 

namespace 'Services\Facedes';

abstract class BaseDB
{
	/**
	* This method connects to the database
	*
	**/
	private function connect();

	/**
	*This method runs sql query to the database for the select data
	*
	**/
	private function get();

	/**
	*This method runs sql query to the database for the put data
	*
	**/
	private function put();
}