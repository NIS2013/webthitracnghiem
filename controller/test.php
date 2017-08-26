<?php

class test{
	public function __construct(){
		$this->model = new auth_model();
		$this->authcheck = new authcheck(); //check id user session exists
		$this->SessionId = $_SESSION["easyphp_sessionid"]; //Session Id
	}
	
	public function index() {
		$userdata = $this->model->userDetails();
		$data['userdata'] = $userdata;
		$data['ep_title'] = "TEST"; //setting title name
		$data['view_page'] = "users/test.php"; //controller view page
		$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
		$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
		return $data;
	}
}

?>