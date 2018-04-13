<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LangExpert extends CI_Controller
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');		
	}
	
	/*
	**  default function for language expert
	*/
	public function index()
	{
		$title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
		$title['login'] = 1;
        $this->load->view('include/header',$title);
		$this->load->view('language_expert');
        $this->load->view('include/footer');
	}
	
	/*
	**  Login language expert
	** @param - none
	*/
	public function login()
	{
		$iLogin = $this->LanguageExpert_model->login_user();
		echo $iLogin;
	}
	
	/*
	** forgot password
	** @param - none
	*/
	public function forgotPassword()
	{
		$title['login'] = 1;
        $this->load->view('include/header',$title);
		$this->load->view('expert_forgotpsw');
        $this->load->view('include/footer');
	}
	
	/*
	** register new language expert
	** @param - none
	*/
	public function registerExpert()
	{
		// check email already exist
		$iUser  = $this->checkUser($this->input->post('email'));
		//echo " User==> ".$iUser;
		if($iUser)
		{
			echo '-1';       // duplicate user
		}
		else
		{
			$code = $this->My_model->getRandomString(3);
			$today = date('Y-m-d');
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'country' => $this->input->post('country'),
				'code'  => $code,
				'created' => $today
				);
			$iInserId = $this->My_model->insertRecord('lang_expert',$data);
			echo $iInserId;
			// send verification mail
		}
	}
	/*
	** register and logging a new language expert using linkedin javascript
	** @param - none
	*/
    public function linkedinlogin(){
        $where = array(
            'social_id_no' => $this->input->post('social_id_no')
        );
        $check = $this->My_model->selectRecord('lang_expert', '*', $where);
        $whr2 = array(
            'c_code' => $this->input->post('country') 
        );
        //this is retreving country code from our tables
        $retrieve = $this->My_model->selectRecord('country', '*', $whr2);
        $cid = $retrieve[0]->id;
        $today = date('Y-m-d');
        $done;
        if($check){
            $update_data = array(
                'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
                'country' => $cid,
                'image' => $this->input->post('image'),
                'social_login' => 1,
                'social_name' => $this->input->post('social_name'),
                'last_login' => $today,
                'status' => 1
            );
            $done = $this->My_model->updateRecord('lang_expert', $update_data, $where);
            //$this->My_model->printQuery(); die('Hahahah');
        } else {
           $code = $this->My_model->getRandomString(3);
            $insert_data = array(
                'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
                'country' => $cid,
                'image' => $this->input->post('image'),
                'code' => $code,
                'social_login' => 1,
                'social_id_no' =>$this->input->post('social_id_no'),
                'social_name' => $this->input->post('social_name'),
                'email_verify' =>1,
                'last_login' => $today,
                'created' => $today,
                'status' => 1
            );
            $done = $this->My_model->insertRecord('lang_expert',$insert_data);
        }
        if($done==1 || $done==0){
            $retrieveid = $this->My_model->selectRecord('lang_expert', '*', $where);
            //$exp_id = $retrieveid[0]->id;
            $aSess = array(		
					'exp_id' => $retrieveid[0]->id,
					'first_name' => $retrieveid[0]->first_name,
					'last_name' => $retrieveid[0]->last_name,
					'image'  => $retrieveid[0]->image,
					'email'  => $retrieveid[0]->email
					);
			$this->session->set_userdata($aSess);
            echo '1';
        } else {
            echo '-1';
        }
    }
	/*
	** check unique language expert
	** @param - email id
	*/
	public function checkUser($email)
	{
		$iNums  = $this->My_model->getNumRows('lang_expert','email',$this->input->post('email'));
		return $iNums; 	
	}
}
