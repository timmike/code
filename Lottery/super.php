<?php
$result = array(); 
$combination = array();
function combinations(array $myArray, $choose) {
  global $result, $combination;

  $n = count($myArray);

  function inner ($start, $choose_, $arr, $n) {
    global $result, $combination;

    if ($choose_ == 0) array_push($result,$combination);
    else for ($i = $start; $i <= $n - $choose_; ++$i) {
           array_push($combination, $arr[$i]);
           inner($i + 1, $choose_ - 1, $arr, $n);
           array_pop($combination);
         }
  }
  inner(0, $choose, $myArray, $n);
  return $result;
}

require_once 'db_connect.php';

$db = new db_connect();

$db->setTable('superlotto-plus');

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
//echo "<pre>";
//print_r($res);
//echo "</pre>";

$high = array_slice($res, 0,10, true);

//echo '<pre>';
//print_r($high);
//echo '</pre>';

$low = array_slice($res, -10,10, true);

//echo '<pre>';
//print_r($low);
//echo '</pre>';


$result = combinations(array_keys($high), 3);
$res = array();
foreach($result as $key => $value){
	foreach($numbers as $kk => $vv){
		$data = explode(' ', $vv['number']);
		if(in_array($value[0], $data) && in_array($value[1], $data) && in_array($value[2], $data)){
			$res[] = $value;
		}
	}
}

echo '<pre>';
print_r($res);
echo '</pre>';
exit;


