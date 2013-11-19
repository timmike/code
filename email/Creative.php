<?php

require_once('campagins.php');

class creative extends campagins
{
	private $id;
	
	private $campagin_id;
	
	private $name;
	
	private $creative;
	
	public function __construct($the_creative)
	{
		$this->setTable('creative');
		$this->creative = array('campagin_id' => $the_creative['campagin_id'], 'name'=>$the_creative['name']);
		$this->insert($this->creative);
	}
	
	public static function display_campagin_id($campagin_id)
	{
	  $result = mysqli_query(parent::getInstance()->getConnection(), 
		'select * from creative
		where campagin_id = '.$campagin_id.'
		order by id desc');
		
		$res = array();
		for($i=0; $i<$result->num_rows; $i++){
			$rows = mysqli_fetch_array($result,MYSQL_ASSOC);
			$res[] = $rows;
		}
		return $res;
	}
}

if(!empty($_POST['submitcreative'])){
	$creative = array('name'=>$_POST['name'], 'campagin_id'=>$_POST['campagin_id']);
	$cre = new creative($creative);
	header("location:displayCreative.php?campagin_id=".$_POST['campagin_id']."");
}

?>