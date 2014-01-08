<?php


class network extends Database
{
	private $id;
	
	private $network;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function check($value)
	{
		$this->network = $value;
		$result = mysqli_query(parent::getInstance()->getConnection(), 'select * from network where network = "'.$this->network.'"');
		$rows = mysqli_fetch_array($result,MYSQL_ASSOC);
		if(!empty($rows)){
			return $rows['id'];
		}
		else{
			return true;
		}
	}
	

}


?>