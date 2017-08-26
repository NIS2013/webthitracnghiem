<?php 

 
class auth_model extends DBconfig {
	
	public function __construct()
	  {
		$connection = new DBconfig();  // database connection
		$this->connection = $connection->connectToDatabase();
		$this->helper = new helper(); // calling helper class
	}
	  
	public function register($data) {
		$final_data = array();
		$keys = array_keys($data);
		foreach($keys as $key) {
				//mysqli_real_escape_string used to avoid SQL injections
				$value = mysqli_real_escape_string($this->connection, $data[$key]);
				$final_data[$key] = $value;
			}
		$result = $this->helper->db_insert($final_data, "users");

		// log mysql here
		return $result;
	}
	
	public function update($data) {
		$final_data = array();
		$keys = array_keys($data);
		$SessionId = $_SESSION["easyphp_sessionid"];
		$resultRaw = $this->helper->db_select("user_id", "sessions", "WHERE sessionid='$SessionId'");
		$session_array = $resultRaw->fetch_assoc();
		$user_id = $session_array['user_id'];
		foreach($keys as $key) {
				//mysqli_real_escape_string used to avoid SQL injections
				$value = mysqli_real_escape_string($this->connection, $data[$key]);
				$final_data[$key] = $value;
			}
		$result = $this->helper->db_update($final_data, "users", "WHERE id='$user_id'"); 
		return $result;
	}
	  
	public function checkifexists($where) {
		   $result = $this->helper->check("users", $where); 
		   return $result;
	}
	  
	public function login($email, $password, $remember="0",$captcha) {
		if($captcha===$_SESSION['captcha']['code']){
			
		 //mysqli_real_escape_string used to avoid SQL injections
		$email = mysqli_real_escape_string($this->connection, $email);	//sqlinjection
		$password = mysqli_real_escape_string($this->connection, $password);

		$result = $this->helper->check("users", "WHERE password='$password' AND (email='$email' OR username='$email')"); 
		if($result) { 
			$sessionid = substr(md5(microtime()),rand(0,26),15);
			$resultRaw = $this->helper->db_select("*", "users", "WHERE password='$password' AND (email='$email' OR username='$email')");
			$result = $resultRaw->fetch_assoc();
			$data = array('sessionid' => $sessionid, 'user_id' => $result['id'], 'device' => $_SERVER['HTTP_USER_AGENT'], 'ip' => $_SERVER['REMOTE_ADDR']);
			$_SESSION["easyphp_sessionid"] = $sessionid;
			if($remember == "1") {
				$cookie_name = "tutbuzzeasyphpsessionid";
				$cookie_value = $sessionid;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			}
			$this->helper->db_insert($data, "sessions");

			$log = new Logging();
			$log->lwrite($_SESSION['username'].'User Login - Insert Session');
			
		}
		return $result;
		}
	}
	public function admin($email, $password, $remember="0") {
		 //mysqli_real_escape_string used to avoid SQL injections
		$email = mysqli_real_escape_string($this->connection, $email);	
		$password = mysqli_real_escape_string($this->connection, $password);
		$result = $this->helper->check("users", "WHERE password='$password' AND (email='$email' OR username='$email') AND role ='0'"); 
		if($result) { 
			$sessionid = substr(md5(microtime()),rand(0,26),15);
			$resultRaw = $this->helper->db_select("*", "users", "WHERE password='$password' AND (email='$email' OR username='$email') AND role ='0'");
			$result = $resultRaw->fetch_assoc();
			$data = array('sessionid' => $sessionid, 'user_id' => $result['id'], 'device' => $_SERVER['HTTP_USER_AGENT'], 'ip' => $_SERVER['REMOTE_ADDR']);
			$_SESSION["easyphp_sessionid"] = $sessionid;
			if($remember == "1") {
				$cookie_name = "tutbuzzeasyphpsessionid";
				$cookie_value = $sessionid;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			}
			$this->helper->db_insert($data, "sessions");

			$log = new Logging();
			$log->lwrite($_SESSION['username'].'User Login - Insert Session');
			
		}
		return $result;
	}
	  
