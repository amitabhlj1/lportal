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
        $title['title_of_page'] = "Search For Language Projects And Jobs at LangJobs.com";
        $title['description'] = "We have collected a large list of jobs and projects for language experts, find your favourite job and just go for it.";
        $title['keywords'] ="Language jobs, Language Projects, Langjobs.com, search and apply, Language profession";
        $common_where = array('status' => '1');
        $data['lang'] = $this->My_model->selectRecord('language', '*', $common_where);
        $data['sectors'] = $this->My_model->selectRecord('job_category', '*', $common_where);
        $data['city'] = $this->My_model->selectRecord('cities', '*', '');
        //These value are supposed to be blank, do not enter anything..
        $data['jobs']="";
        $data['input_by_user']['language'] = "";
        $data['input_by_user']['sector'] = "";
        $data['input_by_user']['keywords'] = "";
        $data['input_by_user']['locationCombo'] = "";
        
        $this->load->view('include/header', $title);
		$this->load->view('search_job', $data);
        $this->load->view('include/footer');
	}
    public function retrieve_jobs(){
        $data['jobs'] = $this->LanguageExpert_model->searchResult();
        $data['input_by_user'] = $this->input->post();
		$title['title_of_page'] = "Found Results";
        $title['description'] = "Results after your search query";
        $title['keywords'] ="Found Jobs and Projects at LangJobs.com";
        $common_where = array('status' => '1');
        $data['lang'] = $this->My_model->selectRecord('language', '*', $common_where);
        $data['sectors'] = $this->My_model->selectRecord('job_category', '*', $common_where);
        $data['city'] = $this->My_model->selectRecord('cities', '*', '');
        $this->load->view('include/header', $title);
		$this->load->view('search_job', $data);
        $this->load->view('include/footer');
        
    }
    public function jobdesc($jid){
        $where = array('id' => $jid, 'status' => '1');
        $data['jobs'] = $this->My_model->selectRecord('jobs', '*', $where);
        // $this->My_model->printQuery(); die();
        //retrieving company_id and putting it into where clause
        $cwhere = array('id' => $data['jobs'][0]->company_id);
        $data['company_details'] = $this->My_model->selectRecord('lang_company', '*', $cwhere);
        $title['title_of_page'] = $data['jobs'][0]->title." | Language Jobs at LangJobs.com";
        $title['description'] = $data['jobs'][0]->description;
        $title['keywords'] =$data['jobs'][0]->job_keywords.", Language Projects/ Jobs at LangJobs.com";
        $this->load->view('include/header', $title);
		$this->load->view('job_desc', $data);
        $this->load->view('include/footer');
    }
}
