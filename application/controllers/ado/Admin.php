<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$where = array('status' => 1);
		
		$data['experts']    = $this->My_model->selectRecord('lang_expert','*',$where,'','');
		$data['employers']  = $this->My_model->selectRecord('lang_company','*',$where,'','');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/admin',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	/*
	** jobs category listinng
	** @param - none
	**/
	function Category() 
	{	
		//$where = array('status' => 1);
		$data['categorys']  = $this->My_model->selectRecord('job_category','*','','','');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/category',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	/*
	** save jobs category
	** @param - none
	**/
	function saveCategory()
	{	
		$data = array('cat_name' => $this->input->post('cat_name'));
		$this->My_model->insertRecord('job_category',$data);
		redirect('ado/Admin/Category');
	}
	
	/*
	** Languages listinng
	** @param - none
	**/
	function Language() 
	{	
		//$where = array('status' => 1);
		$data['languages']  = $this->My_model->selectRecord('language','*','','','');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/language',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	/*
	** save languages
	** @param - none
	**/
	function saveLanguage()
	{	
		$data = array('name' => $this->input->post('name'));
		$this->My_model->insertRecord('language',$data);
		redirect('ado/Admin/Language');
	}
	
	/*
	** change status 
	** @param - id,new status,table name
	**/
	function changeStatus($id,$val,$table)
	{	
		$data = array('cat_name' => $this->input->post('cat_name'));
		$this->My_model->updateRecord('job_category',$data);	
	}
	
}
