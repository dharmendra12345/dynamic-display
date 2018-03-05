<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cell extends CI_Controller { 

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
	    $data['image'] = $this->Common_model->jointwotable('cell_item_design','section_id','section','section_id','','*');
	      $this->load->view('administrator/include/inner_header',$data);
	      $this->load->view('administrator/cell/index',$data);
	      $this->load->view('administrator/include/inner_footer');
    }
	public function add_cell(){  
	
		 $data['section'] = $this->Common_model->getAll('section');
		 $data['title'] = 'Add image';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
	        $array = array(
			   'cell_bg_color' => $this->input->post('cell_bg_color'),
			   'cell_border_color' => $this->input->post('cell_border_color'),
			   'section_id' => $this->input->post('sectiontype'),
			   'cell_start_x' => $this->input->post('cell_start_x'),
			   'cell_start_y' => $this->input->post('cell_start_y'),
			   'cell_end_x' => $this->input->post('cell_end_x'),
			   'cell_end_y' => $this->input->post('cell_end_y'),
			   'page_no' => $this->input->post('page_no'),
			   'required' => $this->input->post('required'),
			   'radius' => $this->input->post('radius'),
			   'create' =>date('Y-m-d H:i:s'),
			   'update' =>date('Y-m-d H:i:s')
			 );
			$id = $this->Common_model->insertData('cell_item_design',$array);
			/*$array1 = array(
			   'cell_image_url' => $this->input->post('cell_image_url'),
			   'imgStartx' => $this->input->post('imgStartx'),
			   'imgStartY' => $this->input->post('imgStartY'),
			   'imgendX' => $this->input->post('imgendX'),
			   'imgendY' => $this->input->post('imgendY'),
			   'text_value1' => $this->input->post('text_value1'),
			   'text_value2' => $this->input->post('text_value2'),
			   'text_color' => $this->input->post('text_color'),
			   'text_size' => $this->input->post('text_size'),
			   'flash' => $this->input->post('flash'),
			   'flash_color' => $this->input->post('flash_color'),
			   'section_id' => $this->input->post('sectiontype'),
			   'padding' => $this->input->post('padding'),
			   'cell_item_id' => $id,
			   'create' =>date('Y-m-d H:i:s'),
			   'update' =>date('Y-m-d H:i:s')
			 );*/
			//$this->Common_model->insertData('cell_item_data',$array1);
			
			$array12 = array(
				   'update' => date('Y-m-d H:i:s'),
				 );
			  $data['singledata'] = $this->Common_model->getsingle('section',array('section_id' => $_POST['sectiontype']));
			  $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata']->schedule_id));
			
			$this->session->set_flashdata('item','Cell Create Successfully');
		    redirect('administrator/manage-cell');
			
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/cell/addcell',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_cell(){
 
	       $data['title'] = 'Edit cell'; 
		   $data['heading'] = 'Edit';
		   $data['singledata'] = $this->Common_model->getsingle('cell_item_design',array('cell_item_id' => $this->uri->segment('3')));
		   
		    //$data['singledata1'] = $this->Common_model->getsingle('cell_item_data',array('cell_item_id' => $this->uri->segment('3')));
		   
		 $data['section'] = $this->Common_model->getAll('section');
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
	     	  $array = array(
			    'cell_bg_color' => $this->input->post('cell_bg_color'),
			   'cell_border_color' => $this->input->post('cell_border_color'),
			   'section_id' => $this->input->post('sectiontype'),
			   'cell_start_x' => $this->input->post('cell_start_x'),
			   'cell_start_y' => $this->input->post('cell_start_y'),
			   'cell_end_x' => $this->input->post('cell_end_x'),
			   'cell_end_y' => $this->input->post('cell_end_y'),
			   'page_no' => $this->input->post('page_no'),
			   'required' => $this->input->post('required'),
			   'radius' => $this->input->post('radius'),
			   'update' =>date('Y-m-d H:i:s')
			   
			 );
		 
		 $array1 = array(
			   'cell_image_url' => $this->input->post('cell_image_url'),
			   'imgStartx' => $this->input->post('imgStartx'),
			   'imgStartY' => $this->input->post('imgStartY'),
			   'imgendX' => $this->input->post('imgendX'),
			   'imgendY' => $this->input->post('imgendY'),
			   'text_value1' => $this->input->post('text_value1'),
			   'text_value2' => $this->input->post('text_value2'),
			   'text_color' => $this->input->post('text_color'),
			   'text_size' => $this->input->post('text_size'),
			   'flash' => $this->input->post('flash'),
			   'flash_color' => $this->input->post('flash_color'),
			   'section_id' => $this->input->post('sectiontype'),
			   'padding' => $this->input->post('padding'),
			   'cell_item_id' => $this->uri->segment('3'),
			   'update' =>date('Y-m-d H:i:s')
			 );
			 
			 
			 if($data['singledata']->cell_start_x != $_POST['cell_start_x'] or
		      $data['singledata']->cell_start_y != $_POST['cell_start_y'] or
			  $data['singledata']->cell_end_x != $_POST['cell_end_x'] or
			  $data['singledata']->cell_end_y != $_POST['cell_end_y'] or
			  $data['singledata']->page_no != $_POST['page_no'] or
			  $data['singledata']->required != $_POST['required'] or
			  
			  $data['singledata']->cell_bg_color != $_POST['cell_bg_color'] or
			  
			  $data['singledata']->cell_border_color != $_POST['cell_border_color'] or
			  $data['singledata']->radius != $_POST['radius']
			  
			  ){
			  
			       $data_post['update'] = date('Y-m-d H:i:s');
				   $array12 = array(
				   'update' => date('Y-m-d H:i:s'),
				  );
				  $data['singledata'] = $this->Common_model->getsingle('section',array('section_id' => $_POST['sectiontype']));
				  $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata']->schedule_id));
				  
				  
			  }
		 
			$this->Common_model->updateData('cell_item_design',$array,array('cell_item_id' => $this->uri->segment('3')));
			//$this->db->select("*");
			//$this->db->where('cell_item_data.cell_item_id', $this->uri->segment('3'));
			//$query1 = $this->db->get('cell_item_data');
			//$result = $query1->result_array();
			
			
			/*if(!empty($result)){
			
			$this->Common_model->updateData('cell_item_data',$array1,array('cell_item_id' => $this->uri->segment('3')));
			}else{
			
			    $array1 = array(
			    'cell_image_url' => $this->input->post('cell_image_url'),
			   'imgStartx' => $this->input->post('imgStartx'),
			   'imgStartY' => $this->input->post('imgStartY'),
			   'imgendX' => $this->input->post('imgendX'),
			   'imgendY' => $this->input->post('imgendY'),
			   'text_value1' => $this->input->post('text_value1'),
			   'text_value2' => $this->input->post('text_value2'),
			   'text_color' => $this->input->post('text_color'),
			   'text_size' => $this->input->post('text_size'),
			   'flash' => $this->input->post('flash'),
			   'flash_color' => $this->input->post('flash_color'),
			   'section_id' => $this->input->post('sectiontype'),
			   'padding' => $this->input->post('padding'),
			   'cell_item_id' => $this->uri->segment('3'),
			   'create' =>date('Y-m-d H:i:s'),
			   'update' =>date('Y-m-d H:i:s')
			 );
			
			  $this->Common_model->insertData('cell_item_data',$array1);
			}*/
			
			$this->session->set_flashdata('item','Cell item edit Successfully');
		    redirect('administrator/manage-cell');
			}
		   
		 $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/cell/addcell',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
		   
		   
 	 }
	 public function view_cell(){
		 $data['title'] = 'View cell';
	     $ids = $this->uri->segment('3');
		   $data['singledata'] = $this->Common_model->getsingle('cell_item_design',array('cell_item_id' => $this->uri->segment('3')));
		 
	     $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/cell/view_cell',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
	 }
	public function delete_cell(){
       $data['title'] = 'Delete cell';
	   $ids = $this->uri->segment('3');	  
	   $deleteData = $this->Common_model->delete('cell_item_design',array('cell_item_id' => $ids));
	   $deleteData1 = $this->Common_model->delete('cell_item_data',array('cell_item_id' => $ids));  
	   $this->session->set_flashdata('item','cell item delete Successfully');  
	   redirect('administrator/manage-cell');
	}
}