<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LangExpert extends CI_Controller
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');		
	}
	
	/*
	**  default function for language expert
	*/
	public function index()
	{
		
		$title['login'] = 1;
        $this->load->view('include/header',$title);
		$this->load->view('Language_expert');
        $this->load->view('include/footer');
	}
	
	/*
	**  Login language expert
	** @param - none
	*/
	public function login()
	{
		$iLogin = $this->LanguageExpert_model->login_user();
		echo $iLogin;
	}
	
	/*
	** forgot password
	** @param - none
	*/
	public function forgotPassword()
	{
		$title['login'] = 1;
        $this->load->view('include/header',$title);
		$this->load->view('expert_forgotpsw');
        $this->load->view('include/footer');
	}
	
	/*
	** register new language expert
	** @param - none
	*/
	public function registerExpert()
	{
		// check email already exist
		$iUser  = $this->checkUser($this->input->post('email'));
		//echo " User==> ".$iUser;
		if($iUser)
		{
			echo '-1';       // duplicate user
		}
		else
		{
			$today = date('Y-m-d');
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'country' => $this->input->post('country'),
				'created' => $today
				);
			$iInserId = $this->My_model->insertRecord('lang_expert',$data);
			echo $iInserId;
			// send verification mail
		}
	}
	
	/*
	** check unique language expert
	** @param - email id
	*/
	public function checkUser($email)
	{
		$iNums  = $this->My_model->getNumRows('lang_expert','email',$this->input->post('email'));
		return $iNums; 	
	}
}
