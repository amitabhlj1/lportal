<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
//    public function __construct()
//	{
//		parent::__construct();
//		$this->load->library('session');
//        $this->load->library('email');
//		$this->load->helper(array('form', 'url'));
//		$this->load->model('My_model');	
//		$this->load->model('Employer_model');	
//		$this->load->model('LanguageExpert_model');		
//	}
    public function index()
	{
        /*
        //real code for email using aws ses mail
        $config['protocol'] = 'smtp';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['smtp_host'] = "tls://email-smtp.us-east-1.amazonaws.com"; // eg. tls://email-smtp.eu-west-1.amazonaws.com
        $config['smtp_user'] = "AKIAIOJTHBVQVH6TWPKQ";
        $config['smtp_pass'] = "AkrowXorCgcGBIpkfOR/l96OrhGzZQIVhJwgNUZrN4Ym";
        $config['smtp_port'] = "465";
        $config['smtp_timeout'] = "20";
        $config['crlf'] = "\r\n";
        $config['mailsender'] = "admin@langjobs.com";
        
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        //Email content
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        $this->email->to('rajnish.kumar@langecole.com');
        $this->email->from('admin@langjobs.com','LangJobs.com');
        $this->email->subject('Email Successful');
        $this->email->message($htmlContent);

        //Send email
        $this->email->send();
        */
        header("Location:".base_url('LangExpert'));
	}
}
