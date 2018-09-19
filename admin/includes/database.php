<?php

require_once("config.php");

class Database {

	public $connection;

	function __construct(){

		$this->open_db_connection();
	}//function __construct

	public function open_db_connection(){

		//$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		$this->connection = new mysqli('localhost','root','','gallery_db');

		if($this->connection->connect_error){
			die("Database connection falhou" . $this->connection->connect_error);
		}

	}//function open_db_connection

	public function query($sql){

		$result = $this->connection->query($sql);
		$this->confirm_query($result);		
		return $result;
	}//function query

	private function confirm_query($result){

		if (!$result) {
			die("query falhou!!" . $this->connection->error);
		}
	}//function confirm_query

	public function escape_string($string){

		$escape_string = $this->connection->real_escape_string($string);		
		return $escape_string;
	}//function escape_string

	public function the_insert_id(){

		return mysqli_insert_id($this->connection);		
	}//function the_insert_id


}//class Database$

$database = new Database();
$database->open_db_connection();







?>