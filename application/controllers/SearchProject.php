<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchProject extends CI_Controller
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
        $common_where = array('status' => '1');
        $data['lang'] = $this->My_model->selectRecord('language', '*', $common_where);
        $data['sectors'] = $this->My_model->selectRecord('job_category', '*', $common_where);
        $data['city'] = $this->My_model->selectRecord('cities', '*', '');
        $data['jobs']=$this->My_model->selectRecord('jobs', '*', array('status' => '1', 'j_type'=>'3'));
        $this->load->view('include/header', $title);
		$this->load->view('search_project', $data);
        $this->load->view('include/footer');
	}
}
?>