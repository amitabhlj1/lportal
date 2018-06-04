<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('admin_model');		
	}

	function index()
	{	
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/login'); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function Dashboard()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$aOrder = array('criteria' => 'created','order' => 'DESC');
		//$iLimit  = 5;
		$data['experts']    = $this->My_model->selectRecord('lang_expert','*','',$aOrder,'');
		//$this->My_model->PrintQuery();
		$data['employers']  = $this->My_model->selectRecord('lang_company','*','',$aOrder,'');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/admin',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function Blogs()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh');       
		
		$data['blogs'] = $this->My_model->selectRecord('blog_articles','*','','','');
		//echo "<pre />"; print_r($data); die();
		
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/blogs',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function viewBlog()
	{	
		
		$aBlog    = $this->admin_model->blogDetails();
		
		//echo "<pre />"; print_r($aBlog); die('JKK');
		?>
		
		<tr>
			<td><b>Topic:</b>&nbsp;</td><td><?php echo $aBlog[0]->topic;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><b>Description:</b>&nbsp;</td><td><?php echo $aBlog[0]->article;?></td>
		</tr>
		<?php
		if( !empty($aBlog[0]->type) )
		{
			$aType = $this->admin_model->blogType($aBlog[0]->type);	
		?>
			<tr>
				<td><b>Article Type:</b>&nbsp;</td><td><?php echo $aType[0]->types;?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td><b>Written By:</b>&nbsp;</td><td><?php echo $aBlog[0]->first_name;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php	 	
	}
	
	// edit blog
	public function editBlog($bid)
	{        
        if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
        $data['blog'] = $this->My_model->selectRecord('blog_articles', '*', array('id' => $bid));
      
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/edit_blog',$data); 
	    $this->load->view('admin/include/footer');	     
    }
	
	// update blog
    public function updateBlog()
	{
        if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
        $id = $this->input->post('b_id');
        $aAdd = array( 	
			'keywords' => $this->input->post('keywords'),
			'keyphrase' => $this->input->post('keyphrase'),
            'topic' => $this->input->post('topic'),
            'article' => $this->input->post('article'),
			);
        
        $updt = $this->My_model->updateRecord('blog_articles', $aAdd, array('id' => $id));
       	if($updt)
		{
			redirect('ado/Admin/Blogs');
		}
    }
	
	function experts()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$data['experts']    = $this->My_model->selectRecord('lang_expert','*','','','');
		//echo "<pre />"; print_r($data); die();
		
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/experts',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function expertDetails()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		$where     = array('id' => $this->input->post('id'));
		$aEmployer = $this->My_model->selectRecord('lang_expert','*',$where,'','');
		?>
		<tr>
			<td>Profile Name :&nbsp;</td><td><?php echo $aEmployer[0]->profile_name;?></td>
		</tr>
		<tr>
			<td>Skills:&nbsp;</td><td><?php echo $aEmployer[0]->skills;?></td>
		</tr>
		<tr>
			<td>About:&nbsp;</td><td><?php echo $aEmployer[0]->about_me;?></td>
		</tr>
		<?php
	}
	
	function employers()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$data['employers']    = $this->My_model->selectRecord('lang_company','*','','','');
		//echo "<pre />"; print_r($data); die();
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/employers',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function employerDetails()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		$where     = array('id' => $this->input->post('emp_id'));
		$aEmployer = $this->My_model->selectRecord('lang_company','*',$where,'','');
		?>
		<tr>
			<td width='25%'>Company :&nbsp;</td><td><?php echo $aEmployer[0]->company_name;?></td>
		</tr>
		<tr>
			<td>Address:&nbsp;</td><td><?php echo $aEmployer[0]->address;?></td>
		</tr>
		<tr>
			<td>Size:&nbsp;</td><td><?php echo $aEmployer[0]->no_emp;?></td>
		</tr>
		<tr>
			<td>About:&nbsp;</td><td><?php echo $aEmployer[0]->company_description;?></td>
		</tr>
		<?php
	}
	
	function Jobs()
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$data['jobs']    = $this->My_model->selectRecord('jobs','*','','','');
		//echo "<pre />"; print_r($data); die();
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/jobs',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	/*
	** jobs category listinng
	** @param - none
	**/
	function Category() 
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		//$where = array('status' => 1);
		$data['categorys']  = $this->My_model->selectRecord('job_category','*','','','');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/category',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	/*
	** save jobs category
	** @param - none
	**/
	function saveCategory()
	{	
		$data = array('cat_name' => $this->input->post('cat_name'));
		$this->My_model->insertRecord('job_category',$data);
		redirect('ado/Admin/Category');
	}
	
	
	/*
	** job Skills listinng
	** @param - none
	**/
	function Skills() 
	{	
		if( !$this->session->userdata('admin_id') )
			redirect('ado/Admin/logout','refresh'); 
		
		$data['skills']  = $this->My_model->selectRecord('job_skills','*','','','');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/skills',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	/*
	** save jobs skills
	** @param - none
	**/
	function saveSkill()
	{	
		$data = array('name' => $this->input->post('name'));
		$this->My_model->insertRecord('job_skills',$data);
		redirect('ado/Admin/Skills');
	}
	
	/*
	** Languages listinng
	** @param - none
	**/
	function Language() 
	{	
		//$where = array('status' => 1);
		$data['languages']  = $this->My_model->selectRecord('language','*','','','');
		
		//echo "<pre />"; print_r($data); 
		$this->load->view('admin/include/header'); 
		$this->load->view('admin/language',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	/*
	** save languages
	** @param - none
	**/
	function saveLanguage()
	{	
		$data = array('name' => $this->input->post('name'));
		$this->My_model->insertRecord('language',$data);
		redirect('ado/Admin/Language');
	}
	
	/*
	** change status 
	** @param - id,new status,table name,section
	**/
	function changeStatus($id,$val,$table,$section)
	{	
		$where   = array('id' => $id);
		$data = array('status' => $val);
		$this->My_model->updateRecord($table,$data,$where);
		redirect("ado/Admin/$section");
	}
	
	public function loginValidate()
	{   
		//die('88');		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/include/header');
			$this->load->view('admin/login');
			$this->load->view('admin/include/footer');	
		}
		else
		{    			
			$data = array( 				
				'email' => $this->input->post('email'), 
				'password' => $this->input->post('password')			
			);
			
			//print_r($data); die('88');
			$bLogin = $this->admin_model->login_admin($data);
			//echo "==> ". $bLogin; die();
			if($bLogin == -1)
				$data['error'] = 'your account is not activated!';
			else
				$data['error'] = 'User name or Password is incorrect!';
			
				$this->load->view('admin/include/header');	
				$this->load->view('admin/login',$data);
				$this->load->view('admin/include/footer');			
		}
	}
	
	public function forgotPassword()
	{				
		$this->load->view('admin/include/header');	
		$this->load->view('admin/forgot_password');
		$this->load->view('admin/include/footer');	
	}
	
	public function logout()
	{   			
		$this->session->sess_destroy();
		redirect('ado/Admin','refresh');  
	}
}
