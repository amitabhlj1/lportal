<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchJob extends CI_Controller
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
        $title['title_of_page'] = "Search Language Projects And Jobs at LangJobs.com";
        $title['description'] = "We have collected a large list of jobs and projects for language experts, find your favourite job and just go for it.";
        $title['keywords'] ="Language jobs, Language Projects, Langjobs.com, search and apply, Language profession";
        $common_where = array('status' => '1');
        $data['lang'] = $this->My_model->selectRecord('language', '*', $common_where);
        $data['sectors'] = $this->My_model->selectRecord('job_category', '*', $common_where);
        $data['city'] = $this->My_model->selectRecord('cities', '*', '');
        //These value are supposed to be blank, do not enter anything..
        $data['jobs']="";
        $data['input_by_user']['language'] = "";
        $data['input_by_user']['sector'] = "";
        $data['input_by_user']['keywords'] = "";
        $data['input_by_user']['locationCombo'] = "";
        $data['input_by_user']['experience'] = "";
        
        $this->load->view('include/header', $title);
		$this->load->view('search_job', $data);
        $this->load->view('include/footer');
	}
    public function retrieve_jobs(){
        $data['jobs'] = $this->LanguageExpert_model->searchResult();
        $data['input_by_user'] = $this->input->post();
		$title['title_of_page'] = "Found Results | LangJobs.com's Job & Projects";
        $title['description'] = "Results Found after your Specifications";
        $title['keywords'] ="Found Jobs and Projects at LangJobs.com";
        $common_where = array('status' => '1');
        $data['lang'] = $this->My_model->selectRecord('language', '*', $common_where);
        $data['sectors'] = $this->My_model->selectRecord('job_category', '*', $common_where);
        $data['city'] = $this->My_model->selectRecord('cities', '*', '');
        $this->load->view('include/header', $title);
		$this->load->view('search_job', $data);
        $this->load->view('include/footer');
        
    }
    public function jobdesc($jid){
        $where = array('id' => $jid, 'status' => '1');
        $data['jobs'] = $this->My_model->selectRecord('jobs', '*', $where);
        // $this->My_model->printQuery(); die();
        //retrieving company_id and putting it into where clause
        $cwhere = array('id' => $data['jobs'][0]->company_id);
        $data['company_details'] = $this->My_model->selectRecord('lang_company', '*', $cwhere);
        $title['title_of_page'] = htmlspecialchars($data['jobs'][0]->title)." | Language Jobs at LangJobs.com";
        $title['description'] = htmlspecialchars($data['jobs'][0]->description);
        $title['keywords'] =htmlspecialchars($data['jobs'][0]->job_keywords).", Language Projects/ Jobs at LangJobs.com";
        $this->load->view('include/header', $title);
		$this->load->view('job_desc', $data);
        $this->load->view('include/footer');
    }
    public function indeed(){
        $all_jobs = $this->LanguageExpert_model->searchResult();
        $xmlstr = "<?xml version='1.0' encoding='UTF-8' ?><source><publisher>LangJobs.com</publisher><publisherurl>http://www.langjobs.com</publisherurl><lastBuildDate>".gmdate(DATE_RFC822)."</lastBuildDate></source>";
        $source = new SimpleXMLElementExtended($xmlstr);
        foreach($all_jobs as $j){
            $country = explode(',',$j->address);
            $exp = "0 Years";
            if($j->total_exp){
                $exp = $this->config->config['job_exp'][$j->total_exp];
            }
            $job = $source->addChild('job');
            $job->addChildWithCDATA('title', $j->title);
            $job->addChildWithCDATA('date', $j->created);
            $job->addChildWithCDATA('referencenumber', $j->id);
            $job->addChildWithCDATA('url', base_url()."SearchJob/jobdesc/".$j->id);
            $job->addChildWithCDATA('company', $j->company_name);
            $job->addChildWithCDATA('country', end($country));
            $job->addChildWithCDATA('description', strip_tags($j->description));
            $job->addChildWithCDATA('experience', $exp);
        }        
        Header('Content-type: text/xml');
        print($source->asXML());
    }
}

Class SimpleXMLElementExtended extends SimpleXMLElement {
/* 
 *     Adds a child with $value inside CDATA 
 */ 
	public function addChildWithCDATA($name, $value = NULL) { 
		$new_child = $this->addChild($name); 
		if ($new_child !== NULL) { 
		$node = dom_import_simplexml($new_child);
		$no=$node->ownerDocument; $node->appendChild($no->createCDATASection($value)); 
	} 
	return $new_child; 
	} 	
}