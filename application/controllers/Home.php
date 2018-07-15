<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
        $title['title_of_page'] = "LangJobs.com | Serves for Language | World's No 1. Language Specific Jobs Portal ";
        $title['description'] = "Search and Apply on Language Specific Jobs and Projects | Hire a Language Professional for your company or for a freelancing Projects";
        $title['keywords'] ="Language Jobs, Language Projects, LangJobs.com, Hire a language expert, Post Language Jobs, Hire Professional Freelancing Language Experts ";
        $data['grubs'] = $this->My_model->selectRecord('grum_table', '*', '','');
        $this->load->view('include/header', $title);
		$this->load->view('home', $data);
        $this->load->view('include/footer');
	}
    
    public function save_feedback(){
        
        $insert_details = array(
            'name' => $this->input->post('contact_name'),
            'mobile' => $this->input->post('contact_phone'),
            'email' => $this->input->post('contact_email'),
            'website' => $this->input->post('contact_url'),
            'subject' => $this->input->post('contact_subject'),
            'message' => $this->input->post('contact_message'),
        );
        $ins = $this->My_model->insertRecord('visitor_query', $insert_details);
        if($ins){
            echo "<script>
                    alert('We have recieved your word and we will get back to you as soon as we can!'); 
                    window.location.href = '".base_url()."';
                </script>";
        } else {
           echo "<script>
                    alert('Sorry, Something is broken! We're trying to fix it. Please come back later!); 
                    window.location.href = '".base_url('contact.php')."';
                </script>"; 
        }
    }
}
