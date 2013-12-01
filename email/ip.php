<?php

/*require once for factory design pattern*/
require_once('factory.php');

class ip  extends Database
{
	private $id;
	
	private $ip;
	
	public function __construct()
	{
		parent::__construct();
	}
}





?>