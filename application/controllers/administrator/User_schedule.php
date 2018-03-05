<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_schedule extends CI_Controller { 

function __construct(){
		parent::__construct();	
			        not_login();
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Calcutta');
	}
    public function index() {
	  
		$data['title'] = 'Section';
		$data['active_tab_schedule_assign'] = 'active';
	    $data['error'] = '';		
       $data['schedule'] = $this->Common_model->jointwotable('device_schedule','schedule_id','schedule','schedule_id','','*');
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/user_schedule/index',$data);
	    $this->load->view('administrator/include/inner_footer');
    }
	public function add_schedule(){  
	
		        $data['users']         = $this->Common_model->getAll('devices');
		        $data['schedule']      = $this->Common_model->getAll('schedule');
		        $data['title'] = 'Add schedule';
		        $data['heading'] = 'Add';
		        $this->form_validation->set_rules('user','User Id','trim|required');		
		        if($this->form_validation->run() == 'true'){ 
					 
					 $this->db->select('section_id');
					 $this->db->where('schedule_id', $_POST['schedule']);
					 $schedule = $this->db->get('section');
					 $result = $schedule->result_array();
					 $last_names1 = array_column($result, 'section_id');
					 					 
					 
					 $this->db->select('*');
		             $this->db->where_in('section_id', $last_names1);
					 $download = $this->db->get('download_files');
					 $download_result = $download->result_array();
					 
				
				    if($_POST['schedule_type']==1){
			         $schedule_type = '0';
			        }else{
			           $schedule_type = 1;
			        }
			 
			        $this->db->select('*');
	                $this->db->where('device_id', $_POST['user']);
					$this->db->where('schedule_type', 0);
					$user = $this->db->get('device_schedule');
					//$users = $user->result_array();
					if($user->num_rows() >=1 ){
					   $schedule_type = 1;
					 }

		 
				$array1 = array(
				   'schedule_id' => $_POST['schedule'],
				   'device_id' => $_POST['user'],
				   'schedule_type' => $schedule_type,
				   'device_schedule_create' =>date('Y-m-d H:i:s'),
				 );
	           $id = $this->Common_model->insertData('device_schedule',$array1);
	            $array_download = array(
				    'type' => $schedule_type,
				    //'schedule_end_datetime'   => '0000-00-00 00:00:00',
				 );
				 //if($schedule_type == 0){
//$this->Common_model->updateData('device_download',$array_download,array('schedule_id' => $_POST['schedule']));
                //}
	
	         foreach($download_result as $download_result1 ){
			 

			 $array2 = array(
					   'schedule_id' => $_POST['schedule'],
					   'device_id' => $_POST['user'],
					   'file_status' => "W",
					   //'create' =>date('Y-m-d H:i:s'),
					   'update_status' =>date('Y-m-d H:i:s'),
					   //'user_schedule_id'=>$id,
					   'download_file_id'=>$download_result1['download_file_id'],

					   'device_schedule_id' => $id,
					 );
					 
	
	        $this->Common_model->insertData('device_download_status',$array2);
			
		 }	
		 
		 $this->db->select('*');
         $this->db->where_in('section_id', $last_names1);
         $cell_item = $this->db->get('cell_item_data');
         $cell_item_results = $cell_item->result_array();
		 
		 //print_r("<pre/>");
		 //print_r($cell_item_results);
		 //die;
         foreach($cell_item_results as $cell_item_result ){
             $array3 = array(
					   'section_id' => $cell_item_result['section_id'],
					   'device_id' => $_POST['user'],
					   'create' =>date('Y-m-d H:i:s'),
					   'update' =>date('Y-m-d H:i:s'),
					   'cell_item_id'=>$cell_item_result['id']
					 );
					 
	        //$this->Common_model->insertData('device_cell_item_data',$array3);




	     }


		 
		//$this->Common_model->updateData('cell_item',$array,array('cell_item_id' => $this->uri->segment('3')));
			
			
			$this->session->set_flashdata('item','User Schedule Create Successfully');
		    redirect('administrator/manage-user-schedule');
			
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/user_schedule/adduser',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_cell(){
 
	       $data['title'] = 'Edit sound'; 
		   $data['heading'] = 'Edit';
		   $data['singledata'] = $this->Common_model->getsingle('audio_item',array('sound_id' => $this->uri->segment('3')));
		   
		    $data['singledata1'] = $this->Common_model->getsingle('audio_item1',array('sound_id' => $this->uri->segment('3')));
		   
		 $this->form_validation->set_rules('user','User Id','trim|required');		
 		
		 if($this->form_validation->run() == 'true'){ 
		 
	     	  $array = array(
			   'sound_path' => $this->input->post('sound_path'),
			 );
		 
		 $array1 = array(
			    'sound_path' => $this->input->post('sound_path'),
				'user_id' => $this->input->post('user_id'),
				'sound_id' => $id,
			 );
		 
 
	$this->Common_model->updateData('cell_item',$array,array('cell_item_id' => $this->uri->segment('3')));
	$this->Common_model->updateData('cell_item1',$array1,array('cell_item_id' => $this->uri->segment('3')));
			
			$this->session->set_flashdata('item','Cell item edit Successfully');
		    redirect('administrator/manage-cell');
			}
		   
		 $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/cell/addcell',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
		   
 	 }
	 public function view_audio(){
		 $data['title'] = 'View audio';
	     $ids = $this->uri->segment('3');
		   $data['singledata'] = $this->Common_model->getsingle('audio_item',array('sound_id' => $this->uri->segment('3')));
		 
	     $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/cell/view_audio',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
	 }
	public function delete_schedule(){
	
       $data['title'] = 'Delete schedule';
	   $ids = $this->uri->segment('3');	  
	   //$deleteData = $this->Common_model->delete('audio_item',array('sound_id' => $ids));
	   $deleteData1 = $this->Common_model->delete('device_schedule',array('id' => $ids));  
	   $deleteData1 = $this->Common_model->delete('device_download_status',array('device_schedule_id' => $ids));
	   $this->session->set_flashdata('item','audio item delete Successfully');  
	   redirect('administrator/manage-user-schedule');
	}
	
	
}