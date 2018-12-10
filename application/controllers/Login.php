<?php
	class Login extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Login_model');
			$this->load->library('form_validation');
			$this->load->helper("url");
			$this->load->library('session');
		}

		

		public function index()
		{
			$email = $this->input->post("email");
        	$password = $this->input->post("password");
			$jsondata = array();
			$jsondata['success'] = true;
        	$jsondata['message'] = $email;
        	echo json_encode($jsondata);
    		exit();
            
            
		}
	}
		
?>
