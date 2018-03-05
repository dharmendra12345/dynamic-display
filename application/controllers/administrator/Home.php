<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller { 
    public function __construct(){
		parent::__construct();
		/* Load the libraries and helpers */         is_login_admin();
		$this->load->model('admin/login_model');
		$this->load->library('pagination');
		// $this->check_login();
	 }
	/**
	 * Index Page for this controller.
	 */
	public function index(){
	     //echo "test";die;
	    $data['title'] = 'Admin Login';
	    $this->load->view('administrator/include/home_header',$data);
		$this->load->view('administrator/index');
		$this->load->view('administrator/include/home_footer',$data);
		}
		
	/**
	 * sign in action function Starts Here
	 */	
	 
    public function sign_in(){
	  $this->form_validation->set_rules('email', "Email", 'required|valid_email');
	  $this->form_validation->set_rules('password', "Password", 'required');
	  if($this->form_validation->run() == FALSE){			
			redirect('administrator');
	   }else{
	       $data['user_details'] = $this->login_model->check_login_credentials( $this->input->post());
		   if( isset($data['user_details']) || $data['user_details'] !='' ) {
		      $this->session->set_userdata( 'adminid',$data['user_details'][0]->id );
			  $this->session->set_userdata( 'adminname',$data['user_details'][0]->username );
			  $this->session->set_userdata('adminemail',$data['user_details'][0]->email);
			  $userid = $this->session->userdata('adminid');
				if(isset($userid) || $userid !='') {
					redirect('administrator/dashboard');
			 	}	
		   }else{
		      
			  $data['error'] = 'Invalid User ID or Password.';
			  $this->session->set_flashdata('error', $data['error']);
			  redirect('administrator');	
		   }
	   }
    }
    
   /**
	 * Check Login action function starts Here
   */
	public function check_login(){
	  	$id= $this->session->userdata('adminid');
    	if((empty($id)) || ($this->session->userdata('adminid') == '')){
	    	$this->session->set_flashdata('check_login','Please Login!');
			redirect('administrator');	
	  	} 
	}
 /**
	 * To load dashboard page after login Starts Here
   */

  public function dashboard(){
  
      $this->check_login();
	  $data['title'] = 'Dashboard';
	  $data['active_tab_dashboard'] = 'active';
	  
	  ////////////////////////total jobseeker////////
	 /* $q_jobseeker=$this->db->get('jobseeker');
	  $total_jobseeker=$q_jobseeker->result();
	  $data['total_jobseeker'] = $total_jobseeker;
	  ////////////////////////total employer/////////
	  $q_employer=$this->db->get('employer');
	  $total_employer=$q_employer->result();
	  $data['total_empoloyer'] = $total_employer;
	  
	    
	  $q_job=$this->db->get('jobs');
	  $total_job=$q_job->result();
	  $data['total_job'] = $total_job;
	  
	  
	  $this->db->select('*');
      $this->db->from('employer');
	  $this->db->order_by("id", "desc"); 
	  $this->db->limit(5);
      $q_latest_employer=$this->db->get();
	  $data['latest_employer']= $q_latest_employer->result();*/
	  

	  $this->load->view('administrator/include/inner_header',$data);
	  $this->load->view('administrator/dashboard',$data);
	  $this->load->view('administrator/include/inner_footer');
	}
	/**
	 * signout function Starts Here
   */
  public function signout() {
	$this->session->unset_userdata('admin_details');
	$this->session->unset_userdata('adminid');
	$this->session->unset_userdata('adminname');
	$this->session->unset_userdata('adminemail');
	$this->session->sess_destroy();
	redirect('administrator');
	}	
}
