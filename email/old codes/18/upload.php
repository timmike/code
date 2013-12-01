<?php
	$error = "";
	$msg = "";
	$fileElementName = 'linkIdImage'; //id number
	$basePath = 'C:/xampp/htdocs/php/email/Upload_Files';
	$allowed_file_format = array("image/jpeg", "image/gif",'image/png');
	
	if(!empty($_FILES[$fileElementName]['error'])){
		
		switch($_FILES[$fileElementName]['error']){
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
	
	elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}
	else{
		$filename 					= $_FILES[$fileElementName]['name'];
		$file_tmp_file_location 	= $_FILES[$fileElementName]["tmp_name"];
		$file_size 					= $_FILES[$fileElementName]['size'];
		$file_type 					= $_FILES[$fileElementName]['type'];
		
		if($file_size > 512000){
			 $error = " File size > 500k"; 
		}
		else{
			if(!in_array($file_type, $allowed_file_format)) {
	 				$error = "File typed not allowed";		
			}
			else{
				$msg = "success";
				move_uploaded_file($file_tmp_file_location, "$basePath/$filename");
			}
		
		}
	}
		echo ($msg) ? json_encode($msg) : json_encode($error);		
?>


