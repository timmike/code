<?php

require_once('init.php');

$userTypes = array("userTypes"=> array('id'=>1, 'domain'=>'http:google.com'));
$factory = new Factory($userTypes);
$obj = $factory->get_obj();

$obj->inserting(array('daily_usage_type_id'=>1, 'user_id'=>4, 'item'=>"Mcdonald", "description"=>"this food is declisoius"));



?>