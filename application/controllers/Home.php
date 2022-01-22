<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('AgentModel');
		// $this->load->model('CheckDB');
		// return $this->CheckDB->create_table();
		$this->load->helper(array('url','form'));
	}

	public function index()
	{
		$this->load->model('Checkdb');
		$result = $this->Checkdb->createTableSchema();
		//echo $result;
		$this->load->view('index');
	}

	public function login(){
		
		$data = $this->input->post();
	
		// print_r($data);
		$userSession = $this->AgentModel->checkUser($data);
		if (!empty($userSession)){
			$sessArray['Email'] = $userSession['Email'];
			$this->session->set_userdata('userAuth',$sessArray);
			redirect(base_url().'Home/profile');
		}
		else{
			$this->session->set_flashdata('msg','Email or password is not correct.');
			redirect(base_url().'Home/index');
		}

	}

	public function register()
	{
		$this->load->view('register');
	}

	##submitRegister
	public function submitRegister()
	{
		## Form Validation
		$this->load->library('form_validation');
		## CheckForm
	    $this->form_validation->set_message('is_unique', 'This details are already exist, Please try another.');
		$this->form_validation->set_rules('Email','Email','required|valid_email|is_unique[agents.Email]');
		## Return To Register
		if($this->form_validation->run() == false)
		{
			redirect(base_url().'Home/register');
		}
		## Submit data to DB
		else{
			$data = $this->input->post();
			$table = 'agents';
			$this->AgentModel->submitData($data,$table);
			$this->session->set_flashdata('msg','Successfully Registered. Please Login');
			redirect(base_url().'Home/index');
		}
		
	}

	public function profile()
	{
		$this->load->view('profile');
	}


}
