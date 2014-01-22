<?php
require_once('init.php');
require_once('creative.php');
if(!empty($_GET['campagin_id'])){
	$campagin_id = $_GET['campagin_id'];
}
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
      Submit a Creative</h2>
    <div class="block ">
    	<form action="creative.php" method="post">
        <table class="form">
          <tr>
            <td class="col1">
              <label>
                Name
              </label>
            </td>
            <td class="col2">
              <input type="text" id="mini" class="mini" name="name" />
              <input type="hidden" name="campagin_id" value="<?php echo $campagin_id; ?>"/>
            </td>
          </tr>
					<tr>
						<td colspan="2"><button class="btn btn-orange"
						name="submitted_creative" value="submitted_creative">Submit a Creative</button></td>
					</tr>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="grid_10">
  <div class="box round first grid">
    <h2>
      Campagin Name</h2>
    <div class="block">
      <table class="data display datatable">
        <thead>
        <tr>
          <th>Creative ID</th>
          <th>Campagin ID</th>
          <th>Creative Name</th>
          <th>Date Submitted</th>
        </tr>
        </thead>
        <tbody>
        <?php
        creative::setTable('creative');
				$rows = creative::displayByField(array('campagin_id'=>$campagin_id));
				if(empty($rows)){
					echo ' No Cratives yet for this campagins.<br /><br />';
				}
				else{
					foreach($rows as $key => $value){
            echo '<tr><td><a href="displayLink.php?creative_id='.$value['id'].'">'.$value['id'].'</a></td>
            	<td>'.$value['campagin_id'].'</td>
							<td>'.$value['name'].'</td>
							<td>'.$value['date_submitted'].'</td></tr>';
          }
				}
        ?>
        </tbody>
      </table>
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
