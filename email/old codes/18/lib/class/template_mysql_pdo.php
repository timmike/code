<?php

class mysql_pdo{
	private $username = 'root';
	private $password = '';
	private $table = '';
	private $host="localhost";
	
	function __construct(){

	}
	
	private function mysql_pdo_conn(){
		try {
		    $conn = new PDO("mysql:host=localhost;dbname=sendmail", $this->username, $this->password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}
	}
	

	public function getCreativeList($data){
		$tablePrefix = "campaign_";
		$table = 'creative';
		$query = "SELECT id FROM $tablePrefix$table WHERE date >= CURRENT_DATE() - INTERVAL :day DAY order by id desc";
		$db = $this->mysql_pdo_conn();
		$prepare = $db->prepare($query);
		$prepare->execute($data);
		$prepare->setFetchMode(PDO::FETCH_ASSOC);
		return $this->returnAssocArray($prepare);
	}
	
	public function getCreativeLink_Offer($id){
		$query = 'SELECT campaign_creative.id AS creativeId, campaign_linkid.id AS linkId, campaign_linkid.description, note
					FROM campaign_offer
					LEFT JOIN campaign_campaign ON campaign_offer.id = campaign_campaign.offer
					LEFT JOIN campaign_creative ON campaign_creative.campaign = campaign_campaign.id
					LEFT JOIN campaign_linkid ON campaign_linkid.creative = campaign_creative.id
					WHERE campaign_creative.id = :id
				';
		$db = $this->mysql_pdo_conn();
		$prepare = $db->prepare($query);				
		$prepare->execute($id);
		$prepare->setFetchMode(PDO::FETCH_ASSOC);
		$data = $this->returnAssocArray($prepare);
		if($data[0]['note']){
			$data[0]['from'] =  $this->getAsset('from',$data[0]['note']);
			$data[0]['subject'] =  $this->getAsset('subject',$data[0]['note']);
		}
		return $data;
	}
	
	public function getTemplateList($request){
		$table = 'campaign_'.$request["requestCategory"];
		$query = "select id,name,note from $table";
		$result = $this->retrieveData($query);
		return ($this->returnAssocArray($result));
	}
	
	public function getTemplate($id){
		$db = $this->mysql_pdo_conn();
		$table = 'campaign_template';
		$query = "select note from $table where id = :id";
		$prepare = $db->prepare($query);
		$prepare->execute($id);
		$prepare->setFetchMode(PDO::FETCH_ASSOC);
		return $this->returnAssocArray($prepare);
	}
	
	public function server_action($data){
		$ch = curl_init();
		$ip = '198.154.212.229';
		$url = "http://$ip/sendMail/templateController.php";
		$handle = curl_init($url);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		curl_exec($handle);
	}
	
	private function  getAsset($request,$asset){
		if($request == "from")
			$pattern = "/[F|f]rom Lines:\r\n([\s\S]+)[s|S]ubject Lines:/";
		else if($request == "subject" || $request == "alt")
			$pattern = "/Subject.*:([\s\S]+)/";
			
		preg_match_all($pattern,$asset,$subject);		
		if(isset($subject[1][0])){
			$optionsArray = explode("\n",$subject[1][0]);
		
			//remove newline in each array
			for($i=0;$i<count($optionsArray);$i++){
				$pattern = "/[\n\r|\n]/";
				$replace = "";
				$optionsArray[$i] = preg_replace($pattern,$replace,$optionsArray[$i]);
			}
			return $optionsArray;
		}else{
			return 0;
		}
	}
	
	
	private function retrieveData($query,$mode = PDO::FETCH_ASSOC){
		$db = $this->mysql_pdo_conn();
		$prepare = $db->prepare($query);
		$prepare->execute();
		$prepare->setFetchMode($mode);
		return $prepare;
	}
	
	private function returnAssocArray($data){
		$_data = array();
		foreach($data as $key => $value){
			$_data[$key] = $value;
		}
		return $_data;
	}
}