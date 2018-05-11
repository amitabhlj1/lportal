<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchJob extends CI_Controller
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
        $this->load->view('include/header', $title);
		$this->load->view('search_job');
        $this->load->view('include/footer');
	}
}
