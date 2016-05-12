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
	protected $dbname = "dimentions";

	// The connection is private so that we can limit direct access.
	private $connection;

	// The last query statement used.
	private $statement;

	public function __construct()
	{
		require_once("../../password.php");

		$string = "mysql:host=localhost;dbname=$dbname";
		$options = [PDO::ATTR_PERSISTENT => true];

		$connection = new PDO($string, $username, $password, $options);
	}

	// This method sets up a query statement. Only classes that extend this
	// class can access it.
	final protected function query($query)
	{
		$statement = $connection->prepare($query);
	}

	// Binds the given parameters to the query statement. Any number of
	// parameters can be given, and they are passed as a reference rather
	// than a value. Only classes that extend this class may access it.
	final protected function bind(&...$parameters)
	{
		$i = 1;

		foreach ($parameters as $parameter) {
			$statement->bindParam($i, $parameter);
			$i++;
		}
	}

	// This method performs the query and returns all of the results. Only
	// classes extending this class can use it.
	final protected function execute()
	{
		$statement->execute();
		return $statement->fetchAll();
	}
}