<?php

class DatabaseConnection
{
	private $dbConnection;

	public function __construct(DatabaseConnectionSettings $dbc)
	{
		$this->dbConnection = new mysqli(
			$dbc->getServer(),
			$dbc->getUsername(),
			$dbc->getPassword(),
			$dbc->getDB()
		);
	}
	public function getDBConnection()
	{
		return $this->dbConnection;
	}
}
