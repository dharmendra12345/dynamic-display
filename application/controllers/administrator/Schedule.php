<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller { 

function __construct(){
		parent::__construct();	
			        not_login();
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Calcutta');
	}
    public function index(){ 
		$data['title'] = 'Schedule';
		$data['active_tab_schedule'] = 'active';
	    $data['error'] = '';		
	    $data['schedule'] = $this->Common_model->getAll('schedule');
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/schedule/index',$data);
	    $this->load->view('administrator/include/inner_footer');
    }
	public function add_schedule(){  
		 $data['title'] = 'Add schedule';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('schedule_name','Schedule Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
		 
		     $datetime  = $_POST['schedule_end_date']." ".$_POST['schedule_end_time'];
			 
		 
			if($_POST['brightness']){
			  $brightness  = 255;
			}else{
			  $brightness  = $_POST['brightness'];
			} 
			$schedule_name = $_POST['schedule_name'];
			if($_POST['repeat_schedule']==1){
			    $repeat_schedule = 1;
			 }else{
			 $repeat_schedule = 0;
			 }
	        $array = array(
			    'schedule_name' => $schedule_name,
			    'schedule_start_time' => date('H:i:s',strtotime($_POST['schedule_start_time'])),
			    'schedule_end_time'   => date('H:i:s',strtotime($_POST['schedule_end_time'])),
				'schedule_start_date' => date('Y-m-d',strtotime($_POST['schedule_start_date'])),
			    'schedule_end_date'   => date('Y-m-d',strtotime($_POST['schedule_end_date'])),
				'schedule_end_datetime'   => date('Y-m-d H:i:s',strtotime($datetime)),
				
				
				'brightness'    => $brightness,
				'repeat_schedule'    => $repeat_schedule,
			    'schedule_create' =>date('Y-m-d H:i:s'),
				'schedule_update' =>date('Y-m-d H:i:s'),
			);
			$id = $this->Common_model->insertData('schedule',$array);
			 $array1 = array(
			   'schedule_end_datetime'   => date('Y-m-d H:i:s',strtotime($datetime)),
			);
			$array2 = array(
			   'schedule_end_datetime'   => date('Y-m-d H:i:s',strtotime($datetime)),
			);
			$this->Common_model->updateData('device_schedule',$array1,array('schedule_id' => $id));
			
			//$this->Common_model->updateData('device_download',$array2,array('schedule_id' => $id));
			
			
			$this->session->set_flashdata('item','Schedule Create Successfully');
		    redirect('administrator/manage-schedule');
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/schedule/addschedule',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_schedule(){
 
	       $data['title'] = 'Edit schedule'; 
		   $data['heading'] = 'Edit';
		   $data['singledata'] = $this->Common_model->getsingle('schedule',array('schedule_id' => $this->uri->segment('3')));
		 $this->form_validation->set_rules('schedule_name','Schedule Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
		     $datetime  = $_POST['schedule_end_date']." ".$_POST['schedule_end_time'];
		    
		 
		 
			$schedule_name = $_POST['schedule_name'];
			 if($_POST['repeat_schedule']==1){
			    $repeat_schedule = 1;
			 }
			 else{
			    $repeat_schedule = 0;
			 }
	        $array = array(
			   'schedule_name' => $schedule_name,
			   'schedule_start_time' => date('H:i:s',strtotime($_POST['schedule_start_time'])),
			   'schedule_end_time' => date('H:i:s',strtotime($_POST['schedule_end_time'])),
			   'schedule_start_date' => date('Y-m-d',strtotime($_POST['schedule_start_date'])),
			   'schedule_end_date' => date('Y-m-d',strtotime($_POST['schedule_end_date'])),
			   'schedule_end_datetime'   => date('Y-m-d H:i:s',strtotime($datetime)),
			   
			   
			   'brightness' => $_POST['brightness'],
			   'repeat_schedule'    => $repeat_schedule,
			   
			   'schedule_create' =>date('Y-m-d H:i:s'),
			   'schedule_update' =>date('Y-m-d H:i:s')
			);
			 $array1 = array(
			 
			   'device_schedule_update' =>date('Y-m-d H:i:s'),
			   'schedule_end_datetime'   => date('Y-m-d H:i:s',strtotime($datetime)),
			);
			
			 $array2 = array(
			 
			   //'update' =>date('Y-m-d H:i:s'),
			   'schedule_end_datetime'   => date('Y-m-d H:i:s',strtotime($datetime)),
			);
			
			$this->Common_model->updateData('schedule',$array,array('schedule_id' => $this->uri->segment('3')));
			$this->Common_model->updateData('device_schedule',$array1,array('schedule_id' => $this->uri->segment('3')));
			
			//$this->Common_model->updateData('device_download',$array2,array('schedule_id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','Schedule Edit Successfully');
		    redirect('administrator/manage-schedule');
			}
		   
		 $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/schedule/addschedule',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
		   
 	}
	 public function view_schedule(){
		 $data['title'] = 'View tournament';
	     $ids = $this->uri->segment('3');
	     $data['view_schedule'] = $this->Common_model->getsingle('schedule',array('schedule_id' => $ids));
	   
	     $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/schedule/view_schedule',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
	 }
	public function delete_schedule(){
		 $data['title'] = 'Delete Schedule';
	     $ids = $this->uri->segment('3');	  
	     $sections = $this->Common_model->getAllwhere('section',array('schedule_id'=>$ids));
		 foreach($sections as $s){
		 $this->Common_model->delete('cell_item_design',array('section_id' => $s->section_id));
		 $this->Common_model->delete('Image_item',array('section_id' => $s->section_id));
		 $this->Common_model->delete('text_item',array('section_id' => $s->section_id));
		 $this->Common_model->delete('video_item',array('section_id' => $s->section_id));
		 $this->Common_model->delete('web_item',array('section_id' => $s->section_id));
		 $this->Common_model->delete('download_files',array('section_id' => $s->section_id));
		 }
	     $deleteData = $this->Common_model->delete('section',array('schedule_id' => $ids));
	     $deleteData = $this->Common_model->delete('schedule',array('schedule_id' => $ids));
	     $this->session->set_flashdata('item','Schedule delete Successfully');
	     redirect('administrator/manage-schedule'); 
	}
	
}