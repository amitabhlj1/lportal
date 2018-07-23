<?php
class LanguageExpert_model extends CI_Model {

    function __construct()
    {        
        parent::__construct();
		$this->load->database();
        $this->load->library('user_agent');
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
		$query = $this->db->get('lang_expert');
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
			$this->My_model->updateRecord('lang_expert',$data,$where);
			
			$aSess = array(		
					'exp_id' => $aResult[0]['id'],
					'first_name' => $aResult[0]['first_name'],
					'last_name' => $aResult[0]['last_name'],
					'image'  => $aResult[0]['image'],
					'email'  => $aResult[0]['email'],
                    'social_login' => 0
					);
			$this->session->set_userdata($aSess);
			echo '3';	
		}
		else if( $query->num_rows() > 0 &&  $aResult[0]['email_verify'] == 0  )
		{
		    return '0';
		}
		else if( $query->num_rows() > 0 && $aResult[0]['status'] == 0  )
		{
			return '-1';
		}
				
    }
	
	public function change_password($data)
    {		
		$where = array('id' => $this->session->userdata('admin_id'));
		$this->db->where($where);
        $result = $this->db->update('admin_user', $data);
        return ($result) ? TRUE : FALSE;
    }
	
	
	public function forgotPassword($stremail,$strcode)
    {
		$send_to = $stremail;
		
		$subject = 'LangJobs Password change';
		$message = 'Dear User,<br /> <br />You recently requested password change. To reset your password, follow the link below: .<br /><br />
					'.base_url().'LangExpert/recoveryPassword/' . $strcode . '<br /><br /><br />
					<br /><br /><b>Thanks & Regards</b>, <br /> LangJobs Team
					<br />
					(T) 011 - 46013636
					<br />
					(M) 9599938829, &nbsp; 9311488060
					<br />
					E-4,Defence colony,&nbsp;&nbsp; New Delhi -110024
					<br />
					youtube.com/channel/UCXUSUrc39Ri7EprBuvcqQNQ
					';
										
		if($this->My_model->send_mail($send_to, $subject, $message))
		{	
			return 1;
		}
		else
		{
			return 2;
		}       
    }
	
    public function select_city_details() {
        $response = array();
        $sql = "SELECT cities.id, cities.name as city, states.name as state, country.c_name as country FROM cities LEFT JOIN states ON cities.s_id = states.id LEFT JOIN country ON states.c_id = country.id ORDER BY cities.name";
        $result = $this->db->query($sql);
        if ($result && $result->num_rows()) {
//            foreach ($result->result() as $row) {
//                $response[] = $row->fld_phone;
//            }
            $response = $result->result();
        }
        return $response;
    }
	
    public function retrieve_jobs(){
        $response = array();
        $sql = "SELECT job_apply.job_id, jobs.j_type, jobs.title, job_apply.apply_date FROM `job_apply` INNER JOIN jobs ON jobs.id = job_apply.job_id WHERE job_apply.expert_id ='".$this->session->userdata('exp_id')."'";
        $result = $this->db->query($sql);
        if ($result && $result->num_rows()) {
            foreach ($result->result() as $row) {
                $response[] = $row;
            }
        }
        return $response;
    }
    
	
	 public function searchResult()
	 {
		$iLang   = $this->input->post('language');
		$iSec    = $this->input->post('sector');
		$iLoc    = $this->input->post('locationCombo');
		$iExp    = $this->input->post('experience');
		$strKeyw = $this->input->post('keywords');
		$where = 'WHERE jb.status=1';
         
        if(!empty($strKeyw))
			$where .= " AND MATCH(jb.title, jb.job_keywords,jb.skills,jb.description)
						AGAINST('$strKeyw')";
		if(!empty($iLang))
			$where .= " AND (FIND_IN_SET(".$iLang.",jb.languages) OR jb.from_language = '".$iLang."' OR jb.to_language = '".$iLang."')";
        
        if(!empty($iSec))
			$where .= " AND jb.j_category = ".$iSec;
         
		if(!empty($iLoc))
			$where .= " AND '".$iLoc."' LIKE CONCAT('%',jb.address,'%')";
		 
		 if($iExp!="")
			$where .= " AND jb.total_exp = '".$iExp."'";
         
         $order_by = " ORDER BY jb.id DESC";
		 
         $response = array();
         $sql = "SELECT jb.*, l.company_name FROM `jobs` jb INNER JOIN lang_company l ON jb.company_id = l.id ".$where." ".$order_by;
         $result = $this->db->query($sql);
         //$this->My_model->printQuery(); die();
        if ($result && $result->num_rows()) {
            foreach ($result->result() as $row) {
                $response[] = $row;
            }
        }
        return $response;
    }
	
    public function fetch_blog($id=null, $type=null){
        $response = array();
        if($id){
            $sql = "SELECT b.*, u.first_name, u.last_name FROM `blog_articles` b INNER JOIN lang_expert u ON b.written_by = u.id WHERE b.status = 1 AND b.id = ".$id;
        } else {
            $sql = "SELECT b.*, u.first_name, u.last_name FROM `blog_articles` b INNER JOIN lang_expert u ON b.written_by = u.id WHERE b.status = 1";   
        }
        
        if($type){
            $sql .=" AND b.type = ".$type;
        }
        
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