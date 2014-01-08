<?php

class mysql_pdo{
	private $username = 'root';
	private $password = 'root';
	private $table = '';
	
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
	
	private function retrieveData($query,$mode = PDO::FETCH_ASSOC){
		$db = $this->mysql_pdo_conn();
		$prepare = $db->prepare($query);
		$prepare->execute();
		$prepare->setFetchMode($mode);
		return $prepare;
	}
	
	private function get_Redir_From($table){
		$query = "select id,name from $table";
		$result = $this->retrieveData($query);
		return $this->returnAssocArray($result);
	}
	
	private function getIP($table){
		$query = "select id,ip,dns,vmta from $table";
		$result = $this->retrieveData($query);
		return $this->returnAssocArray($result);
	}
	
	public function getDomain($tartet_domain){
		switch ($tartet_domain) {
			case "redir":
				$table = "redirdomains";
				return $this->get_Redir_From($table);
				break;
			case "from":
				$table = "fromdomains";
				return $this->get_Redir_From($table);
				break;
			case "ip":
				$table = "ipdomains";
				return $this->getIP($table);
				break;	
			
		}
	}
	
	public function getSelectedDomains($tartet_domain){
		$query = "select name from selected_$tartet_domain";
		$mode = PDO::FETCH_NUM;
		$result = $this->retrieveData($query);
		return $this->returnIndexArray($result);	
	}
	
	
	private function returnAssocArray($data){
		$_data = array();
		foreach($data as $key => $value){
			$_data[$key] = $value;
		}
		return $_data;
	}
	
	private function returnIndexArray($data){
		$_data = array();
		foreach($data as $arrays){
			foreach($arrays as $index => $value){
				$_data[] = $value;	
			} 
		}
		return $_data;
	}
	
	
	public function saveDomain($data){
		$table = "selected_".key($data);	
		$db = $this->mysql_pdo_conn();
		$count = 0;
		$destroyAll = "truncate table $table"; 
		$prepare = $db->prepare($destroyAll);
		$prepare->execute();
//need to fix inserting multipe lines at once		
		$insertRow = "insert into $table (name) values (:name)";
		$prepare=$db->prepare($insertRow);
		$prepare->bindParam(":name",$name);
		foreach($data as $domain){	
			foreach($domain as $name){
				$prepare->execute();	
				$count += $prepare->rowCount();	
			}	
		}
		echo json_encode(array($count));
	}
}