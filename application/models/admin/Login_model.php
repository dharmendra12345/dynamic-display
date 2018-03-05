<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 */
	public function __construct()
	{
		$this->load->library('upload');
		parent::__construct();
	}
	public function check_login_credentials($postdata){
		extract($postdata );		
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email', $email); 
		$this->db->where('password', md5($password)); 
		$query = $this->db->get();
		$res   = $query->result();
		if($query->num_rows() >0 ) {
			return $query->result();
		}
	}
}


