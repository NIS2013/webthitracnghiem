<?php 

class register {
	
	public function __construct()
	  {
		//Calling your Model class for page
			$this->model = new auth_model(); 
	  }
	  
	public function index() {
		if(isset($_SESSION["easyphp_sessionid"])) {
			$ifSessionExists = $this->model->checksession($_SESSION["easyphp_sessionid"]);
			if($ifSessionExists) {
				header("Location: ".$GLOBALS['ep_dynamic_url']."dashboard");
				die();
			}
		}
		if(isset($_GET['redirecturl'])) {
			$_SESSION['redirecturl'] = $_GET['redirecturl'];
		}
		if (!empty($_POST)) {
			$data['post'] = $_POST; 
			//$captcha = strip_tags($_POST['captcha']);
			//including validation
			$v = new Valitron\Validator($_POST); // Input array
			$v->rule('required', 'username');
			$v->rule('lengthMin', 'username', 4);
			$v->rule('required', 'password');
			$v->rule('lengthMin', 'password', 6);
			$v->rule('regex', 'password', '/[^a-z_\-0-9]/i')->message('Cảnh báo mật khẩu yếu!');//Password should be alpha numeric and should contain atleat 1 special character
			$v->rule('equals', 'password', 'passwordverify')->message('Nhập lại mật khẩu!');//Please re-enter the password again
			$v->rule('required', 'name');
			$v->rule('lengthMin', 'name', 3);
			$v->rule('required', 'email');
			$v->rule('required', 'location');
			$v->rule('required', 'gender');
			$v->rule('email', 'email');
			$username_exists = $this->checkDuplicateUsername($_POST['username']);
			$email_exists = $this->checkDuplicateEmail($_POST['email']);
			if($v->validate() && !$username_exists && !$email_exists) {
				$final_array = array();
				$keys = array_keys($_POST);
				foreach($keys as $key) {
					$value = strip_tags($_POST[$key]);
					$value = trim($value);
					if($key != "passwordverify") {
						$final_array[$key] = $value;
					}
					if($key == "password") {
						$final_array[$key] = md5($value);
					}
				}
				$data['result'] = $this->model->register($final_array, "users");
			} else {
				// Errors
				$errors = array();
				$errors_username = array();
				$errors_email = array();
				if($username_exists) {
					$errors_username = array(array("Username đã tồn tại"));
				}
				if($email_exists) {
					$errors_email = array(array("Email đã tồn tại"));
				}
				$errors = $v->errors();
				$data['errors'] = array_merge($errors,$errors_username,$errors_email);
			}
		}
		$data['ep_title'] = "Register"; //setting title name
		$data['view_page'] = "users/register.php"; //controller view page
		$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
		$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
		return $data;
	}  
	
	public function checkDuplicateUsername($username) {
		$result = $this->model->checkifexists("WHERE username='$username'");
		return $result;
	}
	
	public function checkDuplicateEmail($email) {
		$result = $this->model->checkifexists("WHERE email='$email'");
		return $result;
	}
}
	