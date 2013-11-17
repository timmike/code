<?php

class mysql_pdo{
	private $username = 'root';
	private $password = '';
	private $table = '';
	private $host="localhost";
	private $img_basePath_save = 'c:/xampp/htdocs/php/email/Upload_Files';
	private $img_basePath_server = 'http://localhost/php/email/Upload_Files';
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
	
	public function updateCategoryInfo($data){
		$table = 'campaign_'.$data["campaignInfoSelction"];
		unset($data["campaignInfoSelction"]);
		$conn = $this->mysql_pdo_conn();
		$query = "update $table set name=:name, note=:note where id=:id";
		$prepare = $conn->prepare($query);
		$prepare->execute($data);
		return array("result"=> $prepare->rowCount());		
	}
	
	public function getCategoryList($request){
		$table = 'campaign_'.$request["requestCategory"];
		$query = "select id,name,note from $table order by name ";
		$result = $this->retrieveData($query);
		return ($this->returnAssocArray($result));
	}
	
	
	public function createCategoryInfo($data){
		$table = 'campaign_'.$data["campaignInfoSelction"];
		unset($data["campaignInfoSelction"]);
		$conn = $this->mysql_pdo_conn();
		$query = "insert into $table (name, note) values (:name,:note)";
		$prepare = $conn->prepare($query);
		$prepare->execute($data);
		return array("result"=> $prepare->rowCount());		
	}
	
	public function createCampaign($data){
		$table = 'campaign_campaign';
		return $this->saveCampaignInfo($table,$data);
	}
	
	public function updateCampaign($data){
		$conn = $this->mysql_pdo_conn();	
		
		$queryPrepare = array();	
		$table = 'campaign_'.$data["campaignInfoSelction"];
		unset($data["campaignInfoSelction"]);
		$id=$data["id"]; unset($data["id"]);
		$query = "update $table set ";
		//$query = "update $table set name=:name, note=:note where id=:id";
		$where = " where id=:id ";
	
		foreach($data as $key => $value){
			$allKeys = array_keys($data);	//unable to end(array_keys(dagta))  //end require a reference
			$end = end($allKeys);	
			$query .= $end != $key ? " $key=:$key, " : " $key=:$key ";
		}

		$query .= $where;
		$data["id"] = $id; //id could be the last key resulting  set item=:item , where id = id;
		$prepare = $conn->prepare($query);
		$prepare->execute($data);
		return array("result"=> $prepare->rowCount());	
	}
	
	
	
	public function getCampaignList($data,$id=''){
		$tablePrefix = "campaign_";
		$table = $data;
		$queryPrepare = array("select"=>'',"from"=>'',"where"=>'');
		$queryPrepare["orderBy"] = ' order by id desc';
		$queryPrepare["where"] .= ($id) ? " campaign_campaign.id = $id and " : '';
		
		foreach($table as $item){
			if($item != 'campaign')
				$queryPrepare["where"] .= end($table) != $item ? "$item = $tablePrefix$item.id and " : "$item = $tablePrefix$item.id";
			else
				$queryPrepare["select"] .= "$tablePrefix$item.id,$tablePrefix$item.date,";
				
			$queryPrepare["select"] .= end($table) != $item ? "$tablePrefix$item.name as $item," : "$tablePrefix$item.name as $item";
			$queryPrepare["from"] .= end($table) != $item ? "campaign_$item," : "campaign_$item";
		}
		$query = "select ".$queryPrepare["select"]. " from ".$queryPrepare["from"] . " where ". $queryPrepare["where"] . $queryPrepare["orderBy"] ;
		$result = $this->retrieveData($query);
		return $this->returnAssocArray($result);
	}


	public function getCreativeList($data,$id=''){
	
		$tablePrefix = "campaign_";
		$table = $data;
		$queryPrepare = array("select"=>'',"from"=>'',"where"=>'');
		$queryPrepare["orderBy"] = ' order by id desc';
		$queryPrepare["where"] .= ($id) ? " campaign_creative.campaign = $id " : '';
		
		foreach($table as $item){
			$queryPrepare["select"] .= end($table) != $item ? "$item," : "$item";
			$queryPrepare["from"] = "campaign_creative";
		}
		$query = "select ".$queryPrepare["select"]. " from ".$queryPrepare["from"] . " where ". $queryPrepare["where"] . $queryPrepare["orderBy"] ;

		$result = $this->retrieveData($query);
		return $this->returnAssocArray($result);
	}
	
