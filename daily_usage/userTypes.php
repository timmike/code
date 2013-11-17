<?php

/*require once for factory design pattern*/
require_once('factory.php');

class userTypes extends Database
{
	private $id;
	
	private $type_id;
	
	private $user_id;
	
	public function __construct()
	{
		parent::__construct();		
	}
	
	public function display()
	{
		echo 'displaying';
	}
	
	public function inserting($fields)
	{
		$fields = self::validating($fields);
		
		$this->table = 'daily_usage';
		
		parent::inserting($fields);
	}
	
	private static function validating ($fields)
	{
		if(!empty($fields)){
			
			foreach($fields as $key => $value){
				
				if($key == 'daily_usage_type_id' || $key == 'user_id')	{
					if(filter_var($value, FILTER_VALIDATE_INT) == false)
						return 'You must enter integer for '.$key;							
				}
				else if($key == 'item' || $key == 'description')
					$fields[$key] = "'".htmlentities($value, ENT_QUOTES)."'";
			}			
		}
		
		return $fields;

	}
}


?>