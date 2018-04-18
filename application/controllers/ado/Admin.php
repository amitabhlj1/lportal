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
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/login'); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function Dashboard()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$aOrder = array('criteria' => 'created','order' => 'DESC');
		$iLimit  = 5;
		$data['experts']    = $this->My_model->selectRecord('lang_expert','*','',$aOrder,$iLimit);
		//$this->My_model->PrintQuery();
		$data['employers']  = $this->My_model->selectRecord('lang_company','*','',$aOrder,$iLimit);
		//$data['jobs']    = $this->My_model->selectRecord('jobs','*','','','');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/admin',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function experts()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$data['experts']    = $this->My_model->selectRecord('lang_expert','*','','','');
		echo "<pre />"; print_r($data); die();
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/experts',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function employers()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$data['employers']    = $this->My_model->selectRecord('lang_company','*','','','');
		echo "<pre />"; print_r($data); die();
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/employers',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function jobs()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$data['jobs']    = $this->My_model->selectRecord('jobs','*','','','');
		echo "<pre />"; print_r($data); die();
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/jobs',$data); 
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
		$where   = array('id' => $id);
		$data = array('status' => $val);
		$this->My_model->updateRecord($table,$data,$where);
		redirect('ado/Admin/Dashboard');
	}
	
	public function loginValidate()
	{   
		//die('88');		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/include/header');
			$this->load->view('admin/login');
			$this->load->view('admin/include/footer');	
		}
		else
		{    			
			$data = array( 				
				'email' => $this->input->post('email'), 
				'password' => $this->input->post('password')			
			);
			
			//print_r($data); die('88');
			$bLogin = $this->admin_model->login_admin($data);
			//echo "==> ". $bLogin; die();
			if($bLogin == -1)
				$data['error'] = 'your account is not activated!';
			else
				$data['error'] = 'User name or Password is incorrect!';
			
				$this->load->view('admin/include/header');	
				$this->load->view('admin/login',$data);
				$this->load->view('admin/include/footer');			
		}
	}
	
	public function forgotPassword()
	{				
		$this->load->view('admin/include/header');	
		$this->load->view('admin/forgot_password');
		$this->load->view('admin/include/footer');	
	}
	
	public function logout()
	{   			
		$this->session->sess_destroy();
		redirect('ado/Admin','refresh');  
	}
}
