<?php


class cluster extends Database
{
	private $id;
	
	private $cluster;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function check($value)
	{
		$this->cluster = $value;
		$result = mysqli_query(parent::getInstance()->getConnection(), 'select * from cluster where cluster = "'.$this->cluster.'"');
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