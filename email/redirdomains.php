<?php

require_once('init.php');

class redirdomains extends Database
{	
	private $id;
	
	private $name;
	
	private $is_selected;
		
	public function __construct()
	{
		$this->setTable("redirdomains");
	}
		
	public function compute_diff($select_domains)
	{
		$domains = parent::display();
		$total = count($domains);
		
		$froms = $select_domains;
		
		for($i=1; $i<=$total; $i++)	{
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
if(!empty($_POST['submit_redir_domains'])){
	$redirdomains = array('redirdomains' => array());	
	$factory = new Factory($redirdomains);		
	$redirdomains = $factory->get_obj();	
	$redirdomains->compute_diff($_POST['redirdomains']);
	header("location: displayDomainManagement.php");
	exit;	
}

	
?>