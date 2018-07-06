<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
**   global constants 
*/

// admin user types
$config['adminusertype'] = array('1' => 'super admin','2' => 'center admin','3' => 'teacher','4' => 'operator');

// Resume Plans
$config['rplans'] = array('0' => 'Free','1' => 'Silver','2' => 'Gold','3' => 'Diamond');


// Resumes to view/download
// 0 -> free -> 10, 1 -> silver -> 25, 2 -> gold -> 50, 3 -> diamond -> 100  
$config['rplan_cv'] = array('0' => '10','1' => '25','2' => '50','3' => '100');

// Plan pricing in $ dollar  
$config['rplan_price'] = array('0' => '','1' => '50','2' => '100','3' => '150');


//project based / freelanc job units
$config['job_units'] = array('1' => 'words','2' => 'minute','3' => 'hour','4' => 'day','5' => 'week'
							,'6' => 'month','7' => 'fixed');

// job experience
$config['job_exp'] = array('0' => 'Fresher','1' => '1 to 2 Years','2' => '2 to 4 years','3' => '4 to 6 years','4' => '6 to 8 years','5' => ' > 8 Years', '6'=>'Not Neccessary');

?>