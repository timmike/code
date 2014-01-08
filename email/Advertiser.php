<?php

class advertiser extends Database
{
	private $id;
	
	private $advertiser;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function check($value)
	{
		$this->advertiser = $value;
		$result = mysqli_query(parent::getInstance()->getConnection(), 'select * from advertiser where advertiser = "'.$this->advertiser.'"');
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