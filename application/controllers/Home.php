<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->model('CheckDB');
		// return $this->CheckDB->create_table();
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
		$this->load->library('form_validation');
	    $this->form_validation->set_message('is_unique', 'This details are already exist, Please try another.');
		$this->form_validation->set_rules('Email','Email','required|valid_email|is_unique[agents.Email]');
		// print_r($data);

	}
}
