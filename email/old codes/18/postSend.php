<?php
//echo  file_get_contents($folder.$templateName	);


$url = "http://www.mydealstoday.info/sendMail/templateController/loadTemplate.php";

$ch = curl_init();
$data = array('name' => 'Ross', 'php_master' => true);

// You can POST a file by prefixing with an @ (for <input type="file"> fields)
//$data['file'] = '@/home/user/world.jpg';

$handle = curl_init($url);
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
curl_exec($handle);


?>


