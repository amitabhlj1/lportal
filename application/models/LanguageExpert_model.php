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
		
		$subject = 'LangJobs Password change';
		$message = 'Dear User,<br /> <br />You recently requested password change. To reset your password, follow the link below: .<br /><br />
					'.base_url().'LangExpert/recoveryPassword/' . $strcode . '<br /><br /><br />
					<br /><br /><b>Thanks & Regards</b>, <br /> Langecole Team
					<br />
					(T) 011 - 46013636
					<br />
					(M) 9599938829, &nbsp; 9311488060
					<br />
					E-4,Defence colony,&nbsp;&nbsp; New Delhi -110024
					<br /><br />
					facebook.com/langecole.del
					<br />
					youtube.com/channel/UCXUSUrc39Ri7EprBuvcqQNQ
					';
			
		$this->email->from('info@langjob.com', 'LangJobs');
		$this->email->to($to_email); 
						
		$this->email->subject($subject);
		$this->email->message($message);	
		//$this->email->send();
										
		if($this->email->send())
		{	
			return 1;
		}
		else
		{
			return 2;
			//echo $this->email->print_debugger();
			//die();
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
		//$iSec    = $this->input->post('sector');
		$iLoc    = $this->input->post('locationCombo');
		$iExp    = $this->input->post('experience');
		$strKeyw = $this->input->post('keywords');
		$where = 'WHERE jb.j_type=1 AND jb.status=1';
		if(!empty($iLang))
			$where .= " OR jb.language like '%".$iLang."%'";
		 
//		if(!empty($iLoc))
//			$where .= "";
		 
		 if(!empty($iExp))
			$where .= " OR jb.total_exp = ".$iExp;
		 
		 if(!empty($strKeyw))
			$where .= " OR MATCH(jb.title, jb.job_keywords,jb.skills,jb.description)
						AGAINST('$strKeyw' IN NATURAL LANGUAGE MODE) ";
		 
		//print_r($this->input->post()); die(); 
		 $response = array();
        $sql = "SELECT jb.*, lc.company_name, c.name FROM `jobs` jb INNER JOIN lang_company lc ON jb.company_id = lc.id INNER JOIN cities c on jb.j_city = c.id $where";
		 
		 echo "$sql"; die();
		 
        $result = $this->db->query($sql);
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