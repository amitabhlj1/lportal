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
    public function profile($pid){
        $data['usr'] = $this->My_model->selectRecord('lang_expert', '*', array('status' => 1, 'id' =>$pid));
        $title['title_of_page'] = $data['usr'][0]->profile_name." | Langjobs Language Experts | ";
        $title['description'] = "";
        $title['keywords'] = $data['usr'][0]->skills.", langjob expert profile";
        
        $whr5 = array(
            'exp_id' => $data['usr'][0]->id
        );
        $data['education'] = $this->My_model->selectRecord('lang_expert_ed', '*', $whr5);
        $data['work_history'] = $this->My_model->selectRecord('lang_expert_wh', '*', $whr5);
        $data['work_sample'] = $this->My_model->selectRecord('lang_expert_ws', '*', $whr5);
        
        $this->load->view('include/header', $title);
		$this->load->view('expert_profile', $data);
        $this->load->view('include/footer');
    }
}