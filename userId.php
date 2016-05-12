<?php

/**************************************
 * This class queries database users. *
 **************************************/

requireOnceRoot("database.php");

class UserId extends Database
{
	private $id;

	public function __construct()
	{
		parent::__construct();

		$this->query("SELECT username FROM users WHERE user_id = ?");
		$this->bind($this->id);
	}

	public function username(int $userId)
	{
		$this->id = $userId;
		return $this->execute()[0][0];
	}
}