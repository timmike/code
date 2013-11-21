<?php


require_once('init.php');

require_once('campagins.php');

class creative extends campagins
{
	private $id;
	
	private $campagin_id;
	
	private $name;
	
	private $creative;
	
	public function __construct($the_creative)
	{
		$this->setTable('creative');
		
		$this->campagin_id = $the_creative['campagin_id'];
		
		$this->name = $the_creative['name'];
		
		$this->creative = array('campagin_id' =>$this->campagin_id, 'name'=>$this->name);
	}
	
	public function get_creative()
	{
		return $this->creative;
	}
	
	public static function display()
	{
		parent::setTable('creative');
		return Database::display();		
	}
}

if(!empty($_POST['submitcreative'])){
	$creative = array('name'=>$_POST['name'], 'campagin_id'=>$_POST['campagin_id']);
	$creative = new creative($creative);
	$creative->insert($creative->get_creative());
	header("location:displayCreative.php?campagin_id=".$_POST['campagin_id']."");
	exit;
}

?>