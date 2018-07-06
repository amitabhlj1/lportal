<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('Employer_model');		
	}
	function index()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		//echo "<pre />"; print_r($this->session->userdata());
		// full time / part time jobs
		$iLimit = 10;
		$aOrder = array('criteria' => 'created', 'order' => 'desc' );
		$where = array('company_id' => $this->session->userdata('emp_id'));
		$data['jobs'] = $this->My_model->selectRecord('jobs','*',$where,$aOrder,$iLimit);
		//echo "<pre />"; print_r($data); 
		// project based / part time jobs
		$aOrder = array('criteria' => 'created', 'order' => 'desc' );
		$where = array('company_id' => $this->session->userdata('emp_id'));
		$data['jobs'] = $this->My_model->selectRecord('jobs','*',$where,$aOrder,$iLimit);
		//die();
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/dashboard',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	function jobs()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		$aOrder = array('criteria' => 'created', 'order' => 'desc' );
		$where = array('company_id' => $this->session->userdata('emp_id'));
		$data['jobs'] = $this->My_model->selectRecord('jobs','*',$where,$aOrder,'');
		//echo "<pre />"; print_r($data); die();
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/jobs',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	function addJob()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		$where = array('status' => 1);
		$data['cats'] = $this->My_model->selectRecord('job_category','*',$where,'','');
		$data['langs'] = $this->My_model->selectRecord('language','*',$where,'','');
		$data['skills'] = $this->My_model->selectRecord('job_skills','*',$where,'','');
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/add_job',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	/*
	** save freelance/project based jobs
	**/
	function saveProjectJob()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		//echo "<pre />"; print_r($this->input->post());
		if(!empty($this->input->post('j_id')))    // edit job
		{ 
			$data = array(
				'j_category' => $this->input->post('j_category'),
				'company_id' => $this->session->userdata('emp_id'),
				'from_language' => $this->input->post('from_language'),
				'to_language' => $this->input->post('to_language'),
				'title' => $this->input->post('title'),
				'job_keywords' => $this->input->post('job_keywords'),
				'skills' => $this->input->post('f_skills'),
				'address' => $this->input->post('f_address'),
				'description' => $this->input->post('description'),
				'total_exp' => $this->input->post('total_exp'),
				'unit_name' => $this->input->post('unit_name'),
				'unit_numbers' => $this->input->post('unit_numbers'),
				'work_rate' => $this->input->post('work_rate'),
				'last_date' => $this->input->post('last_date')
				);
			$where = array('id' => $this->input->post('j_id'));
			$bUpdate = $this->My_model->updateRecord('jobs',$data,$where);
			if($bUpdate)
			{
				$this->session->set_flashdata('verify_msg','<div class="alert alert-block alert-success">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							Job edited succesfully!
						</div>');
				redirect('ado/Employer/');
			}
			else
				redirect('ado/Employer/');	
		}
		else                                     // new job
		{	
			//die('new prj based ');
			$today = date('Y-m-d'); 
			$data = array(
				'j_type' => 3,                       // project based / freelance
				'j_category' => $this->input->post('f_j_category'),
				'company_id' => $this->session->userdata('emp_id'),
				'from_language' => $this->input->post('f_language'),
				'to_language' => $this->input->post('to_language'),
				'title' => $this->input->post('f_title'),
				'job_keywords' => $this->input->post('f_job_key'),
				'skills' => $this->input->post('f_skills'),
				'address' => $this->input->post('f_address'),
				'description' => $this->input->post('f_description'),
				'total_exp' => $this->input->post('total_exp'),
				'unit_name' => $this->input->post('unit_name'),
				'unit_numbers' => $this->input->post('unit_numbers'),
				'work_rate' => $this->input->post('work_rate'),
				'last_date' => $this->input->post('last_date'),
				'created' => $today
				);
			//echo "<pre />"; print_r($data);
			$iInserId = $this->My_model->insertRecord('jobs',$data);
			if($iInserId)
			{
				$this->session->set_flashdata('verify_msg','<div class="alert alert-block alert-success">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							new Job added succesfully!
						</div>');
				redirect('ado/Employer/');
			}
			else
			{
				$this->session->set_flashdata('verify_msg','<div class="alert alert-block alert-danger">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							<strong>Error!</strong>please try after sometime!
						</div>');
				redirect('ado/Employer/');
			}
		}
	}
	/*
	**   save full time part time job
	*/
	function saveJob()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		if(!empty($this->input->post('j_id')))    // edit job
		{ 
			$strLangs = implode(',',$this->input->post('languages'));
			$data = array(
				'j_category' => $this->input->post('j_category'),
				'languages' => $strLangs,
				'title' => $this->input->post('title'),
				'job_keywords' => $this->input->post('job_keywords'),
				'skills' => $this->input->post('skills'),
				'address' => $this->input->post('address'),
				'description' => $this->input->post('description'),
				'total_exp' => $this->input->post('total_exp'),
				'last_date' => $this->input->post('last_date'),
				);
			$where = array('id' => $this->input->post('j_id'));
			$bUpdate = $this->My_model->updateRecord('jobs',$data,$where);
			if($bUpdate)
			{
				$this->session->set_flashdata('verify_msg','<div class="alert alert-block alert-success">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							Job edited succesfully!
						</div>');
				redirect('ado/Employer/');
			}
			else
				redirect('ado/Employer/');	
		}
		else                                     // new job
		{	
			$today = date('Y-m-d'); 
			$strLangs = implode(',',$this->input->post('languages'));
			$data = array(
				'j_type' => 1,           // full time 
				'j_category' => $this->input->post('j_category'),
				'company_id' => $this->session->userdata('emp_id'),
				'languages' => $strLangs,
				'title' => $this->input->post('title'),
				'job_keywords' => $this->input->post('job_keywords'),
				'skills' => $this->input->post('skills'),
				'address' => $this->input->post('address'),
				'description' => $this->input->post('description'),
				'total_exp' => $this->input->post('total_exp'),
				'last_date' => $this->input->post('last_date'),
				'created' => $today
				);
			//echo "<pre />"; print_r($data); die(' NNNN');
			$iInserId = $this->My_model->insertRecord('jobs',$data);
			if($iInserId)
			{
				$this->session->set_flashdata('verify_msg','<div class="alert alert-block alert-success">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							new Job added succesfully!
						</div>');
				redirect('ado/Employer/');
			}
			else
			{
				$this->session->set_flashdata('verify_msg','<div class="alert alert-block alert-danger">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							<strong>Error!</strong>please try after sometime!
						</div>');
				redirect('ado/Employer/');
			}
		}
	}
	function editJob($job_id=null)
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		if(empty($job_id))      // to validate employer and job
			redirect('ado/Employer/logout','refresh');
		$where = array('status' => 1);
		$data['cats'] = $this->My_model->selectRecord('job_category','*',$where,'','');
		$data['langs'] = $this->My_model->selectRecord('language','*',$where,'','');
		$data['skills'] = $this->My_model->selectRecord('job_skills','*',$where,'','');
		$where = array('id' => $job_id,'company_id' => $this->session->userdata('emp_id'));
		$data['jobs'] = $this->My_model->selectRecord('jobs','*',$where,'','');
		// to match employer and job
		if(!is_array($data['jobs']))
			redirect('ado/Employer');
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/edit_job',$data); 
	    $this->load->view('admin/include/footer');	
	}
	function viewJob()
	{	
		$job_type = $this->input->post('job_type');
		$strType = $job_type == 3 ? 'freelance/prj based' : 'full / part time';
		$aJob    = $this->Employer_model->jobDetails($this->input->post('job_id'));
		//echo "<pre />"; print_r($aJob); die('JKK');
		?>
		<tr>
			<td width='25%'><b>Type :</b>&nbsp;</td><td><?php echo $strType;?></td>
		</tr>
		<tr>
			<td><b>Category :</b>&nbsp;</td><td><?php echo $aJob[0]->cat_name;?></td>
		</tr>
		<?php
		if(!empty($aJob[0]->skills))
		{
			//$aSkills  = $this->Employer_model->jobSkills($aJob[0]->skills);	
		?>
		<tr>
			<td><b>Skills :</b>&nbsp;</td><td><?php echo $aJob[0]->skills;?></td>
		</tr>
		<?php
		}
		if($job_type != 3)
		{
			$aLangs  = $this->Employer_model->jobLangs($aJob[0]->languages);	
		?>
			<tr>
				<td><b>Languages:</b>&nbsp;</td><td><?php echo $aLangs[0]->langs;?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td><b>Title:</b>&nbsp;</td><td><?php echo $aJob[0]->title;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><b>Details:</b>&nbsp;</td><td><?php echo $aJob[0]->description;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php
		if($job_type == 3)
		{
		?>
			<tr>
				<td><b>From Language:</b>&nbsp;</td><td><?php echo $aJob[0]->f_lang;?></td>
			</tr>
			<tr>
				<td><b>To Language:</b>&nbsp;</td><td><?php echo $aJob[0]->t_lang;?></td>
			</tr>
			<tr>
				<td><b>Unit Name:</b>&nbsp;</td><td><?php echo $this->config->item('job_units')[$aJob[0]->unit_name];?></td>
			</tr>
 			<tr>
				<td><b>Unit Numbers:</b>&nbsp;</td><td><?php echo $aJob[0]->unit_numbers;?></td>
			</tr>
			<tr>
				<td><b>Work Rate:</b>&nbsp;</td><td><?php echo $aJob[0]->work_rate;?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td><b>Applicants:</b>&nbsp;</td><td><?php echo $aJob[0]->j_applicants;?></td>
		</tr>
		<?php	 	
	}
	function viewApplicants()
	{	
		$job_id = $this->input->post('job_id');
		$aApplicants = $this->Employer_model->getJobApplicants($job_id);
		//echo "<pre />"; print_r($aApplicants); die('JKK');
		?>
		<thead>
			<tr>
				<td>Name</td>
				<td>Apply Date</td>
				<td>profile</td>
				<td>Comments</td>
			</tr>
		</thead>	
		<?php
		foreach($aApplicants as $apl)
		{
		?>
		<tr>
			<td><?php echo $apl->first_name;?></td>
			<td><?php echo date('F  j, Y',strtotime($apl->apply_date));?></td>
			<td>
				<?php
				$set_atts = array(
						'width'       => 850,
						'height'      => 650,
						'status'      => 'yes',
						'resizable'   => 'yes',
						'scrollbars'  => 'yes',
						'window_name' => '_blank',
						'screeny'     => 0,
						'screenx'     => 0
					);
				// print codeigniter anchor_popup
				echo anchor_popup("ado/Employer/viewProfile/$apl->expert_id", 'View Profile', $set_atts);
				?>				
			</td>
			<td>
				 <a href="<?php echo base_url();?>ado/Employer/viewAllComments/<?php echo $job_id;?>/<?php echo $apl->expert_id;?>">View
				</a>	 
			</td>
		</tr>
		<?php
		}
	}
	/*
	**  view expert profile
	** @param - expert id
	*/
	function viewProfile($pid)
	{	
		$data['usr'] = $this->My_model->selectRecord('lang_expert', '*', array('status' => 1, 'id' =>$pid));
        $title['title_of_page'] = $data['usr'][0]->last_name." - ".$data['usr'][0]->profile_name." | Langjobs Language Experts | ";
        $title['description'] = "";
        $title['keywords'] = $data['usr'][0]->skills.", langjob expert profile";
        $whr5 = array(
            'exp_id' => $data['usr'][0]->id
        );
        $data['education'] = $this->My_model->selectRecord('lang_expert_ed', '*', $whr5);
        $data['work_history'] = $this->My_model->selectRecord('lang_expert_wh', '*', $whr5);
        $data['work_sample'] = $this->My_model->selectRecord('lang_expert_ws', '*', $whr5);
		// check employer resume_view_history
		$iCVCount = $this->My_model->getNumRows('resume_view_history','company_id',$this->session->userdata('emp_id')); 
		$iBalance = $this->config->item('rplan_cv')[$this->session->userdata('r_plan')] - $iCVCount;
		//echo  " Bal = " . $iBalance;
		if( $iBalance > 0)    // add to resume_view_history
		{
			// check if this expert already added
			$where = array('company_id' => $this->session->userdata('emp_id'),'expert_id' => $pid);
			$aRes  = $this->My_model->selectRecord('resume_view_history', '*', $where);
			//$this->My_model->printQuery();
			if(!$aRes)           // add
			{
				$adata = array(
					'company_id' => $this->session->userdata('emp_id'),
					'expert_id' => $pid
					);
				$iInsert = $this->My_model->insertRecord('resume_view_history', $adata);
			}
		}
		$data['balance'] = $iBalance;
		$this->load->view('include/header', $title);
		$this->load->view('expert_profile', $data);
        $this->load->view('include/footer');
	}
	function viewAllComments($job_id,$exp_id)
	{	
		$data['comments'] = $this->My_model->selectRecord('comments', '*', array('job_id' => $job_id, 'company_id' => $this->session->userdata('emp_id'), 'expert_id' => $exp_id));
		$data['applicants'] = $this->Employer_model->getJobApplicants($job_id );
		$data['job_id']  = $job_id;
		$data['exp_id']  = $exp_id;
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/view_comments',$data); 
	    $this->load->view('admin/include/footer');	
	}
	function viewInnerComments()
	{	
		$job_id = $this->input->post('job_id');
		$exp_id = $this->input->post('exp_id');
		$aComments = $this->My_model->selectRecord('comments', '*', array('job_id' => $job_id, 'company_id' => $this->session->userdata('emp_id'), 'expert_id' => $exp_id));
		if($aComments)
		{	
			foreach($aComments as $c){ 
				if($c->sender == 1){
					echo "<div class='right_div'><span><img width='30' height='30' class='img img-circle' src='".base_url()."assets/uploads/employer/".$this->session->userdata('logo')."'> &nbsp;$c->comment</span></div><br/>";
				} else {
					if($this->session->userdata('social_login') == 1){
						$eimg = $this->session->userdata('image');
					} else {
						if(!$this->session->userdata('image')){
							$eimg = base_url()."assets/1.png"; 
						} else {
							$eimg = base_url()."assets/uploads/expert/".$this->session->userdata('image');
						}
					}
					echo "<div class='left_div'><span>$c->comment &nbsp; <img class='img img-circle' width='30' height='30' src='$eimg'/></span></div><br/>";
				}
			}
		}
	}
	// add new comment
	public function addcomment()
	{
        $data = array(
            'job_id' => $this->input->post('job_id'),
            'company_id' => $this->session->userdata('emp_id'),
            'expert_id' => $this->input->post('exp_id'),
            'sender' => 1,
            'comment' => $this->input->post('comment'),
            'created' => date('Y-m-d'),
            'status' => 1
        );
		// add comment
        $ins = $this->My_model->insertRecord('comments', $data);
		$job_id = $this->input->post('job_id');
		$exp_id = $this->input->post('exp_id');
		$aComments = $this->My_model->selectRecord('comments', '*', array('job_id' => $job_id, 'company_id' => $this->session->userdata('emp_id'), 'expert_id' => $exp_id));
		$aExpert = $this->My_model->selectRecord('lang_expert', '*', array('id' => $exp_id));
		if($aComments)
		{	
			foreach($aComments as $c){ 
				if($c->sender == 1){
					echo "<div class='right_div'><span><img width='30' height='30' class='img img-circle' src='".base_url()."assets/uploads/employer/".$this->session->userdata('logo')."'> &nbsp;$c->comment</span></div><br/>";
				} else {
					if($aExpert[0]->social_login == 1){
						$eimg = $aExpert[0]->image;
					} else {
						if(!$aExpert[0]->image){
							$eimg = base_url()."assets/1.png"; 
						} else {
							$eimg = base_url()."assets/uploads/expert/".$aExpert[0]->image;
						}
					}
					echo "<div class='left_div'><span>$c->comment &nbsp; <img class='img img-circle' width='30' height='30' src='$eimg'/></span></div><br/>";
				}
			}
		}
    }
	function profile()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		//echo "<pre />"; print_r($this->session->userdata());
		$where = array('id' => $this->session->userdata('emp_id'));
		$data['profile']    = $this->My_model->selectRecord('lang_company','*',$where,'','');
		//echo "<pre />"; print_r($data); //die();
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/profile',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	function changeLogo()
	{	
		//echo FCPATH ; die();
		$empPath = 'assets/uploads/employer/';
		$path =  FCPATH.$empPath;
		 //"""F:/xampp/htdocs/upload_ci/assets/tmp/";
		$actual_image_name="";
		$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$imagename = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			if(strlen($imagename))
			{
				$ext = strtolower($this->getExtension($imagename));
				if(in_array($ext,$valid_formats))
				{
					if($size<(1024*1024))
					{
						$actual_image_name = time().'.'.$ext ; //.substr(str_replace(" ", "_", $imagename), 5);
						$uploadedfile = $_FILES['photoimg']['tmp_name'];
						$widthArray = array(50,100);
						foreach($widthArray as $newwidth)
						{
							$filename=$this->compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth);
							// add file to database
							$where   = array('id' => $this->session->userdata('emp_id'));
							if($newwidth == 50)
								$data    = array('thumb_logo' => $filename);
							else
								$data    = array('company_logo' => $filename);
							$bStatus = $this->My_model->updateRecord('lang_company',$data,$where);
						}	
						?>
						<img src="<?php echo base_url().$empPath.$filename; ?>"> <br/>
						<?php
						// if want to upload original file 
						/*
						if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
						{	
							//echo " ==>  " . base_url() ."<br />"; 
							//mysqli_query($db,"INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
						?>	
							<img src="<?php echo base_url();?>assets/tmp/<?php echo $actual_image_name; ?>"> <br/>
						<?php	
							echo "<b>Original Image</b>  <br/><b>File Name:</br> ".$actual_image_name."<br/><br/>";
						}
						else
							echo "Fail upload folder with read access.";
						*/
					}
					else
						echo "Image file size max 1 MB";					
				}
				else
					echo "Invalid file format..";	
			}
			else
				echo "Please select image..!";
			exit;
		}	
	}
	/*
	** Company save address
	*/
	public function saveAddress()
	{			
		$data = array('address' => $this->input->post('address'));	
		$where = array('id' => $this->session->userdata('emp_id'));				
		$iStatus = $this->My_model->updateRecord('lang_company',$data,$where);
		echo $iStatus;		
	}
	/*
	**  save Company description
	*/
	public function changeDesc()
	{			
		$data = array('company_description' => $this->input->post('company_description'));	
		$where = array('id' => $this->session->userdata('emp_id'));				
		$iStatus = $this->My_model->updateRecord('lang_company',$data,$where);
		echo $iStatus;		
	}
	/*
	** change Company name
	*/
	public function changeCompany()
	{			
		$data = array('company_name' => $this->input->post('company_name'));	
				//die('update');
		$where = array('id' => $this->session->userdata('emp_id'));				
		$iStatus = $this->My_model->updateRecord('lang_company',$data,$where);
		echo $iStatus;		
	}
	/*
	** Company save Mobile number
	*/
	public function saveMobile()
	{			
		$data = array('mobile' => $this->input->post('mobile'));	
		$where = array('id' => $this->session->userdata('emp_id'));				
		$iStatus = $this->My_model->updateRecord('lang_company',$data,$where);
		echo $iStatus;		
	}
	/*
	** save number of emp
	*/
	public function saveEmployee()
	{			
		$data = array('no_emp' => $this->input->post('no_emp'));	
				//die('update');
		$where = array('id' => $this->session->userdata('emp_id'));				
		$iStatus = $this->My_model->updateRecord('lang_company',$data,$where);
		echo $iStatus;		
	}
	public function logout()
	{   			
		$this->session->sess_destroy();
		redirect('LangEmployer','refresh');  
	}
	/*
	**  get fole extension
	*/
	function getExtension($str) 
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; } 
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	/*
	**  compress imafe
	*/
	function compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth)
	{
		if($ext=="jpg" || $ext=="jpeg" )
		{
		$src = imagecreatefromjpeg($uploadedfile);
		}
		else if($ext=="png")
		{
		$src = imagecreatefrompng($uploadedfile);
		}
		else if($ext=="gif")
		{
		$src = imagecreatefromgif($uploadedfile);
		}
		else
		{
		$src = imagecreatefrombmp($uploadedfile);
		}
		list($width,$height)=getimagesize($uploadedfile);
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = $path.$newwidth.'_'.$actual_image_name;
		imagejpeg($tmp,$filename,100);
		imagedestroy($tmp);
		$img_filename = $newwidth.'_'.$actual_image_name;
		return $img_filename;
	}
	/*
	** resume view/download history
	*/
	function resumeHistory()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		$data['history'] = $this->Employer_model->getResumeViewHistory();
		//echo "<pre />"; print_r($data); die();
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/resume_history',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
    function changeplan(){
       if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/changeplan'); 
	    $this->load->view('admin/include/footer');	 
    }
    
    function searchExperts(){
        if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
        
        $data['languages'] = $this->My_model->selectRecord('language', '*', '','');
        
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/searchex', $data); 
	    $this->load->view('admin/include/footer');
    }
    function findExperts(){
        if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh');
        $data['experts'] = $this->Employer_model->return_experts();
        //$this->My_model->printQuery(); die();
        $this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/foundex', $data); 
	    $this->load->view('admin/include/footer');
    }
    function copyJob($jobid){
        if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		$where = array('status' => 1);
		$data['cats'] = $this->My_model->selectRecord('job_category','*',$where,'','');
		$data['langs'] = $this->My_model->selectRecord('language','*',$where,'','');
		$data['skills'] = $this->My_model->selectRecord('job_skills','*',$where,'','');
        $data['job_details'] = $this->My_model->selectRecord('jobs', '*', array('id' => $jobid), '', '');
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/copy_job',$data); 
	    $this->load->view('admin/include/footer');
    }
}