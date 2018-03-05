<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_user extends CI_Controller { 

function __construct()
	{
		parent::__construct();		        not_login();
		$this->load->model('Common_model');
	}

    public function index() 
	{ 
		$data['title'] = 'Users';
		$data['active_tab_user'] = 'active';
		$data['error'] = '';		
		
		$data['users'] = $this->Common_model->getAll1('users','id');
		
		
		 $this->load->view('administrator/include/inner_header',$data);
	   $this->load->view('administrator/users/index',$data);
	   $this->load->view('administrator/include/inner_footer');
    }
	public function add_user()
	{ 
		$data['title'] = 'Add users';
		$data['heading'] = 'Add';
		
		$this->form_validation->set_rules('firstname','First Name','trim|required');
		$this->form_validation->set_rules('lastname','Last Name','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('mobile_no','Mobile No','trim|required|numeric');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('address','Address','trim|required');		
		$this->form_validation->set_rules('dob','Date of birth','trim|required');
		
		$firstname = $this->input->post('firstname',true);		
		$lastname = $this->input->post('lastname',true);		
		$username = $this->input->post('username',true);		
		$password = md5($this->input->post('password',true));		
		$mobile_no = $this->input->post('mobile_no',true);		
		$email = $this->input->post('email',true);		
		$address = $this->input->post('address',true);		
		$status = $this->input->post('status',true);
		
		$dob = $this->input->post('dob',true);
		
		if($this->form_validation->run() == 'true')
		{ 
	   
	         $explode = explode('/',$dob);
		   $date_of_birth = $explode[2].'-'.$explode[0].'-'.$explode[1];
		  
		   $data['upload_path'] = 'user_image/';
			$data['allowed_types'] = 'gif|jpg|png';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			//echo $_FILES['images']['name'];die;
			 if( (isset($_FILES['images'])) && (!empty($_FILES['images']['name'])) ){ 
			
			if($this->upload->do_upload('images'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];   
			$array = array(
			   'firstname' => $firstname,
			   'lastname' => $lastname,
			   'username' => $username,
			   'password' => $password,
			   'mobile_no' => $mobile_no,
			   'image' => $uploadfile,
			   'email' => $email,
			   'address' => $address,			   
			   'dob' => $date_of_birth,
			   'status' => $status,
			   'date_added' => date('Y-m-d H:i:s')
			);
			$this->Common_model->insertData('users',$array);
			$this->session->set_flashdata('item','User created Successfully');
		    redirect('administrator/users-manage');
		}
			 }else{
				 $array = array(
			   'firstname' => $firstname,
			   'lastname' => $lastname,
			   'username' => $username,
			   'password' => $password,
			   'mobile_no' => $mobile_no,
			   'email' => $email,
			   'address' => $address,			   
			   'dob' => $date_of_birth,
			   'status' => $status,
			   'date_added' => date('Y-m-d H:i:s')
			);
			$this->Common_model->insertData('users',$array);
			$this->session->set_flashdata('item','User created Successfully');
		    redirect('administrator/users-manage');
			 }
		}
		
		$this->load->view('administrator/include/inner_header',$data);
	   $this->load->view('administrator/users/adduser',$data);
	   $this->load->view('administrator/include/inner_footer');
	}	
	public function edit_user()
	{
		$data['title'] = 'Edit users';
		$data['heading'] = 'Edit';
		
		$this->form_validation->set_rules('firstname','First Name','trim|required');
		$this->form_validation->set_rules('lastname','Last Name','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');		
		$this->form_validation->set_rules('mobile_no','Mobile No','trim|required|numeric');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');       			
		$this->form_validation->set_rules('dob','Date of birth','trim|required');
		
		$firstname = $this->input->post('firstname',true);		
		$lastname = $this->input->post('lastname',true);
		$username = $this->input->post('username',true);		
		$mobile_no = $this->input->post('mobile_no',true);
		$email = $this->input->post('email',true);
		$address = $this->input->post('address',true);		
		$dob = $this->input->post('dob',true);		
        $status = $this->input->post('status',true);			
		
		$data['singledata'] = $this->Common_model->getsingle('users',array('id' => $this->uri->segment('3')));
		
		if($this->form_validation->run() == 'true')
		{ 
	      
	       $explode = explode('/',$dob);
		   $date_of_birth  = $explode[2].'-'.$explode[0].'-'.$explode[1];
		   
		  if(empty($explode[2]))
		  { 
			  $dob1 = $data['singledata']->dob;
		  }else{ 
			  $dob1 = $date_of_birth;
		  }
		  
		  $data['upload_path'] = 'user_image/';
			$data['allowed_types'] = 'gif|jpg|png';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			//echo $_FILES['images']['name'];die;
			 if( (isset($_FILES['images'])) && (!empty($_FILES['images']['name'])) ){ 
			
			if($this->upload->do_upload('images'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];  
		    
			$array = array(
			   'firstname' => $firstname,
			   'lastname' => $lastname,
			   'username' => $username,
			   'password' => $data['singledata']->password,
			   'mobile_no' => $mobile_no,
			   'image' => $uploadfile,
			   'email' => $email,
			   'address' => $address,			   
			   'dob' => $dob1,
			   'status' => $status
			);
			$this->Common_model->updateData('users',$array,array('id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','User edit Successfully');
		    redirect('administrator/users-manage');
		}
			 }
			 else{
				 $array = array(
			   'firstname' => $firstname,
			   'lastname' => $lastname,
			   'username' => $username,
			   'password' => $data['singledata']->password,
			   'mobile_no' => $mobile_no,			   
			   'email' => $email,
			   'address' => $address,			   
			   'dob' => $dob1,
			   'status' => $status
			);
			$this->Common_model->updateData('users',$array,array('id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','User edit Successfully');
		    redirect('administrator/users-manage');
			 }
		}
		$this->load->view('administrator/include/inner_header',$data);
	   $this->load->view('administrator/users/adduser',$data);
	   $this->load->view('administrator/include/inner_footer');
	}
	 
	 public function view_user()
	 {
		 $data['title'] = 'View User';
		 //segment
	   $ids = $this->uri->segment('3');
	  $data['ids'] = $ids;
	   $data['view_user'] = $this->Common_model->getsingle('users',array('id' => $ids));
	   //echo '<pre>';print_r($data['view_user']);die;
	   $this->load->view('administrator/include/inner_header',$data);
	   $this->load->view('administrator/users/view_user',$data);
	   $this->load->view('administrator/include/inner_footer',$data);
	 }
	 
	  public function disable()
	 {
		 $data['title'] = 'Disable User';
		 //segment
	   $ids = $this->uri->segment('3');
	  
	   $disable_user = $this->Common_model->getsingle('users',array('id' => $ids));	
        if($disable_user->status == 2)
        {			
		   $array = array(			  
			   'status' => 1
			);			
			$this->Common_model->updateData('users',$array,array('id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','User Active Successfully');
			 redirect('administrator/users-manage');
		}else
        {
			$array = array(			  
			   'status' =>2
			);			
			$this->Common_model->updateData('users',$array,array('id' => $this->uri->segment('3')));
			$this->session->set_flashdata('item','User Deactive Successfully');
			 redirect('administrator/users-manage');
		}	
	    
	 }
	 
	 public function payment_detail()
	 {
		 $data['title'] = 'Payment Detail';
		 
		 $userid = $this->input->post('userid');
		 $paymentDtail = $this->Common_model->getAllwhere('payments',array('user_id' => $userid));
	 
	      $list = $this->load->view('ajax_payment_detail', array('checkboxData'=>$paymentDtail), true);
				
		 $this->output->set_content_type('application/json');
		
		 $return = array('success'=>true, 'list'=> $list,'code'=> 200);	
         echo json_encode($return);		 
	 }
	 
	public function delete_user()
	{
		$data['title'] = 'Delete User';
		 //segment
	   $ids = $this->uri->segment('3');	   
	   //delete data
	   $deleteData = $this->Common_model->delete('users',array('id' => $ids));
	   $this->session->set_flashdata('item','User delete Successfully');
	   redirect('administrator/users-manage');
	}
}