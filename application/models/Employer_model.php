<?php
class Employer_model extends CI_Model {

    function __construct()
    {        
        parent::__construct();
		$this->load->database();
        $this->load->library('user_agent');
    }
	
	/**
	** function to get jopb applicatnts
	** $param - job_id
	*/
	public function getJobApplicants($job_id = null)
	{	
		$this->db->select ('apl.* , exp.first_name'); 
		$this->db->from ( 'job_apply  apl' );
		$this->db->join ( 'lang_expert exp','exp.id = apl.expert_id' , 'left' );		
		if($job_id)
		{
			$aWhere = array('apl.job_id' => $job_id);
			
			if(!empty($this->session->userdata('emp_id')))  // if a employer 
				$aWhere['apl.company_id'] = $this->session->userdata('emp_id');
			
			$this->db->where($aWhere);
		}
		$query = $this->db->get ();
		
		$aResults  = $query->result ();
		//echo "<pre />"; print_r($aResults); die('PLLL');
		return $aResults;
	}
	
	/**
	** function to get number of cv viewd/downloaded
	** $param - none
	*/
	public function cvNum()
	{	
		$aWhere = array('company_id' => 1);
		$this->db->select ('SELECT count(*) AS nums'); 
		$this->db->from ( 'resume_view_history' );
		$this->db->where($aWhere);		
		
		$query = $this->db->get ();
		
		$aResults  = $query->result ();
		//echo "<pre />"; print_r($aResults); die('PLLL');
		return $aResults->nums ;
	}
	
	
	/**
	** get comma sepatated language name
	** $param - lang ids
	*/
	public function getLangList($langids)
	{	
		$query = $this->db->query("SELECT GROUP_CONCAT(name) AS langs FROM `language` WHERE id IN($langids)");
		
		$aResults  = $query->result ();
		return $aResults[0]->langs ;
	}
	
	/**
	** function to get job Details
	** $param - job_id
	*/
	public function jobDetails($job_id)
	{	
		$this->db->select ('jb.* , lng1.name as f_lang, lng2.name as t_lang, cat.cat_name'); 
		$this->db->from ( 'jobs jb' );
		$this->db->join ( 'language lng1','lng1.id = jb.from_language' , 'left' );
		$this->db->join ( 'language lng2','lng2.id = jb.to_language' , 'left' );
		$this->db->join ( 'job_category cat','cat.id = jb.j_category' , 'left' );
		if($job_id)
		{
			$aWhere = array('jb.id' => $job_id);
			if(!empty($this->session->userdata('emp_id')))  // if a employer 
				$aWhere['jb.company_id'] = $this->session->userdata('emp_id');
			
			$this->db->where($aWhere);
		}
		$query = $this->db->get ();
		
		//echo $this->db->last_query(); die();		
		$aResults  = $query->result ();
		//echo "<pre />"; print_r($aResults); die('PLLL');
		return $aResults;
	}
	
	/**
	**  get resume download history
	** $param - none
	*/
	public function getResumeViewHistory()
	{	
		$this->db->select ('apl.* , exp.first_name,exp.last_name'); 
		$this->db->from ( 'resume_view_history  apl' );
		$this->db->join ( 'lang_expert exp','exp.id = apl.expert_id' , 'left' );		
		
		$query = $this->db->get ();
		$aResults  = $query->result ();
		//echo "<pre />"; print_r($aResults); die('PLLL');
		return $aResults;
	}
	
