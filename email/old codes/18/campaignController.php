<?php
include_once("./lib/class/campaign_mysql_pdo.php");


$conn = new mysql_pdo();
$action = $_POST["action"];
unset($_POST["action"]);


if($action=="getCategoryList"){
	echo json_encode($conn->getCategoryList($_POST));
}
else if($action=="CreateCategoryInfo"){	
	echo json_encode($conn->createCategoryInfo($_POST));
}
else if($action=="UpdateCategoryInfo"){
	echo json_encode($conn->updateCategoryInfo($_POST));
}
else if($action=="createCampaign"){
	sleep(1);	
	echo json_encode($conn->createCampaign($_POST));
}
else if($action=="updateCampaign"){
	sleep(1);	
	echo json_encode($conn->updateCampaign($_POST));
}
else if($action=="getCampaignList"){
	$items = array("campaign","offer","domain","cluster");
	echo json_encode($conn->getCampaignList($items));
}
else if($action=="getCampaignInfo"){
	$items = array("campaign","advertiser","network","offer","domain","cluster");
	$id =  $_POST["id"];
	echo json_encode($conn->getCampaignList($items,$id));
}
else if($action=="getCreativeInfo"){
	$items = array("id","campaign","name","date");
	$id =  $_POST["id"];
	echo json_encode($conn->getCreativeList($items,$id));
}
else if($action=="createCreative"){
	sleep(1);
	echo json_encode($conn->createCreativeList($_POST));
}
else if($action=="getLinkId"){
	$items = array('*');
	$id =  $_POST["creative"];
	echo json_encode($conn->getLinkId($items,$id));
}
else if($action=="createLinkId"){
	sleep(2);
	unset($_POST["linkIdImage"]);
	unset($_POST["id"]);
	$conn->createLinkId($_POST,$_FILES);
}
else if($action=="updateLinkId"){
	sleep(2);
	unset($_POST["linkIdImage"]);
	$conn->updateLinkId($_POST,$_FILES);
}


