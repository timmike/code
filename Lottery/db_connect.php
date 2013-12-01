<?php

class db_connect{
	private $host = 'localhost';
	private $dbname = 'lottery';
	private $user = 'test';
	private $pass = 'test';
	private $DBH = '';
	private $table = '';
	
	public function __construct(){
		$this->connect();
	}
		
	public function connect(){
		try{
			$this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user,$this->pass); 
			}
		catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	
	public function setTable($name){
		$this->table = $name;
	}
	
	public function insert(){
		$winningNumbersClass = new winningNumbers();
		$winningNumbers = winningNumbers::getNumbers($this->table);
		
		foreach($winningNumbers as $winningNumber){
			$this->save($winningNumber);
		}
		
		//echo " -- Updates <br />";
	}
	
	private function save($data){	
		$this->DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		
		$stmt = $this->DBH->prepare("INSERT INTO `$this->table` (id, date, number) value (:id, :date, :number)");
		if (!$stmt) { 
	/*
			echo "\nPDO::errorInfo():\n"; 
			echo "<br />";
	*/
			print_r($this->DBH->errorInfo()); 
		} 
			$stmt->execute($data); 
		//	echo $stmt->rowCount();
	}
	
	public function read(){
			$stmt = $this->DBH->prepare("SELECT * from `$this->table` order by id desc");
			$stmt->execute();
			$winningNumbers = $stmt->fetchall(PDO::FETCH_ASSOC);
			$this->convertDate($winningNumbers);
			return $winningNumbers;
		}
	
	private function convertDate(&$winningNumbers){
		foreach($winningNumbers as &$winningNumber){
			$winningNumber["date"] = date("d M Y",$winningNumber["date"]);
		}
	}
	
	private function convertNumbers(&$winningNumbers){
		foreach($winningNumbers as &$winningNumber){
			$winningNumber["number"] = explode(' ',$winningNumber["number"]);
		}
	}
}