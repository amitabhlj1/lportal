<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer extends CI_Controller
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
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		
		//echo "<pre />"; print_r($this->session->userdata());
		$iLimit = 5;
		$aOrder = array('criteria' => 'created', 'order' => 'desc' );
		$where = array('company_id' => $this->session->userdata('emp_id'));
		$data['jobs'] = $this->My_model->selectRecord('jobs','*',$where,$aOrder,$iLimit);
		//echo "<pre />"; print_r($data); 
		//die();
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/dashboard',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function jobs()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
	
		$iLimit = 5;
		$aOrder = array('criteria' => 'created', 'order' => 'desc' );
		$where = array('company_id' => $this->session->userdata('emp_id'));
		
		$data['jobs'] = $this->My_model->selectRecord('jobs','*',$where,$aOrder,$iLimit);
		
		echo "<pre />"; print_r($data); 
		die();
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
		
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/add_job',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function profile()
	{	
		if( !$this->session->userdata('emp_id') )
			redirect('ado/Employer/logout','refresh'); 
		
		//echo "<pre />"; print_r($this->session->userdata());
		$where = array('id' => $this->session->userdata('emp_id'));
		$data['profile']    = $this->My_model->selectRecord('lang_company','*',$where,'','');
		
		//echo "<pre />"; print_r($data); 
		//die();
		$this->load->view('admin/include/emp_header'); 
		$this->load->view('admin/employer/profile',$data); 
	    $this->load->view('admin/include/footer');		 	
	}
	
	function changeLogo()
	{	
		//echo FCPATH ; die();
		//echo FCPATH ."  KKKKK" ;
		$empPath = 'assets/uploads/employer/';
		$path =  FCPATH.$empPath;
		 //"""F:/xampp/htdocs/upload_ci/assets/tmp/";
		$actual_image_name="";
		$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			//include_once 'includes/getExtension.php';
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
				//die('update');
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
}