	public function checksession($sessionid) {
		   $result = $this->helper->check("sessions", "WHERE sessionid='$sessionid' "); 
		   return $result;
	}
	
	public function userDetails() {
			$SessionId = $_SESSION["easyphp_sessionid"];
			$resultRaw = $this->helper->db_select("user_id", "sessions", "WHERE sessionid='$SessionId'");
			$session_array = $resultRaw->fetch_assoc();
			$user_id = $session_array['user_id'];
			$resultRaw = $this->helper->db_select("*", "users", "WHERE id='$user_id'");
			$result = $resultRaw->fetch_assoc();
			return $result;
	}
	
	public function deleteSession() {	
		$SessionId = $_SESSION["easyphp_sessionid"];
		$result = $this->helper->db_delete("sessions", "WHERE sessionid='$SessionId'");
		$log = new Logging();
		$log->lwrite('Logout - Delete Session');
		$_SESSION['redirecturl'] = "";
		session_destroy();
		if(!isset($_SESSION["easyphp_sessionid"]) || $result) { 
			header("Location: ".$GLOBALS['ep_dynamic_url']."login");
			die();
		}
	}
	
	public function passwordreset($password, $tempid) {	
		$resultRaw = $this->helper->db_select("id", "users", "WHERE tempid='$tempid'");
		$user_array = $resultRaw->fetch_assoc();
		$user_id = $user_array['id'];
		$password = mysqli_real_escape_string($this->connection, $password);
		$tempid = mysqli_real_escape_string($this->connection, $tempid);
		$final_data = array('password' => $password, 'tempid' => "");
		$result = $this->helper->db_update($final_data, "users", "WHERE tempid='$tempid'");
		if($user_id) $result = true;		
		return $result;
	}
	
	public function updateForgotPassword($email) {
		//mysqli_real_escape_string used to avoid SQL injections
		$value = mysqli_real_escape_string($this->connection, $email);
		$tempid = substr(md5(microtime()),rand(0,26),15);
		$data = array('tempid' => $tempid);
		$result = $this->helper->db_update($data, "users", "WHERE email='$value'"); 
		$resultRaw = $this->helper->db_select("name", "users", "WHERE email='$value'");
		$user_array = $resultRaw->fetch_assoc();
		$name = $user_array['name'];
		$baseurl = $GLOBALS['ep_base_url'];
		if($result) {
			$subject = "Forgot Password Request";
			$body = "Hi $name, <br/> Please click the following link for password reset - <br/> ".$baseurl."login/passwordreset/secret/$tempid <br/> Thanks,";
			$alertmsg = "Password reset successfully requested, Please check your mail for more details";
			$email = $email;
			$name = $name;
			$this->mail($subject, $body, $alertmsg, $email, $name); 
		}
		return $result;
	}
	
	public function mail($subject, $body, $alertmsg, $email, $name) {
		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();        
		$mail->Mailer = $GLOBALS['Mailer'];                              // Set mailer to use SMTP
		$mail->Host = $GLOBALS['ep_smpt_server'];  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; 
		//$mail->SMTPAuth = true;                              // Enable SMTP authentication
		$mail->Username = $GLOBALS['ep_smpt_username'];                 // SMTP username
		$mail->Password = $GLOBALS['ep_smpt_password'];                           // SMTP password
		$mail->SMTPSecure = $GLOBALS['SMTPSecure'];                          // Enable TLS encryption, `ssl` also accepted
		$mail->Port = $GLOBALS['ep_smpt_port'];                                    // TCP port to connect to

		$mail->setFrom($email, $GLOBALS['website_name']);
		$mail->addAddress($email, $name);     // Add a recipient
		$mail->addAddress($email);               // Name is optional

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $body;

		if(!$mail->send()) {
			echo 'Email Error';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo $alertmsg;
		}
	}
	
}