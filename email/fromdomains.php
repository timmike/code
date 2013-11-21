<?php

require_once('init.php');

class fromdomains extends Database
{
	
	private $id;
	
	private $name;
	
	private $is_selected;
	
	
	public function __construct()
	{
		$this->setTable("fromdomains");
	}
	

	
	
	public function compute_diff($select_domains)
	{
		$domains = parent::display();
		$total = count($domains);
		
		$froms = $select_domains;
		for($i=1; $i<=$total; $i++){
			if(empty($froms[$i])){
				$froms[$i] = 0;
			}
			else if(!empty($froms[$i]) && $froms[$i] == 'on')	{
				$froms[$i] = 1;
			}
		}		
		
		$temp = array();
		
		foreach($domains as $value){
			$temp[$value["id"]] = $value['is_selected'];
		}
		
		$update_fields = array_diff_assoc($froms, $temp);	
		$this->update($update_fields);
	}
	
	public static function update($upd_fields)
	{
		if(!empty($upd_fields)){	
			foreach($upd_fields as $key => $value){
				$q = 'update '.parent::$_table.' set ';
				$q .= ' is_selected = "'.$value.'" 
				where id = '.$key.' ';				
				$result = mysqli_query(parent::getInstance()->getConnection(), $q);
			}
		}
		
	}	
}


if(!empty($_POST['submit_from_domains'])){
	
	$fromdomains = array('fromdomains' => array());
	
	$factory = new Factory($fromdomains);	
	
	$fromdomains = $factory->get_obj();
	
	$fromdomains->compute_diff($_POST['fromdomains']);
	
	header("location:index.php");
	exit;
	
}


