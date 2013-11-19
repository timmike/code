<?php

class fileServe
{
	
	private static $file_path;
	
	public function __construct()
	{

	}
	
	public static function fileServing()
	{
		$ext = pathinfo(self::$file_path, PATHINFO_EXTENSION);
		$file = file_get_contents(self::$file_path);
		header('Content-Type: image/'.$ext.'');
		echo $file;
	}
	
	public static function set_file_path($the_file_path)
	{
		self::$file_path = $the_file_path;
	}

}


if(!empty($_GET['file_path'])){
	$file_path = $_GET['file_path'];
	fileServe::set_file_path($file_path);
		fileServe::fileServing();
}





?>