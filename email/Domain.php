<?php


class domain extends Database
{
	private $id;
	
	private $domain;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function check($value)
	{
		$this->domain = $value;
		$result = mysqli_query(parent::getInstance()->getConnection(), 'select * from domain where domain = "'.$this->domain.'"');
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