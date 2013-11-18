<?php

/*require once for factory design pattern*/
require_once('factory.php');

class domains extends Database
{
	private $id;
	
	private $domain;
	
	public function __construct()
	{
		parent::__construct();
	}
	

}


?>