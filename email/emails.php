<?php

ini_set('display_errors', 1);
/*require once for factory design pattern*/
require_once('factory.php');

class emails  extends Database
{
	private $id;
	
	private $email;
	
	private $is_unsubscribed;
	
	public function __construct()
	{
		$this->setTable('emails');
		parent::__construct();
	}
	
	public function update_subscribed($ids)
	{
		$q = 'update emails
			set is_unsubscribed = "1"
			where ';
		
		array_values($ids);
		foreach($ids as $value)	{
			$q .= ' id = '.$value.' or ';
		}
		
		$q = substr_replace($q ,"",-3);
		
		mysqli_query(parent::getInstance()->getConnection(),$q); 

	}
	
	
}

$res = array();
$handle = @fopen("20120413_null_763_unsubs.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $res[] = trim($buffer);
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

$ids = array();
$emails = array('emails'=>array());
$factory = new factory($emails);
$email = $factory->get_obj();
$emails = $email::display();
if(!empty($emails)){
	foreach($emails as $key => $value){
		if(in_array($value['email'], $res)){
			$ids[] = $value['id'];
		}
	}
}

$email->update_subscribed($ids);





?>