	public function getLinkId($data,$id=''){
		$tablePrefix = "campaign_";
		$table = $data;
		$queryPrepare = array("select"=>'',"from"=>'',"where"=>'');
		$queryPrepare["orderBy"] = ' order by id asc';
		$queryPrepare["where"] .= ($id) ? " campaign_linkid.creative = $id " : '';
		
		foreach($table as $item){
			$queryPrepare["select"] .= end($table) != $item ? "$item," : "$item";
			$queryPrepare["from"] = "campaign_linkid";
		}
		$query = "select ".$queryPrepare["select"]. " from ".$queryPrepare["from"] . " where ". $queryPrepare["where"] . $queryPrepare["orderBy"] ;

	$result = $this->retrieveData($query);
	return $this->linkId_img_add_basepath($this->returnAssocArray($result));
	
	}
	
	private function linkId_img_add_basepath($resultAssoc){
		foreach($resultAssoc as &$array){
			 $array['image'] =  "$this->img_basePath_server/".$array['image']; 
		}
		return $resultAssoc;
	}
	
	public function createLinkId($data,$file){
		$tablePrefix = "campaign_";
		$table = "linkid";
		$last_inserted_id = $this->saveCampaignInfo1($tablePrefix.$table,$data);
		if($last_inserted_id)	$this->sync_linkid($data,array("id"=>$last_inserted_id),"insert"); //sync db on remote servers.
		
		$result = $this->imageUpload($file,$last_inserted_id);

		if($result["status"]==1){
			$img_data = array("image"=>$result["image"],'id'=>$last_inserted_id);
			$this->sync_linkid($data,$img_data,"update");
			echo $this->updateLinkId1($table, $img_data) ? json_encode(2) : json_encode(1);
		}else{
			echo $result["error"];
		}
	}
	
	private function sync_linkid($data,$img_data=array(),$action){
		$postData = array_merge($data,$img_data);
		$postData["action"] = $action;
		$this->server_action($postData);
	}
	
	private function server_action($postData){
		$ch = curl_init();
		//$url = "http://www.chichionline.net/ad/sync_db.php";
		$url = "http://www.alltian.com/sync_db.php";
		$handle = curl_init($url);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
		$result = curl_exec($handle);
	}
	
	function img_upload_ftp($file_source,$file_name){
		//$ftp_server="chichionline.net";
		//$ftp_user_name="chichio1";
		//$ftp_user_pass="dat8tiantianT@";
		//$remote_path = "public_html/ad/img";
		$ftp_server="alltian.com";
		$ftp_user_name="alltianc";
		$ftp_user_pass="hao8tiantianT@";
		//$remote_path = "public_html/ad/img";
		$remote_path = "./mailing/img";
		$remote_file = "$remote_path/$file_name";
		
		// set up basic connection
		$conn_id = ftp_connect($ftp_server);
		
		// login with username and password
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

		// upload a file
		if (ftp_put($conn_id, $remote_file, $file_source, FTP_BINARY)) {
		   //echo "successfully uploaded $file\n";
		  // exit;
		 }else{
		   //echo "There was a problem while uploading $file\n";
		    //exit;
		}
		ftp_close($conn_id);  // close the connection 
	}
	
	
	public function updateLinkId($data,$file){
		$conn = $this->mysql_pdo_conn();	
		$queryPrepare = array();	
		$table = 'campaign_linkid';
		$id=$data["id"]; unset($data["id"]);
		$query = "update $table set ";
		$imageId = "linkIdImage";
		//$query = "update $table set name=:name, note=:note where id=:id";
		$where = " where id=:id ";
	
		if($file["linkIdImage"]["name"]){
			$result = $this->imageUpload($file,$id);
			if($result["status"]) $data["image"] = $result["image"];
		}
	
		foreach($data as $key => $value){
			$allKeys = array_keys($data);	//unable to end(array_keys(dagta))  //end require a reference
			$end = end($allKeys);	
			$query .= $end != $key ? " $key=:$key, " : " $key=:$key ";
		}

		$query .= $where;
		$data["id"] = $id; //id could be the last key resulting  set item=:item , where id = id;
		$prepare = $conn->prepare($query);
		$prepare->execute($data);
		$this->sync_linkid($data,array(),'update');
		echo json_encode($prepare->rowCount());	
	}
	
	public function updateLinkId1($table,$data){
		$table = 'campaign_'.$table;
		$conn = $this->mysql_pdo_conn();
		$query = "update $table set image=:image where id=:id";
		$prepare = $conn->prepare($query);
		$prepare->execute($data);
		return array("result"=> $prepare->rowCount());		
	}
	
	
	
