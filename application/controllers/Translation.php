<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Translation extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url')); 
		$this->load->model('My_model');	
		//$this->load->model('LanguageExpert_model');
		//$this->load->model('Employer_model');	
	}
    
	public function index()
	{
        $title['title_of_page'] = "";
        $title['description'] = "";
        $title['keywords'] ="";
        
		$where = array('status' => 1);
		$data['langs'] = $this->My_model->selectRecord('language','*',$where,'','');
		
		$this->load->view('include/header', $title);
		$this->load->view('free_trans',$data);
        $this->load->view('include/footer');
	}
	
	public function goTranslation()
	{
		$apiKey = 'AIzaSyCw0vYwkCXM__akCo0NX8umjjyBx6GLfBo';
		
		$source = $this->input->post('flng');
		$target = $this->input->post('tlng');
		$text = $this->input->post('l_text'); 
		$url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source='.$source.'&target='.$target;

		$handle = curl_init($url);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($handle);                 
		$responseDecoded = json_decode($response, true);
		curl_close($handle);

		//echo 'Source: ' . $text . '<br>';
		echo $responseDecoded['data']['translations'][0]['translatedText'];
		
	}
	
	// bing translation
	public function bingTranslation()
	{
		$key = '5fc91bb2d7a14188bb3f0148e79a759b';
		
		$source = $this->input->post('flng');
		$target = $this->input->post('tlng');
		
		$text = $this->input->post('l_text');
		
		
		$host = "https://api.cognitive.microsofttranslator.com";
		$path = "/translate?api-version=3.0";
		
		// Translate to German and Italian.
		//$params = "&to=de&to=it";
		$params = '&to='.$target;
	
		if (!function_exists('com_create_guid'))
		{
			  function com_create_guid()
			  {
				return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
					mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
					mt_rand( 0, 0xffff ),
					mt_rand( 0, 0x0fff ) | 0x4000,
					mt_rand( 0, 0x3fff ) | 0x8000,
					mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
				);
			  }
		}
		
		$requestBody = array (
			array (
				'Text' => $text,
			),
		);
		$content = json_encode($requestBody);
		$result = $this->langTranslate($host, $path, $key, $params, $content);
		// Note: We convert result, which is JSON, to and from an object so we can pretty-print it.
		// We want to avoid escaping any Unicode characters that result contains. See:
		// http://php.net/manual/en/function.json-encode.php
		
		//$aTranslate = json_encode(json_decode($result), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		
		$aTranslate = json_decode($result,true);
		//echo "<pre />"; print_r($aTranslate);
		
		$finalTranslation = $aTranslate[0]['translations'][0]['text'];
		
		//echo 'Originali: ' . $text . '<br>';
		echo $finalTranslation;
		
	}
	
	public function langTranslate($host, $path, $key, $params, $content)
	{
		$headers = "Content-type: application/json\r\n" .
			"Content-length: " . strlen($content) . "\r\n" .
			"Ocp-Apim-Subscription-Key: $key\r\n" .
			"X-ClientTraceId: " . com_create_guid() . "\r\n";
		// NOTE: Use the key 'http' even if you are making an HTTPS request. See:
		// http://php.net/manual/en/function.stream-context-create.php
		$options = array (
			'http' => array (
				'header' => $headers,
				'method' => 'POST',
				'content' => $content
			)
		);
		$context  = stream_context_create ($options);
		$result = file_get_contents ($host . $path . $params, false, $context);
		return $result;
	}
	
}
