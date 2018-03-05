<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller { 
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
	    $data['video'] = $this->Common_model->jointwotable('video_item','section_id','section','section_id','','*');
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/video/index',$data);
	    $this->load->view('administrator/include/inner_footer');
    }
	public function add_video(){  
		 $data['section'] = $this->Common_model->getAll('section');
		 $data['title'] = 'Add video';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');	
		 if($this->form_validation->run() == 'true'){ 
	        $array = array(
			   'section_id' => $this->input->post('sectiontype'),
			   'video_download_url' => $this->input->post('video_download_url'),
			   'downloadable' => $this->input->post('downloadable'),
			   'video_name' => $this->input->post('file_name'),
			   'create' =>date('Y-m-d H:i:m:s'),
			 );
			$id = $this->Common_model->insertData('video_item',$array);
			$data['singledata'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
			
			$array1 = array(
			   'update' =>date('Y-m-d H:i:s')
			);
			$this->Common_model->updateData('device_schedule',$array1,array('schedule_id' => $data['singledata']->schedule_id));
			
			if($_POST['downloadable'] ==1){
			$array1 = array(
			   'file_name' => $this->input->post('file_name'),
			   'section_id' => $this->input->post('sectiontype'),
			   'section_type_id' => 2,
			   'image_url' => $this->input->post('video_download_url'),
			   'file_start_time' => $this->input->post('file_start_time'),
			   'downloadable' => $this->input->post('downloadable'),
			   //'file_status' => $this->input->post('file_status'),
			   //'file_status' => "W",
			   
			   'create' =>date('Y-m-d H:i:s'),
			   //'update' =>date('Y-m-d H:i:s'),
			   'file_item_id' =>$id,
			 );
			 $this->Common_model->insertData('download_files',$array1);
			 
			 $array2 = array(
			   'update' =>date('Y-m-d H:i:s'),
			   'download_file_id'=>$id,
			   //'schedule_id'=>$data['singledata']->schedule_id
			);
			//$this->Common_model->updateData('User_download',$array2);
			
         //$this->Common_model->updateData('device_download',$array2,array('download_file_id' =>$id ));
			
			 }
		 $this->session->set_flashdata('item','video item Create Successfully');
		 redirect('administrator/manage-video');
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/video/addvideo',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_video(){
	       $data['title'] = 'Edit video'; 
		   $data['heading'] = 'Edit';
		   $data['singledata'] = $this->Common_model->getsingle('video_item',array('video_item_id' => $this->uri->segment('3')));
		   
		    $data['singledata1'] = $this->Common_model->getsingle('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>2));
		 $data['section'] = $this->Common_model->getAll('section');
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 if($this->form_validation->run() == 'true'){ 
		 
		   
		                 $array12 = array('device_schedule_update' => date('Y-m-d H:i:s'),);
			             $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $_POST['sectiontype']));
			             $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
						 
		 
		          if($_POST['downloadable'] == 1){
				  $data['singledata'] = $this->Common_model->getsingle('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>2));
				       $array = array(
			               'section_id' => $this->input->post('sectiontype'),
			               'video_download_url' => $this->input->post('video_download_url'),
			               'downloadable' => $this->input->post('downloadable'),
						   'video_name' => $this->input->post('file_name'),
						   );
				       $array1 = array(
								   'file_name' => $this->input->post('file_name'),
								   //'file_status' => $this->input->post('file_status'),
								   'file_start_time' => $this->input->post('file_start_time'),
								   'image_url' => $this->input->post('video_download_url'),
								   'downloadable' => $this->input->post('downloadable'),
								   'section_id' => $this->input->post('sectiontype'),
								   'section_type_id' => 2,
								   'file_item_id' => $this->uri->segment('3'),
								   'create' =>date('Y-m-d H:i:s'),

								  // 'file_status' => "W",
								   //'update' =>date('Y-m-d H:i:s')
								);
							if($data['singledata']){	 
		                            $this->Common_model->updateData('video_item',$array,array('video_item_id' => $this->uri->segment('3')));
		                }else{
		                        $this->Common_model->insertData('download_files',$array1);}
								

								
						$array1 = array(
							   'file_name' => $this->input->post('file_name'),
							  // 'file_status' => $this->input->post('file_status'),  
							   'file_start_time' => $this->input->post('file_start_time'),  
							   'downloadable' => $this->input->post('downloadable'),
							  'image_url' => $this->input->post('video_download_url'),
							  'section_id' => $this->input->post('sectiontype'),

							 // 'file_status' => "W",
							  //'update' =>date('Y-m-d H:i:s'),
							 );
							 
							$new_array = array(
			              
			               'video_download_url' => $this->input->post('video_download_url'),
			               'downloadable' => $this->input->post('downloadable'),
						   'video_name' => $this->input->post('file_name'),
						   );
									 
								//echo $this->uri->segment('3');die;	   
							 
			 $this->Common_model->updateData('download_files',$array1,array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>2));	
						  
						  $this->Common_model->updateData('video_item
',$new_array,array('video_item_id' => $this->uri->segment('3')));
						  
						  
						$array2 = array(
			   'update' =>date('Y-m-d H:i:s'),
			   'download_file_id'=>$this->uri->segment('3'),
			   //'schedule_id'=>$data['singledata']->schedule_id
			);
			
			//$this->Common_model->updateData('device_download',$array2,array('download_file_id' =>$this->uri->segment('3') ));  
						  
						
						 //$this->Common_model->updateData('User_download',$array12,array('download_file_id' =>$this->uri->segment('3')));
						  	
				  }else {
					$array = array(
			            'video_download_url' => $this->input->post('video_download_url'),
			            'section_id' => $this->input->post('sectiontype'), 
			            'downloadable' => $this->input->post('downloadable'),
						//'video_name' => $this->input->post('file_name'),
						'video_name' => $this->input->post('file_name'),
						
						
						);
				   $this->Common_model->updateData('video_item
',$array,array('video_item_id' => $this->uri->segment('3')));
				   $deleteData = $this->Common_model->delete('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>2));
				  }
			$this->session->set_flashdata('item','video item edit Successfully');
		    redirect('administrator/manage-video');
			}
		 $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/video/addvideo',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
 	}
	public function view_video(){
		 $data['title'] = 'View video';
	     $ids = $this->uri->segment('3');
		 $data['singledata'] = $this->Common_model->getsingle('video_item',array('video_item_id' => $this->uri->segment('3')));
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/video/view_video',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	 }
	public function delete_video(){
		$data['title'] = 'Delete video';
	    $ids = $this->uri->segment('3');	  
	    $deleteData = $this->Common_model->delete('video_item',array('video_item_id' => $ids));
	    $deleteData = $this->Common_model->delete('download_files',array('file_item_id' => $ids,'section_type_id'=>2));
	    $this->session->set_flashdata('item','Section delete Successfully');
	    redirect('administrator/manage-video');
	}
}