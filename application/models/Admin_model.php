<?php
class Admin_model extends CI_Model {

    function __construct()
    {        
        parent::__construct();
		$this->load->database();
        $this->load->library('user_agent');
    }
	
	public function login_admin($data)
    {		

		$query = $this->db->get_where('admin_user', array('email' => $data['email'],'password' => md5($data['password'])) );
		$aResult = $query->result_array() ;
		//echo "<pre />"; print_r($aResult); die();
		//echo " >> ". $query->num_rows();die;
		if( $query->num_rows() > 0 && ( $aResult[0]['status'] == 1 ) )
		{						
			$aSess = array(							
					'admin_id' => $aResult[0]['id'],
					'adm_email' => $aResult[0]['email']
					);
			$this->session->set_userdata($aSess);
			redirect('ado/Admin/Dashboard');           // super admin
		}
		else if( $query->num_rows() > 0 && ( $aResult[0]['status'] == 0 ) )
		{
			return '-1';   // not active
		}
		else
		{
		    return '0';     // email or psw wrong
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
	
	
	public function forgotPassword($stremail)
    {
		$where  =  array('user_name' => $stremail);
		$aRes   = $this->My_model->selectRecord('admin_user','*',$where,'','');
		
		//echo "<pre />";print_r($aRes)	; echo $aRes[0]->code ; die();
		$this->load->library('email');
		$to_email = $stremail;
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$subject = 'Langecole Password change';
		$message = 'Dear User,<br /> <br />You recently requested password change. To reset your password, follow the link below: .<br /><br />
					'.base_url().'talgo/admin/recoveryPassword/' . $aRes[0]->code . '<br /><br /><br />
					<br /><br /><b>Thanks & Regards</b>, <br /> Langecole Team';
			
		$this->email->from('admin@langecole.com', 'langecole');
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
		}       
    }
	
	/**
	** function to get topics details
	** $param - data
	*/
	public function getTopics($where=null)
	{	
		$this->db->select ( 'tp.*,bd.board_name,cl.class_name,lg.name'); 
		$this->db->from ( 'topics tp' );
		$this->db->join ( 'board bd','bd.id = tp.board' , 'inner' );
		$this->db->join ( 'class cl','cl.id = tp.class' , 'inner' );
		$this->db->join ( 'language lg','lg.id = tp.language' , 'inner' );
		
		if($where) {
            $this->db->where($where);
        }
						
		$this->db->order_by("tp.id","desc");
		$query = $this->db->get ();
		
		$aResults = $query->result ();			
		return $aResults;
	}	
	/**
	** function to get Student details
	** $param - student id
	*/
	public function getStudents($where=null,$whereIn=null)
	{	
		$this->db->select ( 'std.id,std.first_name,std.last_name,std.email,std.mobile,std.admission_status,std.registration_no,std.status,bat.batch_name,cen.center_name'); 
		$this->db->from ( 'student std' );
		$this->db->join ( 'student_admission adm','adm.student_id = std.id' , 'inner' );
		$this->db->join ( 'center cen','adm.center_id = cen.id' , 'inner' );
		$this->db->join ( 'batch bat','adm.batch_id = bat.id' , 'inner' );
		
		if($where) {
            $this->db->where($where);
        }
		
		if($whereIn) {
            $this->db->where_in('std.id',$whereIn);
        }
		
		$this->db->order_by("std.id","desc");
		$query = $this->db->get ();
		
		$aResults = $query->result ();
			
		return $aResults;
	}
	
	/**
	** function to get confirm Students 
	** $param - parameters
	*/
	public function myStudents($where=null)
	{	
		$this->db->select ('`student_id`,std.first_name,std.last_name,std.email,std.mobile'); 
		$this->db->from ( 'student_admission sadm' );
		$this->db->join ( 'student std','sadm.student_id = std.id', 'inner' );
				
		if($where) {
            $this->db->where($where);
        }		
		$query = $this->db->get ();
		
		$aResults = $query->result ();
			
		return $aResults;
	}
		
	public function login_teacher()
    {		
		$where = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
		);
		$aTeacher = $this->My_model->selectRecord('teacher','*',$where,'','');
		
		$query = $this->db->get_where('admin_user', array('user_name' => $data['user_name'],'password' => md5($data['password'])) );
		$aResult = $query->result_array() ;
		//echo "<pre />"; print_r($aResult); die();
		//echo " >> ". $query->num_rows();die;
		if( $query->num_rows() > 0 && ( $aResult[0]['status'] != 0 ) )
		{						
			$aSess = array(							
					'admin_id' => $aResult[0]['id'],
					'user_id'  => $aResult[0]['user_id'],
					'admin_name'  => $aResult[0]['user_name'],
					'user_type'  => $aResult[0]['user_type']
					);
			$this->session->set_userdata($aSess);
			if( $aResult[0]['user_type'] == 3 )  // teacher
			{
				redirect('ado/admin/teacher');
			}
			else if( $aResult[0]['user_type'] == 2 )  // school admin
			{
				//get board
				$query = $this->db->get_where('school', array('id' => $aResult[0]['user_id']));
				$sResult = $query->result_array() ;
		
				$aSess = array(							
					'board' => $sResult[0]['board'],					
					);
				$this->session->set_userdata($aSess);	
				redirect('ado/mstudent');
			}
			else if( $aResult[0]['user_type'] == 4 )  // Operator
			{
				redirect('ado/enquiry');
			}			
			else
				redirect('ado/admin/');           // super admin
		}
		else if( $query->num_rows() > 0 && ( $aResult[0]['status'] == 0 ) )
		{
			return '-1';
		}
		else
		{
		    return false;
		}		
    }
	
	
	/**
	** function to Student profile
	** $param - 
	*/
	public function studentProfile()
	{	
		$this->db->select ('std.*,qlf.name as std_qualification'); 
		$this->db->from ( 'student std' );
		$this->db->join ( 'qualification qlf','qlf.id = std.qualification', 'left' );
		$where = array('std.id' => $this->session->userdata('stdn_id'));
        $this->db->where($where);
        
		$query = $this->db->get();		
		$aResults = $query->result ();	
		return $aResults;
	}
	
