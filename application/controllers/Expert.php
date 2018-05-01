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
        echo "<select class='form-control' name='state' onchange='show_cities(this.value)'>";
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
            echo "<script>
                    alert('Work details updated!'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
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
    public function update_edu(){
        $whr = array('id' => $this->input->post('id'));
        $ed_arr = array(
            'exam_name' => $this->input->post('exam_name'),
            'college_name' => $this->input->post('college_name'),
            'p_year' => $this->input->post('p_year'),
            'marks' => $this->input->post('marks'),
            'remarks' => $this->input->post('remarks'),
        );
        $updt = $this->My_model->updateRecord('lang_expert_ed', $ed_arr, $whr);
        if($updt == '1' || $updt == '0'){
            echo "<script>
                    alert('Education details updated!'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
        } else {
            echo $updt; die();
        }
    }
    public function add_edu(){
        $edu_arr = array(
            'exp_id' =>$this->session->userdata('exp_id'), 
            'exam_name' => $this->input->post('exam_name'),
            'college_name' => $this->input->post('college_name'),
            'p_year' => $this->input->post('p_year'),
            'marks' => $this->input->post('marks'),
            'remarks' => $this->input->post('remarks'),
        );
        $ins = $this->My_model->insertRecord('lang_expert_ed', $edu_arr);
        if($ins){
            echo "<script>
                    alert('New Education detail added'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
        } else {
            echo $ins; die();
        }
    }
    public function delete_edu(){
        $where = array('id' => $this->input->post('id'));
        echo $del_ed = $this->My_model->deleteRecordPerm('lang_expert_ed', $where);
    }
    public function edit_basic_detail(){
       $states =""; $cities ="";
        if($this->input->post('state')){
            $states = $this->input->post('state');
        } else {
            $states = null;
        }
        
        if($this->input->post('cities')){
            $cities = $this->input->post('cities');
        } else {
            $cities = null;
        }
        $where = array('id' =>$this->session->userdata('exp_id'));
        $insert_val = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'profile_name' => $this->input->post('profile_name'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'mobile' => $this->input->post('mobile'),
            'about_me' => $this->input->post('about_me'),
            'country' => $this->input->post('country'),
            'state' => $states,
            'city' => $cities,
            'total_exp' => $this->input->post('total_exp'),
            'fid' => $this->input->post('fid'),
            'tid' => $this->input->post('tid'),
            'qid' => $this->input->post('qid'),
            'lid' => $this->input->post('lid'),
            'skills' => $this->input->post('skills')
        );
        //var_dump($this->input->post('state'));
        $updt = $this->My_model->updateRecord('lang_expert', $insert_val, $where);
        if($updt == '1' || $updt == '0'){
            echo "<script>
                    alert('Profile details updated!'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
        } else {
            echo $updt; die();
        }
    }
}
