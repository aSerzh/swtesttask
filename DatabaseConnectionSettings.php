<?php

class DatabaseConnectionSettings
{
	private $server;
	private $username;
	private $password;
	private $db;

	public function __construct($server, $username, $password, $db)
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->db = $db;
	}
	public function getServer()
	{
		return $this->server;
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function getDB()
	{
		return $this->db;
	}
}