	/**
	** function to get question details
	** $param - 
	*/
	public function getQuestion($qWhere=null)
	{	
		//print_r($qWhere); die();
		$this->db->select ( 'qst.id,qst.type,qst.status,lang.name,tch.first_name,bd.board_name,cl.class_name');
		$this->db->from ( 'question qst' );		
		$this->db->join ( 'language lang','qst.language = lang.id' , 'inner' );		
		$this->db->join ( 'teacher tch', 'qst.teacher = tch.id' , 'inner' );
		$this->db->join ( 'board bd', 'qst.board = bd.id' , 'inner' );
		$this->db->join ( 'class cl', 'qst.class = cl.id' , 'inner' );		
		
		if($qWhere) {
           $this->db->where($qWhere);
        }
		$this->db->order_by("qst.id","desc");
		$query = $this->db->get ();
		
		$aResults = $query->result ();			
		return $aResults;
	}
	
	/**
	** function to get student details
	** $param - 
	*/
	public function studentDetails($qWhere=null,$aLike=null)
	{	
		//print_r($qWhere); die();
		$this->db->select ( 'st.*,bd.board_name,cl.class_name');
		$this->db->from ( 'student st' );				
		$this->db->join ( 'board bd', 'st.board = bd.id' , 'inner' );
		$this->db->join ( 'class cl', 'st.class = cl.id' , 'inner' );		
		
		if($qWhere) {
           $this->db->where($qWhere);
        }
		
		if($aLike) 
			$this->db->like($aLike);
		
		$this->db->order_by("st.id","desc");
		$query = $this->db->get ();
		
		$aResults = $query->result ();			
		return $aResults;
	}
	
	/**
	** function to language and topics details
	** $param - 
	*/
	public function languageTopics($aWhereIn=null)
	{	
		$aLangTopics = array();
		foreach($aWhereIn as $val)
		{
			$strQr ="SELECT `l`.`id` AS langid, `l`.`name` AS language, `t`.`id` AS topicid, `t`.`title` AS topic
			FROM (`topics` t)
			LEFT JOIN `language` l ON `l`.`id` = `t`.`language`
			where l.id = $val AND `t`.`status` =  '1'
			Order by l.id";
			$query = $this->db->query($strQr);
		
			$aLangTopics[] = $query->result_array();
		}				
		return $aLangTopics;
		//$aResults = $query->result();			
		//return $aResults;
	}
	
	/**
	** function to get material details
	** $param - 
	*/
	public function getMaterials($qWhere=null)
	{	
		//print_r($qWhere); die();
		$this->db->select ( 'mat.id as matid,mat.type,lang.name as language,bd.board_name,tch.first_name,cl.class_name,tp.title as topic'); 
		$this->db->from ( 'material mat' );		
		$this->db->join ( 'language lang','mat.language = lang.id' , 'inner' );
		$this->db->join ( 'board bd', 'mat.board = bd.id' , 'inner' );
		$this->db->join ( 'teacher tch', 'mat.teacher = tch.id' , 'inner' );
		$this->db->join ( 'class cl', 'mat.class = cl.id' , 'inner' );
		$this->db->join ( 'topics tp', 'mat.topic = tp.id' , 'inner' );
		
		if($qWhere) {
            $this->db->where($qWhere);
        }
		$this->db->order_by("mat.id","desc");
		$query = $this->db->get ();
		
		$aResults = $query->result ();			
		return $aResults;
	}
	/**
	** function to get objective question answers
	** $param - question id
	*/
	public function getObjQstAns($where=null)
	{	
		//print_r($qWhere); die();
		$this->db->select ( 'qst.type,qst.sub_type,qst.question,qst.status,obj.*'); 
		$this->db->from ( 'question qst' );		
		$this->db->join ( 'question_obj_choice obj','qst.id = obj.q_id' , 'inner' );
		
		
		if($where) {
            $this->db->where($where);
        }		
		$query = $this->db->get ();
		
		$aResults = $query->result ();			
		//echo "<pre />";print_r($aResults); die();
		return $aResults;
	}
	/**
	** function to get comprehension question answers
	** $param - question id
	*/
	public function getMisQstAns($where=null)
	{	
		//print_r($qWhere); die();
		$this->db->select ( 'qst.type,qst.sub_type,qst.question,qst.status,mis.*'); 
		$this->db->from ( 'question qst' );		
		$this->db->join ( 'question_mistype mis','qst.id = mis.q_id' , 'inner' );
		
		
		if($where) {
            $this->db->where($where);
        }		
		$query = $this->db->get ();
		
		$aResults = $query->result ();			
		//echo "<pre />";print_r($aResults); die();
		return $aResults;
	}
		
	/**
	** function to get exam grade
	** $param - 
	*/
	public function getGrades($number)
	{	
		if($number < 50)
		{
            Return 'Fail';
        }
		else if($number >= 50 && $number < 56)
		{
            Return 'B';
        }
		else if($number >= 56 && $number <= 65)
		{
            Return 'B';
        }
		else if($number > 65 && $number <= 75)
		{
            Return 'A-';
        }
		else if($number > 75 && $number <= 85)
		{
            Return 'A';
        }
		else if($number > 85)
		{
            Return 'A+';
        }		
	}
}
?>