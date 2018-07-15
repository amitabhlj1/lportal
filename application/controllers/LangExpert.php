<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LangExpert extends CI_Controller
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->library('email');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');	
        
	}
	
	/*
	**  default function for language expert
	*/
	public function index()
	{
		$title['title_of_page'] = "Login | Sign Up :: Language Experts | Langjobs.com";
        $title['description'] = "Login page for language experts of Langjobs.com | Signup / Login to find your favourite language jobs, freelancing projects";
        $title['keywords'] ="Signup, Register, Apply Jobs, Search Jobs / Projects, Language Jobs, Language Projects, Language expert login, Language Experts, LangJobs.com";
		$title['login'] = 1;
        $data['country'] = $this->My_model->selectRecord('country', '*', '','');
        $this->load->view('include/header',$title);
		$this->load->view('language_expert',$data);
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
        $title['title_of_page'] = "Forgot Password :: Language Expert | LangJobs.com";
        $title['description'] = "Forgot Password Page for language experts of Langjobs.com | Get Access to your account at LangJobs.com";
        $title['keywords'] ="Forgot email / Password, Password retrieval, Language Jobs, Language Projects, Language expert login, Language Experts, LangJobs.com";
		$title['login'] = 1;
        $this->load->view('include/header',$title);
		$this->load->view('expert_forgotpsw');
        $this->load->view('include/footer');
	}
	
	public function mailRecoverPassword()
	{   
		$email = $this->input->post('email');
		$where = "(user_id="."'".$email."'" ." or email = "."'".$email."'".")";
		$this->db->where($where);
		$query = $this->db->get('lang_expert');
		$aResult = $query->result_array() ;
		
		if($aResult)
		{
			$stremail = $aResult[0]['email'];
			$strcode = $aResult[0]['code'];
			
			// send mail
			$bStatus = $this->LanguageExpert_model->forgotPassword($stremail,$strcode);
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
		
		//echo "<pre />";print_r($aResult); die();
						
	}
	
	/*
	** function to reset password
	** param - expert code 
	*/
	public function recoveryPassword($code)
	{   
        $title['title_of_page'] = "Password recovery of Langjob's Expert Profile";
        $title['description'] = "You can change your password here";
        $title['keywords'] ="Password, Change";
		$data['code'] = $code;
		$this->load->view('include/header', $title); 	
		$this->load->view('newpassword',$data);
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

                $this->My_model->updateRecord('lang_expert', $data, $where);
                if($this->db->affected_rows() >=0){
                   echo "<script>
                            alert('Awesome! Your password changed successfully, Login Now!'); 
                            window.location.href = '".base_url('LangExpert')."';
                        </script>"; 
                } else {
                    echo "<script>
                            alert('Oops! Something went wrong. Try again later / contact us'); 
                            window.location.href = '".base_url('LangExpert')."';
                        </script>"; 
                }
            } else {
                echo "<script>
                    alert('Passwords does not match, try again!'); 
                    window.location.href = '".base_url()."LangExpert/recoveryPassword/".$code."';
                </script>";   
            }
        } else {
             echo "<script>
                    alert('Passwords should atleast be 6 characters long, Try again!'); 
                    window.location.href = '".base_url()."LangExpert/recoveryPassword/".$code."';
                </script>";
        }
    }
	// save change password
	public function validateResetPassword()
	{   
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[10]|matches[confpass]|xss_clean');
		$this->form_validation->set_rules('confpass', 'Password Confirmation', 'required|xss_clean');
				
		$data['code'] = $this->input->post('code');	
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('include/head');   
			$this->load->view('include/header'); 	
			$this->load->view('student/new_password',$data);
			$this->load->view('include/footer');	
		}
		else
		{
			die('JJJ');
			//check if code exist		
			$iNum = $this->My_model->getNumRows('student','code',$this->input->post('code'));
			if(!$iNum)
			{
				$this->session->set_flashdata('mail_msg','<div class="alert alert-success text-center">This code does not exist,Please try again!</div>');
				redirect('student/forgotPassword');
			}
			else     
			{
			    // save password 
				$strPass = $this->input->post('password');
				$data = array( 				
						'password' => md5($strPass)
						);
							
				$where   = array('code' => $this->input->post('code'));
				$bStatus = $this->My_model->updateRecord('student',$data,$where);
				if($bStatus)
					redirect('student/loginValidate'); 
			}			
		}			
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
                'mobile' => $this->input->post('mobile'),
				'code'  => $code,
				'created' => $today,
                'status' => '1'
				);
			$iInserId = $this->My_model->insertRecord('lang_expert',$data);
			// send verification mail
            if($iInserId){
                $subject = 'LangJobs Account Verification';
                $message = "Dear ".$this->input->post('first_name').",<br /> <br />
                            Please click on the below activation link to verify your email address.<br /><br />
                            <br />"
                            .base_url().'LangExpert/verifyEmail/' .$code . "<br />							
                            <br /><br /><b>Thanks & Regards</b>, <br /> LangJobs Team";

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
        
        $this->My_model->updateRecord('lang_expert', $data, $where);
        if($this->db->affected_rows() >=0){
           $val = $this->My_model->selectRecord('lang_expert', '*', $where);
           $send_to = $val[0]->email;
           $subject = "Welcome to Langjobs.com | Account Verified";
           $message = "Dear ".$val[0]->first_name.", <br/>
           <p style='text-align:justify;'> <b>Congratulations!, You account has been verified successfully.</b> Now that you have become a language expert, We urge you to complete your profile as soon as you can. A fully completed profile is more attractive to the employers. </p>
           <p style='text-align:justify;'>You can do following when you login with us:
                <ul>
                    <li style='text-align:justify;'><a href='".base_url()."SearchJob'>Search Job/Freelance Projects</a>: Using Advance search, You can get to select your own specified jobs and projects.</li>
                    <li style='text-align:justify;'><a href='".base_url()."Blogs/write'>Write Blogs</a>: This will help you in showing your expertise in certain languages</li>
                    <li style='text-align:justify;'><a href='".base_url()."expert'>Add Work History</a>: Adding a work history will justify your \"Experience\". It tells employers exactly what kind of developed skills and accomplishments a job seeker has made within a particular industry.</li>
                    <li style='text-align:justify;'><a href='".base_url()."expert'>Add Education</a>: Your education history can reveal that a job seeker has what it takes to focus on a particular subject or industry and develop within it.</li>
                    <li style='text-align:justify;'><a href='".base_url()."expert'>Upload Samples</a>: You might have done some work on which you feel proud, showing a glimpse of that will certainly impress your Employer. </li>
                    <li style='text-align:justify;'><a href='".base_url()."expert'>Upload Resume</a>: Last, but not the least. A well designed and well written resume will certainly mark a star on your profile. </li>
                </ul>
           </p>
           <p style='text-align:justify;'>
                Thanks and Regards,<br/>
                LangJobs Team.
           </p>
           ";
           $val = $this->My_model->send_mail($send_to, $subject, $message);
           echo "<script>
                    alert('Awesome! Your account is verified successfully.'); 
                    window.location.href = '".base_url('LangExpert')."';
                </script>"; 
        } else {
            echo "<script>
                    alert('Oops! Something went wrong. Try again later / contact us'); 
                    window.location.href = '".base_url('LangExpert')."';
                </script>"; 
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
            if($done){
                $subject = 'Welcome to LangJobs';
                $message = "Dear ".$this->input->post('first_name').",<br />
                            Hurray! we are very pleased to see you join us. Best of luck
                            <br />
                            <b>Pro Tip:</b> Complete your profile to get 2x views and offers
                            <br /><br />
                            <br /><br />							
                            <br /><br /><b>Thanks & Regards</b>, <br /> Langjobs Team";

                $send_to = $this->input->post('email');
                $this->My_model->send_mail($send_to, $subject, $message);
            }
        }
        if($this->db->affected_rows() >=0){
          //return true; //add your code here
            $retrieveid = $this->My_model->selectRecord('lang_expert', '*', $where);
            $aSess = array(		
					'exp_id' => $retrieveid[0]->id,
					'first_name' => $retrieveid[0]->first_name,
					'last_name' => $retrieveid[0]->last_name,
					'image'  => $retrieveid[0]->image,
					'email'  => $retrieveid[0]->email,
                    'social_login' => 1
					);
			$this->session->set_userdata($aSess);
            echo '1';
        }else{
          //return false; //add your your code here
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
