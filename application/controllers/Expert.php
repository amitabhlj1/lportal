<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expert extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');		
	}
	public function index()
	{
        if(!$this->session->userdata('exp_id') )
			redirect('LangExpert','refresh');
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $where = array('id' => $this->session->userdata('exp_id'));
        $data['usr'] = $this->My_model->selectRecord('lang_expert', '*', $where);
        //To get the name of country
        $whr2 = array(
            'id' => $data['usr'][0]->country 
        );
        $data['country'] = $this->My_model->selectRecord('country', '*', $whr2);
        //to get the name of state
        $whr3 = array(
            'id' => $data['usr'][0]->state
        );
        $data['state'] = $this->My_model->selectRecord('states', '*', $whr3);
        //to get the name of city
        $whr4 = array(
            'id' => $data['usr'][0]->city
        );
        $data['city'] = $this->My_model->selectRecord('cities', '*', $whr4);
        //to get the education feild of language experts
        $whr5 = array(
            'exp_id' => $this->session->userdata('exp_id')
        );
        $data['education'] = $this->My_model->selectRecord('lang_expert_ed', '*', $whr5);
        $data['work_history'] = $this->My_model->selectRecord('lang_expert_wh', '*', $whr5);
        $this->load->view('lang_expert/exp_header', $title);
		$this->load->view('lang_expert/profile', $data);
        $this->load->view('include/footer');
	}
    
    public function logout()
	{   			
		$this->session->sess_destroy();
		redirect('home','refresh');  
	}
    
    public function return_states(){
        $s = $this->input->post('country');
        $where = array('c_id' => $s);
        $state = $this->My_model->selectRecord('states', '*', $where);
        echo "<select class='form-control' name='states' onchange='show_cities(this.value)'>";
        foreach($state as $st){
            echo "<option value='$st->id'>$st->name</option>";
        }
        echo "</select>";
    }
    public function return_cities(){
        $s = $this->input->post('state');
        $where = array('s_id' => $s);
        $cities = $this->My_model->selectRecord('cities', '*', $where);
        echo "<select class='form-control' name='cities'>";
        foreach($cities as $ct){
            echo "<option value='$ct->id'>$ct->name</option>";
        }
        echo "</select>";
    }
}
