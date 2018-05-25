<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_experts extends CI_Controller
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
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $data['experts'] = $this->My_model->selectRecord('lang_expert', '*', array('status' => 1));
        //print_r($data['experts']); die();
        $this->load->view('include/header', $title);
		$this->load->view('all_experts', $data);
        $this->load->view('include/footer');
	}
}