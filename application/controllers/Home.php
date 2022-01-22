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
			$this->load->view('register');
			// redirect(base_url().'Home/');
		}
		## Submit data to DB
		else{
			$data = $this->input->post();
			$table = 'agents';
			$data['Password'] = md5($this->input->post('Password'));
			$this->AgentModel->submitData($data,$table);
			$this->session->set_flashdata('msg','Successfully Registered. Please Login');
			redirect(base_url().'Home/index');
			// $this->load->view('index');
		}
		
	}

	public function profile()
	{
		if($this->AgentModel->authorise()==true){

		$agent = $this->session->userdata('userAuth');
		$Email = $agent['Email'];
		$agentTable = 'agents';
		$getAgentID = $this->AgentModel->getRow($agentTable,$Email);
		$agentID = $data['agentID'] = $getAgentID['id'];
		$table = 'insurance';
		$getService['allService'] = $this->AgentModel->getService($table,$agentID);

		if(empty($getService)){
			$getService = '';
		}

		$this->load->view('profile',$getService);
	}
	else{
		redirect(base_url().'Home/index');
	}
}

	##addInsurance

	public function addInsurance()
	{
		$agent = $this->session->userdata('userAuth');
		$Email = $agent['Email'];
		$agentTable = 'agents';
		$getAgentID = $this->AgentModel->getRow($agentTable,$Email);
		
		$data = $this->input->post();
		$data['agentID'] = $getAgentID['id'];
		$data['insuranceID'] = rand(111,999);
		$table = 'insurance';

		$this->AgentModel->submitData($data,$table);
		redirect(base_url().'Home/profile');

	}

	### deleteSingle
	public function deleteSingle	()
	{
		$id=$this->input->post('id');
        $tablename=$this->input->post('tablename');
        $this->AgentModel->deleteSingle($id,$tablename);

	}


	#editservice
	public function editservice()
	{
		$tablename="insurance"; 
		
		$data = $this->input->post();
		$id=$this->input->post('id');

	
        $this->AgentModel->updateData($id,$tablename,$data);
		redirect(base_url().'Home/profile'); 

	}

	public function logout()
	{
		$this->session->unset_userdata('userAuth');
        redirect(base_url().'');

	}


}
