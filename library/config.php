<?php 

//Basic Settings
$GLOBALS['ep_base_url'] = "http://localhost/webthitracnghiem/"; //Base URL Ex: http://www.yourdomain.com/authscript/
//Dynamic URL changs as per seourl set value (Its Same)
$GLOBALS['ep_dynamic_url'] = "http://localhost/webthitracnghiem/"; //Dynamic URL Ex: http://www.yourdomain.com/authscript/
$GLOBALS['seourl'] = "false"; //Set true if your server supports .htaccess, else if your developing in local environment set it false. 
$GLOBALS['ep_first_page'] = "login"; //Default landing page 
$GLOBALS['website_name'] = "E-TEST ONLINE"; //Default landing page 

//Database Settings
$GLOBALS['ep_hostname'] = "localhost"; //Database Hostname
$GLOBALS['ep_username'] = "root"; //Database Username
$GLOBALS['ep_password'] = ""; //Database Password
$GLOBALS['ep_database'] = "ilab"; //Database Name

//Mailer Settings (In case if you integrate email library)
$GLOBALS['ep_smpt_server'] = "localhost"; //SMPT Server Name Ex: smtp.gmail.com for Gmail
$GLOBALS['ep_smpt_port'] = "25"; //SMPT Port
$GLOBALS['ep_smpt_username'] = "postmaster@localhost"; //SMPT Username
$GLOBALS['ep_smpt_password'] = "postmaster"; //SMPT Password
$GLOBALS['SMTPSecure'] = 'tls'; //SMPT Secure ,tls,ssl
$GLOBALS['Mailer'] = "smtp"; //SMPT Secure

//Comman Views
$GLOBALS['ep_header'] = "header.php"; //Header Template
$GLOBALS['ep_footer'] = "footer.php"; // Footer Template
