<?php

class mysql_pdo{
	private $username = 'root';
	private $password = '';
	private $table = '';
	private $host="localhost";
	private $img_basePath_server = 'http://localhost/php/email/Upload_Files';
		
	function __construct(){

	}
	
	private function mysql_pdo_conn(){
		try {
		    $conn = new PDO("mysql:host=localhost;dbname=sendmail", $this->username, $this->password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}
	}
	
	public function getLinkAsset($data){
		$table = "campaign_linkid";
		$field = $data["field"];
		unset($data["field"]);
		$query = "SELECT $field FROM $table WHERE id = :id";
		$db = $this->mysql_pdo_conn();
		$prepare = $db->prepare($query);
		$prepare->execute($data);
		$prepare->setFetchMode(PDO::FETCH_ASSOC);
		$result = $this->returnAssocArray($prepare);
		if($field == 'address'){	header("Location: $result/"); exit(); }
		if($field == 'image') echo file_get_contents("$this->img_basePath_server/$result");
	}
	
	private function returnAssocArray($data){
		foreach($data as $key => $array){
			foreach($array as $data){
				return $data;
			}
		}
	}
}