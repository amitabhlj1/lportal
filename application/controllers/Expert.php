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
    public function del_whistory(){
        $where = array('id' => $this->input->post('id'));
        echo $del_wh = $this->My_model->deleteRecordPerm('lang_expert_wh', $where);
    }
    public function update_wh(){
        $where = array('id' => $this->input->post('id'));
        $update_data = array(
            'designation' => $this->input->post('designation'),
            'company_name' => $this->input->post('company_name'),
            'y_from' => $this->input->post('y_from'),
            'y_to'  => $this->input->post('y_to'),
            'work_description'  => $this->input->post('work_description')
        );
        $updt = $this->My_model->updateRecord('lang_expert_wh', $update_data, $where);
        if($updt == '1' || $updt == '0'){
            redirect('/expert');
        } else {
            echo "<script>alert('Something went wrong, Please try again later!');</script>";
        }
    }
    public function add_wh(){
        $wh_arr = array(
            'exp_id' =>$this->session->userdata('exp_id'), 
            'designation' => $this->input->post('designation'),
            'company_name' => $this->input->post('company_name'),
            'y_from' => $this->input->post('y_from'),
            'y_to' => $this->input->post('y_to'),
            'work_description' => $this->input->post('work_description')
        );
        echo $ins = $this->My_model->insertRecord('lang_expert_wh', $wh_arr);
        redirect('/expert');
    }
}
