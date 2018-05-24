<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applied_jobs extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');		
	}
	public function index()
	{
        if( !$this->session->userdata('exp_id') )
			redirect('LangExpert','refresh');
        
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $data['lang'] = $this->My_model->selectRecord('job_apply', '*', array('expert_id' => $this->session->userdata('exp_id')));
        $this->load->view('include/header', $title);
		$this->load->view('applied_jobs', $data);
        $this->load->view('include/footer');
	}
}