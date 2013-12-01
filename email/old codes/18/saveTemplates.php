<?php

sleep(2);
$folder = 'templates/'.$_POST["creativeId"].'/';
$templateName = $_POST["templateName"].'.tpl';
$content = $_POST["templateContent"];

if(!file_exists($folder)){
		mkdir($folder,0777);
		//echo 'successing created '.$_POST["creativeId"];
}


$file = fopen($folder.$templateName,"w+");
fputs($file,$content);
fclose($file);


?>


