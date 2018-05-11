<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
**   global constants 
*/

// admin user types
$config['adminusertype'] = array('1' => 'super admin','2' => 'center admin','3' => 'teacher','4' => 'operator');

// Resume Plans
$config['rplans'] = array('0' => 'Free','1' => 'Silver','2' => 'Gold','3' => 'Diamond');


//project based / freelanc job units
$config['job_units'] = array('1' => 'words','2' => 'minute','3' => 'hour','4' => 'day','5' => 'week'
							,'6' => 'month','7' => 'fixed');

// job experience
$config['job_exp'] = array('0' => 'Fresher','1' => '1 to 2 Years','2' => '2 to 4 years','3' => '4 to 6 years','4' => '6 to 8 years','5' => ' > 8 Years');

?>