	public function createCreativeList($data){
		$tablePrefix = "campaign_";
		$table = "creative";
		$result = $this->saveCampaignInfo($tablePrefix.$table,$data);
		return $this->returnAssocArray($result);
	}


	
	private function saveCampaignInfo($table,$data){ // return totoal row updated
		$conn = $this->mysql_pdo_conn();

		$fields = '';
		$values = '';
		foreach($data as $key => $value){
			$fields .= "$key,";
			$values .= ":$key,";
		}
		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);
		$query = "insert into $table ($fields) values ($values)";
		$prepare = $conn->prepare($query);
		$prepare->execute($data);
		return array("result"=> $prepare->rowCount());
	}
	
	private function saveCampaignInfo1($table,$data){  //resutnr last insterted row
		$conn = $this->mysql_pdo_conn();

		$fields = '';
		$values = '';
		foreach($data as $key => $value){
			$fields .= "$key,";
			$values .= ":$key,";
		}
		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);
		$query = "insert into $table ($fields) values ($values)";
		$prepare = $conn->prepare($query);
		$prepare->execute($data);
		return $conn->lastInsertId();
	}
	
	private function retrieveData($query,$mode = PDO::FETCH_ASSOC){
		$db = $this->mysql_pdo_conn();
		$prepare = $db->prepare($query);
		$prepare->execute();
		$prepare->setFetchMode($mode);
		return $prepare;
	}
	
	private function get_Redir_From($table){
		$query = "select id,name from $table";
		$result = $this->retrieveData($query);
		return $this->returnAssocArray($result);
	}
	
	private function getIP($table){
		$query = "select id,ip,dns,vmta from $table";
		$result = $this->retrieveData($query);
		return $this->returnAssocArray($result);
	}
	
	public function getDomain($tartet_domain){
		switch ($tartet_domain) {
			case "redir":
				$table = "redirdomains";
				return $this->get_Redir_From($table);
				break;
			case "from":
				$table = "fromdomains";
				return $this->get_Redir_From($table);
				break;
			case "ip":
				$table = "ipdomains";
				return $this->getIP($table);
				break;	
			
		}
	}
	
	public function getSelectedDomains($tartet_domain){
		$query = "select name from selected_$tartet_domain";
		$mode = PDO::FETCH_NUM;
		$result = $this->retrieveData($query);
		return $this->returnIndexArray($result);	
	}
	
	
	private function returnAssocArray($data){
		$_data = array();
		foreach($data as $key => $value){
			$_data[$key] = $value;
		}
		return $_data;
	}
	
	private function returnIndexArray($data){
		$_data = array();
		foreach($data as $arrays){
			foreach($arrays as $index => $value){
				$_data[] = $value;	
			} 
		}
		return $_data;
	}
	
	
	public function saveDomain($data){
		$table = "selected_".key($data);	
		$db = $this->mysql_pdo_conn();
		$count = 0;
		$destroyAll = "truncate table $table"; 
		$prepare = $db->prepare($destroyAll);
		$prepare->execute();
//need to fix inserting multipe lines at once		
		$insertRow = "insert into $table (name) values (:name)";
		$prepare=$db->prepare($insertRow);
		$prepare->bindParam(":name",$name);
		foreach($data as $domain){	
			foreach($domain as $name){
				$prepare->execute();	
				$count += $prepare->rowCount();	
			}	
		}
		echo json_encode(array($count));
	}
	
	
	
	
	
	
	
	public function imageUpload($img_file,$id){
	$error = "";
	$status = 0;
	$fileElementName = 'linkIdImage'; //id number
	$allowed_file_format = array("image/jpeg", "image/gif",'image/png');
	$filename_to_save = '';
 
	if(!empty($img_file[$fileElementName]['error'])){
		switch($img_file[$fileElementName]['error']){
			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}	
	}
	
	elseif(empty($img_file[$fileElementName]['tmp_name']) || $img_file[$fileElementName]['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}
	else{
		$filename 					= $img_file[$fileElementName]['name'];
		$file_tmp_file_location 	= $img_file[$fileElementName]["tmp_name"];
		$file_size 					= $img_file[$fileElementName]['size'];
		$file_type 					= $img_file[$fileElementName]['type'];
		
		if($file_size > 512000){
			 $error = " File size > 500k"; 
		}
		else{
			if(!in_array($file_type, $allowed_file_format)) {
	 				$error = "File typed not allowed";		
			}
			else{
				$status = 1;
				$filename_to_save = strpos($filename, '.') ? $id.strstr($filename,'.') : '';
				if(move_uploaded_file($file_tmp_file_location, "$this->img_basePath_save/$filename_to_save"))
					$this->img_upload_ftp("$this->img_basePath_save/$filename_to_save",$filename_to_save); //sync to remove server					
				}
		}
	}
	
		$result = array("status"=>$status,
						"error"=>$error,
						"image"=>"$filename_to_save");
						
		return $result;
		//return ($msg) ? json_encode($msg) : json_encode($error);		
		//echo json_encode(array($msg,$error)); can't return this, ajaxupload library will not process status correctly
}
	
	
	
	
	
	
	
	
	
	
}