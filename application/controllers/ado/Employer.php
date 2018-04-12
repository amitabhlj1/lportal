<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer extends CI_Controller
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
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		
		//echo "<pre />"; print_r($this->session->userdata());
		$where = array('id' => $this->session->userdata('emp_id'),'status' => 1);
		$data['employers']    = $this->My_model->selectRecord('lang_company','*',$where,'','');
		
		echo "<pre />"; print_r($data); 
		die();
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/admin',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	public function logout()
	{   			
		$this->session->sess_destroy();
		redirect('ado/LangEmployer','refresh');  
	}
}