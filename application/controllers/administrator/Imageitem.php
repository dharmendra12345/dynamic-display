<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Imageitem extends CI_Controller { 
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
	    $data['image'] = $this->Common_model->jointwotable('Image_item','section_id','section','section_id','','*');
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/image/index',$data);
	    $this->load->view('administrator/include/inner_footer');
    }
	public function add_image(){  
		 $data['section'] = $this->Common_model->getAll('section');
		 $data['title'] = 'Add image';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		     $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
			 $array12 = array('update' => date('Y-m-d H:i:s'),);
			 $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
	        $array = array(
			   'image_url' => $this->input->post('image_url'),
			   'section_id' => $this->input->post('sectiontype'),
			   'downloadable' => $this->input->post('downloadable'),
			   'file_name' => $this->input->post('file_name'),
			   'create' =>date('Y-m-d H:i:m:s'),
			 );
			$id = $this->Common_model->insertData('Image_item',$array);
			if($_POST['downloadable'] ==1){
			    $array1 = array(
			   'file_name' => $this->input->post('file_name'),
			  // 'file_status' => "W",
			   'file_start_time' => $this->input->post('file_start_time'),
			   'image_url' => $this->input->post('image_url'),
			   'downloadable' => $this->input->post('downloadable'),
			   'section_id' => $this->input->post('sectiontype'),
			   'section_type_id' => 1,
			   'file_item_id' => $id,
			   'create' =>date('Y-m-d H:i:s'),
			   //'update' =>date('Y-m-d H:i:s')
			   );
			   $this->Common_model->insertData('download_files',$array1);
			   $array2 = array(
			   'update' =>date('Y-m-d H:i:s'),
			   'download_file_id'=>$id,
			);
//$this->Common_model->updateData('device_download',$array2,array('download_file_id' =>$id ));
			}
			$this->session->set_flashdata('item','Image Item item Create Successfully');
		    redirect('administrator/manage-imageitem');
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/image/addimage',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_image(){
	    $data['title'] = 'Edit image'; 
		 $data['heading'] = 'Edit';
		 $data['singledata'] = $this->Common_model->getsingle('Image_item',array('Image_item_id' => $this->uri->segment('3')));
		 $data['singledata1'] = $this->Common_model->getsingle('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>1));
		 $data['section'] = $this->Common_model->getAll('section');
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
			   $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
			 $array12 = array('device_schedule_update' => date('Y-m-d H:i:s'),);
			 $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
     
		     if($_POST['downloadable'] == 1){
			          $data['singledata'] = $this->Common_model->getsingle('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>1));
							    $array = array(
									   'image_url' => $this->input->post('image_url'),
									   'section_id' => $this->input->post('sectiontype'), 
									   'downloadable' => $this->input->post('downloadable'),
									   'file_name' => $this->input->post('file_name'),);
					 
							    $array1 = array(
										   'file_name' => $this->input->post('file_name'),
										   'file_start_time' => $this->input->post('file_start_time'),
										   'image_url' => $this->input->post('image_url'),
										   'downloadable' => $this->input->post('downloadable'),
										   'section_id' => $this->input->post('sectiontype'),
										   'section_type_id' => 1,
										   'file_item_id' => $this->uri->segment('3'),
										   'create' =>date('Y-m-d H:i:s'),
										  // 'update' =>date('Y-m-d H:i:s')

										  // 'file_status' => "W",
										);
			 
		                if($data['singledata']){	 
		                            $this->Common_model->updateData('Image_item',$array,array('Image_item_id' => $this->uri->segment('3')));
		                }else{
		                            $this->Common_model->insertData('download_files',$array1);
							}
							$array1 = array(
							   'file_name' => $this->input->post('file_name'),
							   'file_start_time' => $this->input->post('file_start_time'),  
							   'downloadable' => $this->input->post('downloadable'),
							  'image_url' => $this->input->post('image_url'),

							 // 'file_status' => "W",
							  //'update' =>date('Y-m-d H:i:s'),
							 );
							  $new_array = array(
									   'image_url' => $this->input->post('image_url'),
									   'downloadable' => $this->input->post('downloadable'),
									   'file_name' => $this->input->post('file_name'),);
							 
							 
							 
 $this->Common_model->updateData('download_files',$array1,array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>1));
 
 $this->Common_model->updateData('Image_item',$new_array,array('Image_item_id' => $this->uri->segment('3')));
 
 
 
 $array2 = array(
			   'update' =>date('Y-m-d H:i:s'),
			   'download_file_id'=>$this->uri->segment('3'),
			);
			
			//$this->Common_model->updateData('device_download',$array2,array('download_file_id' =>$this->uri->segment('3') ));  
 	
			 }else{
			  
			      $array = array(
			   'image_url' => $this->input->post('image_url'),
			   'section_id' => $this->input->post('sectiontype'), 
			   'downloadable' => $this->input->post('downloadable'), 
			   'file_name' => $this->input->post('file_name'), 
			 );
		  $this->Common_model->updateData('Image_item',$array,array('Image_item_id' => $this->uri->segment('3')));
			  $deleteData = $this->Common_model->delete('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>1));
			 }
			$this->session->set_flashdata('item','Image item edit Successfully');
		    redirect('administrator/manage-imageitem');
			}
		 $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/image/addimage',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
		  
 	}
	 public function view_image(){
		 $data['title'] = 'View image';
	     $ids = $this->uri->segment('3');
		 $data['singledata'] = $this->Common_model->getsingle('Image_item',array('Image_item_id' => $this->uri->segment('3')));
	     $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/image/view_image',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
	 }
	public function delete_image(){
		$data['title'] = 'Delete image';
	    $ids = $this->uri->segment('3');	  
	    $deleteData = $this->Common_model->delete('Image_item',array('Image_item_id' => $ids));
$deleteData = $this->Common_model->delete('download_files',array('file_item_id' => $ids,'section_type_id'=>1));
	    $this->session->set_flashdata('item','Image item delete Successfully');
	    redirect('administrator/manage-imageitem');
	}
}