	public function login_user()
    {		
		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$email = $this->input->post('email');
		
		//$query = $this->db->get_where('lang_expert', array('email' => $this->input->post('email'),'password' => md5($this->input->post('password')) ) );
		
		$this->db->where('password',md5($this->input->post('password')));
       
        $where = "(user_id="."'".$email."'" ." or email = "."'".$email."'".")";
		$this->db->where($where);
		$query = $this->db->get('lang_company');
		$aResult = $query->result_array() ;
		//echo "<pre />"; print_r($aResult); die();
		//$this->My_model->PrintQuery();
		
		if( $query->num_rows() == 0)
		{
			return '2';
		}
		else if( $query->num_rows() > 0 &&  $aResult[0]['status'] == 1  && $aResult[0]['email_verify'] == 1  )
		{		
			// update last login time
			$data = array('last_login' => date('Y-m-d'));
			$where = array('id' => $aResult[0]['id']);
			$this->My_model->updateRecord('lang_company',$data,$where);
			
			$aSess = array(		
					'emp_id' => $aResult[0]['id'],
					'first_name' => $aResult[0]['first_name'],
					'last_name' => $aResult[0]['last_name'],
					'comp_name' => $aResult[0]['company_name'],
					'image'  => $aResult[0]['thumb_logo'],
					'email'  => $aResult[0]['email'],
					'r_plan'  => $aResult[0]['resume_plan']
					);
			$this->session->set_userdata($aSess);			
			//redirect('ado/School/');
			return '3';	
		}
		else if( $query->num_rows() > 0 &&  $aResult[0]['email_verify'] == 0  )
		{
		    return '0';
		}
		else if( $query->num_rows() > 0 && $aResult[0]['status'] == 0  )
		{
			/*
			**   old 
			*/
			// changed on 19th April ( requirments changed -> login without activation by admin)
			//return '-1';
			
			
			/// new 
			$data = array('last_login' => date('Y-m-d'));
			$where = array('id' => $aResult[0]['id']);
			$this->My_model->updateRecord('lang_company',$data,$where);
			
			$aSess = array(		
					'emp_id' => $aResult[0]['id'],
					'first_name' => $aResult[0]['first_name'],
					'last_name' => $aResult[0]['last_name'],
					'comp_name' => $aResult[0]['company_name'],
					'image'  => $aResult[0]['thumb_logo'],
					'email'  => $aResult[0]['email'],
					'r_plan'  => $aResult[0]['resume_plan']
					);
			$this->session->set_userdata($aSess);			
			//redirect('ado/School/');
			return '3';	
		}
				
    }
	
	public function jobLangs($sIds)
	{	
		$query = $this->db->query("SELECT GROUP_CONCAT(`name`) AS langs FROM `language` WHERE `id` IN($sIds)");
		$aResults = $query->result();	
		return $aResults;
	}
	
	public function jobSkills($sIds)
	{	
		$query = $this->db->query("SELECT GROUP_CONCAT(`name`) AS skills FROM `job_skills` WHERE `id` IN($sIds)");
		$aResults = $query->result();	
		return $aResults;
	}
	
	public function change_password($data)
    {		
		$where = array('id' => $this->session->userdata('admin_id'));
		//print_r($where); die(); 	
		$this->db->where($where);
        $result = $this->db->update('admin_user', $data);
        return ($result) ? TRUE : FALSE;
    }
	
	
	public function forgotPassword($stremail,$strcode)
    {
		$this->load->library('email');
		$to_email = $stremail;
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$subject = 'langjobs Password change';
		$message = 'Dear User,<br /> <br />You recently requested password change. To reset your password, follow the link below: .<br /><br />
					'.base_url().'LangEmployer/recoveryPassword/' . $strcode . '<br /><br /><br />
					<br /><br /><b>Thanks & Regards</b>, <br /> Langecole Team';
			
		$this->email->from('admin@langjobs.com', 'langjobs');
		$this->email->to($to_email); 
						
		$this->email->subject($subject);
		$this->email->message($message);	
		//$this->email->send();
										
		if($this->email->send())
		{	
			return 1;    // email send
		}
		else
		{
			return 2;		// error sending mail	
		}       
    }
    
    public function return_experts(){
        $response = array();
        $lang = $this->input->post('language');
        $exp = $this->input->post('experience');
        $loc = $this->input->post('location');
        $keywords = $this->input->post('kwords');
        
        $where = ' WHERE first_name != "" AND status = 1';
        if(!empty($lang))
            $where .= " AND expert_in like '%".$lang."%'";
        if(!empty($exp))
            $where .= " AND total_exp=".$exp;
        if(!empty($loc))
            $where .= " AND '".$loc."' LIKE CONCAT('%',address,'%')";
        if(!empty($keywords))
            $where .= " AND MATCH(skills, about_me) AGAINST ('$keywords' IN NATURAL LANGUAGE MODE)";
        
        $order_by = " ORDER BY id DESC";
        $limit = " LIMIT 200";
        
        $sql = "SELECT id, first_name, last_name, profile_name, skills, image, total_exp, social_login FROM lang_expert".$where.$order_by.$limit;
        
        $result = $this->db->query($sql);
        if ($result && $result->num_rows()) {
            foreach ($result->result() as $row) {
                $response[] = $row;
            }
        }
        return $response;
    }
}
?>