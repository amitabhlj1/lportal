<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_experts extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url')); 
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');
		$this->load->model('Employer_model');	
	}
	public function index()
	{
        //Because we can't pass arguments in index functions without extra jhol.
        header("Location:".base_url('Language_experts/cards'));
	}
    public function cards($page_num=null){
        //For pagination
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        //Because 4 cards are shown in per row.
        $results_per_page = 40;
        $number_of_results = $this->db->where(array('status' => 1, 'first_name !=' =>''))->from("lang_expert")->count_all_results();
        $number_of_pages = ceil($number_of_results/$results_per_page);
        
        if($page_num){
            $page = $page_num;
        } else {
            $page = 1;
        }
        $data['page'] = $page;
        $this_page_first_result = ($page-1)*$results_per_page;
        //checking where first name & last name is not blank and sorting it by lastest and frequent active language experts
        $data['experts'] = $this->My_model->selectRecord('lang_expert', '*', array('status' => 1, 'first_name !=' =>''), array('criteria'=>'id', 'order' => 'ASC'), array($this_page_first_result, $results_per_page));
        
        $this->load->view('include/header', $title);
		$this->load->view('all_experts', $data);
        $this->load->view('include/footer');
    }
    public function profile($pid){
        $data['usr'] = $this->My_model->selectRecord('lang_expert', '*', array('status' => 1, 'id' =>$pid));
        $title['title_of_page'] = $data['usr'][0]->last_name." - ".$data['usr'][0]->profile_name." | Langjobs Language Experts | ";
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