<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LangEmployer extends CI_Controller
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('Employer_model');		
	}
	
	/*
	**  default function for language expert
	*/
	public function index()
	{
		$title['login'] = 1;
		$title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $this->load->view('include/header',$title);
		$this->load->view('Language_employer');
        $this->load->view('include/footer');
	}
	
	/*
	**  Login language expert
	** @param - none
	*/
	public function login()
	{
		$iLogin = $this->Employer_model->login_user();
		echo $iLogin;
	}
	
	/*
	** register new language employer
	** @param - none
	*/
	public function registerEmployer()
	{
		// check email already exist
		$iUser  = $this->My_model->getNumRows('lang_company','email',$this->input->post('email'));
		//echo " User==> ".$iUser;
		if($iUser)
		{
			echo '-1';       // duplicate user
		}
		else
		{
			$code = $this->My_model->getRandomString(3);
			$today = date('Y-m-d');
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'country' => $this->input->post('country'),
				'company_name' => $this->input->post('company_name'),
				'code'  => $code,
				'created' => $today
				);
			$iInserId = $this->My_model->insertRecord('lang_company',$data);
			echo $iInserId;
			// send verification mail
		}
	}
	
	/*
	** forgot password
	** @param - none
	*/
	public function forgotPassword()
	{
		$title['login'] = 1;
        $this->load->view('include/header',$title);
		$this->load->view('employer_forgotpsw');
        $this->load->view('include/footer');
	}
	
	public function mailRecoverPassword()
	{   
		$email = $this->input->post('email');
		$where = "(user_id="."'".$email."'" ." or email = "."'".$email."'".")";
		$this->db->where($where);
		$query = $this->db->get('lang_company');
		$aResult = $query->result_array() ;
		
		if($aResult)
		{
			$stremail = $aResult[0]['email'];
			$strcode = $aResult[0]['code'];
			
			// send mail
			$bStatus = $this->Employer_model->forgotPassword($stremail,$strcode);
			if($bStatus)
			{
				echo '2';  // mail send 
			}
			else
			{			
				echo '3';    //
			}
		}
		else
			echo '0';    // error user not exist
							
	}
	
}
