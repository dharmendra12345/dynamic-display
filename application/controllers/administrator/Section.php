<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller { 

function __construct(){
		parent::__construct();	
			        not_login();
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Calcutta');
		
		
	}
    public function index() 
	{ 
		$data['title'] = 'Section';
		$data['active_tab_schedule'] = 'active';
	    $data['error'] = '';		
	    $data['section'] = $this->Common_model->jointhreetableleft('section','schedule_id','schedule','schedule_id','section_type','section_type_id','section_type','','','','*');
			// print_r("<pre/>");
			 //print_r($data['section']);die;
			 
			 
		//print_r("<pre/>");
		//print_r($data['section']);
		//die;	 
			
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/section/index',$data);
	    $this->load->view('administrator/include/inner_footer');
		 
    }
	public function add_section(){  
	
		 $data['sectiontype'] = $this->Common_model->getAll('section_type');
		 $data['schedule'] = $this->Common_model->getAll('schedule');
		 $data['title'] = 'Add section';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 $this->form_validation->set_rules('schedule','Schedule type Name','trim|required');		
		 $this->form_validation->set_rules('start_x_cordinate','start_x_cordinate','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
		      if($_POST['sectiontype'] ==2){
			      $video_mute = $_POST['video_mute'];
			  }else{
			      $video_mute = 0;
			  }
		 
	        $array = array(
			   'schedule_id' => $this->input->post('schedule'),
			   'section_type' => $this->input->post('sectiontype'),
			   'start_x_cordinate' => $this->input->post('start_x_cordinate'),
			   'name' => $this->input->post('name'),
			   'start_y_cordinate' =>$this->input->post('start_y_cordinate'),
			   'end_x_cordinate' => $this->input->post('end_x_cordinate'),
			   'end_y_cordinate' => $this->input->post('end_y_cordinate'),
			   'section_backgorund_color' =>$this->input->post('section_backgorund_color'),
			   
			   
			   'image_flip_interval' =>$this->input->post('image_flip_interval'),
			   'page_flip_interval' =>$this->input->post('cell_flip_interval'),
			   'text_flip_interval' =>$this->input->post('text_flip_interval'),
			   'web_refresh_interval' =>$this->input->post('web_refresh_interval'),
			   'video_mute' =>$video_mute,
			   'order_by' => $this->input->post('order_by'),

			   'update_interval' => $this->input->post('update_interval'),
			   
			   'section_create' =>date('Y-m-d H:i:m:s'),
			 );
			
			//print_r("<pre/>");
			//print_r($array);die;
			
			$id = $this->Common_model->insertData('section',$array);
			
		    $data['singledata'] = $this->Common_model->getsingle('section',array('section_id' => $id));
			$array1 = array(
			   'device_schedule_update' =>date('Y-m-d H:i:s')
			);
	$this->Common_model->updateData('device_schedule',$array1,array('schedule_id' => $data['singledata']->schedule_id));
			
			
			//echo $id;die;
			$this->session->set_flashdata('item','Section Create Successfully');
		    redirect('administrator/manage-section');
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/section/addsection',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_section(){
 
	       $data['title'] = 'Edit section'; 
		   $data['heading'] = 'Edit';
		   $data['singledata'] = $this->Common_model->getsingle('section',array('section_id' => $this->uri->segment('3')));
		   
		  // $data['singledata1'] = $this->Common_model->getsingle('schedule',array('section_id' => $this->uri->segment('3')));
		   
		   
		   //print_r("<pre/>");
		   //print_r($data['singledata']->schedule_id);
		   //die;
		   
			
		$data['sectiontype'] = $this->Common_model->getAll('section_type');
		
			 
		 $data['schedule'] = $this->Common_model->getAll('schedule');
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');	
		 $this->form_validation->set_rules('schedule','Schedule type Name','trim|required');		
		 $this->form_validation->set_rules('start_x_cordinate','start_x_cordinate','trim|required');			
		 if($this->form_validation->run() == 'true'){ 
		 
		    if($_POST['sectiontype'] ==2){
			      $video_mute = $_POST['video_mute'];
			  }else{
			      $video_mute = 0;
			  }
		 
		 
		 
	        $array = array(
			   'schedule_id' => $this->input->post('schedule'),
			   'section_type' => $this->input->post('sectiontype'),
			   'name' => $this->input->post('name'),
			   'start_x_cordinate' => $this->input->post('start_x_cordinate'),
			   'start_y_cordinate' =>$this->input->post('start_y_cordinate'),
			   'end_x_cordinate' => $this->input->post('end_x_cordinate'),
			   'end_y_cordinate' => $this->input->post('end_y_cordinate'),
			   'section_backgorund_color' =>$this->input->post('section_backgorund_color'),
			   
			   'image_flip_interval' =>$this->input->post('image_flip_interval'),
			   'page_flip_interval' =>$this->input->post('cell_flip_interval'),
			   'text_flip_interval' =>$this->input->post('text_flip_interval'),
			   'web_refresh_interval' =>$this->input->post('web_refresh_interval'),
			   'video_mute' =>$video_mute,
			   'order_by' => $this->input->post('order_by'),
			   'update_interval' => $this->input->post('update_interval'),
			   
			 );
			
			//print_r("<pre/>");
			//print_r($array);die;
			
			 $array1 = array(
			   'update' =>date('Y-m-d H:i:s')
			);
	$this->Common_model->updateData('device_schedule',$array1,array('schedule_id' => $data['singledata']->schedule_id));
			
			
			
			
			
			$this->Common_model->updateData('section',$array,array('section_id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','Section Edit Successfully');
		    redirect('administrator/manage-section');
			}
		   
		 $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/section/addsection',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
		   
		   
 	}
	 
	 public function view_section()
	 {
		 $data['title'] = 'View section';
	     $ids = $this->uri->segment('3');
		 $where = array('section.section_id' => $ids);
		 $data['section'] = $this->Common_model->jointhreetableleft('section','schedule_id','schedule','schedule_id','section_type','section_type_id','section_type',$where,'','','*');
		 
		    
		 //print_r("<pre/>");
			//print_r($data['section'] );die;
	     
	   
	     $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/section/view_section',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
	 }
	 
	  public function disable()
	 {
		 $data['title'] = 'Disable Tournament';
		 //segment
	   $ids = $this->uri->segment('3');
	  
	   $disable_user = $this->Common_model->getsingle('tournament',array('id' => $ids));	
        if($disable_user->status == 2)
        {			
		   $array = array(			  
			   'status' => 1
			);			
			$this->Common_model->updateData('tournament',$array,array('id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','Tournament active Successfully');
			 redirect('administrator/manage-tournament');
		}else
        {
			$array = array(			  
			   'status' => 2
			);			
			$this->Common_model->updateData('tournament',$array,array('id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','Tournament deactive Successfully');
			 redirect('administrator/manage-tournament');
		}	
	    
	 }
	 
	 public function tournament_st()
	 {
		 $data['title'] = 'Tournament Status';
		 $tournament_status = $this->input->post('tournament_status');
		 $test = '';
		 if($tournament_status == 'Paid')
		 {
			 $test .= '<div class="form-group">';
			 $test .= '<label class="col-sm-2 control-label">Entry Fee </label>';
			 $test .= '<div class="col-sm-7" >';
			 $test .= '<input type="text" class="form-control" name="tournament_charges" id="tournament_charges" value="" />';			 
             $test .= '</div>';
             $test .= '</div>';			 
		}
		 
		echo $test;
	 }
	 
	 public function edit_tournament_st()
	 {
		 $data['title'] = 'Tournament Status';
		 $tournament_status = $this->input->post('tournament_status');
		 $tournament_id = $this->input->post('tournament_id');
         $tournamentData = $this->Common_model->getsingle('tournament',array('id' => $tournament_id));		 
		 $test = '';
		 if($tournament_status == 'Paid')
		 {
			 $test .= '<div class="form-group">';
			 $test .= '<label class="col-sm-2 control-label">Entry Fee </label>';
			 $test .= '<div class="col-sm-7" >';
			 $test .= '<input type="text" class="form-control" name="tournament_charges" id="tournament_charges" value="'.$tournamentData->tournament_charges.'" />';			 
             $test .= '</div>';
             $test .= '</div>';			 
		}
		 
		echo $test;
	 }
	 
	public function delete_section()
	{
	
		$data['title'] = 'Delete Schedule';
		 //segment
	    $ids = $this->uri->segment('3');	  
	   
	   //print_r("<pre/>");
	  // print_r($ids);
	   //die;
	     $this->Common_model->delete('cell_item_design',array('section_id' => $ids));
		 $this->Common_model->delete('Image_item',array('section_id' => $ids));
		 $this->Common_model->delete('text_item',array('section_id' => $ids));
		 $this->Common_model->delete('video_item',array('section_id' => $ids));
		 $this->Common_model->delete('web_item',array('section_id' => $ids));
		 
		 $this->Common_model->delete('download_files',array('section_id' => $ids));
		 
		 
	     $deleteData = $this->Common_model->delete('section',array('section_id' => $ids));
	     $this->session->set_flashdata('item','Section delete Successfully');
   
	    redirect('administrator/manage-section');
	}
	
	
}