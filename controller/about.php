<?php

class about{
	public function __construct(){
		$this->model = new auth_model(); 
	}
	public function index() {
		if(isset($_SESSION["easyphp_sessionid"])){
			$userdata = $this->model->userDetails();
			$data['userdata'] = $userdata;
			$data['ep_title'] = "About"; //setting title name
			$data['view_page'] = "about.php"; //controller view page
			$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
			$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
			return $data;
		}
		else{
			$data['ep_title'] = "About"; //setting title name
			$data['view_page'] = "about.php";
			$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
			$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
			return $data;
		}		
	}
}
?>