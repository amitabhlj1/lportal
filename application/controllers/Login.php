<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function index()
	{
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        $title['login'] = 1;
        $this->load->view('include/header', $title);
		$this->load->view('login');
        $this->load->view('include/footer');
	}
}
