<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
		parent::__construct();
		 checkLogin_admin();
		/* Load the libraries and helpers */        
		$this->load->model('admin/login_model');
		$this->load->library('pagination');
		// $this->check_login();
	 }
	/**
	 * Index Page for this controller.
	 */
	public function dashboard(){
	  $data['title'] = 'Dashboard';
	  $data['active_tab_dashboard'] = 'active';
	  
	  ////////////////////////total user////////
	   //$user=$this->db->get('users');
	   
	   
	   //$total_user=$user->result();
	   //$data['total_user'] = $total_user;
	   
	   //$user=$this->db->get('tournament');
	   //$total_user=$user->result();
	   //$data['tournament'] = $total_user;
	   
	   /* $this->db->select('*')
	    ->from('tournament');
		$this->db->limit('5');
		$this->db->order_by('create_date_time','DESC');
	    $query = $this->db->get();
	    $data['tournament'] = $query->result();
	   $data['tournamentCount'] = $this->Common_model->getAll('tournament');*/
	  

	  $this->load->view('administrator/include/inner_header');
	  $this->load->view('administrator/dashboard');
	  $this->load->view('administrator/include/inner_footer');	
		
}
 public function signout() {
	$this->session->unset_userdata('admin_details');
	$this->session->unset_userdata('adminid');
	$this->session->unset_userdata('adminname');
	$this->session->unset_userdata('adminemail');
	$this->session->sess_destroy();
	redirect('administrator');
	}	
}