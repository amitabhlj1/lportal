<?php
class Employer_model extends CI_Model {

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
					'image'  => $aResult[0]['image'],
					'email'  => $aResult[0]['email']
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
			// changed on 19th April (login without activation by admin)
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
					'image'  => $aResult[0]['image'],
					'email'  => $aResult[0]['email']
					);
			$this->session->set_userdata($aSess);			
			//redirect('ado/School/');
			return '3';	
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
	
}
?>