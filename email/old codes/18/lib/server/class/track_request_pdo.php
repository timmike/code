<?php

class mysql_pdo{
	private $username = 'chichio1_1';
	private $password = 'dat8tiantianT@';
	private $table = "campaign_linkid";
	private $host="localhost";
	private $img_basePath_server = 'img';
		
	function __construct(){
	}
	
	public function getLinkAsset($data){
		$field = $data["field"];		
		unset($data["field"]);
		$query = "SELECT $field FROM $this->table WHERE id = :id";
		$db = $this->mysql_pdo_conn();
		$prepare = $db->prepare($query);
		
		$prepare->execute($data);
		$prepare->setFetchMode(PDO::FETCH_ASSOC);
		$result = $this->returnAssocArray($prepare);
		if($field == 'address'){	header("Location: $result"); exit(); }
		if($field == 'image') echo file_get_contents("$this->img_basePath_server/$result");

		
	}
	
	
	private function mysql_pdo_conn(){
		try {
		    $conn = new PDO("mysql:host=localhost;dbname=chichio1_advertise", $this->username, $this->password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}
	}
	
	public function insertLinkid($data){
		$conn = $this->mysql_pdo_conn();
		$fields = '';
		$values = '';
		
		$data_keys = array_keys($data);
		foreach($data as $key => $value){
			$fields .= end($data_keys) != $key ? "$key," : "$key";
			$values .= end($data_keys) != $key ? ":$key," : ":$key";
		};

		$query = "INSERT INTO $this->table ($fields) VALUES ($values)";		
		$prepare = $conn->prepare($query);		
		$prepare->execute($data);
		return $prepare->rowCount();		
	}

	public function updateLinkid($data){
		$id=$data["id"];	
		unset($data["id"]);
		$fields_values = '';
		$conn = $this->mysql_pdo_conn();
		
		$data_keys = array_keys($data);
		foreach($data as $key => $value){
			$fields_values .= end($data_keys) != $key ? "$key = :$key," : "$key = :$key";
		};
		
		$query = "UPDATE $this->table SET $fields_values WhERE id = :id";
		$prepare = $conn->prepare($query);		
		$data["id"] = $id;
		$prepare->execute($data);
		return $prepare->rowCount();		
	}

	private function returnAssocArray($data){
		foreach($data as $key => $array){
			foreach($array as $data){
				return $data;
			}
		}	
	}
}