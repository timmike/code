<?php
$folder = 'templates/'.$_POST["creativeId"].'/';
$templateName = $_POST["templateName"].'.tpl';
echo  file_get_contents($folder.$templateName	);
?>


