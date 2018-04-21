<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expert extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('admin_model');		
	}

	function index()
	{	
		echo "<pre />";print_r($this->session->userdata());
		//if( !$this->session->userdata('emp_id') )
			//redirect('ado/Employer/logout','refresh'); 
		
		//echo "<pre />"; print_r($this->session->userdata());
		$where = array('id' => $this->session->userdata('exp_id'),'status' => 1);
		$data['experts']  = $this->My_model->selectRecord('lang_expert','*',$where,'','');
		
		echo "<pre />"; print_r($data); 
		die();
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/admin',$data);
	    $this->load->view('admin/include/footer');		 	
	}
	
	function profile()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		
		//echo "<pre />"; print_r($this->session->userdata());
		$where = array('id' => $this->session->userdata('emp_id'));
		$data['profile']    = $this->My_model->selectRecord('lang_expert','*',$where,'','');
		
		//echo "<pre />"; print_r($data); 
		//die();
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/profile',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	public function logout()
	{   			
		$this->session->sess_destroy();
		redirect('LangExpert','refresh');  
	}
}