<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertising_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 */
	public function __construct()
	{
		$this->load->library('upload');
		parent::__construct();
	}
	 public function listing($table){
		$this->db->select('*')
	    ->from($table);
	    $query = $this->db->get();
	    return	$query->result();
	}
	 public function get_all_results($table){
	 	$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result(); 
	 } 
	 public function delete($table_name, $id){		
        $this->db->where('advertise_id',$id);
		$this->db->delete($table_name); 
		return true;
	}
	


}


