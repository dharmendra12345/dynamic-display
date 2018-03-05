<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller { 

function __construct(){
		parent::__construct();	
			        not_login();
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Calcutta');
	}
    public function index() { 
		$data['title'] = 'Section';
		$data['active_tab_schedule'] = 'active';
	    $data['error'] = '';		
	    $data['web'] = $this->Common_model->jointwotable('web_item','section_id','section','section_id','','*');
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/web/index',$data);
	    $this->load->view('administrator/include/inner_footer');
    }
	public function add_web(){  
		 $data['section'] = $this->Common_model->getAll('section');
		 $data['title'] = 'Add web';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
	        $array = array(
			   'web_url' => $this->input->post('web_url'),
			   'section_id' => $this->input->post('sectiontype'),
			   'create' =>date('Y-m-d H:i:m:s'),
			 );
			 
			  $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
			 $array12 = array('update' => date('Y-m-d H:i:s'),);
			 
			 $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
			 
			$this->Common_model->insertData('web_item',$array);
			$this->session->set_flashdata('item','web item Create Successfully');
		    redirect('administrator/manage-web');
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/web/addweb',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_web(){
	       $data['title'] = 'Edit web'; 
		   $data['heading'] = 'Edit';
		   $data['singledata'] = $this->Common_model->getsingle('web_item',array('web_item_id' => $this->uri->segment('3')));
		   
			$data['section'] = $this->Common_model->getAll('section');
		    $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
		 $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
		 
		   $array12 = array('device_schedule_update' => date('Y-m-d H:i:s'),);
	        $array = array(
			   'web_url' => $this->input->post('web_url'),
			   'section_id' => $this->input->post('sectiontype'),    
			 );
			$this->Common_model->updateData('web_item',$array,array('web_item_id' => $this->uri->segment('3')));
			
			$this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
			
			$this->session->set_flashdata('item','web item edit Successfully');
		    redirect('administrator/manage-web');
			}
		 $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/web/addweb',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
 	}
	 
	 public function view_web()
	 {
		 $data['title'] = 'View web';
	     $ids = $this->uri->segment('3');
		 $data['singledata'] = $this->Common_model->getsingle('web_item',array('web_item_id' => $this->uri->segment('3')));
	     $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/web/view_web',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
	 }
	public function delete_web(){
		$data['title'] = 'Delete web';
	    $ids = $this->uri->segment('3');	  
	    $deleteData = $this->Common_model->delete('web_item',array('web_item_id' => $ids));
	    $this->session->set_flashdata('item','web item delete Successfully');
	    redirect('administrator/manage-web');
	}
	
}