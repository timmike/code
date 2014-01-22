<?php

ini_set('display_errors', 1);
require_once('init.php');

class campagins extends Database
{
	
	private static $form = array('name', 'advertiser', 'network', 'offer', 'domain', 'cluster');
	
	private $form_values = array();
	
	public function __construct($the_form)
	{
		if(!empty($the_form)){
			foreach(self::$form as $value){
				if(!empty($the_form[$value])){
					if($value != 'name'){
						require_once($value.'.php');
					  $obj = array($value=>$the_form[$value]);
						$factory = new Factory($obj);
						if($factory->get_obj()->check($the_form[$value]) === true){
							$factory->get_obj()->setTable($value);
							$id = $factory->get_obj()->insert(array($value=>$the_form[$value]));
							$this->form_values[$value."_id"] = $id;
						}
						else{
							$id = $factory->get_obj()->check($the_form[$value]);
							$this->form_values[$value."_id"] = $id;
						}
					}
					else{
						$this->form_values[$value] = $the_form[$value];
					}				
				}
			}
			$this->form_values['date_submitted'] = date('Y-m-d H:i:s');
		}	
	}
	
	public function build_form_values()
	{
		
	}
	
	public function get_form_values()
	{
		return $this->form_values;	
	}
	
	public static function display()
	{
			
		$result = mysqli_query(parent::getInstance()->getConnection(), 
		'select c.id, c.name, a.advertiser, n.network, d.domain, cl.cluster, o.offer, c.date_submitted
		from  campagin c left join advertiser a on c.advertiser_id = a.id
		left join network n on c.network_id = n.id
		left join domain d on c.domain_id = d.id
		left join cluster cl on c.cluster_id = cl.id
		left join offer o on c.offer_id = o.id
		order by c.id desc');
		
		$res = array();
		for($i=0; $i<$result->num_rows; $i++){
			$rows = mysqli_fetch_array($result,MYSQL_ASSOC);
			$res[] = $rows;
		}
		return $res;
		
	}
	
}

if(!empty($_POST['submitted_campagin'])){
	$campagins = array("campagins"=>$_POST);
	$factory = new Factory($campagins);
	$campagin = $factory->get_obj();
	$campagin->setTable("campagin");
	$campagin->insert($campagin->get_form_values());
	header("location:table.php");
	exit;
}


?>