<?php 

$array = [[45,23,4], [1,2,1]];

$count     = array_map('count', $array);
$finalSize = array_product($count);
$arraySize = count($array);
$output    = array_fill(0, $finalSize, []);
$i = 0;
$c = 0;
for (; $i < $finalSize; $i++) {
    for ($c = 0; $c < $arraySize; $c++) {
        $output[$i][] = $array[$c][$i % $count[$c]];
    }
}
echo "<pre>";
print_r($output);
echo "</pre>";

exit;
require_once 'db_connect.php';

$db = new db_connect();
$db->setTable('test');

$numbers = $db->read();


$res = array();
foreach($numbers as $key => $value){
	
	$data = explode(' ', $value['number']);
	if(!empty($data)){
		foreach($data as $val){
			$val = ltrim($val, '0');
			if(array_key_exists($val, $res)){
				$res[$val]++;
			}else{
				$res[$val] = 1;
			}
		}
	}	
}

arsort($res);
echo "<pre>";
print_r($res);
echo "</pre>";

$high = array_slice($res, 0,10, true);

echo '<pre>';
print_r($high);
echo '</pre>';

$low = array_slice($res, -10,10, true);
echo '<pre>';
print_r($low);
echo '</pre>';


$db->setTable('powerball');

$numbers = $db->read();


$res = array();
foreach($numbers as $key => $value){

	$data = explode(' ', $value['number']);
	if(!empty($data)){
		foreach($data as $val){
			$val = ltrim($val, '0');
			if(array_key_exists($val, $res)){
				$res[$val]++;
			}else{
				$res[$val] = 1;
			}
		}
	}
}

arsort($res);
echo "<pre>";
print_r($res);
echo "</pre>";

$high = array_slice($res, 0,10, true);

echo '<pre>';
print_r($high);
echo '</pre>';

$low = array_slice($res, -10,10, true);
echo '<pre>';
print_r($low);
echo '</pre>';



$db->setTable('mega-millions');

$numbers = $db->read();


$res = array();
foreach($numbers as $key => $value){

	$data = explode(' ', $value['number']);
	if(!empty($data)){
		foreach($data as $val){
			$val = ltrim($val, '0');
			if(array_key_exists($val, $res)){
				$res[$val]++;
			}else{
				$res[$val] = 1;
			}
		}
	}
}

arsort($res);
echo "<pre>";
print_r($res);
echo "</pre>";

$high = array_slice($res, 0,10, true);

echo '<pre>';
print_r($high);
echo '</pre>';

$low = array_slice($res, -10,10, true);
echo '<pre>';
print_r($low);
echo '</pre>';




?>