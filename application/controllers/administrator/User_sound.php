<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_sound extends CI_Controller { 

function __construct(){
		parent::__construct();	
			        not_login();
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Calcutta');
	}
    public function index() {
		$data['title'] = 'Section';
		$data['active_tab_sound_assign'] = 'active';
	    $data['error'] = '';		
        $data['audio'] = $this->Common_model->jointwotable('audio_item_play','sound_id','audio_item_master','sound_id','','*');
		
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/user_sound/index',$data);
	    $this->load->view('administrator/include/inner_footer');
    }
	public function add_audio(){  
	
		 $data['users']        = $this->Common_model->getAll('devices');
		 $data['audio_item']   = $this->Common_model->getAll('audio_item_master');
		 
		 $data['title'] = 'Add audio';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('user','User Id','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
		   // print_r("<pre/>");
			//print_r($_POST);
			//die;
		 

	       /* $array = array(
			   'sound_path' => $this->input->post('sound_path'),
			   'sound_create' =>date('Y-m-d H:i:s'),
			   'sound_update' =>date('Y-m-d H:i:s')
			 );*/
			 
			//$id = $this->Common_model->insertData('audio_item',$array);
			$array1 = array(
			   //'sound_path' => $this->input->post('sound_path'),
			   'sound_id' => $_POST['sound'],
			   'device_id' => $_POST['user'],
			   'create' =>date('Y-m-d H:i:s'),
			   //'update' =>date('Y-m-d H:i:s'),
			 );
			$this->Common_model->insertData('audio_item_play',$array1);
			$this->session->set_flashdata('item','Sound Create Successfully');
		    redirect('administrator/manage-user-sound');
			
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/user_sound/addaudio',$data);
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
	public function delete_audio(){
	
       $data['title'] = 'Delete audio';
	   $ids = $this->uri->segment('3');	  
	   //$deleteData = $this->Common_model->delete('audio_item',array('sound_id' => $ids));
	   $deleteData1 = $this->Common_model->delete('audio_item_play',array('id' => $ids));  
	   $this->session->set_flashdata('item','audio item delete Successfully');  
	   redirect('administrator/manage-user-sound');
	}
	
	
}