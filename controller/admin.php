<?php 
 
class admin {
	
	public function __construct()
	{
		//Calling your Model class for page
			$this->model = new auth_model();
			
	}
	  
	public function index() {
		if(isset($_SESSION["easyphp_sessionid"])) {
			$ifSessionExists = $this->model->checksession($_SESSION["easyphp_sessionid"]);
			if($ifSessionExists) {
				header("Location: ".$GLOBALS['ep_dynamic_url']."cp");
				die();
			}
		}
		else if(isset($_COOKIE['tutbuzzeasyphpsessionid'])) {
			$ifCookieExists = $this->model->checksession($_COOKIE['tutbuzzeasyphpsessionid']);
			if($ifCookieExists) {
				$_SESSION["easyphp_sessionid"] = $_COOKIE['tutbuzzeasyphpsessionid'];
				header("Location: ".$GLOBALS['ep_dynamic_url']."cp");
				die();
			}
		}
		else {
			$_SESSION["easyphp_sessionid"] = "";
		}
		if(isset($_GET['redirecturl'])) {
			$_SESSION['redirecturl'] = $_GET['redirecturl'];
		}
		if (!empty($_POST)) { //check each
			$data['post'] = $_POST; 
			$email = $_POST['email'];
			$password = $_POST['password'];
			isset($_POST['captcha'])?$captcha = $_POST['captcha']:$captcha="";
			isset($_POST['remember'])?$remember = $_POST['remember']:$remember = "";
			//$username = strip_tags($username);
			$email = strip_tags($email);
			$password = strip_tags($password);
			if($captcha!=="") $captcha = strip_tags($_POST['captcha']);
			$remember = strip_tags($remember);
			$password = md5($password); //sha-1()
			$result = $this->model->admin($email, $password, $remember,$captcha); // call to auth()
			if($result) {
				if(isset($_SESSION['redirecturl'])) {
					header("Location: ".$_SESSION['redirecturl']);
					die();
				}
				else {
					header("Location: ".$GLOBALS['ep_dynamic_url']."cp");
					die();
				}
			}
			else {
				$data['errors'] = array(array("<center>Sai thông tin đăng nhập, vui lòng thử lại!</center>"));
			}
		}
		$data['ep_title'] = "AdminCP"; //setting title name
		$data['view_page'] = "admin/admin.php"; //controller view page; wrong when admin view
		$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
		$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
		return $data;
	}
	
	// public function forgot() {
	// 	if (!empty($_POST)) {
	// 		$data['post'] = $_POST; 
	// 		//including validation
	// 		$v = new Valitron\Validator($_POST); // Input array
	// 		$v->rule('required', 'email');
	// 		$v->rule('email', 'email');
	// 		if($v->validate()) {
	// 			$value = strip_tags($_POST['email']);
	// 			$value = trim($value);
	// 			$data['result'] = $this->model->updateForgotPassword($value);
	// 		} else {
	// 			// Errors
	// 			$data['errors'] = $v->errors();
	// 		}
	// 	}
	// 	$data['ep_title'] = "Forgot Password"; //setting title name
	// 	$data['view_page'] = "users/forgot.php"; //controller view page
	// 	$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
	// 	$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
	// 	return $data;		
	// }
	
	// public function passwordreset($tempid) {
	// 		if (!empty($_POST)) {
	// 		//including validation
	// 		$v = new Valitron\Validator($_POST); // Input array
	// 		$v->rule('required', 'password');
	// 		$v->rule('lengthMin', 'password', 6);
	// 		$v->rule('regex', 'password', '/[^a-z_\-0-9]/i')->message('Password should be alpha numeric and should contain atleat 1 special character');
	// 		$v->rule('equals', 'password', 'passwordverify')->message('Please re-enter the password again');
	// 		if($v->validate()) {
	// 			$final_array = array();
	// 			$keys = array_keys($_POST);
	// 			foreach($keys as $key) {
	// 				$value = strip_tags($_POST[$key]);
	// 				$value = trim($value);
	// 				if($key != "passwordverify") {
	// 					$final_array[$key] = $value;
	// 				}
	// 				if($key == "password") {
	// 					$final_array[$key] = md5($value);
	// 				}
	// 			}
	// 			$data['result'] = $this->model->passwordreset($final_array['password'], $tempid);
	// 		} else {
	// 			// Errors
	// 			$data['errors'] = $v->errors();
	// 		}
	// 	}
	// 	$data['tempid'] = $tempid;
	// 	$data['ep_title'] = "Change Password"; //setting title name
	// 	$data['view_page'] = "admin/admin.php"; //controller view page
	// 	$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
	// 	$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
	// 	return $data;		
	// }	
}