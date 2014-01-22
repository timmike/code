<?php
require_once('init.php');
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
      Submit a Campagin</h2>
    <div class="block ">
    	<form action="campagins.php" method="post">
        <table class="form">
          <tr>
            <td class="col1">
              <label>
                Name
              </label>
            </td>
            <td class="col2">
              <input type="text" id="mini" class="mini" name="name" />
            </td>
          </tr>
          <tr>
            <td>
              <label>
                Advertiser
              </label>
            </td>
            <td>
              <input type="text" class="mini" name="advertiser" />
            </td>
          </tr>
          <tr>
            <td>
              <label>
                Network
              </label>
            </td>
            <td>
              <input type="text" class="mini" name="network" />
            </td>
          </tr>
          <tr>
            <td>
              <label>
                Offer
              </label>
            </td>
            <td>
              <input type="text" class="mini" name="offer" />
            </td>
          </tr>
          <tr>
            <td>
              <label>
                Domain
              </label>
            </td>
            <td>
              <input type="text" class="mini" name="domain" />
            </td>
          </tr>
          <tr>
            <td>
              <label>
                Cluster
              </label>
            </td>
            <td>
              <input type="text" class="mini" name="cluster"/>
            </td>
          </tr>
					<tr>
						<td colspan="2"><button class="btn btn-orange" 
							name="submitted_campagin" value="submitted_campagin">Submit a Campagin</button></td>
					</tr>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="grid_10">
  <div class="box round first grid">
    <h2>
      Campagin Information</h2>
    <div class="block">
      <table class="data display datatable">
        <thead>
        <tr>
          <th>Campagin ID</th>
          <th>Campagin Name</th>
          <th>Advertiser</th>
          <th>Network</th>
          <th>Domain</th>
          <th>Cluster</th>
          <th>Offer</th>
          <th>Date Submitted</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $camp = array("campagins"=> array());
        $factory = new Factory($camp);
        $campagin_object = $factory->get_obj();
        $campagins = $campagin_object::display();
				rsort($campagins);
        if(!empty($campagins)){
          foreach($campagins as $key => $value){
            echo '<tr>';
            echo '<td><a href="displayCreative.php?campagin_id='.$value['id'].'">'.$value['id'].'</a></td><td>'.$value['name'].'</td>
			<td>'.$value['advertiser'].'</td><td>'.$value['network'].'</td>
			<td>'.$value['domain'].'</td><td>'.$value['cluster'].'</td>
			<td>'.$value['offer'].'</td>
			<td>'.$value['date_submitted'].'</td>';
            echo '</tr>';
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
