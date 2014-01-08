<head>
<link rel="stylesheet" href="./css/campaign.css" type="text/css" media="screen" charset="utf-8"/>
<script type="text/javascript" src="./lib/campaign.js"></script>
<script type="text/javascript" src="./lib/ajaxfileupload.js"></script>
</head>


	<div id="creatives">
		<input type="button" box="category" id="campInfo" class="login-window" value="New Info"/>	
		<input type="button" box="creative" id="newCreativeBtn" class="login-window" value="New Campaign"/>	
	</div>
	<div id="linklist"></div>
	<div id="campaignList">	Campaign lists	</div>	
	<div id="campaignInfo"></div>
	<div id="creativeInfo"></div>

		
	


<!--Form---------New Item in Category --------------------->
   <div id="category-box" class="campaignCategory-popup">
		<a href="#" class="close"><img src="./images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
		<form method="post" id="campaignCategory" class="campaignCategory" action="#">
	        <fieldset class="textbox">
				<select id="campaignInfoSelction" name="campaignInfoSelction">
					<option value="">Select a category</option>
					<option value="offer">Offer</option>
					<option value="domain">Domain</option>
					<option value="advertiser">Advertiser</option>
					<option value="network">Network</option>
					<option value="cluster">Cluster</option>
					<option value="template">Template</option>
				</select>
				<div id="listName">
					<input type="text" id="name" name="name"  placeholder="Name"/>
				</div>
				<textarea id="note" name="note"></textarea>
				<input type="button" id="buttonAdInfo" value="Create"/>
			</fieldset>
		</form>
		</div>

<!-- ---------New Creative ------------->
 <div id="creative-box" class="creative-popup">
	<a href="#" class="close"><img src="./images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
	
	<form id="newCreative" method="post" action="">
	<table>
		<tr>
			<td><label>Name:</label></td>
			<td><input class="options" type="text" name="name" placeholder="Name" /></td>
		<tr>
			
		<?php displayCategoryList(); ?>
	
		<tr>
			<td ><label></label></td>
			<td><input id="createCampaign" type="button" value="Create Campaign"/></td>
		</tr>
		
	</table>

	</form>
	</div>

<!---------------------------Add/Update Link id---------------------->
     <div id="linkId-box" class="linkId-popup">
		<a href="#" class="close"><img src="./images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
		<img class="loading" src="./images/loadings.gif" style="display:none;"><br />	        
        <input type="text" name="description" placeholder="Description" class="description"/>
        <input type="file" name="linkIdImage"  id="linkIdImage" />
  	    <input type="text" name="address" placeholder="Address" class="address"/>
  	    <input type="button" class="addLinkId" value=Add Linkk" action="create"/>
		</div>

<?php function displayCategoryList(){
		$categoryList = array('advertiser','network','offer','domain','cluster');
		foreach($categoryList as $category){
			$categoryUpCase = ucwords($category);	
			echo "<tr class='options'>
						<td><label>$categoryUpCase</label></td>
						<td><select name=$category></select></td>
					</tr>
				";
			}
		}