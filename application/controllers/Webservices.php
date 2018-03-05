<?php
defined("BASEPATH") OR exit("path not defined");

class Webservices extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Webservice');
		$this->load->model('Common_model');
		//date_default_timezone_set('Asia/Calcutta');
        date_default_timezone_set('UTC');

	}
	/*
	 * Defult action
	 */
	function index(){
	  echo "Provide proper URL!";
	}
	/**
	 * View Poll Services
	 */
	
   function poll_service(){

 
          date_default_timezone_set('UTC');
		  $end_date_time12                            =    date('Y-m-d H:i:s');
		  date_default_timezone_set('UTC');
          $end_date = date('Y-m-d');
		 
		  $end_time = date('h:i:s');
		 
          $this->db->select('schedule_id');
		  $this->db->where('schedule_type', 0);
		  $default_id = $this->db->get('device_schedule');
		  if($default_id->num_rows()>0){
			    $default = $default_id->result_array();
			    $default_id = $default[0]['schedule_id'];
		  }else{
			   $default_id = "";
		  }
		 
		 //update download status
		 
		 $download		                  =	    $this->input->get_post('download');
		 $download_details                =     json_decode($download);		 
		 $user_id=$this->input->get_post('device_id');		 
		 if($download_details){
			  foreach($download_details as $download_details1){
			  $array1 = array(
				   'file_status' => $download_details1->file_status,
				 );
	    		  
		//$this->Common_model->updateData(' device_download_status',$array1,array('download_file_id' => $download_details1->download_file_id));
		
				}
			}
			
		  //   Get schedule id	
		  
          $schedule_id		               =	trim($this->input->get_post('id'));
		  $schedule_array_id               =    explode(",",$schedule_id);
		  $date                            =    date('Y-m-d H:i:s');
		  
		  
		  $response = array();
		  $new_schedule_id    = '';
		  
		  
		  if(empty($schedule_id)){
		     $this->db->select('schedule_id');
			 $this->db->where_not_in('schedule_id', $schedule_array_id);
			 $schedule1 = $this->db->get('schedule');
			 $result1 = $schedule1->result_array();
			 $last_names1 = array_column($result1, 'schedule_id');
		     $data4 = array(
               'internal_sch_type' => 1
             );
			 $data5 = array(
               'internal_sch_type' => 0
             );
			 if($result1){
			 $this->db->where_in('schedule_id', $last_names1);
		     $this->db->update('schedule', $data4);
			 $this->db->where('schedule_id', $default_id);
		     $this->db->update('schedule', $data5);
			 }
		  }
		  
		  
		  if(!empty($schedule_id)){
		  
		    $this->db->select('schedule_id');
		    $this->db->where_in('schedule_id', $schedule_array_id);
		    $this->db->where('device_schedule_update>=last_call_date');
			$this->db->where('device_id', $user_id);
		    $schedule = $this->db->get('device_schedule');
		    $result = $schedule->result_array();
			$last_names = array_column($result, 'schedule_id');
		    $new_schedule_id=array_diff($schedule_array_id,$last_names);
			
			
			$new_schedule_id12 = $new_schedule_id;
			
			
			 $data1 = array(
               'internal_sch_type' => 1
             );
			  $data2 = array(
               'internal_sch_type' => 2
             );
			  $data3 = array(
               'internal_sch_type' => 0
             );
			 
		   if(!empty($new_schedule_id)){
		   $this->db->where_in('schedule_id', $new_schedule_id);
		   $this->db->update('schedule', $data1); 
		   }
		  
		  if(!empty($last_names)){
		  $this->db->where_in('schedule_id', $last_names);
		  $this->db->update('schedule', $data2);
		  }
		  if(empty($last_names)){

		     $this->db->select('schedule_id');
			 $schedule2 = $this->db->get('schedule');
			 $result2 = $schedule2->result_array();
			 $last_names2 = array_column($result2, 'schedule_id');

		    $data5 = array(
               'internal_sch_type' => 1
             );
			 $data6 = array(
               'internal_sch_type' => 0
             );
			 $this->db->where_in('schedule_id', $last_names2);
		     $this->db->update('schedule', $data5);
			  
			 $this->db->where('schedule_id', $default_id);
		     $this->db->update('schedule', $data6);
		  }
		  
		  $this->db->where('schedule_id', $default_id);
		  $this->db->update('schedule', $data3);
			
			if(empty($new_schedule_id)){
			  $new_schedule_id    = '';
			}	
		  }

          //echo $end_date_time12;die;
		  $section = array();
		  $this->db->select('schedule.*,device_schedule.device_id,device_schedule.schedule_type');
		  $this->db->join('device_schedule', 'schedule.schedule_id =  device_schedule.schedule_id','left');
		  
		  //if(!empty($user_id)){
		  
		  $this->db->where('device_schedule.device_id', $user_id);
		  $this->db->where('device_schedule.device_id!=', '');
		  
		  $this->db->where('schedule.schedule_end_datetime>=', $end_date_time12);
		  //$this->db->where('schedule.schedule_end_time>=', $end_time);
		  
		 // }
		  
		  if(!empty($schedule_id)){
		     if(empty($new_schedule_id)){
				$this->db->where_not_in('schedule.schedule_id', $new_schedule_id);
		     }else {
		       $this->db->where_not_in('schedule.schedule_id', $new_schedule_id);
		     }
		  }else{
		    //$this->db->where('schedule_type', "default");
		  }	 
		   $this->db->where('device_schedule.schedule_type!=', 0);
		   $schedule = $this->db->get('schedule');
		  
		   //print_r("<pre/>");
		   //print_r($schedule->result_array());
		   //die;
			 
		  $this->db->select('schedule.*,device_schedule.device_id,device_schedule.schedule_type');
		  $this->db->join('device_schedule', 'schedule.schedule_id =  device_schedule.schedule_id','left');
		  
		  
		  $this->db->where('device_schedule.device_id', $user_id);
		  $this->db->where('device_schedule.device_id!=', '');
		  //$this->db->where('schedule.schedule_end_date<=', $end_date);
		  
		  if(!empty($schedule_id)){
		     if(empty($new_schedule_id)){
				$this->db->where_not_in('schedule.schedule_id', $new_schedule_id);
		     }else {
		       $this->db->where_not_in('schedule.schedule_id', $new_schedule_id);
		     }
		  }else{
		    //$this->db->where('schedule_type', "default");
		  }
		  $this->db->where('device_schedule.schedule_type', 0);	
		  $schedule1 = $this->db->get('schedule'); 
		  
		     $i=0;
			 $j=0;
			 $k=0;
			 
			 $version_count  = $schedule->num_rows();
			 
			 //echo $schedule->num_rows();die();
			// print_r($schedule->num_rows());die;
			 
			 
			 if($schedule1->num_rows()>0){
			    foreach ( $schedule1->result_array() as $row ){
				
				      $sections = $this->getScheduleSection_device($row['schedule_id'],$user_id);
					  $download = $this->getSchedule($row['schedule_id']);
					  
					  
				      $response['default'][] = array(
							 'id' => $row['schedule_id'],
							 'repeat_schedule' => $row['repeat_schedule'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'start_date' => $row['schedule_start_date'],
							 'end_date' => $row['schedule_end_date'],
							 //'destroy_time'  =>$row['schedule_create'],
							// 'destroy'       =>$row['destroy'],
							 'brightness'       =>$row['brightness'],
							 //'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections,
							 'download'  =>$download
						   );
				}
			 }else {
			   $response['default'] = array(
						        );
			 }
			 // print_r("<pre/>");
			 //print_r($schedule->result_array());
			 //die;
			 
			 if($schedule->num_rows()>0){
			 
			
			
		     foreach ( $schedule->result_array() as $row ){
			      $sections = $this->getScheduleSection_device($row['schedule_id'],$user_id);
				  
				  $download = $this->getSchedule($row['schedule_id']);
				  
				  
				           
						   
						   if($row['schedule_type'] == 1){
						      $j = $j+1;
						     /* if($i==0){
						        $response['default'] = array(
						        );
							   }*/	
						     $response['new command'][] = array(
							 'id' => $row['schedule_id'],
							 'repeat_schedule' => $row['repeat_schedule'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'start_date' => $row['schedule_start_date'],
							 'end_date' => $row['schedule_end_date'],
							 
							 //'destroy_time'  =>$row['schedule_create'],
							 //'destroy'       =>$row['destroy'],
							 'brightness'       =>$row['brightness'],
							 //'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections,
							 
							 'download'  =>$download
						   );
						   }elseif($row['schedule_type'] == 2){
						   
						      $k = $k+1;
						     $response['update'][] = array(
							 'id' => $row['schedule_id'],
							 'repeat_schedule' => $row['repeat_schedule'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'start_date' => $row['schedule_start_date'],
							 'end_date' => $row['schedule_end_date'],
							// 'destroy_time'  =>$row['schedule_create'],
							// 'destroy'       =>$row['destroy'],
							 'brightness'       =>$row['brightness'],
							 //'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections,
							 'download'  =>$download
						   );
						   
						   }
						  
						    //if($i==0){
							 // $response['default'] = array(
						        //);
							 //}	
							 if($j==0){	
							  $response['new command'] = array(
						        );
							 }	
							 if($k==0){	
								$response['update'] = array(
						      );
							 }
						     /*$response['delete'] = array(
						    );*/
							 //$response['download'] = array(
						    //);
							
	     }
		 }else{
		   //$response['default'] = array(
						       // );
		    $response['new command'] = array(
						        );		
								
			$response['update'] = array(
						      );	
							  /*$response['delete'] = array(
						    );*/								
		   
		 }
		 
		if(!empty($schedule_id)){
		 $data = array(
               'last_call_date' => date('y-m-d H:i:s')
          );
		 $this->db->where_in('schedule_id', $schedule_array_id);
		 $this->db->where('device_id', $user_id);
         $this->db->update('device_schedule', $data); 
		 

		 }
	 	
     $this->db->select("*");
	 $this->db->where('device_id', $user_id);
	 $this->db->where('status', 1);
	 $query = $this->db->get('non_schedule_download');
	 $result = $query->result_array();
	 
	 foreach($query->result_array() as $row){
	    $response['non_schedule_download'][] = array(
		
				'file_url' => $row['file_url'],
				'download_file_id' => $row['id'],
				'file_name' => $row['file_name'],
				'file_folder_name' => $row['file_folder_name'],
		 );
	 }
	 if(empty($result)){
	    $response['non_schedule_download'] = array();
	 }

     $table_noti = "notification";
	 $this->db->select("*");
	 $this->db->where('device_id', $user_id);
	 $this->db->order_by("id", "desc");
	  $this->db->limit(1);
	 $query = $this->db->get($table_noti);
	 foreach ( $query->result_array() as $row ){
		  $response['type_id']     = $row['type_id'];	
		  $response['folder_name1']     = $row['folder_name'];
	 }
	 $deletData = $this->Common_model->delete('notification',array('device_id'=>$user_id));

	 if($user_id){
	    $this->db->select("*");
	    $this->db->where('device_id', $user_id);
	    $query = $this->db->get('devices');
	    $num_rows = $query->num_rows();
		if($num_rows ==0){
		   $response['status']	        =	0;
	       $response['message'] = "INVALID DEVICE ID";
		}
		elseif($num_rows>0){
		
		     $exist_schedule_id		                 =	trim($this->input->get_post('id'));
			 $exist_schedule_array                   =  explode(",",$exist_schedule_id);
			 
			 $response['status']	        =	1;
			
			 
			 //if($exist_schedule_id){
				 if($this->Webservice->checkSchedule($user_id) == FALSE){
					   $response['message'] = "No Schdeule Assign"; 
					   $response['status']	        =	0;
				 }else{
				     $response['status']	        =	1;
				 }
			 //}	 
		   
		}
	 }
	 
	  $non_scheudle = array(
	                         'status'=>0
	                       );
	  $this->db->where('device_id', $user_id);
      $this->db->update('non_schedule_download', $non_scheudle );


       $table = "version";
       $this->db->select("*");
       $this->db->where('device_id', $user_id);
       $this->db->where('status', 1);
       $query = $this->db->get($table);
       foreach ( $query->result_array() as $row ){
       	   $response['version_info'] = array(
				             'version_no' => $row['version_number'],
							 'start_time' => $row['device_update_time'],
							 'file_path.' => $row['file_path'],
						   );
       }
       
     
      $data_version = array(
      	                      'status'=>0,  
      	                      ///'update_time'=>date('Y-m-d H:i:s')

      	                    ); 
      $this->db->where('device_id', $user_id);
	  //$this->db->where('status', 1);
      $this->db->update('version', $data_version); 
 
 	 
	 date_default_timezone_set('UTC');
	 $table = "devices";
	 $this->db->select("*");
	 $this->db->where('device_id', $user_id);
	 $query = $this->db->get($table);
	 foreach ( $query->result_array() as $row ){
		
		  $response['poll_hit_interval']     = $row['poll_hit_interval'];	
		 // $response['cell_flip_interval']    = $row['cell_flip_interval'];
		  //$response['row_flip_interval']     = $row['row_flip_interval'];
		  $response['log_write_types']                    = $row['log_write_types'];
		 
		  $response['garbage_collector_time']       = $row['garbage_collector_time'];
		  $response['content_folder']               = $row['content_folder'];
		  $response['send_log']                     = $row['send_log'];
		  $response['cell_data_save']               = $row['cell_data_save'];
		  $response['send_version']                 = $row['send_version'];
		  $response['is_push']                      = $row['is_push'];
		  $response['font_name']                      = $row['font_name'];
		 
		 
	 }
	 
	$new_send['send_log'] = 0;
	$new_send['send_version'] = 0; 
	$this->db->where('device_id', $user_id);
    $this->db->update('devices', $new_send ); 
	 
   
    //print_r("<pre/>");
    //print_r($response);
    //die;
    header('Content-type: application/json');
	echo json_encode($response);
   }
   
   function poll_service2(){
   
   
              //echo date('y-m-d H:i:s');die;
          
             $schedule_id		             =	trim($this->input->get_post('id'));
		     $schedule_array_id               =  explode(",",$schedule_id);
		     $date                            =  date('y-m-d H:i:s');
		     $new_schedule_id    = '';
		  
		     if(empty($schedule_id)){
		  
		         $this->db->select('schedule_id');
			     $this->db->where_not_in('schedule_id', $schedule_array_id);
			     $schedule1 = $this->db->get('schedule');
			     $result1 = $schedule1->result_array();
			     $last_names1 = array_column($result1, 'schedule_id');
		         $data4 = array('schedule_type' => "new");
			     $data5 = array('schedule_type' => "default");
			 
			    $this->db->where_in('schedule_id', $last_names1);
		        $this->db->update('schedule', $data4);
			  
			  
			    $this->db->where('schedule_id', 1);
		        $this->db->update('schedule', $data5);
		  }
		  if(!empty($schedule_id)){
		  
		    
		    $this->db->select('schedule_id');
		    $this->db->where_in('schedule_id', $schedule_array_id);
		    $this->db->where('schedule_update>=last_call_date');
		    $schedule = $this->db->get('schedule');
		    $result = $schedule->result_array();
			
			
			
			$last_names = array_column($result, 'schedule_id');
		    $new_schedule_id=array_diff($schedule_array_id,$last_names);
			
			//print_r("<pre/>");
			//print_r($new_schedule_id);
			//die;
			
			
			 $data1 = array(
               'schedule_type' => "new"
             );
			  $data2 = array(
               'schedule_type' => "update"
             );
			 
			  $data3 = array(
               'schedule_type' => "default"
             );
		
		   if(!empty($new_schedule_id)){
		  $this->db->where_in('schedule_id', $new_schedule_id);
		  $this->db->update('schedule', $data1); 
		  }
		  
		  if(!empty($last_names)){
		  $this->db->where_in('schedule_id', $last_names);
		  $this->db->update('schedule', $data2);
		  }
		  if(empty($last_names)){
		  
		    //print_r("<pre/>");
			//print_r($last_names);
			//die;
		    $this->db->select('schedule_id');
			//$this->db->where_not_in('schedule_id', $last_names);
			$schedule2 = $this->db->get('schedule');
			$result2 = $schedule2->result_array();
			$last_names2 = array_column($result2, 'schedule_id');
			//print_r("<pre/>");
			//print_r(last_names2);
			//die;
		    $data5 = array(
               'schedule_type' => "new"
             );
			 
			 $data6 = array(
               'schedule_type' => "default"
             );
			 
			  $this->db->where_in('schedule_id', $last_names2);
		      $this->db->update('schedule', $data5);
			  
			  
			   $this->db->where('schedule_id', 1);
		      $this->db->update('schedule', $data6);
		  }
		 
		  
		  
		  $this->db->where('schedule_id', 1);
		  $this->db->update('schedule', $data3);
			
			
			
			
			if(empty($new_schedule_id)){
			  $new_schedule_id    = '';
			}	
		  }
		  $response = array();
		  $section = array();
		  $this->db->select('*');
		  if(!empty($schedule_id)){
		     if(empty($new_schedule_id)){
				$this->db->where_not_in('schedule_id', $new_schedule_id);
		     }else {
		       $this->db->where_not_in('schedule_id', $new_schedule_id);
		     }
		  }else{
		    //$this->db->where('schedule_type', "default");
		  }	 
		     $schedule = $this->db->get('schedule');
		     $i=0;
			 $j=0;
			 $k=0;
			 
			 //print_r($schedule->num_rows());die;
			 
			 if($schedule->num_rows()>0){
		     foreach ( $schedule->result_array() as $row ){
			      $sections = $this->getScheduleSection($row['schedule_id']);
				          if($row['schedule_type'] == "default"){
						  $i = $i+1;
						  if($j==0){
						        $response['new command'] = array(
						        );
							}
						  $response['default'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   }elseif($row['schedule_type'] == "new"){
						      $j = $j+1;
						      if($i==0){
						        $response['default'] = array(
						        );
							   }	
						     $response['new command'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   }elseif($row['schedule_type'] == "update"){
						   
						      $k = $k+1;
						     $response['update'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   
						   }
						    if($i==0){
							  $response['default'] = array(
						        );
							 }	
							 if($j==0){	
							  $response['new command'] = array(
						        );
							 }	
							 if($k==0){	
								$response['update'] = array(
						      );
							 }
						     $response['delete'] = array(
						    );
							
	     }
		 }else{
		   $response['default'] = array(
						        );
		    $response['new command'] = array(
						        );		
								
			$response['update'] = array(
						      );	
							  $response['delete'] = array(
						    );								
		   
		 }
		if(!empty($schedule_id)){
		 $data = array(
               'last_call_date' => date('y-m-d H:i:s')
          );
		 $this->db->where_in('schedule_id', $schedule_array_id);
         $this->db->update('schedule', $data); 
		 }
		//print_r("<pre/>");
		//print_r($response);die;
		 header('Content-type: application/json');
		echo json_encode($response);
   }
   
public function getSchedule($sid){

      

      $sections = $this->getScheduleSection2($sid);
	  
	  $section_id = array_column($sections, 'section_id');
	  
	  //print_r("<pre/>");
	  //print_r($last_names1);
	  //die;

     $testing = array();
$this->db->select('download_files.download_file_id,download_files.image_url as file_url,download_files.file_start_time,download_files.section_id,download_files.section_type_id,download_files.file_item_id,download_files.file_name');
	//$this->db->join('device_download', 'download_files.download_file_id =  device_download.download_file_id','left');
	
	$this->db->where_in('download_files.section_id', $section_id);
	
$download = $this->db->get('download_files');
$download =  $download->result_array();

return $download;

}   
public function getScheduleSection($sid){

        
		 $section = array();
		// $section_type = array();
		$this->db->select('section_id as sec_id,start_x_cordinate as start_x,start_y_cordinate as start_y,	end_x_cordinate as end_x,end_y_cordinate as end_y,section_backgorund_color as bg_colour,section_type,section_type_name,video_mute,image_flip_interval,cell_flip_interval,text_flip_interval,web_refresh_interval,update_interval');		
$this->db->join(' section_type', 'section.section_type =  section_type.section_type_id');
		
		$this->db->order_by("section.order_by", "asc");
		$this->db->where('schedule_id',$sid);
		$query = $this->db->get('section');
		
		//return $query->result_array();
		
		if($query->num_rows() >=1 ){
		     foreach ( $query->result_array() as $row ){
			  
				$section_type = $this->SectionType($row['sec_id'],$row['section_type']);
				
				if($row['section_type'] == 4){
			    $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

							 'update_interval'=>$row['update_interval'],
							 
							 'section_type'=>$row['section_type'],
							 'web_url'=>$section_type

						   );
				}else if($row['section_type'] == 1){
				
				    $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'cell_flip_interval'=>$row['cell_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

                             'update_interval'=>$row['update_interval'],


							 'section_type'=>$row['section_type'],
							 'image_data'=>$section_type

						   );
				}else if($row['section_type'] == 3){
				
				    $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'cell_flip_interval'=>$row['cell_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

							 'update_interval'=>$row['update_interval'],

							 'section_type'=>$row['section_type'],
							 'text_data'=>$section_type

						   );
				}
				
				else if($row['section_type'] == 2){
				
				    $section[] = array(
					
					     'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'cell_flip_interval'=>$row['cell_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

							 'update_interval'=>$row['update_interval'],
							 'section_type'=>$row['section_type'],
							 'video_data'=>$section_type
					);
				}
				else if($row['section_type'] == 5){
				
				    $section[] = array(
					
					         'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'cell_flip_interval'=>$row['cell_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],
							 'update_interval'=>$row['update_interval'],
							 'section_type'=>$row['section_type'],
							 'table_data'=>$section_type
					);
				}
				
				else{
				   $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'cell_flip_interval'=>$row['cell_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],
							// 'section_type'=>$row['section_type_name'],
							 'update_interval'=>$row['update_interval'],
							 'section_type'=>$row['section_type'],
							 'section_type1'=>$section_type

						   );
				   
				}		   
			 }
			return $section;
		}
		return FALSE;
	}
	public function getScheduleSection_device($sid,$user_id){

        
		 $section = array();
		// $section_type = array();
		$this->db->select('section_id as sec_id,start_x_cordinate as start_x,start_y_cordinate as start_y,	end_x_cordinate as end_x,end_y_cordinate as end_y,section_backgorund_color as bg_colour,section_type,section_type_name,video_mute,image_flip_interval,page_flip_interval,text_flip_interval,web_refresh_interval,update_interval');		
$this->db->join(' section_type', 'section.section_type =  section_type.section_type_id');
		
		$this->db->order_by("section.order_by", "asc");
		$this->db->where('schedule_id',$sid);
		$query = $this->db->get('section');
		
		//return $query->result_array();
		
		if($query->num_rows() >=1 ){
		     foreach ( $query->result_array() as $row ){
			  
				$section_type = $this->SectionType_device($row['sec_id'],$row['section_type'],$user_id);
				
				if($row['section_type'] == 4){
			    $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

							 'update_interval'=>$row['update_interval'],
							 
							 'section_type'=>$row['section_type'],
							 'web_url'=>$section_type

						   );
				}else if($row['section_type'] == 1){
				
				    $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

                             'update_interval'=>$row['update_interval'],


							 'section_type'=>$row['section_type'],
							 'image_data'=>$section_type

						   );
				}else if($row['section_type'] == 3){
				
				    $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

							 'update_interval'=>$row['update_interval'],

							 'section_type'=>$row['section_type'],
							 'text_data'=>$section_type

						   );
				}
				
				else if($row['section_type'] == 2){
				
				    $section[] = array(
					
					     'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],

							 'update_interval'=>$row['update_interval'],
							 'section_type'=>$row['section_type'],
							 'video_data'=>$section_type
					);
				}
				else if($row['section_type'] == 5){
				
				    $section[] = array(
					
					         'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],
							 'update_interval'=>$row['update_interval'],
							 'section_type'=>$row['section_type'],
							 'table_data'=>$section_type
					);
				}
				else if($row['section_type'] == 6){
				
				    $section[] = array(
					      'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],
							 'update_interval'=>$row['update_interval'],
							 'section_type'=>$row['section_type'],
							 'datetime_item'=>$section_type
					           
					);
				}
				
				else{
				   $section[] = array(
							 'id' => $row['sec_id'],
							 'start_x'=>$row['start_x'],
							 'start_y'=>$row['start_y'],
							 'end_x'=>$row['end_x'],
							 'end_y'=>$row['end_y'],
							 'bg_colour'=>$row['bg_colour'],
							 'video_mute'=>$row['video_mute'],
							 'image_flip_interval'=>$row['image_flip_interval'],
							 'page_flip_interval'=>$row['page_flip_interval'],
							 'text_flip_interval'=>$row['text_flip_interval'],
							 'web_refresh_interval'=>$row['web_refresh_interval'],
							// 'section_type'=>$row['section_type_name'],
							 'update_interval'=>$row['update_interval'],
							 'section_type'=>$row['section_type'],
							 'section_type1'=>$section_type

						   );
				   
				}		   
			 }
			return $section;
		}
		return FALSE;
	}
	 function SectionType($sec_id,$section_type){
	 
	     $section_type1 = array();
	     if($section_type ==4){
		 
		    $table = "web_item";
			$this->db->select("*");
			$this->db->where('section_id',$sec_id);
			$query = $this->db->get($table);
			$row = $query->row();
			
			return $row->web_url;
			

			 $section_type1 = array(
			        'web_url'=>$row[0]['web_url'],
			 );
			return $section_type1;
		 }
		 if($section_type ==3){
		 
		  
		      $table = "text_item";
		$this->db->select("text_item.*,text_data.text_value as value");

		$this->db->join('text_data', 'text_item.text_item_id =  text_data.text_item_id','left');
		
		
		//$this->db->join(' download_files', 'text_item.text_item_id =  download_files.file_item_id','left');
		
		$this->db->where('text_item.section_id',$sec_id);
		//$this->db->where('download_files.section_type_id',$section_type);
		$query = $this->db->get($table);
		foreach ( $query->result_array() as $row ){
		    
			 $section_type1 = array(
				             'text_item_id' => $row['text_item_id'],
							 'text_url' => $row['text_file_download_url'],
							 'downloadable' => $row['downloadable'],
							 'file_name'    => $row['text_file_name'],
							 'text_size'    => $row['text_size'],
							 'text_color'    => $row['text_color'],
							 'text_lang'    => $row['text_lang'],
							 'text_scrollable'    => $row['text_scrollable'],
							 'text_scroll_speed'    => $row['text_scroll_speed'],
							 'text_scroll_direction'    => $row['text_scroll_direction'],
							 //'text_type'    => $row['text_type'],
							 'text_value'    => $row['value'],
						   );
		} 
		 }
		 if($section_type ==2){
		 
		     //echo $section_type;die;
		     $table = "video_item";
			 $this->db->select("video_item.*");
	//$this->db->join(' download_files', 'video_item.video_item_id =  download_files.file_item_id','left');
	
			 $this->db->where('video_item.section_id',$sec_id);
			 //$this->db->where('download_files.section_type_id',$section_type);
			 
			 $query = $this->db->get($table);
			 
			 //print_r("<pre/>");
			 //print_r($query->result_array());
			 //die;
			 foreach ( $query->result_array() as $row ){
			 
			       //if($row['downloadable']==0){
				      //$row['file_name'] = '';
				  // }
			 
			       $section_type1[] = array(
				 
				             'video_item_id' => $row['video_item_id'],
							 'video_url' => $row['video_download_url'],
							 'downloadable' => $row['downloadable'],
							'file_name'    => $row['video_name']
						   );
			 }
		 
		    //$section_type1 = array(
			              //'id'=>1
			    // );
		    
			//return $section_type1;
		 }
		 if($section_type ==5){
		     $table = "cell_item_design";
			 $this->db->select("cell_item_design.cell_item_id,
			 cell_item_design.cell_bg_color,
			 cell_item_design.cell_border_color,
			 cell_item_design.cell_start_x,
			 cell_item_design.cell_start_y,
			 cell_item_design.cell_end_x,
			 cell_item_design.cell_end_y,
			 cell_item_design.page_no,		
			 cell_item_design.required, 
			 cell_item_design.radius,
			 
			 cell_item_data.cell_image_url,
			 cell_item_data.imgStartx,
			 cell_item_data.imgStartY,
			 cell_item_data.imgendX,
			 cell_item_data.imgendY,
			 
			 
			 cell_item_data.text_value1,
			 cell_item_data.text_value2,
			 cell_item_data.text_color,
			 cell_item_data.text_size,
			 cell_item_data.flash,
			 cell_item_data.flash_color,
			 cell_item_data.padding,
			 cell_item_data.text_align,
			 cell_item_data.text_place_index
			 
			 ");
		$this->db->join(' cell_item_data', 'cell_item_design.cell_item_id =  cell_item_data.cell_item_id','left');
		
			 $this->db->where('cell_item_design.section_id',$sec_id);
			 $query = $this->db->get($table);
			 
			 
			 
			 foreach ( $query->result_array() as $row ){
			 
			       $section_type1[] = array(
				 
				             'id' => $row['cell_item_id'],
							 'bg_color' => $row['cell_bg_color'],
							 'border_color' => $row['cell_border_color'],
							 'start_x' => $row['cell_start_x'],
							 'start_y' => $row['cell_start_y'],
							 'end_x' => $row['cell_end_x'],
							 'end_y' => $row['cell_end_y'],
							 'page_no' => $row['page_no'],
							 'required' => $row['required'],
							 
							 'image_path' => $row['cell_image_url'],
							 'imgStartx' => $row['imgStartx'],
							 'imgStartY' => $row['imgStartY'],
							 'imgendX' => $row['imgendX'],
							 'imgendY' => $row['imgendY'],
							 'text_value1' => $row['text_value1'],
							 'text_value2' => $row['text_value2'],
							 'text_color' => $row['text_color'],
							 'text_size' => $row['text_size'],
							 'flash' => $row['flash'],
							 'flash_color' => $row['flash_color'],
							 'padding' => $row['padding'],
							 'radius' => $row['radius']
						    
							 
							 
							 
							 
							 //'cell_image_url' => $row['cell_image_url']
						   );
			 }
		 
		    //$section_type1 = array(
			              //'id'=>1
			    // );
		    
			//return $section_type1;
		 }
		 if($section_type ==1){
		 
		    $table = "Image_item";
			$this->db->select("Image_item.*");
	//$this->db->join(' download_files', 'Image_item.Image_item_id =  download_files.Image_item_id','left');
			
	//$this->db->join(' Image_item', 'download_files.Image_item_id =  Image_item.Image_item_id','left');
			
		//$this->db->join(' download_files', 'Image_item.Image_item_id =  download_files.file_item_id','left');
		$this->db->where('Image_item.section_id',$sec_id);
		//$this->db->where('download_files.section_type_id',$section_type);
		
			
			
			$query = $this->db->get($table);

			foreach ( $query->result_array() as $row ){
			    
				 $section_type1[] = array(
				 
				             'image_id' => $row['Image_item_id'],
							 'image_url' => $row['image_url'],
							 'downloadable' => $row['downloadable'],
							 'file_name'    => $row['file_name']
						   );
			   
			}
			return $section_type1;


			 $section_type1 = array(
			        'web_url'=>$row[0]['image_url'],
			 );
			return $section_type1;
		 }
		 
		    return $section_type1;
	}
	function SectionType_device($sec_id,$section_type,$user_id){
	 
	     $section_type1 = array();
	     if($section_type ==4){
		 
		    $table = "web_item";
			$this->db->select("*");
			$this->db->where('section_id',$sec_id);
			$query = $this->db->get($table);
			$row = $query->row();
			
			return $row->web_url;
			

			 $section_type1 = array(
			        'web_url'=>$row[0]['web_url'],
			 );
			return $section_type1;
		 }
		 if($section_type ==6){
		         $table = " datetime_item";
			         $this->db->select(" datetime_item.*");
			         $this->db->where(' datetime_item.section_id',$sec_id);
			         $query = $this->db->get($table);
			         foreach ( $query->result_array() as $row ){
			              $section_type1[] = array(
				             'id' => $row['id'],
				             'text_color' => $row['text_color'],
							 'font_size' => $row['font_size'],
							 'type' => $row['type'],
							 'text_align'    => $row['text_align'],
							 'section_id'    => $row['section_id'],
						   );
			 }
		     }
		 if($section_type ==3){
		 
		  
		  $table = "text_item";
		$this->db->select("text_item.*");

		//$this->db->join('text_data', 'text_item.text_item_id =  text_data.text_item_id','left');
		
		
		//$this->db->join(' download_files', 'text_item.text_item_id =  download_files.file_item_id','left');
		
		$this->db->where('text_item.section_id',$sec_id);

		//$this->db->where('text_data.device_id',$user_id);

		//$this->db->where('download_files.section_type_id',$section_type);
		$query = $this->db->get($table);
		foreach ( $query->result_array() as $row ){

			 $text_data = $this->getTextData($user_id,$row['text_item_id']);
		    
			 $section_type1 = array(
				             'text_item_id' => $row['text_item_id'],
							 'text_url' => $row['text_file_download_url'],
							 'downloadable' => $row['downloadable'],
							 'file_name'    => $row['text_file_name'],
							 'text_size'    => $row['text_size'],
							 'text_color'    => $row['text_color'],
							 'text_lang'    => $row['text_lang'],
							 'text_scrollable'    => $row['text_scrollable'],
							 'text_scroll_speed'    => $row['text_scroll_speed'],
							 'text_scroll_direction'    => $row['text_scroll_direction'],
							 //'text_type'    => $row['text_type'],
							// 'text_value'    => $row['value'],
							 'text_value' =>$text_data,
						   );
		} 
		 }
		 if($section_type ==2){
		 
		     //echo $section_type;die;
		     $table = "video_item";
			 $this->db->select("video_item.*");
	//$this->db->join(' download_files', 'video_item.video_item_id =  download_files.file_item_id','left');
	
			 $this->db->where('video_item.section_id',$sec_id);
			 //$this->db->where('download_files.section_type_id',$section_type);
			 
			 $query = $this->db->get($table);
			 
			 //print_r("<pre/>");
			 //print_r($query->result_array());
			 //die;
			 foreach ( $query->result_array() as $row ){
			 
			       //if($row['downloadable']==0){
				      //$row['file_name'] = '';
				  // }
			 
			       $section_type1[] = array(
				 
				             'video_item_id' => $row['video_item_id'],
							 'video_url' => $row['video_download_url'],
							 'downloadable' => $row['downloadable'],
							'file_name'    => $row['video_name']
						   );
			 }
		 
		    //$section_type1 = array(
			              //'id'=>1
			    // );
		    
			//return $section_type1;
		 }
		 if($section_type ==5){
		     $table = "cell_item_design";
			 $this->db->select("cell_item_design.cell_item_id,
			 cell_item_design.cell_bg_color,
			 cell_item_design.cell_border_color,
			 cell_item_design.cell_start_x,
			 cell_item_design.cell_start_y,
			 cell_item_design.cell_end_x,
			 cell_item_design.cell_end_y,
			 cell_item_design.page_no,		
			 cell_item_design.cell_required, 
			 cell_item_design.radius,
			 
			 cell_item_data.cell_image_url,
			 cell_item_data.imgStartx,
			 cell_item_data.imgStartY,
			 cell_item_data.imgendX,
			 cell_item_data.imgendY,
			 
			 
			 cell_item_data.text_value1,
			 cell_item_data.text_value2,
			 cell_item_data.text_color,
			 cell_item_data.text_size,
			 cell_item_data.flash,
			 cell_item_data.flash_color,
			 cell_item_data.padding,
			 cell_item_data.text_align,
			 cell_item_data.text_place_index,
			 cell_item_data.inline
			 
			 ");
		$this->db->join(' cell_item_data', 'cell_item_design.cell_item_id =  cell_item_data.cell_item_id','left');
		
			 $this->db->where('cell_item_design.section_id',$sec_id);
			 $query = $this->db->get($table);
			 
			 
			 
			 foreach ( $query->result_array() as $row ){
			 
			       $section_type1[] = array(
				 
				             'id' => $row['cell_item_id'],
							 'bg_color' => $row['cell_bg_color'],
							 'border_color' => $row['cell_border_color'],
							 'start_x' => $row['cell_start_x'],
							 'start_y' => $row['cell_start_y'],
							 'end_x' => $row['cell_end_x'],
							 'end_y' => $row['cell_end_y'],
							 'page_no' => $row['page_no'],
							 'required' => $row['cell_required'],
							 
							 'image_path' => $row['cell_image_url'],
							 'imgStartx' => $row['imgStartx'],
							 'imgStartY' => $row['imgStartY'],
							 'imgendX' => $row['imgendX'],
							 'imgendY' => $row['imgendY'],
							 'text_value1' => $row['text_value1'],
							 'text_value2' => $row['text_value2'],
							 'text_color' => $row['text_color'],
							 'text_size' => $row['text_size'],
							 'flash' => $row['flash'],
							 'flash_color' => $row['flash_color'],
							 'padding' => $row['padding'],
							 'radius' => $row['radius'],
							 'inline' => $row['inline']
						    
							 
							 
							 
							 
							 //'cell_image_url' => $row['cell_image_url']
						   );
			 }
		 
		    //$section_type1 = array(
			              //'id'=>1
			    // );
		    
			//return $section_type1;
		 }
		 if($section_type ==1){
		 
		    $table = "image_item";
			$this->db->select("image_item.*");
	//$this->db->join(' download_files', 'Image_item.Image_item_id =  download_files.Image_item_id','left');
			
	//$this->db->join(' Image_item', 'download_files.Image_item_id =  Image_item.Image_item_id','left');
			
		//$this->db->join(' download_files', 'Image_item.Image_item_id =  download_files.file_item_id','left');
		$this->db->where('image_item.section_id',$sec_id);
		//$this->db->where('download_files.section_type_id',$section_type);
		
			
			
			$query = $this->db->get($table);

			foreach ( $query->result_array() as $row ){
			    
				 $section_type1[] = array(
				 
				             'image_id' => $row['Image_item_id'],
							 'image_url' => $row['image_url'],
							 'downloadable' => $row['downloadable'],
							 'file_name'    => $row['file_name']
						   );
			   
			}
			return $section_type1;


			 $section_type1 = array(
			        'web_url'=>$row[0]['image_url'],
			 );
			return $section_type1;
		 }
		 
		    return $section_type1;
	}
	function  getTextData($user_id,$item_id){


          
		  $this->db->select('text_value');
		  $this->db->where('text_item_id',$item_id);
		  $this->db->where('device_id',$user_id);
		  $query = $this->db->get('text_data');
		  $result = $query->result_array();
		  return $result[0]['text_value'];
		  //print_r("<pre/>");
		  //print_r($result);
		  //die;
	}
   function demo(){
          
          $schedule_id		             =	$this->input->get_post('id');
		  $schedule_array_id               =  explode(",",$schedule_id);
		  $date                            =  date('Y-m-d H:i:m:s');
		  $new_schedule_id    = '';
		  if(!empty($schedule_id)){
		    $this->db->select('schedule_id');
		    $this->db->where_in('schedule_id', $schedule_array_id);
		    $this->db->where('schedule_update>=last_call_date');
		    $schedule = $this->db->get('schedule');
		    $result = $schedule->result_array();
			$last_names = array_column($result, 'schedule_id');
		    $new_schedule_id=array_diff($schedule_array_id,$last_names);
			if(empty($new_schedule_id)){
			  $new_schedule_id    = '';
			}	
		  }
		  $response = array();
		  $section = array();
		  $this->db->select('*');
		  if(!empty($schedule_id)){
		     if(empty($new_schedule_id)){
				$this->db->where_not_in('schedule_id', $new_schedule_id);
		     }else {
		       $this->db->where_not_in('schedule_id', $new_schedule_id);
		     }
		  }else{
		    $this->db->where('schedule_type', "default");
		  }	 
		     $schedule = $this->db->get('schedule');
		     $i=0;
			 $j=0;
			 $k=0;
		     foreach ( $schedule->result_array() as $row ){
			      $sections = $this->getScheduleSection($row['schedule_id']);
				          if($row['schedule_type'] == "default"){
						  $i = $i+1;
						  if($j==0){
						        $response['new command'] = array(
						        );
							}
						  $response['default'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   }elseif($row['schedule_type'] == "new"){
						      $j = $j+1;
						      if($i==0){
						        $response['default'] = array(
						        );
							   }	
						     $response['new command'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   }elseif($row['schedule_type'] == "update"){
						   
						      $k = $k+1;
						     $response['update'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   
						   }
						    if($i==0){
							  $response['default'] = array(
						        );
							 }	
							 if($j==0){	
							  $response['new command'] = array(
						        );
							 }	
							 if($k==0){	
								$response['update'] = array(
						      );
							 }
						     $response['delete'] = array(
						    );
							
	     }
		if(!empty($schedule_id)){
		 $data = array(
               'last_call_date' => date('Y-m-d H:i:m:s')
          );
		 $this->db->where_in('schedule_id', $schedule_array_id);
         $this->db->update('schedule', $data); 
		 }
		 print_r("<pre/>");
		 print_r($response);die;
		 
		 echo json_encode($response);
   }
  function testing(){
          
             $schedule_id		             =	$this->input->get_post('id');
		     $schedule_array_id               =  explode(",",$schedule_id);
		     $date                            =  date('Y-m-d H:i:m:s');
		     $new_schedule_id    = '';
		     if(!empty($schedule_id)){
		        $this->db->select('schedule_id');
		        $this->db->where_in('schedule_id', $schedule_array_id);
		        $this->db->where('schedule_update>=last_call_date');
		        $schedule = $this->db->get('schedule');
		        $result = $schedule->result_array();
			    $last_names = array_column($result, 'schedule_id');
		        $new_schedule_id=array_diff($schedule_array_id,$last_names);
			      $data1 = array(
                    'schedule_type' => "new");
			      $data2 = array(
                   'schedule_type' => "update");
			      $data3 = array(
                   'schedule_type' => "default");
		   
				  if(!empty($new_schedule_id)){
				   $this->db->where_in('schedule_id', $new_schedule_id);
				   $this->db->update('schedule', $data1);}
			  
				  if(!empty($last_names)){
				   $this->db->where_in('schedule_id', $last_names);
				   $this->db->update('schedule', $data2);
				  }
				  $this->db->where('schedule_id', 1);
				  $this->db->update('schedule', $data3);
				
				  if(empty($new_schedule_id)){
					$new_schedule_id    = '';
				   }	
		     }
		   $response = array();
		   $section = array();
		   $this->db->select('*');
		   if(!empty($schedule_id)){
		      if(empty($new_schedule_id)){
				 $this->db->where_not_in('schedule_id', $new_schedule_id);
		      }else {
		        $this->db->where_not_in('schedule_id', $new_schedule_id);
		      }
		   }else{
		    $this->db->where('schedule_type', "default");
		   }	 
		     $schedule = $this->db->get('schedule');
		     $i=0;
			 $j=0;
			 $k=0;
			 
			if($schedule->num_rows()>0){
		     foreach ( $schedule->result_array() as $row ){
			      $sections = $this->getScheduleSection1($row['schedule_id']);
				          if($row['schedule_type'] == "default"){
						  $i = $i+1;
						  if($j==0){
						        $response['new command'] = array(
						        );
							}
						  $response['default'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   }elseif($row['schedule_type'] == "new"){
						      $j = $j+1;
						      if($i==0){
						        $response['default'] = array(
						        );
							   }	
						     $response['new command'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   }elseif($row['schedule_type'] == "update"){
						     $k = $k+1;
						     $response['update'][] = array(
							 'id' => $row['schedule_id'],
							 'name' => $row['schedule_name'],
							 'start_time' => $row['schedule_start_time'],
							 'end_time' => $row['schedule_end_time'],
							 'destroy_time'  =>$row['schedule_create'],
							 'destroy'       =>$row['destroy'],
							 'schedule_type'       =>$row['schedule_type'],
							 'section'    =>$sections
						   );
						   }
						    if($i==0){
							  $response['default'] = array(
						        );
							 }	
							 if($j==0){	
							  $response['new command'] = array(
						        );
							 }	
							 if($k==0){	
								$response['update'] = array(
						      );
							 }
						     $response['delete'] = array(
						    );
	     }
		 }else{
		   $response['default'] = array(
						        );
		    $response['new command'] = array(
						        );		
			$response['update'] = array(
						      );	
							  $response['delete'] = array(
						    );								
		 }
		if(!empty($schedule_id)){
		 $data = array(
               'last_call_date' => date('Y-m-d H:i:m:s')
          );
		 $this->db->where_in('schedule_id', $schedule_array_id);
         $this->db->update('schedule', $data); 
		 }
		print_r("<pre/>");
		print_r($response);die;
		echo json_encode($response);
   }
   public function getScheduleSection1($sid){
        
		 $video_item = array();
		 
		/*$this->db->select('section_id as sec_id,start_x_cordinate as start_x,start_y_cordinate as start_y,	end_x_cordinate as end_x,end_y_cordinate as end_y,section_backgorund_color as bg_colour');*/
		
		$this->db->select('*');
		$this->db->where('schedule_id',$sid);
		$query = $this->db->get('section');
		if($query->num_rows() >=1 ){
			//return $query->result_array();
			foreach ( $query->result_array() as $row ){
			
			   $video = $this->getSectionVideo($row['section_id']);
			}
			
		}
		return FALSE;
	}
	public function getScheduleSection2($sid){
	
	     $this->db->select('section_id');
		 $this->db->where('schedule_id',$sid);
		 $query = $this->db->get('section');
		 
		 return $query->result_array();
	}
	
	 public function getSectionVideo($sid){
		$this->db->select('*');
		$this->db->where('section_id',$sid);
		$query = $this->db->get('video_item');
		if($query->num_rows() >=1 ){
			return $query->result_array();
		}
		return FALSE;
	}
	function section_update1(){
	
		$section_id		            =	$this->input->get_post('section_id');
		$device_id                  =  $this->input->get_post('device_id');
			 
		$section_type  = array();
		$table = "cell_item_data";
	    $this->db->select("cell_item_data.cell_image_url,
			                    cell_item_data.imgStartx,
								cell_item_data.imgStartY,
								cell_item_data.imgendX,
								cell_item_data.imgendY,
								cell_item_data.text_value1,
						        cell_item_data.text_value2,
						        cell_item_data.text_color,
						        cell_item_data.text_size,
								cell_item_data.flash,
						        cell_item_data.flash_color,
								cell_item_data.padding,
								device_cell_item_data.cell_item_id,
						        device_cell_item_data.device_id,
						        device_cell_item_data.create,
						        device_cell_item_data.update");
	    $this->db->join('device_cell_item_data', 'cell_item_data.id =  device_cell_item_data.cell_item_id','left');
		$this->db->where('cell_item_data.section_id',$section_id);
		$this->db->where('device_cell_item_data.device_id',$device_id);
			 
		$query = $this->db->get("cell_item_data");
			 
			 
			 foreach ( $query->result_array() as $row ){
			       $section_type1['table_update'][] = array(
				             'id' => $row['cell_item_id'],
							 'image_path' => $row['cell_image_url'],
							 'imgStartx' => $row['imgStartx'],
							 'imgStartY' => $row['imgStartY'],
							 'imgendX' => $row['imgendX'],
							 'imgendY' => $row['imgendY'],
							 'text_value1' => $row['text_value1'],
							 'text_value2' => $row['text_value2'],
							 'text_color' => $row['text_color'],
							 'text_size' => $row['text_size'],
							 'flash' => $row['flash'],
							 'flash_color' => $row['flash_color'],
							 'padding' => $row['padding']

						   );
						   
			if($row['create']<$row['update']){
				$deletData = $this->Common_model->delete('device_cell_item_data',array('section_id'=>$section_id,'device_id'=>$device_id));	 
		           } 
			 }
			 $this->db->select("cell_item_data.cell_image_url,
		                   cell_item_data.imgStartx,
						   cell_item_data.imgStartY,
						   cell_item_data.imgendX,
						   cell_item_data.imgendY,
						   cell_item_data.text_value1,
						   cell_item_data.text_value2,
						   cell_item_data.text_color,
						   cell_item_data.text_size,
						   cell_item_data.flash,
						   cell_item_data.flash_color,
						   cell_item_data.padding,
						   device_cell_item_data.cell_item_id,
						   device_cell_item_data.device_id,
						   device_cell_item_data.create,
						   device_cell_item_data.update");
$this->db->join('device_cell_item_data', 'cell_item_data.id =  device_cell_item_data.cell_item_id','left');
			 
			  $this->db->where('cell_item_data.section_id',$section_id);
			  $this->db->where('device_cell_item_data.device_id',$device_id);
			  
			  
			 $query1 = $this->db->get($table);
			 foreach ( $query1->result_array() as $row ){
			     $section_type['table_update'][] = array(
				             'id' => $row['cell_item_id'],
							 'image_path' => $row['cell_image_url'],
							 'imgStartx' => $row['imgStartx'],
							 'imgStartY' => $row['imgStartY'],
							 'imgendX' => $row['imgendX'],
							 'imgendY' => $row['imgendY'],
							 'text_value1' => $row['text_value1'],
							 'text_value2' => $row['text_value2'],
							 'text_color' => $row['text_color'],
							 'text_size' => $row['text_size'],
							 'flash' => $row['flash'],
							 'flash_color' => $row['flash_color'],
							 'padding' => $row['padding']

						   );
			 } 
			 
			 $data = array(
               'update' => date('y-m-d H:i:s') );
	          $this->db->where_in('section_id', $section_id);
			  $this->db->where('device_id', $device_id);
              $this->db->update('device_cell_item_data', $data);
			 
			 header('Content-type: application/json');
			 echo json_encode($section_type);
	}
	function section_update(){
	      
		  $section_id		            =	$this->input->get_post('section_id');
          $device_id                    =  $this->input->get_post('device_id');
          $section_type  = array();

		  $table = "cell_item_data";
		  $this->db->select("cell_item_data.cell_image_url,
			                    cell_item_data.imgStartx,
								cell_item_data.imgStartY,
								cell_item_data.imgendX,
								cell_item_data.imgendY,
								cell_item_data.text_value1,
						        cell_item_data.text_value2,
						        cell_item_data.text_color,
						        cell_item_data.text_size,
								cell_item_data.flash,
						        cell_item_data.flash_color,
								cell_item_data.padding,
								cell_item_data.text_align,
                                cell_item_data.text_place_index,
                                cell_item_data.cell_item_id, 
                                cell_item_data.text_align,  
                                cell_item_data.text_place_index,
                                cell_item_data.inline                             

								");
		$this->db->where('cell_item_data.section_id',$section_id);	
		$this->db->where('cell_item_data.device_id',$device_id);
		
		$query = $this->db->get("cell_item_data");	
		foreach ( $query->result_array() as $row ){
			       $section_type['table_update'][] = array(
				             'id' => $row['cell_item_id'],
							 'image_path' => $row['cell_image_url'],
							 'imgStartx' => $row['imgStartx'],
							 'imgStartY' => $row['imgStartY'],
							 'imgendX' => $row['imgendX'],
							 'imgendY' => $row['imgendY'],
							 'text_value1' => $row['text_value1'],
							 'text_value2' => $row['text_value2'],
							 'text_color' => $row['text_color'],
							 'text_size' => $row['text_size'],
							 'flash' => $row['flash'],
							 'flash_color' => $row['flash_color'],
							 'padding' => $row['padding'],
							 'text_align' => $row['text_align'],
							 'text_place_index' => $row['text_place_index'],
							 'inline' => $row['inline']

	        );
		}	

      $table = "text_data";
      $this->db->select("text_value");
      $this->db->where('text_data.section_id',$section_id);
      $this->db->where('text_data.device_id',$device_id);
      $text_query = $this->db->get("text_data");
      foreach ( $text_query->result_array() as $row ){
                
                   //$section_type['text_update'][] = array(
				            // 'id' => $row['text_item_id'],
							 //'text_value' => $row['text_value'],
	               //);

	               $section_type['text_update'] = $row['text_value'];
      } 

     $deletData = $this->Common_model->delete('cell_item_data',array('section_id'=>$section_id,'device_id'=>$device_id));

     $deletData = $this->Common_model->delete('text_data',array('section_id'=>$section_id,'device_id'=>$device_id));
	 
	 header('Content-type: application/json');
	 echo json_encode($section_type);	 

	}
	
 function sound_display(){
 
		   $user_id		         =	$this->input->get_post('device_id');
		   $sound_info  = array();
		  $table = "audio_item_play";
		   
		$this->db->select("*");
	    $this->db->join('audio_item_master', 'audio_item_play.sound_id =  audio_item_master.sound_id','left');
	    $this->db->order_by("audio_item_play.id", "asc");
		$this->db->where('audio_item_play.device_id',$user_id);
		$query1 = $this->db->get($table);
		foreach ( $query1->result_array() as $row ){
		         
				  $sound_info['sound_info'][] = array(
				       'sound_id' => $row['sound_id'],
					   'file_path' => $row['sound_path'],
				  );
		 }
		 
	   $this->db->select("*");
	   $this->db->where('device_id',$user_id);
	   $query2 = $this->db->get('devices');
	   $users = $query2->result_array();
	   $sound_info['sound_hit']   =  $users[0]['sound_interval'];
	   //$data = array(
              // 'update' => date('y-m-d H:i:s')
       //  );
	    //$this->db->where_in('device_id', $user_id);
       // $this->db->update('audio_item_play', $data); 

        $this->db->select("*");
		   $this->db->where('device_id',$user_id);
		   $query = $this->db->get($table);
		   
		   //print_r("<pre/>");
		   //print_r($query->result_array());
		   //die;
		   foreach ( $query->result_array() as $row ){
		      //if($row['create']<$row['update']){
		      	  //echo "test";die;
		          $deleteData = $this->Common_model->delete('audio_item_play',array('device_id' => $user_id));
		      //}
		   }




		header('Content-type: application/json');
		echo json_encode($sound_info);
 }
 
 function apk_update(){
	 $version  = array();
	 $table = "version";
	 $this->db->select("*");
	 $query = $this->db->get($table);
	 foreach ( $query->result_array() as $row ){
	        $section_type['version_update'][] = array(
				             'id' => $row['id'],
							 'linke' => $row['link'],
							 'Version Name' => $row['version_name'],
						   );
	 }
	header('Content-type: application/json');
    echo json_encode($section_type);
 }
 function time_refresh(){
    date_default_timezone_set('UTC');
    $response['Time']       =  date('Y-m-d H:i:s');
    header('Content-type: application/json');
    echo json_encode($response);
 }
 function device_log(){
 
	 $table = "device_log";
     $data['device_id']		         =	$this->input->get_post('device_id');
	 $data['log']		             =	$this->input->get_post('log');
     $data['log_type']		             =	$this->input->get_post('log_type');

	 $data['device_log_create']	             =	date('y-m-d H:i:s');
	 if(empty($data['device_id'])){
		 	$error['message'] = "device id:Required parameter missing";
	  }elseif(empty($data['log'])){
		 	$error['message']	=	"log:Required parameter missing";
	  }elseif($this->Webservice->checkDevice($data['device_id']) == FALSE){
		    $error['status']	=	0;
			$error['message']   = "Device id not found";
	}
	elseif(!empty($data)){
	     $this->db->insert( 'device_log', $data ); 
		 $id= $this->db->insert_id();   
		 if( !isset($id) || empty($id)){
				$error['status'] = 0;
		  }else{
				$error['status'] = 1;
		  }   
	   }
	header('Content-type: application/json');
    echo json_encode($error);
 }
 function update_download(){

 	   $data['device_id']		                 =	$this->input->get_post('device_id');
 	   $data['download_file_id']		         =	$this->input->get_post('download_file_id');
 	   $data['status']		                     =	$this->input->get_post('status');

 	   if(empty($data['device_id'])){
		 	$error['message'] = "device id:Required parameter missing";
	   }elseif(empty($data['download_file_id'])){
		 	$error['message']	=	"download file id:Required parameter missing";
	   }elseif(empty($data['status'])){
		 	$error['message']	=	"status:Required parameter missing";
	   }elseif(!empty($data)){	   	    

           $data_update = array(
               'file_status' => $data['status'],
               'update_status'=> date('y-m-d H:i:s'));

           //update_status

	       $this->db->where('download_file_id', $data['download_file_id']);
		   $this->db->where('device_id', $data['device_id']);
           $this->db->update('device_download_status', $data_update);
           $error['message'] = "success";
	   	   $error['status'] = 1;
	   }	
	   header('Content-type: application/json');
       echo json_encode($error);  
 }

 function send_version_status(){

       $data['device_id']		                 =	$this->input->get_post('device_id');
 	   $data['version_no']		                 =	$this->input->get_post('version_no');
   	   $data['version_status_update']		                     =	date('y-m-d H:i:s');

   	   if(empty($data['device_id'])){
		 	$error['message'] = "device id:Required parameter missing";
	   }elseif(empty($data['version_no'])){
		 	$error['message']	=	"version no:Required parameter missing";
	   }elseif(!empty($data)){	  

	   	       $this->db->select('*');
	           $this->db->where('device_id', $data['device_id']);
	           $query = $this->db->get('version_status');
	           if($query->num_rows() > 0){
	           	       $this->db->where('device_id', $data['device_id']);
		        	   $this->db->update('version_status', $data);
		        	   $error['message'] = "success";
	   	               $error['status'] = 1;
                       
		        }else{
                        $this->db->insert( 'version_status', $data );
                        $error['message'] = "success";
	   	                $error['status'] = 1;
		        }
	   }
	   header('Content-type: application/json');
       echo json_encode($error); 

 }
 function reg_key(){

		 $data['device_id']=$this->input->get_post('device_id');
		 $data['reg_key']=$this->input->get_post('reg_key');
 
		  $check_device_id = $this->Common_model->getsingle('devices',array("device_id"=>$data['device_id']));
		  if(empty($data['device_id'])){
				$error['message'] = "device id:Required parameter missing";
		  }elseif(empty($data['reg_key'])){
				$error['message']	=	"reg_key:Required parameter missing";
		  }elseif(!empty($data)){
				 $array = array(
					  "reg_fcm_key"=>$data['reg_key']
				 );
				 $this->db->where('device_id', $data['device_id'] );
				  $this->db->update('devices', $array ); 
				 	
				 if($this->db->affected_rows() > 0 ){
						
						$error['status'] = 1;
						$error['message'] = 'Registration key updated';
				  }else{
						$error['status'] = 0;
				  }   
		   }
		header('Content-type: application/json');
		echo json_encode($error);
}
     function send_notification(){

		     $data['display_id']=$this->input->get_post('display_id');
		     $data['type']=$this->input->get_post('type');
		     $data['folder_name']=$this->input->get_post('folder_name');
		     $data['section_id']=$this->input->get_post('section_id');

		     $type = $data['type'];
             if(empty($data['display_id'])){
				 $error['message'] = "display_id:Required parameter missing";
				 $error['status'] = 0;		  
		     }elseif(empty($data['type'])){
				 $error['message'] = "type:Required parameter missing";
				 $error['status'] = 0;		  
		    }else{
		            $type = $data['type'];
					$singledata = $this->Common_model->getsingle("devices",array("device_id"=>$data['display_id']));

                     if(!empty($singledata)){
					     $fcm_key = $singledata->reg_fcm_key;
					     $device_id = $data['display_id'];
					      
					     if($type==1){
								$messages = $this->Webservice->getMessageData1($device_id);

								if(empty($messages)){
									 
									 $error['message'] = "No records found for this device.";
									 $error['status'] =0;								
								 }else { 					 
									 $this->send_noti($type,$fcm_key);
									 $error['message'] = "sucsess";
									 $error['status'] = 1;							  
						         } 
						 }elseif($type==2){
						 	     
						         $this->send_noti($type,$fcm_key);
							     $error['message'] = "sucsess";
							     $error['status'] = 1;						 
						 }elseif($type==3){
						      
						     $update = array("send_log"=>1);
						     $where = array("device_id"=>$device_id);
							 $this->db->where($where);
							 $check = $this->db->update("devices",$update);
							 if($check){  
								 $this->send_noti($type,$fcm_key);
								 $error['message'] = "sucsess";
								 $error['status'] = 1;
							 }else{
								 $error['message'] = "Records alredy updated or device_id not found";
								 $error['status'] = 0;							 
							 }							 
						 
						 }elseif($type==4){
						     $update = array("status"=>1);
						     $where = array("device_id"=>$device_id);
							 $this->db->where($where);
							 $check = $this->db->update("non_schedule_download",$update);
							 if($check){  
								 $this->send_noti($type,$fcm_key);
								 $error['message'] = "sucsess";
								 $error['status'] = 1;
							 }else{
								 $error['message'] = "Records alredy updated or device_id not found";
								 $error['status'] = 0;							 
							 }						 
						 
						 
						 }elseif($type==5){
						 
						     date_default_timezone_set('UTC');
							 $data_m   = date('Y-m-d H:i:s', strtotime("+3 min"));
						     $update = array(
							 "status"=>1,
							 "device_update_time"=>$data_m
							 );
						     $where = array("device_id"=>$device_id);
							 $this->db->where($where);
							 $check = $this->db->update("version",$update);
							  
							 if($check){  
								 $this->send_noti($type,$fcm_key);
								 $error['message'] = "sucsess";
								 $error['status'] = 1;
							 }else{
								 $error['message'] = "Records alredy updated or device_id not found";
								 $error['status'] = 0;							 
							 }						 
						 
						 
						 }elseif($type==6){
						 
                                $this->send_noti($type,$fcm_key);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
						 elseif($type==7){
						 
                                $this->send_noti($type,$fcm_key);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
						 elseif($type==8){
						 
						        //$data1['status'] =0; 
		      	                //$this->db->where('device_id', $data['display_id']);
		                        //$this->db->update('cfs', $data1);
                                $this->send_noti($type,$fcm_key);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
						 elseif($type==9){
						 
						        $data1['status'] =1; 
		      	                $this->db->where('device_id', $data['display_id']);
		                        $this->db->update('non_schedule_download', $data1);
                                $this->send_noti($type,$fcm_key);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
						 elseif($type==10){
						 
						        $data1['status'] =0; 
		      	                $this->db->where('device_id', $data['display_id']);
		                        $this->db->update('non_schedule_download', $data1);
                                $this->send_noti($type,$fcm_key);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
						 elseif($type==11){
						 	    $data1['status'] =1; 
		      	                $this->db->where('device_id', $data['display_id']);
		                        $this->db->update('non_schedule_download', $data1);
                                $this->send_noti($type,$fcm_key);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
						 elseif($type==12){
						 
						        $data1['status'] =0; 
		      	                $this->db->where('device_id', $data['display_id']);
		                        $this->db->update('non_schedule_download', $data1);
                                $this->send_noti($type,$fcm_key);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
						 elseif($type==13){
						 	 //$data1['status'] =0; 
		      	             //$this->db->where('device_id', $data['display_id']);
		                     //$this->db->update('non_schedule_download', $data1);
                             $this->send_noti1($type,$fcm_key,$data['folder_name']);
						     $error['message'] = "sucsess";
							 $error['status'] = 1;

						 }
						 elseif($type==14){
						 	    //$this->send_noti($type,$fcm_key);
						 	    $this->send_noti2($type,$fcm_key,$data['section_id']);
								$error['message'] = "sucsess";
								$error['status'] = 1;
						 }
					      
					 }else{
						 $error['message'] = "type:device id not found on device table.";
						 $error['status'] = 0;					 
					 
					 }
		  
		  }	 
	 		header('Content-type: application/json');
		    echo json_encode($error);	 
	 
	 }
	 function send_noti($type,$target){

	 	
		//FCM API end-point
	  
	 
		$url = 'https://fcm.googleapis.com/fcm/send';
		//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
		//$server_key = 'AAAAMhIZy3g:APA91bEQOTfn1saWKViqvhbto7ujFQ0S9pDvKndI8XbJf92y5kVb8Z6kZmyv2KizmQBKGhIL6GuhcpDH7vWI85E6SUkoXmxyT_tBRyPM-0xhgFbnXR2PohZRteMk-ZyqQ1_x7uIyOLHV';

		$server_key = 'AAAArS1Go4g:APA91bFpn9_y8VT98oRDMLpnXAp4lOrbwwfAWxii5klTOMKWAKPcU99My-ocgf6fUnVBPTPXpVXeSl2lGbRs3UxBH7ju7IVzGE_kq37W6aXyuFi2BXvW_GJVC6sjF5mAd5ldHUox-MvI';


		$data = array("via"=>"Menu_app","title"=>'test',"description"=>'test',"type"=>$type);
		$fields = array();
		$fields['data'] = $data;	
		if(is_array($target)){
			$fields['registration_ids'] = $target;
		}else{
			$fields['to'] = $target;
		}
		//header with content_type api key
		$headers = array(
		'Content-Type:application/json',
		   'Authorization:key='.$server_key
		);
		//CURL request to route notification to FCM connection server (provided by Google)	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			return false;
		}
		curl_close($ch);
			$jsn =json_decode($result);
		if($jsn->success){
			return true;
		}
		else{
			return true;
		} 
	 
	 }
	 function send_noti1($type,$target,$folder_name){

	 	
		//FCM API end-point
	  
	 
		$url = 'https://fcm.googleapis.com/fcm/send';
		//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
		//$server_key = 'AAAAMhIZy3g:APA91bEQOTfn1saWKViqvhbto7ujFQ0S9pDvKndI8XbJf92y5kVb8Z6kZmyv2KizmQBKGhIL6GuhcpDH7vWI85E6SUkoXmxyT_tBRyPM-0xhgFbnXR2PohZRteMk-ZyqQ1_x7uIyOLHV';

		$server_key = 'AAAArS1Go4g:APA91bFpn9_y8VT98oRDMLpnXAp4lOrbwwfAWxii5klTOMKWAKPcU99My-ocgf6fUnVBPTPXpVXeSl2lGbRs3UxBH7ju7IVzGE_kq37W6aXyuFi2BXvW_GJVC6sjF5mAd5ldHUox-MvI';


		$data = array("via"=>"Menu_app","title"=>'test',"description"=>'test',"type"=>$type,"folder_name"=>$folder_name);
		$fields = array();
		$fields['data'] = $data;	
		if(is_array($target)){
			$fields['registration_ids'] = $target;
		}else{
			$fields['to'] = $target;
		}
		//header with content_type api key
		$headers = array(
		'Content-Type:application/json',
		   'Authorization:key='.$server_key
		);
		//CURL request to route notification to FCM connection server (provided by Google)	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			return false;
		}
		curl_close($ch);
			$jsn =json_decode($result);
		if($jsn->success){
			return true;
		}
		else{
			return true;
		} 
	 
	 }
	 function send_noti2($type,$target,$section_id){

	 	
		//FCM API end-point
	  
	 
		$url = 'https://fcm.googleapis.com/fcm/send';
		//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
		//$server_key = 'AAAAMhIZy3g:APA91bEQOTfn1saWKViqvhbto7ujFQ0S9pDvKndI8XbJf92y5kVb8Z6kZmyv2KizmQBKGhIL6GuhcpDH7vWI85E6SUkoXmxyT_tBRyPM-0xhgFbnXR2PohZRteMk-ZyqQ1_x7uIyOLHV';

		$server_key = 'AAAArS1Go4g:APA91bFpn9_y8VT98oRDMLpnXAp4lOrbwwfAWxii5klTOMKWAKPcU99My-ocgf6fUnVBPTPXpVXeSl2lGbRs3UxBH7ju7IVzGE_kq37W6aXyuFi2BXvW_GJVC6sjF5mAd5ldHUox-MvI';


		$data = array("via"=>"Menu_app","title"=>'test',"description"=>'test',"type"=>$type,"section_id"=>$section_id);
		$fields = array();
		$fields['data'] = $data;	
		if(is_array($target)){
			$fields['registration_ids'] = $target;
		}else{
			$fields['to'] = $target;
		}
		//header with content_type api key
		$headers = array(
		'Content-Type:application/json',
		   'Authorization:key='.$server_key
		);
		//CURL request to route notification to FCM connection server (provided by Google)	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			return false;
		}
		curl_close($ch);
			$jsn =json_decode($result);
		if($jsn->success){
			return true;
		}
		else{
			return true;
		} 
	 
	 }
public function version(){

	    $data['device_id']=$this->input->get_post('device_id');
	    if(empty($data['device_id'])){
			$error['message'] = "device id:Required parameter missing";
			$error['status'] = 0;
	    }elseif(!empty($data)){
 
				 /*Version start*/ 
				 $device_id = $data['device_id']; 
				 $versions = $this->Webservice->getVersions($device_id);
				  if(!empty($versions)){
				  foreach($versions as $v){}
						 $error['versions'] = array(
							 "id"=>$v->id,
							 "device_id"=>$v->device_id,
							 "version_number"=>$v->version_number,
							 "device_update_time"=>$v->device_update_time,
							 "file_path"=>$v->file_path,
							 "status"=>$v->status,
							 "version_create"=>$v->version_create,

						 );
				  
					  $error['status'] = 1;
			           $error['message'] = "sucsess";				  
				   
				 }else{
					  $error['versions'] = (object) array();
					  $error['status'] = 0;
			           $error['message'] = "No data found";
				 } 

		  
		  }	      
	 		header('Content-type: application/json');
		    echo json_encode($error);	 
	 }
	public function download(){
		
		 $data['device_id']=$this->input->get_post('device_id');
		  	 	 
		  if(empty($data['device_id'])){
				 $error['message'] = "device id:Required parameter missing";
				 $error['status'] = 0;
		  }elseif(!empty($data)){	 
	       $device_id = $data['device_id'];
		  $downloads = $this->Webservice->getDownloads($device_id);
		  if(!empty($downloads)){
			  foreach($downloads as $d){
					 $error['downloads'][] = array(
						 "download_file_id"=>$d->id,
						 "file_name"=>$d->file_name,
						 "file_url"=>$d->file_url,
						 "file_folder_name"=>$d->file_folder_name,
						 "device_id"=>$d->device_id,
						 "status"=>$d->status,

					 );
			  }
			 $error['status'] = 1;
			 $error['message'] = "sucsess";			  
		 }else{
		 
			 $error['downloads'] = array();
			 $error['status'] = 0;
			 $error['message'] = "No data found";
		    }
         }		 
           
	 		header('Content-type: application/json');
		    echo json_encode($error);		 
	 
	 }	
	 public function get_emoji_images(){

	 	 $data['device_id']	  =	$this->input->get_post('device_id'); 
		 if(empty($data['device_id'])){
				$error['message'] = "device id:Required parameter missing";
				$error['status'] = "0";
		  }else{
                $device_id = $data['device_id'];
		        $emojiImages = $this->Webservice->getEmojiData($device_id);

		        //print_r("<pre/>");
		        //print_r($emojiImages[0]->banner_id);
		        //die;
		        if(!empty($emojiImages)){
			     foreach($emojiImages as $d){
			     	 $error['banner_image_url'] = $d->banner_image_url;
			     	 $error['bg_color'] = $d->bg_color;
			     	 $error['thank_you_msg'] = $d->thank_you_msg;

					 $error['emoji'][] = array(
						 "id"=>$d->id,
						 "image_url"=>$d->image_url,
						 "ref_text_en"=>$d->ref_text_en,
						 "ref_text_ar"=>$d->ref_text_ar,
						 "text_size"=>$d->text_size,
						 "text_color"=>$d->text_color,
					 );
			    }
			 $error['status'] = 1;
			 $error['message'] = "sucsess";			  
		 }else{
		 
			 $error['emojiImages'] = array();
			 $error['status'] = 0;
			 $error['message'] = "No data found";
		    }
		  }

		 $deletData = $this->Common_model->delete('cfs',array('device_id'=>$data['device_id']));
		 $deletData = $this->Common_model->delete('banner_image',array('banner_id'=>$emojiImages[0]->banner_id));


         //print_r("<pre/>");
         //print_r($error);
         //die;
		 header('Content-type: application/json');
		 echo json_encode($error);
	 }
	 public function save_feedback(){

	 	 $data['button_id']	       =	$this->input->get_post('button_id');
	 	 $data['device_id']	       =	$this->input->get_post('device_id');
	 	 $data['ref_text_en']	   =	$this->input->get_post('ref_text_en');
	 	 $data['ref_text_ar']	   =	$this->input->get_post('ref_text_ar');

	 	 if(empty($data['button_id'])){
				$error['message'] = "button id:Required parameter missing";
				$error['status'] = "0";
		 }
		 elseif(empty($data['device_id'])){
				$error['message'] = "device id:Required parameter missing";
				$error['status'] = "0";
		 }
		 elseif(empty($data['ref_text_en'])){
		 	    $error['message'] = "ref text en:Required parameter missing";
			    $error['status'] = "0";
		 }
		 elseif(empty($data['ref_text_ar'])){
		 	     $error['message'] = "ref text ar:Required parameter missing";
			     $error['status'] = "0";
		 }
		 else{
             $banner_id = $this->Webservice->getBannerId($data['button_id']);
		 	 $ThankMessage = $this->Webservice->getThankYouMessage($banner_id[0]->banner_id);
		 	 $this->db->insert( 'cfs_feedback', $data ); 
		     $id= $this->db->insert_id();   
		     if( !isset($id) || empty($id)){
				$error['status'] = 0;
		      }else{
			 $error['status'] = 1;
			 $error['message'] = $ThankMessage[0]->thank_you_msg;
		    }  
		 }
		 header('Content-type: application/json');
		 echo json_encode($error);
	}

	public function section_update_api()
	{
		 $section_id		            =	$this->input->get_post('section_id');
         $device_id                     =  $this->input->get_post('device_id');
         $section_type  = array();
		 $table = "cell_item_data";
		 $this->db->select("cell_item_data.cell_image_url,
			                    cell_item_data.imgStartx,
								cell_item_data.imgStartY,
								cell_item_data.imgendX,
								cell_item_data.imgendY,
								cell_item_data.text_value1,
						        cell_item_data.text_value2,
						        cell_item_data.text_color,
						        cell_item_data.text_size,
								cell_item_data.flash,
						        cell_item_data.flash_color,
								cell_item_data.padding,
								cell_item_data.text_align,
                                cell_item_data.text_place_index,
                                cell_item_data.cell_item_id, 
                                cell_item_data.text_align,  
                                cell_item_data.text_place_index,                             
								");
		 $this->db->where('cell_item_data.section_id',$section_id);	
		 $this->db->where('cell_item_data.device_id',$device_id);
		 $query = $this->db->get("cell_item_data");	
		 foreach ( $query->result_array() as $row ){
			       $section_type['table_update'][] = array(
				             'id' => $row['cell_item_id'],
							 'image_path' => $row['cell_image_url'],
							 'imgStartx' => $row['imgStartx'],
							 'imgStartY' => $row['imgStartY'],
							 'imgendX' => $row['imgendX'],
							 'imgendY' => $row['imgendY'],
							 'text_value1' => $row['text_value1'],
							 'text_value2' => $row['text_value2'],
							 'text_color' => $row['text_color'],
							 'text_size' => $row['text_size'],
							 'flash' => $row['flash'],
							 'flash_color' => $row['flash_color'],
							 'padding' => $row['padding'],
							 'text_align' => $row['text_align'],
							 'text_place_index' => $row['text_place_index']

	        );
		 }	
         $table = "text_data";
         $this->db->select("text_value");
         $this->db->where('text_data.section_id',$section_id);
         $this->db->where('text_data.device_id',$device_id);
         $text_query = $this->db->get("text_data");
         foreach ( $text_query->result_array() as $row ){
	               $section_type['text_update'] = $row['text_value'];
         } 
         $deletData = $this->Common_model->delete('cell_item_data',array('section_id'=>$section_id,'device_id'=>$device_id));
         $deletData = $this->Common_model->delete('text_data',array('section_id'=>$section_id,'device_id'=>$device_id));

         //$sound_info  = array();
		 $table1 = "audio_item_play";
		 $this->db->select("*");
	     $this->db->join('audio_item_master', 'audio_item_play.sound_id =  audio_item_master.sound_id','left');
		 $this->db->where('audio_item_play.device_id',$device_id);
		 $query1 = $this->db->get($table1);
		 foreach ( $query1->result_array() as $row ){
				  $section_type['sound_info'][] = array(
				       'sound_id' => $row['sound_id'],
					   'file_path' => $row['sound_path'],
				  );
		 }
	     $this->db->select("*");
	     $this->db->where('device_id',$device_id);
	     $query2 = $this->db->get('devices');
	     $users = $query2->result_array();
	     $section_type['sound_hit']   =  $users[0]['sound_interval'];
	   
         $this->db->select("*");
		 $this->db->where('device_id',$user_id);
		 $query = $this->db->get($table1);
		 foreach ( $query->result_array() as $row ){
		          $deleteData = $this->Common_model->delete('audio_item_play',array('device_id' => $device_id));
		   }
	     header('Content-type: application/json');
	     echo json_encode($section_type);	
	}

	public function section_update_api1()
	{
         //$section_id		            =	$this->input->get_post('section_id');
              $schedule_id		            =	$this->input->get_post('schedule_id');
              $this->db->select('section_id');
              $this->db->where('schedule_id', $schedule_id);
              $section = $this->db->get('section');
              $result = $section->result_array();
              $section_id = array_column($result, 'section_id');


              



         $device_id                     =  $this->input->get_post('device_id');
         $section_type  = array();
		 $table = "cell_item_data";
		 $this->db->select("cell_item_data.cell_image_url,
			                    cell_item_data.imgStartx,
								cell_item_data.imgStartY,
								cell_item_data.imgendX,
								cell_item_data.imgendY,
								cell_item_data.text_value1,
						        cell_item_data.text_value2,
						        cell_item_data.text_color,
						        cell_item_data.text_size,
								cell_item_data.flash,
						        cell_item_data.flash_color,
								cell_item_data.padding,
								cell_item_data.text_align,
                                cell_item_data.text_place_index,
                                cell_item_data.cell_item_id, 
                                cell_item_data.text_align,  
                                cell_item_data.text_place_index,                             
								");

		 //print_r($section_id);die;

		 if($section_id){
		 	$this->db->where_in('cell_item_data.section_id',$section_id);
		 }else{
		 	$section_id='';
		 	$this->db->where('cell_item_data.section_id',$section_id);
		 }
		 	
		 $this->db->where('cell_item_data.device_id',$device_id);
		 $query = $this->db->get("cell_item_data");	
		 foreach ( $query->result_array() as $row ){
			       $section_type['table_update'][] = array(
				             'id' => $row['cell_item_id'],
							 'image_path' => $row['cell_image_url'],
							 'imgStartx' => $row['imgStartx'],
							 'imgStartY' => $row['imgStartY'],
							 'imgendX' => $row['imgendX'],
							 'imgendY' => $row['imgendY'],
							 'text_value1' => $row['text_value1'],
							 'text_value2' => $row['text_value2'],
							 'text_color' => $row['text_color'],
							 'text_size' => $row['text_size'],
							 'flash' => $row['flash'],
							 'flash_color' => $row['flash_color'],
							 'padding' => $row['padding'],
							 'text_align' => $row['text_align'],
							 'text_place_index' => $row['text_place_index']

	        );
		 }	
         $table = "text_data";
         $this->db->select("text_value");
         if($section_id){
             $this->db->where_in('text_data.section_id',$section_id);
         }else{
         	$section_id='';
         	$this->db->where('text_data.section_id',$section_id);
         }
         $this->db->where('text_data.device_id',$device_id);
         $text_query = $this->db->get("text_data");
         foreach ( $text_query->result_array() as $row ){
	               $section_type['text_update'] = $row['text_value'];
         } 
         //print_r();
         //print_r
         if(@$section_id){
            
         	//$deletData = $this->Common_model->delete1('cell_item_data',array('section_id'=>$section_id,'device_id'=>$device_id));
            //$deletData = $this->Common_model->delete('text_data',array('section_id'=>$section_id,'device_id'=>$device_id));

            //$deletData = $this->common_model->delete('cell_item_data');
            //$deletData = $this->Common_model->delete('text_data');

            $deletData = $this->Common_model->delete1('cell_item_data',$section_id,$device_id);
            //$deletData = $this->Common_model->delete2('text_data',$section_id,$device_id);

                 
         }
         

         //$sound_info  = array();
		 $table1 = "audio_item_play";
		 $this->db->select("*");
	     $this->db->join('audio_item_master', 'audio_item_play.sound_id =  audio_item_master.sound_id','left');
		 $this->db->where('audio_item_play.device_id',$device_id);
		 $query1 = $this->db->get($table1);
		 foreach ( $query1->result_array() as $row ){
				  $section_type['sound_info'][] = array(
				       'sound_id' => $row['sound_id'],
					   'file_path' => $row['sound_path'],
				  );
		 }
	     $this->db->select("*");
	     $this->db->where('device_id',$device_id);
	     $query2 = $this->db->get('devices');
	     $users = $query2->result_array();
	     $section_type['sound_hit']   =  $users[0]['sound_interval'];
	   
         $this->db->select("*");
		 $this->db->where('device_id',$user_id);
		 $query = $this->db->get($table1);
		 foreach ( $query->result_array() as $row ){
		          $deleteData = $this->Common_model->delete('audio_item_play',array('device_id' => $device_id));
		   }
	     header('Content-type: application/json');
	     echo json_encode($section_type);
	}
}
?>