<?php

ini_set('display_errors', 1);

/*require once for factory design pattern*/
require_once('factory.php');

require_once('db.php');



class campagins extends Database
{
	
	private static $form = array('Name', 'Advertiser', 'Network', 'Offer', 'Domain', 'Cluster');
	
	public function __construct($the_form)
	{
		foreach(self::$form as $value){
			
			
			if(!empty($the_form[$value])){
				if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $the_form[$value])){
					throw new Exception("Error Processing Request", 1);
				}
				else{
					if($value != 'Name'){
						require_once($value.'.php');
					  $obj = array($value=>$the_form[$value]);
						$factory = new Factory($obj);
						if($factory->get_obj()->check($the_form[$value]) === true){
							$factory->get_obj()->setTable($value);
							$factory->get_obj()->insert(array($value=>$the_form[$value]));
						}
						else{
							$id = $factory->get_obj()->check($the_form[$value]);
							self::$form[$value] = $id;
						}
					}
					else{
						self::$form[$value] = $the_form[$value];
					}
				}
			}
		}
	}
	
}

$campagins = array("campagins"=> $_POST);
$factory = new Factory($campagins);



?>