<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Textitem extends CI_Controller { 

function __construct(){
		parent::__construct();	
			        not_login();
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Calcutta');
	}
    public function index() 
	{ 
		$data['title'] = 'Textitem';
		$data['active_textitem_schedule'] = 'active';
	    $data['error'] = '';		
	    $data['textitem'] = $this->Common_model->jointwotable('text_item','section_id','section','section_id','','*');
	    $this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/textitem/index',$data);
	    $this->load->view('administrator/include/inner_footer');
		 
    }
	public function add_text(){  
	
		 $data['section'] = $this->Common_model->getAll('section');
		 $data['title'] = 'Add video';
		 $data['heading'] = 'Add';
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 $this->form_validation->set_rules('text_size','Video Name','trim|required');		
		 $this->form_validation->set_rules('text_color','Video Url','trim|required');		
		 if($this->form_validation->run() == 'true'){ 

                 
                 //print_r("<pre/>");
                 //print_r($_POST);
                 //die;

		 
		       $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
			 $array12 = array('update' => date('Y-m-d H:i:s'),);
			 
			 $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
		 

				 $array = array(
				    'text_size' => $this->input->post('text_size'),
					'text_color' => $this->input->post('text_color'),
			        'text_file_download_url' => $this->input->post('text_file_download_url'),
					//'text_value' => $this->input->post('text_value'),
					'text_scroll_speed' => $this->input->post('text_scroll_speed'),
					'text_lang' => $this->input->post('text_lang'),
					'text_scrollable' => $this->input->post('text_scrollable'),
					'text_scroll_direction' => $this->input->post('text_scroll_direction'),
			        'section_id' => $this->input->post('sectiontype'),
			        'downloadable' => $this->input->post('downloadable'),
					'text_file_name' => $this->input->post('text_file_name'),
					
					
					
			        //'create' =>date('Y-m-d H:i:m:s'),
			        );
			       $id = $this->Common_model->insertData('text_item',$array);
				   
				   
				   $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
				   
				   $array12 = array('update' => date('Y-m-d H:i:s'),);
				   //$this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
				   
				   

				 if($_POST['downloadable'] ==0){

				 	    $text_data  = array(
                             'text_item_id'=>$id,
                             'text_value'=>$this->input->post('text_value'),
                             'section_id'=>$this->input->post('sectiontype')
				 	    	);

				 	    $this->Common_model->insertData('text_data',$text_data);
				 }
				 
		         if($_POST['downloadable'] ==1){
				  $array1 = array(
			      'file_name' => $this->input->post('text_file_name'),
			      //'file_status' => $this->input->post('file_status'),
				  //'file_status' => "W",
				  
				  
			      'file_start_time' => $this->input->post('file_start_time'),
			      'image_url' => $this->input->post('text_file_download_url'),
			      'downloadable' => $this->input->post('downloadable'),
			      'section_id' => $this->input->post('sectiontype'),
			      'section_type_id' => 3,
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
		
			$this->session->set_flashdata('item','Text item  Create Successfully');
		    redirect('administrator/manage-text');
			}
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/textitem/addtext',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
	}	
	public function edit_text(){
 
	     $data['title'] = 'Edit Text item'; 
		 $data['heading'] = 'Edit';
		 $data['singledata'] = $this->Common_model->getsingle('text_item',array('text_item_id' => $this->uri->segment('3')));
		 $data['singledata1'] = $this->Common_model->getsingle('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>3));
		  
		 $data['section'] = $this->Common_model->getAll('section');
			  
		 $this->form_validation->set_rules('sectiontype','Section type Name','trim|required');		
		 $this->form_validation->set_rules('text_size','Video Name','trim|required');		
		 $this->form_validation->set_rules('text_color','Video Url','trim|required');		
		 
		 
		 if($this->form_validation->run() == 'true'){ 
		 
		 
		 $data['singledata2'] = $this->Common_model->getsingle('section',array('section_id' => $this->input->post('sectiontype')));
		   $array12 = array('device_schedule_update' => date('Y-m-d H:i:s'),);
		   $this->Common_model->updateData('device_schedule',$array12,array('schedule_id' => $data['singledata2']->schedule_id));
		 
		 
		 
		 if($_POST['downloadable'] == 1){
			          $data['singledata'] = $this->Common_model->getsingle('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>3));
					  
			            $array = array(
				    'text_size' => $this->input->post('text_size'),
					'text_color' => $this->input->post('text_color'),
			        'text_file_download_url' => $this->input->post('text_file_download_url'),
					//'text_value' => $this->input->post('text_value'),
					'text_scroll_speed' => $this->input->post('text_scroll_speed'),
					'text_lang' => $this->input->post('text_lang'),
					'text_scrollable' => $this->input->post('text_scrollable'),
					'text_scroll_direction' => $this->input->post('text_scroll_direction'),
			        'section_id' => $this->input->post('sectiontype'),
			        'downloadable' => $this->input->post('downloadable'),
					
					'text_file_name' => $this->input->post('text_file_name'),
			        //'create' =>date('Y-m-d H:i:m:s'),
			        );
			 
							
							$array1 = array(
			      'file_name' => $this->input->post('text_file_name'),
			      //'file_status' => $this->input->post('file_status'),
			      'file_start_time' => $this->input->post('file_start_time'),
			      'image_url' => $this->input->post('text_file_download_url'),
			      'downloadable' => $this->input->post('downloadable'),
			      'section_id' => $this->input->post('sectiontype'),
			      'section_type_id' => 3,
			      'file_item_id' => $this->uri->segment('3'),

			      //'file_status' => "W",
			      //'update' =>date('Y-m-d H:i:s')
			   );
							
								
			 
		                if($data['singledata']){	 
		                            $this->Common_model->updateData('text_item',$array,array('text_item_id' => $this->uri->segment('3')));
		                }else{
		                            $this->Common_model->insertData('download_files',$array1);}
							$array1 = array(
			      'file_name' => $this->input->post('text_file_name'),
			      //'file_status' => $this->input->post('file_status'),
			      'file_start_time' => $this->input->post('file_start_time'),
			      'image_url' => $this->input->post('text_file_download_url'),
			      'downloadable' => $this->input->post('downloadable'),
			      'section_id' => $this->input->post('sectiontype'),
			      'section_type_id' => 3,
			      'file_item_id' => $this->uri->segment('3'),

			      //'file_status' => "W",
			      //'update' =>date('Y-m-d H:i:s')
			   );
			   
			   $new_array = array(
				    'text_size' => $this->input->post('text_size'),
					'text_color' => $this->input->post('text_color'),
			        'text_file_download_url' => $this->input->post('text_file_download_url'),
					//'text_value' => $this->input->post('text_value'),
					'text_scroll_speed' => $this->input->post('text_scroll_speed'),
					'text_lang' => $this->input->post('text_lang'),
					'text_scrollable' => $this->input->post('text_scrollable'),
					'text_scroll_direction' => $this->input->post('text_scroll_direction'),
			        'section_id' => $this->input->post('sectiontype'),
			        'downloadable' => $this->input->post('downloadable'),
					
					'text_file_name' => $this->input->post('text_file_name'),
			        //'create' =>date('Y-m-d H:i:m:s'),
			        );
			 
			   
			   
		$this->Common_model->updateData('text_item',$array,array('text_item_id' => $this->uri->segment('3')));
			   
			   
 $this->Common_model->updateData('download_files',$array1,array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>3));	
    $array2 = array(
			   'update' =>date('Y-m-d H:i:s'),
			   'download_file_id'=>$this->uri->segment('3'),
			   //'schedule_id'=>$data['singledata']->schedule_id
			);
			
			//$this->Common_model->updateData('device_download',$array2,array('download_file_id' =>$this->uri->segment('3') )); 
 
 
 
			 }else{

			 	   //echo "test";die;
			  
			      $array = array(
				    'text_size' => $this->input->post('text_size'),
					'text_color' => $this->input->post('text_color'),
			        'text_file_download_url' => $this->input->post('text_file_download_url'),
					//'text_value' => $this->input->post('text_value'),
					'text_scroll_speed' => $this->input->post('text_scroll_speed'),
					'text_lang' => $this->input->post('text_lang'),
					'text_scrollable' => $this->input->post('text_scrollable'),
					'text_scroll_direction' => $this->input->post('text_scroll_direction'),
			        'section_id' => $this->input->post('sectiontype'),
			        'downloadable' => $this->input->post('downloadable'),
					
					'text_file_name' => $this->input->post('text_file_name'),
			        //'create' =>date('Y-m-d H:i:m:s'),
			        );

			      $textData  = array(
			      	                        'section_id' => $this->input->post('sectiontype'),
			      	                        'text_value' => $this->input->post('text_value')

			      	               );
		  $this->Common_model->updateData('text_item',$array,array('text_item_id' => $this->uri->segment('3')));

		  $this->Common_model->updateData('text_data',$textData,array('text_item_id' => $this->uri->segment('3')));



			  $deleteData = $this->Common_model->delete('download_files',array('file_item_id' => $this->uri->segment('3'),'section_type_id'=>3));
			     
			 }
		 $this->session->set_flashdata('item','Text Item edit Successfully');
		 redirect('administrator/manage-text');
			
	    }
		$this->load->view('administrator/include/inner_header',$data);
	    $this->load->view('administrator/textitem/addtext',$data);
	    $this->load->view('administrator/include/inner_footer',$data);
		   
 	}
	 
	 public function view_text()
	 {
		 $data['title'] = 'View Text item';
	     $ids = $this->uri->segment('3');
		 
	   $data['singledata'] = $this->Common_model->getsingle('text_item',array('text_item_id' => $this->uri->segment('3')));
		 
		    
		 //print_r("<pre/>");
			//print_r($data['section'] );die;
	     
	   
	     $this->load->view('administrator/include/inner_header',$data);
	     $this->load->view('administrator/textitem/view_text',$data);
	     $this->load->view('administrator/include/inner_footer',$data);
	 }
	 
	 
	 
	public function delete_text()
	{
	
		$data['title'] = 'Delete text';
		 //segment
	    $ids = $this->uri->segment('3');	  
    
	   $deleteData = $this->Common_model->delete('text_item',array('text_item_id' => $ids));
	   $deleteData = $this->Common_model->delete('download_files',array('file_item_id' => $ids,'section_type_id'=>3));
	  $this->session->set_flashdata('item','Text Item  Successfully');
	   
	   redirect('administrator/manage-text');
	}
	
	
}