<?php
require_once('init.php');
require_once('creative.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <title>Typography | BlueWhale Admin</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="css/text.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen"/>
  <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
  <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
  <link href="css/table/demo_page.css" rel="stylesheet" type="text/css"/>
  <!-- BEGIN: load jquery -->
  <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
  <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
  <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
  <!-- END: load jquery -->
  <script type="text/javascript" src="js/table/table.js"></script>
  <script src="js/setup.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      setupLeftMenu();
      $('.datatable').dataTable();
      setSidebarHeight();
      $("#creative_id" ).change(function(){
			var val = ( this.value ); 	 	
 	 		$.ajax({
  			type: "GET",
  			url:  "./template.php",
  			data: {'creative_id': val,
  						'submit': 'get_templates_creative_ID'},
  	 	  success: function(data) {
      	var json = $.parseJSON(data);
      			$("#templates").empty();
      	 		$('#template').empty();
      	 		$("#templates").attr('multiple', 'multiple');
      			$.each(json, function( index, value ) {
          	if(index == 2)	{
          		$("#template_name").attr('value', value);
          	}
      			if(index == 0){
      			 $('#template').empty();
      			 $('#template').html(value);
      			}
      			else {   				
  						$('#templates')
         			.append($("<option></option>")
         			.attr("value",value)
         			.text(value)); 
        			}
						});
     			}
				});
			});
			
			$("#templates" ).change(function(){
				var val = $( "#creative_id" ).val();
				var name = $("#templates option:selected").text();
 	 			$.ajax({
  				type: "GET",
  				url:  "./template.php",
  				dataType: "json",
  				data: {
  					"templ": "get_template_by_name",
  					"name": name,
		  			"creative_id": val
					},
  	  		success: function(data) {
  	  			$('#template').empty();
  					$.each(data, function( index, value ) {
  					$('#template')
         		.html(value);
         		$("#template_name").attr('value', name);
						});
     			}     	
				});
			});
    });
  </script>
</head>
<body>
<div class="container_12">
<div class="grid_12 header-repeat">
  <div id="branding">
    <div class="floatleft">
      <img src="img/logo.png" alt="Logo"/></div>
    <div class="floatright">
      <div class="floatleft">
        <img src="img/img-profile.jpg" alt="Profile Pic"/></div>
      <div class="floatleft marginleft10">
        <ul class="inline-ul floatleft">
          <li>Hello Admin</li>
          <li><a href="#">Config</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
        <br/>
        <span class="small grey">Last Login: 3 hours ago</span>
      </div>
    </div>
    <div class="clear">
    </div>
  </div>
</div>
<div class="clear">
</div>
<div class="grid_12">
  <ul class="nav main">
    <li class="ic-form-style"><a href="javascript:"><span>Management</span></a>
      <ul>
        <li><a href="index.php">Campagin</a></li>
        <li><a href="displayDomainManagement.php">Domain</a></li>
        <li><a href="displayTemplates.php">Templates</a></li>
      </ul>
    </li>
    <li class="ic-notifications"><a href="displayTestSend.php"><span>Test & Send</span></a></li>
  </ul>
</div>
<div class="clear">
</div>
<div class="grid_2">
  <div class="box sidemenu">
    <div class="block" id="section-menu">
      <ul class="section menu">
        <li><a class="menuitem">Menu 1</a>
          <ul class="submenu">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            <li><a class="active">Submenu 3</a></li>
            <li><a>Submenu 4</a></li>
            <li><a>Submenu 5</a></li>
          </ul>
        </li>
        <li><a class="menuitem">Menu 2</a>
          <ul class="submenu">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            <li><a>Submenu 3</a></li>
            <li><a>Submenu 4</a></li>
            <li><a>Submenu 5</a></li>
          </ul>
        </li>
        <li><a class="menuitem">Menu 3</a>
          <ul class="submenu">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            <li><a>Submenu 3</a></li>
            <li><a>Submenu 4</a></li>
            <li><a>Submenu 5</a></li>
          </ul>
        </li>
        <li><a class="menuitem">Menu 4</a>
          <ul class="submenu">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            <li><a>Submenu 3</a></li>
            <li><a>Submenu 4</a></li>
            <li><a>Submenu 5</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="grid_10">
  <div class="box round first grid">
    <h2>
      Template Management</h2>
    <div class="block ">
    	<form action="template.php" method="post" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td class="col1" colspan="2">
             <textarea name="template" cols="60" rows="15" id="template">	
						 </textarea>
            </td>          
          </tr>
          <tr>
            <td class="col1">
            <select name="creative_id" id="creative_id">
            	<option>
								Select a creative id
							</option>
						<?php
						$rows = creative::display();
						if(!empty($rows)){
							foreach($rows as $key => $value){
								echo '<option value="'.$value['id'].'">'.$value['id'].'</option>';
							}
						}						
						?>
						</select>
            </td>
            <td class="col2">
         			<select name="templates[]" id="templates"><option>select a template</option></select>
            </td>            
          </tr>
          <tr>
            <td class="col1">
              <label>
         		  Test Account:
              </label>
            </td>
            <td class="col2">
         			<input type="text" placeholder="Enter test account(e.g:test@gmail.com)" name="test_account" />
            </td>            
          </tr>
					<tr>
						<td><button class="btn btn-orange"
						name="Test" value="Test">Test</button></td>
						<td></td>
					</tr>
					<tr>
						<td>
							<select id="domain_select" name="domain_select">
        				<option value="gmail.com">Gmail.com</option>
				        <option value="yahoo.com">Yahoo.com</option>
				      </select>	
				    </td>
				    <td>
				    	<input type="text" placeholder="seed" id="seed" name="seed"/>
				    </td>
				    <td>
				    	<input type="text" placeholder="seed account" name="send_account" id="send_account" />
				    </td>
					</tr>
					<tr>
						<td>
							<button class="btn btn-orange"
							name="Send" value="Send">Send</button>
						</td>
					</tr>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="clear">
</div>
</div>
<div class="clear">
</div>
<div id="site_info">
  <p>
    Copyright <a href="#">BlueWhale Admin</a>. All Rights Reserved.
  </p>
</div>
</body>
</html>
