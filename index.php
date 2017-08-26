<?php
session_start();
//require ("anti_ddos/index.php");
require ("anti_dos_php/anti_dos.php");

require_once("csrfdef/csrf_def.php");

//$_SESSION = array();
//if(file_exists('dnp_fw.php')){require_once('dnp_fw.php');}  
//require("dqh-firewall/dqh-firewall.php"); 
// define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
// define('PHP_FIREWALL_ACTIVATION', false );
// if ( is_file( @dirname(__FILE__).'/php-firewall/firewall.php' ) )
// 	include_once( @dirname(__FILE__).'/php-firewall/firewall.php' );


include('library/function.php');
?>   