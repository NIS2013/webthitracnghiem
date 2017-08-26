<?php
if(isset($ep_title)){
	if($ep_title==="AdminCP") $nav_color = "#26a69a";
}
else $nav_color = "#01579b";
?>
<!DOCTYPE html>
<html>
	<head>
		<title> <?php echo empty($ep_title)? "Error" :$ep_title ?> </title>
		<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['ep_base_url']; ?>view/css/materialize.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['ep_base_url']; ?>view/css/styles.css"  media="screen,projection"/>
		<script type="text/javascript" src="<?php echo $GLOBALS['ep_base_url']; ?>view/js/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="<?php echo $GLOBALS['ep_base_url']; ?>view/js/jquery-migrate-1.2.1.js"></script>
		<script type="text/javascript" src="<?php echo $GLOBALS['ep_base_url']; ?>view/js/materialize.js"></script>
		<link rel="shortcut icon" href="<?php echo $GLOBALS['ep_base_url']; ?>view/images/favicon.png" type="image/x-icon" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script type="text/javascript" src="<?php echo $GLOBALS['ep_base_url']; ?>view/js/bootbox.min.js"></script>
		<!-- Delete this later -->
		<!--
		<link rel="stylesheet" href="<?php //echo $GLOBALS['ep_base_url']; ?>view/css/deletethis.css">
		<script src="<?php //echo $GLOBALS['ep_base_url']; ?>view/js/deletethis.js"></script>-->
		<!--boostrap-->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	</head>
<body>
	<div class="container">	
		<!-- Dropdown Structure -->
		<ul id="dropdown1" class="dropdown-content">

		  <li><a href="<?php echo $ep_dynamic_url; ?>dashboard/settings">Tài khoản</a></li>
		  <li><a href="<?php echo $ep_dynamic_url; ?>dashboard/password">Đổi mật khẩu</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo $ep_dynamic_url; ?>dashboard/logout">Đăng xuất</a></li>
		</ul>
			<nav>
			  <div class="nav-wrapper green accent-4" style="background-color: <?=$nav_color;?> !important;">
			  	<img src="<?php echo $GLOBALS['ep_base_url'];?>view/images/logo.png" style="padding-top: 5px; ">
				<a href="<?php echo $GLOBALS['ep_base_url'];?>" class="brand-logo"> <?=$GLOBALS['website_name'];?> </a>			
				<?php if(strlen(isset($_SESSION["easyphp_sessionid"])?$_SESSION["easyphp_sessionid"]:0) > 1) { ?>
				<ul class="right hide-on-med-and-down">
				  <!-- Dropdown Trigger -->
				  <li><a href="<?php $GLOBALS['ep_base_url'];?>test">Thi Online </a></li>
				  <li><a class="dropdown-button"  style="text-transform: capitalize"  href="#!" data-activates="dropdown1"> Chào, <?php if(!empty($userdata['name'])) { echo $userdata['name']; } ?><i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
				<?php } ?>
		</div>
	</nav>		
<div class="wrapper"> 