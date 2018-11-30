<?php

/**
* 
*/
class Database
{
	
	public $conn;
	
	public function __construct($database = "login", $servername = "localhost", $username = "root", $password = "")
	{
		try {
			$this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		}
		catch(PDOException $e)
		{
			echo "connection failed.";
			die();
		}
	}

	public function insert($table, $data) {

		$keys = [];
		$tokens = [];
		foreach ($data as $key => $value) {
			$keys[] = $key;
			$tokens[] = ":" . $key;
		}

		$keys = implode(",", $keys);
		$tokens = implode(",", $tokens);


		$query = $this->conn->prepare("INSERT INTO $table (" . $keys . ") VALUES (" . $tokens . ")");
		$query->execute($data);
	}

	public function selectOne($table, $field, $value) {

		$query = $this->conn->prepare("SELECT * FROM $table WHERE :field = :value");
		$query->execute([":field" => $field, ":value" => $value]);
		return $query->fetch(PDO::FETCH_ASSOC);
	}

}