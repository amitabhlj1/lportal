<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LangEmployer extends CI_Controller
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('Employer_model');		
	}
	
	/*
	**  default function for language expert
	*/
	public function index()
	{
		$title['login'] = 1;
		$title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $this->load->view('include/header',$title);
		$this->load->view('Language_employer');
        $this->load->view('include/footer');
	}
	
	/*
	**  Login language expert
	** @param - none
	*/
	public function login()
	{
		$iLogin = $this->Employer_model->login_user();
		echo $iLogin;
	}
	
	/*
	** register new language employer
	** @param - none
	*/
	public function registerEmployer()
	{
		// check email already exist
		$iUser  = $this->My_model->getNumRows('lang_company','email',$this->input->post('email'));
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
				'company_name' => $this->input->post('company_name'),
				'code'  => $code,
				'created' => $today
				);
			$iInserId = $this->My_model->insertRecord('lang_company',$data);
			if($iInserId){
                $subject = 'LangJobs Employer\'s Account Verification';
                $message = "Dear ".$this->input->post('first_name').",<br /> <br />
                            Please click on the below activation link to verify your email address.<br /><br />
                            <br />"
                            .base_url().'LangEmployer/verifyEmail/' .$code . "<br />							
                            <br /><br /><b>Thanks & Regards</b>, <br /> Langjobs Team";

                $send_to = $this->input->post('email');
                echo $val = $this->My_model->send_mail($send_to, $subject, $message);
            } else {
                echo "-1";
            }
		}
	}
	/*
	**  verify register user
	**	@param - user code
	*/
	public function verifyEmail($code)
	{	
        $where = array('code' => $code);			
		$data  = array('email_verify' => 1);
        
        $this->My_model->updateRecord('lang_company', $data, $where);
        if($this->db->affected_rows() >=0){
           echo "<script>
                    alert('Awesome! Your account is verified successfully.'); 
                    window.location.href = '".base_url('LangEmployer')."';
                </script>"; 
        } else {
            echo "<script>
                    alert('Oops! Something went wrong. Try again later / contact us'); 
                    window.location.href = '".base_url('LangEmployer')."';
                </script>"; 
        }
	}
	/*
	** forgot password
	** @param - none
	*/
	public function forgotPassword()
	{
		$title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $this->load->view('include/header',$title);
		$this->load->view('employer_forgotpsw');
        $this->load->view('include/footer');
	}
	
	public function mailRecoverPassword()
	{   
		$email = $this->input->post('email');
		$where = "(user_id="."'".$email."'" ." or email = "."'".$email."'".")";
		$this->db->where($where);
		$query = $this->db->get('lang_company');
		$aResult = $query->result_array() ;
		
		if($aResult)
		{
			$stremail = $aResult[0]['email'];
			$strcode = $aResult[0]['code'];
			
			// send mail
			$bStatus = $this->Employer_model->forgotPassword($stremail,$strcode);
			if($bStatus)
			{
				echo '2';  // mail send 
			}
			else
			{			
				echo '3';    //
			}
		}
		else
			echo '0';    // error user not exist
							
	}
    
    public function recoveryPassword(){
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $this->load->view('include/header',$title);
		$this->load->view('em_ch_pass');
        $this->load->view('include/footer');
    }
	public function changePass(){
        $code = $this->input->post('code');
        $pwd = filter_var($this->input->post('pwd'), FILTER_SANITIZE_STRING);
        $cnf_pwd = filter_var($this->input->post('cnf_pwd'), FILTER_SANITIZE_STRING);
        
        if(strlen($pwd)>6){
            if(strcmp($pwd, $cnf_pwd) == 0){
                $where = array('code' => $code);			
                $data  = array('password' => md5($pwd));

                $this->My_model->updateRecord('lang_company', $data, $where);
                if($this->db->affected_rows() >=0){
                   echo "<script>
                            alert('Awesome! Your password changed successfully, Login Now!'); 
                            window.location.href = '".base_url('LangEmployer')."';
                        </script>"; 
                } else {
                    echo "<script>
                            alert('Oops! Something went wrong. Try again later / contact us'); 
                            window.location.href = '".base_url('LangEmployer')."';
                        </script>"; 
                }
            } else {
                echo "<script>
                    alert('Passwords does not match, try again!'); 
                    window.location.href = '".base_url()."LangEmployer/recoveryPassword/".$code."';
                </script>";   
            }
        } else {
             echo "<script>
                    alert('Passwords should atleast be 6 characters long, Try again!'); 
                    window.location.href = '".base_url()."LangEmployer/recoveryPassword/".$code."';
                </script>";
        }
    }
}
