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
      From Domain Management</h2>
    <div class="block ">
    	<form action="fromdomains.php" method="post" enctype="multipart/form-data">
        <table class="form">
        <?php
    		$factory = new Factory(array('fromdomains'=>array()));
				$fromdomains = $factory->get_obj();
				$fromdos = $fromdomains::display();
				if(!empty($fromdos)){
					foreach($fromdos as $value){
						echo '<tr><td colspan="2"><input name="fromdomains['.$value["id"].']" type="checkbox" ';
						if($value['is_selected'] == '1'){
							echo ' checked= checked ';
						}		
						echo '/>'.$value['name'].'</td></tr>';
					}
				}    	
    		?>
    		<tr>
					<td colspan="2"><button class="btn btn-orange"
						value="submit_from_domains" name="submit_from_domains">Elect From Selected Domains</button></td>
				</tr>       
        </table>
      </form>
    </div>
  </div>
</div>
<div class="grid_10">
  <div class="box round first grid">
    <h2>
      Redirect Domain Management</h2>
    <div class="block ">
    	<form action="redirdomains.php" method="post" enctype="multipart/form-data">
        <table class="form">
        <?php
    		$factory = new Factory(array('redirdomains'=>array()));
				$redirdomains = $factory->get_obj();
				$redirdos = $redirdomains::display();
				if(!empty($redirdos )){
					foreach($redirdos  as $value){
						echo '<tr><td colspan="2"><input name="redirdomains['.$value["id"].']" type="checkbox" ';
						if($value['is_selected'] == '1'){
							echo ' checked= checked ';
						}		
						echo '/>'.$value['name'].'</td></tr>';
					}
				}    	
    		?>
    		<tr>
					<td colspan="2"><button class="btn btn-orange"
						value="submit_redir_domains" name="submit_redir_domains">Elect Redirect Selected Domains</button></td>
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
