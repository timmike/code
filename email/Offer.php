<?php

class offer extends Database
{
	private $id;
	
	private $offer;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function check($value)
	{
		$this->offer = $value;
		$result = mysqli_query(parent::getInstance()->getConnection(), 'select * from offer where offer = "'.$this->offer.'"');
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