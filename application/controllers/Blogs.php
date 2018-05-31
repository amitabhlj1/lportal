<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('My_model');	
		$this->load->model('LanguageExpert_model');		
	}
	public function index()
	{
        $title['title_of_page'] = "Blogs at Langjobs.com";
        $title['description'] = "This page showcases language ability of our Language Experts.";
        $title['keywords'] ="Blogs, articles, Languages, Language Jobs, Language Expert";
        //$data['blogs'] = $this->My_model->selectRecord('blog_articles', '*', array('status' => 1));
        $data['blogs'] = $this->LanguageExpert_model->fetch_blog();
        
        $this->load->view('include/header', $title);
		$this->load->view('public_blogs', $data);
        $this->load->view('include/footer');
	}
    public function write(){
        if( !$this->session->userdata('exp_id') )
			redirect('LangExpert','refresh');
        $title['title_of_page'] = "Write Blog";
        $title['description'] = "Language experts can write blog";
        $title['keywords'] ="Blog, Article, Views";
        $data['type'] = $this->My_model->selectRecord('blog_types', '*', '', '');
        $this->load->view('include/header', $title);
		$this->load->view('lang_expert/write_blogs', $data);
        $this->load->view('include/footer');
    }
    public function save_article(){
        $aAdd = array( 	
			'keywords' => $this->input->post('keywords'),
            'topic' => $this->input->post('topic'),
            'article' => $this->input->post('article'),
            'type' => implode(',', $this->input->post('type')),
            'written_by' => $this->session->userdata('exp_id'),
            'created' => date("Y-m-d")
			);
        if(is_array($_FILES))
		{
			//echo "INNN";
			$target_dir = FCPATH."assets/uploads/blog/"; 	

			if(is_uploaded_file($_FILES['image']['tmp_name']))
			{							
				$sourcePath = $_FILES['image']['tmp_name'];
				$fileName   =  	rand(1000,100000)."_".basename($_FILES["image"]["name"]);

				$fileName   = strtolower($fileName);
				$targetPath = $target_dir.$fileName;
				
				$imageFileType = pathinfo($targetPath,PATHINFO_EXTENSION);

								
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
				{
                    echo "<script>
                    alert('Please select an image file'); 
                    window.location.href = '".base_url('Blogs/write')."';
                    </script>";
                    //redirect('Blogs/write');                      
				}
				if ($_FILES["image"]["size"] > 5242880)   // 5 MB
				{
                    echo "<script>
                    alert('File too large, upload file < 5MB'); 
                    window.location.href = '".base_url('Blogs/write')."';
                    </script>";
                    //redirect('Blogs/write');
				}
				if(move_uploaded_file($sourcePath,$targetPath))
				{
					$aAdd['image'] = $fileName;																
				}					
				else{
                    echo "<script>
                    alert('Some error occured in uploading the file, try again later'); 
                    window.location.href = '".base_url('Blogs/write')."';
                    </script>";
                    redirect('Blogs/write');
                }
			}
		}
        $iRec = $this->My_model->insertRecord('blog_articles',$aAdd);
		
		redirect("Blogs/all_blog");
    }
    public function all_blog(){
        if( !$this->session->userdata('exp_id') )
			redirect('LangExpert','refresh');
        
        $title['title_of_page'] = "All Blogs Written By You";
        $title['description'] = "Language experts can write blog";
        $title['keywords'] ="Blog, Article, Views";
        
        $data['type'] = $this->My_model->selectRecord('blog_types', '*', '', '');
        $data['blogs'] = $this->My_model->selectRecord('blog_articles', '*', array('written_by' => $this->session->userdata('exp_id')), array('criteria' => 'created', 'order' => 'desc'));
        
        $this->load->view('include/header', $title);
		$this->load->view('lang_expert/all_blogs', $data);
        $this->load->view('include/footer');
    }
    public function edit($bid){        
        if( !$this->session->userdata('exp_id') )
			redirect('LangExpert','refresh');
        $title['title_of_page'] = "Write Blog";
        $title['description'] = "Language experts can write blog";
        $title['keywords'] ="Blog, Article, Views";
        $data['type'] = $this->My_model->selectRecord('blog_types', '*', '', '');
        $data['this_blog'] = $this->My_model->selectRecord('blog_articles', '*', array('id' => $bid));
        $this->load->view('include/header', $title);
		$this->load->view('lang_expert/edit_blogs', $data);
        $this->load->view('include/footer');      
    }
    public function update_article(){
        if( !$this->session->userdata('exp_id') )
			redirect('LangExpert','refresh');
        $id = $this->input->post('id');
        $aAdd = array( 	
			'keywords' => $this->input->post('keywords'),
            'topic' => $this->input->post('topic'),
            'article' => $this->input->post('article'),
            'type' => implode(',', $this->input->post('type')),
			);
        if(is_array($_FILES))
		{
			//echo "INNN";
			$target_dir = FCPATH."assets/uploads/blog/"; 	

			if(is_uploaded_file($_FILES['image']['tmp_name']))
			{							
				$sourcePath = $_FILES['image']['tmp_name'];
				$fileName   =  	rand(1000,100000)."_".basename($_FILES["image"]["name"]);

				$fileName   = strtolower($fileName);
				$targetPath = $target_dir.$fileName;
				
				$imageFileType = pathinfo($targetPath,PATHINFO_EXTENSION);

								
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
				{
                    echo "<script>
                    alert('Please select an image file'); 
                    window.location.href = '".base_url('Blogs/edit/$id')."';
                    </script>";
                    //redirect('Blogs/write');                      
				}
				if ($_FILES["image"]["size"] > 5242880)   // 5 MB
				{
                    echo "<script>
                    alert('File too large, upload file < 5MB'); 
                    window.location.href = '".base_url('Blogs/write/$id')."';
                    </script>";
                    //redirect('Blogs/write');
				}
				if(move_uploaded_file($sourcePath,$targetPath))
				{
					$aAdd['image'] = $fileName;																
				}					
				else{
                    echo "<script>
                    alert('Some error occured in uploading the file, try again later'); 
                    window.location.href = '".base_url('Blogs/write/$id')."';
                    </script>";
                    redirect('Blogs/write');
                }
			}
		}
        $updt = $this->My_model->updateRecord('blog_articles', $aAdd, array('id' => $id));
        if($updt == '1' || $updt == '0'){
            echo "<script>
                    alert('Blog updated!'); 
                    window.location.href = '".base_url('Blogs/all_blog')."';
                </script>";
        } else {
            echo "<script>alert('Something went wrong, Please try again later!');</script>";
        }
    }
    public function view($id){
        $bid = explode('-', $id)[0];
        $data['blogs'] = $this->LanguageExpert_model->fetch_blog($bid);
        $this->My_model->printQuery(); die();
    }
}