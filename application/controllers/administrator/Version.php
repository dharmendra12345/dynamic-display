<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Version extends CI_Controller { 

function __construct(){
		parent::__construct();	
			        not_login();
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Calcutta');
	}
    public function index() {
	
		$data['title'] = 'Version';
		$data['active_tab_version'] = 'active';
	    $data['error'] = '';		
		$data['version'] = $this->Common_model->getAll('version');
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/version/index',$data);
	    $this->load->view('administrator/include/inner_footer');
    }
	public function add_version(){  
	
		 //$data['users'] = $this->Common_model->getAll('users');
		 $data['title'] = 'Add version';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('link','Link','trim|required');	
		 	
		 if($this->form_validation->run() == 'true'){ 
		
	        $array = array(
			   'link' => $this->input->post('link'),
			   'version_number' => $this->input->post('version_name'),
			   'create' =>date('Y-m-d H:i:s'),
			 );
			$id = $this->Common_model->insertData('version',$array);
			

			$this->session->set_flashdata('version','Version Create Successfully');
		    redirect('administrator/manage-version');
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/version/addversion',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_version(){
	
	   //echo "test";die;
 
	       $data['title'] = 'Edit version'; 
		   $data['heading'] = 'Edit';
		   $data['singledata'] = $this->Common_model->getsingle('version',array('id' => $this->uri->segment('3')));
		   
		    //$data['singledata1'] = $this->Common_model->getsingle('audio_item1',array('sound_id' => $this->uri->segment('3')));
		   
		 $this->form_validation->set_rules('link','Link','trim|required');		
 		
		 if($this->form_validation->run() == 'true'){ 
		 
	     	  $array = array(
			   'link' => $this->input->post('link'),
			   'version_number' => $this->input->post('version_name'),
			 );

 
	$this->Common_model->updateData('version',$array,array('id' => $this->uri->segment('3')));
			
			$this->session->set_flashdata('item','Version item edit Successfully');
		    redirect('administrator/manage-version');
			}
		   
		 $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/version/addversion',$data);
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
	public function delete_version(){
	
       $data['title'] = 'Delete version';
	   $ids = $this->uri->segment('3');	  
	   $deleteData = $this->Common_model->delete('version',array('id' => $ids));
	   //$deleteData1 = $this->Common_model->delete('audio_item1',array('sound_id' => $ids));  
	   $this->session->set_flashdata('item','audio item delete Successfully');  
	   redirect('administrator/manage-version');
	}
	
	
}