<?php

/****************************************************************************
 * The Database class handles access to a database. Usernames and passwords *
 * are NOT handled by this class. Instead the constructor 'requires' a file *
 * that simply declares them like this:                                     *
 *                                                                          *
 * $username = "luggage";                                                   *
 * $password = "12345";                                                     *
 *                                                                          *
 * Such a file's path is hard-coded. We don't want to programmatically be   *
 * able to find and read that file. Also, make sure to use 'require_once'.  *
 ****************************************************************************/

abstract class Database
{
	// The database's name shouldn't change unless you derive the class.
	protected $dbname = "test";

	// The connection is private so that we can limit direct access.
	private $connection;

	// The last query statement used.
	private $statement;

	// We make the constructor protected so that 
	protected function __construct()
	{
		require_once("../../password.php");

		$string = "mysql:host=localhost;dbname=$dbname";
		$options = [PDO::ATTR_PERSISTENT => true];

		$connection = new PDO($string, $username, $password, $options);
	}

	// The connection is accessed by this method, which only subclasses can
	// access. We mark it as final so that it won't be made public.
	final protected function query($query)
	{
		$statement = $connection->prepare($query);
	}

	final protected function execute(&...$parameters)
	{
		$i = 1;

		foreach ($parameters as $parameter) {
			$statement->bindParam($i, $parameter);
			$i++;
		}

		$statement->execute();
		return $statement->fetchAll();
	}
}