<?php include_once("./lib/class/mysql_pdo.php"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Mailing</title>

<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" charset="utf-8"/>
<script src="./lib/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="./lib/script.js"></script>
<script language="JavaScript" type="text/javascript" src="./lib/jquery-ui-1.8.20.custom.min.js"></script>

</head>
<body>

<div id='container'>

<div id="mainMenuContainer">
	<div id="mainMenu">
	<p>main menu</p>
	<input class="button" type="button" value="campaign"/>
	<input class="button" type="button" value="deployment"/>
	</div>

	<div id="mainMenuLogo">
		<img src="./images/mainMenu.jpg" alt="mainmenu"/>
	</div>

</div>


<div id="mainMenuTabNav">

<div id="campaign"></div> 


<div id="deployment" class="current">
    <ul id="tabNav">
	<li><a href="#domainManagement">Domain Management</a></li>
	<li id="templateManagementNav"><a href="#templateManagement">Template Management</a></li>
 	<li><a href="#test_send">Test & Send</a></li>
    </ul>



  <div id="domainManagement">
   	<?php loadDomains("redir");?>
	<?php loadDomains("from");?>
	<?php loadDomains("ip");?>
  </div>
	
    
    <div id="templateManagement"></div>
    
<div id="test_send">
      
						
	
	<fieldset>
		<legend>Template Testing</legend>
			<table>
				<tr><td>
						<label>Creative:</label>
						<ul class="creativeParent1 loadMenu">
							<input id="sendCreativeId" type="text"  placeholder="Select a creative Id"/>
							<img class="dropdownButton" src="" alt=''/>
		
				<ul>
				</td></tr>
				
				
							<tr colspan="1" rowspan="2">
							
								<td>
										<label>Avaliable Templates</label>
									<ul id="templateAvaliable" class="sortable templateConnect">
									</ul>		
								</td>
								
								<td>
									<label>Selected Templates</label>
									<ul id="templateSelected" class="sortable templateConnect">
									</ul>
								</td>
							
							<td>								
									<fieldset>
										<legend>Volume Test</legend>
											<form id="testVolume">
												<table>
														<?php	for($i=1;$i<=5;$i++){?>
																	<tr><td>
																	<input type="text" class="testAccounts clear" name="account<?php echo $i;?>" class="clear" placeholder="enter 1st seed email here" />
																	</td>
																	<td> x </td>
																	<td>
																	<input type="text" class="clear" name="volume<?php echo $i;?>" placeholder="Volume" />
																	</td></tr>
														<?php	}?> 
																<tr>
																	<td colspan="2"></td>
																	<td>
																		<input type="submit" placeholder="Send Volume Test" name="test">
																	</td>
																</tr>
																
												</table>
											</form>			
									</fieldset>
								</td>
								</tr>
								
							<tr><td></td><td></td>
							<td>
								
								<fieldset>
									<legend>Send</legend>
										<form id="sendList" action="<?php echo APPLICATION_PATH; ?>/others/email.php" method="POST">
										<table>
											<tr>
												<td>
												<input type="text" id="productionList" placeholder="Production Lists"/>
												</td>
												<td><input name="seedInterval" type="input" class="clear" placeholder="seed Interval"/>
												<td><input name="seedAccount" type="input" class="clear" placeholder="Seed Account"/>
												</td>
												<tr>
																	<td colspan="2"></td>
																	<td>
																		<input type="submit" value="Send Production List" name="send" />
																	</td>
																</tr>
											</tr>	
										</table>
									</form>	
								</fieldset>
								
							</td>									
							</tr>
							<tr><td colspan="2"></td>
							<td>
								
								<fieldset>
									<legend>Bulk Setup</legend>
								<form id="sendBulk" action="<?php echo realpath ?>campagin/send" method="POST">
									<table>
										<tr>
											<td><input class="clear" type="text" name="bulkCampaignId" placeholder="Campaign ID"/></td>
											<td><input type="submit" name="setBulk" placeholder="Set Bulk"/></td>
										</tr>
									</table>
							
								</fieldset>
							</td></tr>	
							<form>
						</table>
					</fieldset>
						
			<input type="button" id="monitor" value="Monitor"/>						
			  	
        	
</div>

</div><!--end of deployment-->    
</div><!--end of main menu tab nav-->
</div>
</body>
</html>

<?php
function loadDomains($target_domain){
	$db = new mysql_pdo();
	$domains = $db->getDomain($target_domain);
	$selectedDomains = $db->getSelectedDomains($target_domain);
?>
	<fieldset>
    	<legend><?=ucfirst($target_domain)?> Domains</legend>
		<div id="<?=$target_domain?>Domans">
			<select id="avaliable_<?=$target_domain?>" multiple>
				<? 
		     		if($target_domain!="ip"){
						display_From_Redir_Selections($domains,$selectedDomains);
					}else{
						display_ip_Selections($domains,$selectedDomains);
					}
		     	?>
			</select>
		    <input type="button" target="<?=$target_domain?>" class="addDomain" value="Add" />
		    <select id="selected_<?=$target_domain?>" multiple >
		    	<?
		     		if($target_domain!="ip"){
						display_From_Redir_Selections($domains,$selectedDomains,true);
					}else{
						display_ip_Selections($domains,$selectedDomains,true);
					}
				?>
		    </select>
		    <input type="button" target="<?=$target_domain?>" class="removeDomain" value="Remove" />
		  </div>
    		  <input type="button" target="<?=$target_domain?>" class="saveDomain" value="Save" /> 
    </fieldset> <!--endo redir domains-->

<?php
}


function display_From_Redir_Selections($display,$compare,$revert=false){
	foreach($display as $domain){
		$selected = !in_array($domain["name"],$compare);	
		$selected = $revert ? !$selected : $selected;	
 		if($selected){	
			$id = $domain["id"];	
     		$domainName = $domain["name"];
     		echo "<option id=$id value=$domainName>$domainName</option>";
		}							
	} 
}

function display_ip_Selections($display,$compare,$revert=false){
	foreach($display as $domain){
 		$selected = !in_array($domain["ip"],$compare);	
		$selected = $revert ? !$selected : 	$selected;	
 		if($selected){	
     		$id = $domain["id"];	
     		$dns = $domain["dns"]; 
			$ip = $domain["ip"];
     		echo "<option id=$id value=$ip>$dns : $ip</option>";
		}
	} 
}