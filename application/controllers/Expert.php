<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expert extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');		
	}
    //Retrieving profile data
	public function index()
	{
        if(!$this->session->userdata('exp_id') )
			redirect('LangExpert','refresh');
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $where = array('id' => $this->session->userdata('exp_id'));
        $data['usr'] = $this->My_model->selectRecord('lang_expert', '*', $where);
        //To get the name of country
        $whr2 = array(
            'id' => $data['usr'][0]->country 
        );
        $data['country'] = $this->My_model->selectRecord('country', '*', $whr2);
        //to get the name of state
        $whr3 = array(
            'id' => $data['usr'][0]->state
        );
        $data['state'] = $this->My_model->selectRecord('states', '*', $whr3);
        //to get the name of city
        $whr4 = array(
            'id' => $data['usr'][0]->city
        );
        $data['city'] = $this->My_model->selectRecord('cities', '*', $whr4);
        //to get the education feild of language experts
        $whr5 = array(
            'exp_id' => $this->session->userdata('exp_id')
        );
        $data['education'] = $this->My_model->selectRecord('lang_expert_ed', '*', $whr5);
        $data['work_history'] = $this->My_model->selectRecord('lang_expert_wh', '*', $whr5);
        $this->load->view('include/header', $title);
		$this->load->view('lang_expert/profile', $data);
        $this->load->view('include/footer');
	}
    //to logout the language expert
    public function logout()
	{   			
		$this->session->sess_destroy();
		redirect('home','refresh');  
	}
    //To be used with ajax to return states while editing the form
    public function return_states(){
        $s = $this->input->post('country');
        $where = array('c_id' => $s);
        $state = $this->My_model->selectRecord('states', '*', $where);
        echo "<select class='form-control' name='state' onchange='show_cities(this.value)'>";
        foreach($state as $st){
            echo "<option value='$st->id'>$st->name</option>";
        }
        echo "</select>";
    }
    //To be used with ajax to return cities while editing the form
    public function return_cities(){
        $s = $this->input->post('state');
        $where = array('s_id' => $s);
        $cities = $this->My_model->selectRecord('cities', '*', $where);
        echo "<select class='form-control' name='cities'>";
        foreach($cities as $ct){
            echo "<option value='$ct->id'>$ct->name</option>";
        }
        echo "</select>";
    }
    //Delete work history
    public function del_whistory(){
        $where = array('id' => $this->input->post('id'));
        echo $del_wh = $this->My_model->deleteRecordPerm('lang_expert_wh', $where);
    }
    //Update work history
    public function update_wh(){
        $where = array('id' => $this->input->post('id'));
        $update_data = array(
            'designation' => $this->input->post('designation'),
            'company_name' => $this->input->post('company_name'),
            'y_from' => $this->input->post('y_from'),
            'y_to'  => $this->input->post('y_to'),
            'work_description'  => $this->input->post('work_description')
        );
        $updt = $this->My_model->updateRecord('lang_expert_wh', $update_data, $where);
        if($updt == '1' || $updt == '0'){
            echo "<script>
                    alert('Work details updated!'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
        } else {
            echo "<script>alert('Something went wrong, Please try again later!');</script>";
        }
    }
    //create new work history
    public function add_wh(){
        $wh_arr = array(
            'exp_id' =>$this->session->userdata('exp_id'), 
            'designation' => $this->input->post('designation'),
            'company_name' => $this->input->post('company_name'),
            'y_from' => $this->input->post('y_from'),
            'y_to' => $this->input->post('y_to'),
            'work_description' => $this->input->post('work_description')
        );
        echo $ins = $this->My_model->insertRecord('lang_expert_wh', $wh_arr);
        redirect('/expert');
    }
    //update education details
    public function update_edu(){
        $whr = array('id' => $this->input->post('id'));
        $ed_arr = array(
            'exam_name' => $this->input->post('exam_name'),
            'college_name' => $this->input->post('college_name'),
            'p_year' => $this->input->post('p_year'),
            'marks' => $this->input->post('marks'),
            'remarks' => $this->input->post('remarks'),
        );
        $updt = $this->My_model->updateRecord('lang_expert_ed', $ed_arr, $whr);
        if($updt == '1' || $updt == '0'){
            echo "<script>
                    alert('Education details updated!'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
        } else {
            echo $updt; die();
        }
    }
    //add new entry in education feild
    public function add_edu(){
        $edu_arr = array(
            'exp_id' =>$this->session->userdata('exp_id'), 
            'exam_name' => $this->input->post('exam_name'),
            'college_name' => $this->input->post('college_name'),
            'p_year' => $this->input->post('p_year'),
            'marks' => $this->input->post('marks'),
            'remarks' => $this->input->post('remarks'),
        );
        $ins = $this->My_model->insertRecord('lang_expert_ed', $edu_arr);
        if($ins){
            echo "<script>
                    alert('New Education detail added'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
        } else {
            echo $ins; die();
        }
    }
    //Delete Education History
    public function delete_edu(){
        $where = array('id' => $this->input->post('id'));
        echo $del_ed = $this->My_model->deleteRecordPerm('lang_expert_ed', $where);
    }
    //Update/edit profile details
    public function edit_basic_detail(){
       $states =""; $cities ="";
        if($this->input->post('state')){
            $states = $this->input->post('state');
        } else {
            $states = null;
        }
        
        if($this->input->post('city')){
            $cities = $this->input->post('city');
        } else {
            $cities = null;
        }
        $where = array('id' =>$this->session->userdata('exp_id'));
        $insert_val = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'profile_name' => $this->input->post('profile_name'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'mobile' => $this->input->post('mobile'),
            'about_me' => $this->input->post('about_me'),
            'country' => $this->input->post('country'),
            'state' => $states,
            'city' => $cities,
            'total_exp' => $this->input->post('total_exp'),
            'fid' => $this->input->post('fid'),
            'tid' => $this->input->post('tid'),
            'qid' => $this->input->post('qid'),
            'lid' => $this->input->post('lid'),
            'skills' => $this->input->post('skills')
        );
        //var_dump($this->input->post('state'));
        $updt = $this->My_model->updateRecord('lang_expert', $insert_val, $where);
        if($updt == '1' || $updt == '0'){
            echo "<script>
                    alert('Profile details updated!'); 
                    window.location.href = '".base_url('expert')."';
                </script>";
        } else {
            echo $updt; die();
        }
    }
    //Code to upload and compress profile image using ajax
    function upload_profile_image()
    {	
        //echo FCPATH ; die();
        $empPath = 'assets/uploads/experts/';
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

                        $widthArray = array(200);
                        foreach($widthArray as $newwidth)
                        {
                            $filename=$this->compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth);
                            // add file to database
                            $where   = array('id' => $this->session->userdata('exp_id'));
//                            if($newwidth == 50)
//                                $data    = array('thumb_logo' => $filename);
//                            else
                            $data    = array('image' => $filename);
                            $bStatus = $this->My_model->updateRecord('lang_expert',$data,$where);
                        }	
                        ?>
                        <img src="<?php echo base_url().$empPath.$filename; ?>" class="img-responsive"> <br/>
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
