<?php

//img_upload_ftp();
sync_db();

function sync_db(){
$data["action"] = "insert";
$data["id"] = "2";
$data["address"] = "http://www.facebook.com1";
$data["image"] = "cake.gif";
$data["description"] = "desd ..";
server_action($data);
}

function server_action($data){
	$ch = curl_init();
	$url = "http://www.chichionline.net/ad/sync_db.php";
	$handle = curl_init($url);
	curl_setopt($handle, CURLOPT_POST, true);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
	$result = curl_exec($handle);

}

function img_upload_ftp(){
$data["filename"] = "loading.gif";
$data["file"] = "c:/xampp/htdocs/eMail/15/images/".$data["filename"];	

$ftp_server="chichionline.net";
$ftp_user_name="chichio1";
$ftp_user_pass="dat8tiantianT@";
$file = "c:/xampp/htdocs/eMail/15/images/saving.gif";
$remote_file = "public_html/ad/img/saving.gif";

 // set up basic connection
 $conn_id = ftp_connect($ftp_server);

 // login with username and password
 $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

 // upload a file
 if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
    echo "successfully uploaded $file\n";
    exit;
 } else {
    echo "There was a problem while uploading $file\n";
    exit;
    }
 // close the connection
 ftp_close($conn_id); 
}
