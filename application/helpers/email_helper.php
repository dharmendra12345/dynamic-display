<?php
	if(!function_exists('success_msg'))
	{
		function success_msg($message)
		{  
			$html = '<div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      '.$message.'
                    </div>';
            echo $html;
		}
	}
	
	if(!function_exists('error_msg'))
	{
		function error_msg($message)
		{  
			$html = '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        '.$message.'
                                    </div>';
			echo $html;
		}
	}
	
	if(!function_exists('general_msg'))
	{
		function general_msg($message)
		{  
			$html = '<div class="alert alert-info alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> '.$message.'
                                    </div>';
			echo $html;
		}
	}
	
	if(!function_exists('warning_msg'))
	{
		function warning_msg($message)
		{  
			$html = '<div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> '.$message.'
                                    </div>';
			echo $html;
		}
	}
	

    function is_login()
    {
        $CI =& get_instance();

        $is_logged_in = $CI->session->userdata('userid');
		$email_id = $CI->session->userdata('email');
       
        if (isset($is_logged_in) && ($email_id !='')){ 
           
            redirect(base_url().'dashboard');

        }   
    }
	
	function is_login_admin()
    {
        $CI =& get_instance();

        $is_logged_in = $CI->session->userdata('adminid');
		$email_id = $CI->session->userdata('adminemail');
       
        if (isset($is_logged_in) && ($email_id !='')){ 
           
            redirect(base_url().'administrator/dashboard');

        }   
    }
	
	function checkLogin()
    {
        $CI =& get_instance();

        $is_logged_in = $CI->session->userdata('userid');
		$email_id = $CI->session->userdata('email');
        
        if (!isset($is_logged_in) && (!isset($email_id))){ 
           
            redirect(base_url());

        } 
	}

function checkLogin_admin()
    {
        $CI =& get_instance();

        $is_logged_in = $CI->session->userdata('adminid');
		$email_id = $CI->session->userdata('adminemail');
        
        if (!isset($is_logged_in) && (!isset($email_id))){ 
           
            redirect(base_url().'administrator');

        } 
	}	
	
	function not_login()
    {
        $CI =& get_instance();

        $is_logged_in = $CI->session->userdata('adminid');
		$email_id = $CI->session->userdata('adminemail');
        
        if (!isset($is_logged_in) && (!isset($email_id))){ 
           
            redirect(base_url().'administrator');

        }   
    }
	 function convert_time($date1,$formate)
	{
		$CI =& get_instance();
        $user_tz = $CI->session->userdata('timezone');
		
		if($user_tz ==''){
			$user_tz = date_default_timezone_get();
		}
		if($formate == ''){
		    $formate=='Y-m-d H:i:s';
		}
		
		$date = new DateTime($date1, new DateTimeZone(date_default_timezone_get()));
		
		$date->setTimezone(new DateTimeZone($user_tz));
		return $date->format($formate);
		
	}	

// Set timezone
  date_default_timezone_set("UTC");

  // Time format is UNIX timestamp or
  // PHP strtotime compatible strings
  function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Create temp time from time1 and interval
      $ttime = strtotime('+1 ' . $interval, $time1);
      // Set initial values
      $add = 1;
      $looped = 0;
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
        // Create new temp time from time1 and interval
        $add++;
        $ttime = strtotime("+" . $add . " " . $interval, $time1);
        $looped++;
      }
 
      $time1 = strtotime("+" . $looped . " " . $interval, $time1);
      $diffs[$interval] = $looped;
    }
    
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
        break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
        // Add s if value is not 1
        if ($value != 1) {
          $interval .= "s";
        }
        // Add value and interval to times array
        $times[] = $value . " " . $interval;
        $count++;
      }
    }

    // Return string with times
    return implode(", ", $times);
  }
	
	
	if(!function_exists('socialEmail'))
	{
		function socialEmail($to,$from,$fromname,$subject,$message)
		{   
			
			$obj =& get_instance();
			$obj->load->library('email');
			$obj->email->set_mailtype("html");
			$obj->email->from($from,$fromname);
			$obj->email->to($to);
			$obj->email->subject($subject);
			$obj->email->message($message);
			if(!$obj->email->send()){ 
			  return false;
			}else{ 
			  return true;
			}
		}
	}

?>