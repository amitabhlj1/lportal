<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expert extends CI_Controller
{
    
	public function index()
	{
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $this->load->view('include/header', $title);
		$this->load->view('lang_expert/profile');
        $this->load->view('include/footer');
	}
}
