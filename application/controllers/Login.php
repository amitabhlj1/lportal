<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->library('email');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('Employer_model');	
		$this->load->model('LanguageExpert_model');		
	}
    public function index()
	{
        header("Location:".base_url('LangExpert'));
	}
    
}
