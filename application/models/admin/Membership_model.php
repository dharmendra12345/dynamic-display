<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 */
	public function __construct(){
		$this->load->library('upload');
		parent::__construct();
	}
	 public function listing($tbl_name){
		$this->db->select('*')
	    ->from($tbl_name);
	    $query = $this->db->get();
	    return	$query->result();
	}
	public function post_comment(){
		$this->db->select('*')
	    ->from('comment')
		 ->join('post','post.post_id=comment.post_id')
		 ->join('jobseeker','jobseeker.jobseeker_id=comment.user_id');
	    $query = $this->db->get();
		$p  = $query->result();
	    return	$query->result();
	}
	public function delete($table_name, $id){		
        $this->db->where('membership_id',$id);
		$this->db->delete($table_name); 
		return true;
	} 
	public function get($tbl_name,$id,$c_id){
		$this->db->select('*')
	    ->from($tbl_name)
		->where($c_id,$id);
		$query = $this->db->get();
	    return	$query->result();
	}
	public function update($table_name, $data, $id,$c_id){
		$this->db->where($c_id,$id);
		$this->db->update($table_name,$data);
 	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function select_deatils($userid)
	{
		$this->db->select('*');
		$this->db->from('ev_admin');
		$this->db->where('id', $userid); 
		$query = $this->db->get();		

		if($query->num_rows() >0) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

//Reset password Starts Here
	function forget_password($email)
	{
	    $this->db->select('username,password');
		$this->db->from('es_admin');
		$this->db->where('email ', $email); 
		$query = $this->db->get();

		if($query->num_rows() >0 ) 
		{
		    $pass_key	= md5( $email ."_". time() );
			$this->update_pass_reset_key($email, $pass_key );
		   	$to = $email; 
			$subject = 'Password Reset'; 
			$message= 'To reset your password, click the link below:</br><a  href="' . base_url().('password/reset/' . $pass_key ) . '" >Reset admin Account Password.</a>'; 
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: <"votive.techs@gmail.com">' . "\r\n";
			$send = mail($to, $subject, $message,$headers);

			return $msg = "You should receive an email shortly.";
		} 
		else 
		{
			return $msg = "There is no admin account associated with this email!";
		}
	}
//Reset password Ends Here	

//Update the password reset key in Database Starts Here
	public function update_pass_reset_key($email, $key )
	{
		$this->db->where('email', $email );
		$this->db->update('es_admin', array( "pass_key" => $key ) );
	}	
//Update the password reset key in Database Ends Here


//Select of Check Pass key Starts Here 
	public function check_pass_key($key)
	{
		$query = $this->db->where( 'pass_key' , $key )
						->count_all_results( "es_admin" );
		return $query;	
	}
//Select of Check Pass key Ends Here

//Update the password reset key  
	public function reset_password($pass, $key)
	{
		$this->db->where('pass_key', $key);
		$query = $this->db->update('es_admin', array('password'=> md5($pass),'pass_key'	=> ''));						
		return $query ;
	}

//change password functionality. 
//check entered old password is correct or not Starts Here.
	public function check_old_password($old_pass, $userid)
	{
		$this->db->select('count(*) as c');
		$this->db->from('es_admin');
		$this->db->where('password', md5($old_pass)); 
		$this->db->where('id', $userid); 
		$query = $this->db->get();
		$res = $query->result();
		if($query->num_rows() >0 ) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
//check entered old password is correct or not Ends Here	


//change password functionality. 
//update old password from new Starts Here
	public function update_password($new_pass, $userid)
	{
		$data = array(
               'password' => md5($new_pass)
            );
		$this->db->where('id', $userid);
		$this->db->update('es_admin', $data);
		return true;
	}		
//update old password from new Ends Here
    function cat_list()
  {
                $this->db->select('*');
		$this->db->from('es_pro_cat');		
		$this->db->where('parent_id',0);
                $this->db->order_by('cat_id','DESC');
		$query = $this->db->get(); 
		return $query->result_array();
		 
  }
   function get_parent_cat()

  {

        $this->db->select('*');

		$this->db->from('es_pro_cat');

		$this->db->where('parent_id',0); 

		$query = $this->db->get();

		return $query->result_array();

  }
   function select_cat($id)
	 {

		$this->db->select('*');

		$this->db->from('es_pro_cat');

		$this->db->where('cat_id',$id);  

		$query = $this->db->get();

		return $query->result_array();



	 }
	 
	 
	public function pending_order_count()
	{
	   	 ####total pending orders################
		 $this->db->select('*');
		 $this->db->from('ev_order');
		 //$this->db->where('u_id',$user_id);
		 $this->db->where('status!=','delivered');
		 $this->db->where('status!=','draft');
		  $this->db->group_by("book_id"); 
		 $this->db->order_by("order_id", "desc"); 
		 $pending=$this->db->get();
		return  $data['pending_order']=$pending->result();

	}	
	
		public function complete_order_count()
	{
	   	 ####total pending orders################
		
		 $this->db->select('*');
		$this->db->from('ev_order');
		//$this->db->where('u_id',$user_id);
		$this->db->where('status!=','draft');
		$this->db->where('status','delivered');
		 $this->db->group_by("book_id"); 
		$this->db->order_by("order_id", "desc"); 
		$comp=$this->db->get();
		 return $data['comp_order']=$comp->result();
		 ###################	

	}	
	
	
	 function add_cat()
  {

		 extract($this->input->post());
		 $data = array('cat_name' => $cat_name,'parent_id'=>$parent_id);
		 if(@$cat_id)
		 {

			$this->db->where('cat_id', $cat_id);

			$this->db->update('es_pro_cat', $data);

			 return $msg= "Category has been update successfully!!";

		 

		 }else{

		

			 $this->db->insert('es_pro_cat', $data);

			 $id = $this->db->insert_id(); 

			 if(!empty( $id)){

				 return $msg= "Category has been insert successfully!!";

			 }

		 }

		 

  }
   function   delete_page($tbl_name,$field,$pageid)
	{
		$this->db->where($field, $pageid);
		$this->db->delete($tbl_name); 
		return $msg = "Record has been deleted successfully";
    }
   function get_product($limit=false, $offset=false)
  {
                 $this->db->select('p_id,p_name,p_price,p_photo,p_desc')
				->from('es_product');
				//->join('sa_cty_gallery','sa_city.cyid=sa_cty_gallery.city_id')
				//->group_by('sa_cty_gallery.city_id');
				
			$query = $this->db->get();
           return $query->result_array();
    }
	 function delete_data()

   {

        extract($this->input->post());

		$this->db->where($field_name,$id);

		$this->db->delete($tbl_name); 

		return  "Record has been deleted successfully";
	}
 public function manage_admin(){
 
 
		$this->db->select('*')
		->from('ev_user');
		$query = $this->db->get();
		
		//print_r("<pre/>");
		//print_r($query->result());die;
	    return	$query->result();
	}
	/*public function manage_vehicle($user_type){
 
         
		$this->db->select('*')
		->from($user_type);
		->where('wheel_type',$id);
		$query = $this->db->get();
		
		//print_r("<pre/>");
		//print_r($query->result());die;
	    return	$query->result();
	}*/
	public function manage_vehicle($wheel_type)
	{
	$id='';
	 extract($_POST);

	      $this->db->select('v.* ,ven.fname,ven.lname,ven.customer_id,ven.company_name,wl_vehicle_company.v_company_name,wl_vehicle_brand.v_brand_name');
		$this->db->from('wl_vehicle as v');
		$this->db->where('v.wheel_type',$wheel_type);

		if($id!='')
		{
		$this->db->where('v.u_id',$id);
		
		}

		$this->db->join('wl_vendor as ven','ven.v_id=v.u_id'); 
		$this->db->join('wl_vehicle_company','wl_vehicle_company.v_company_id=v.type');
		$this->db->join('wl_vehicle_brand','wl_vehicle_brand.v_brand_id=v.model');
		$query = $this->db->get();
	
//	echo $this->db->last_query();
	
		return	$query->result();
	}
	public function select_user($id)
	{
		$this->db->select('*')
		->from('ev_user')
		->where('u_id',$id);
		$query = $this->db->get();
		return	$query->result_array();	
	}	
	public function select_vendor($id)
	{
		
		$this->db->select('*,wl_state.state_name')
		->from('wl_vendor')
		->where('v_id',$id)
		->join('wl_state','wl_state.state_id=wl_vendor.state');
		$query = $this->db->get();
		
		return	$query->result_array();	
	}	
	//Update User Starts Here
	public function admin_update_user($table_name, $data, $id)
 	{
		$this->db->where('u_id',$id);
		$this->db->update($table_name,$data);

		$this->db->select('*')
		         ->from($table_name)
		         ->where('u_id', $id);
		$query = $this->db->get();
	    $rslt=$query ->result_array();
		
		// $email    = $rslt[0]['email'];
		 // $username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		  // $username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		//$msg = 'Updated';
		
		//$result_email = $this->send_email($email, $msg, '', $username);
		//return $result_email;
 	}
	
	
		public function admin_update_vendors($table_name, $data, $id)
 	{
		$this->db->where('v_id',$id);
		$this->db->update($table_name,$data);

		$this->db->select('*')
		         ->from($table_name)
		         ->where('v_id', $id);
		$query = $this->db->get();
	    $rslt=$query ->result_array();
		
	
 	}
	
	
	
	
	
	
	public function admin_update_vendor($table_name, $data, $id)
 	{
		$this->db->where('id',$id);
		$this->db->update($table_name,$data);

		$this->db->select('*')
		         ->from($table_name)
		         ->where('id', $id);
		$query = $this->db->get();
	    $rslt=$query ->result_array();
		
		// $email    = $rslt[0]['email'];
		 // $username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		  // $username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		//$msg = 'Updated';
		
		//$result_email = $this->send_email($email, $msg, '', $username);
		//return $result_email;
 	}
	public function admin_update_product($table_name, $data, $id)
 	{
		
		//echo $table_name;
	//	print_r($data);
		//echo $id;die;
		$this->db->where('p_id',$id);
		$this->db->update($table_name,$data);

		//$this->db->select('*')
		         //->from($table_name)
		        // ->where('p_id', $id);
	//	$query = $this->db->get();
	   // $rslt=$query ->result_array();
		
		// $email    = $rslt[0]['email'];
		 // $username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		  // $username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		//$msg = 'Updated';
		
		//$result_email = $this->send_email($email, $msg, '', $username);
		//return $result_email;
 	}
//Update User Ends Here

//Check Unique User Name
	public function check_username()
	{
	   	extract($this->input->post());
	    $this->db->select('*')
		->from('wl_user')
		->where('fname',$username)
		->where('id !=', $u_id);;
		$query = $this->db->get();
	    return	$query->num_rows();	
	} 

//Delete User
	public function delete_user($table_name, $id)
	{		
	     
		/*$this->db->select('*')
		         ->from($table_name)
		         ->where('id', $id);
		$query = $this->db->get();
	    $rslt=$query ->result_array();*/

		//$this->db->where('id',$id);
		//$this->db->delete($table_name); 
		//print_r($this->db->last_query());die;
		
		//$email    = $rslt[0]['u_email'];
		//$username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		//$msg = 'Deleted';

		//$result_email = $this->send_email($email, $msg, '', $username);
		
		//return $result_email;
		
		//return true;
		
		 if($table_name == "ev_user")
		{
		  //echo $table_name;
		  //echo $id;die;
		 $this->db->where('u_id',$id);
		}
		else
		{
		$this->db->where('id',$id);
		}

		$this->db->delete($table_name); 

		//print_r($this->db->last_query());die;
		
		return true;
	}
	public function delete_vehicle($table_name, $id)
	{		
		  $this->db->where('vl_id',$id);
		 $this->db->delete($table_name); 
		 return true;
	}

//Get Status Test Common
	public function get_status_text($status)
	{
		if($status == 1)
		{
			$status_text = 'Active';
		}
		elseif($status == 0)
		{
			$status_text = 'Inactive';
		}
		return $status_text;
	}	


//Change User Status
	public function change_user_status($table_name, $u_id, $status)
	{
		if($status == 'Active')
		{
			$change_status = 0;
		}
		elseif($status == 'Inactive')
		{
			$change_status = 1;
		}
		$data = array('u_status' => $change_status);
		$this->db->where('u_id', $u_id);
		$this->db->update($table_name, $data);


		$this->db->select('*')
		         ->from($table_name)
		         ->where('u_id', $u_id);
		$query = $this->db->get();
	    $rslt=$query ->result_array();
		
		$email    = $rslt[0]['u_email'];
		$username = $rslt[0]['u_firstname']." " .$rslt[0]['u_lastname'];
		$user_status = $rslt[0]['u_status'];
		
		$result_email = $this->send_email($email, '', $user_status, $username);
		
		return $result_email;
	}			

	public function send_email($email, $msg, $status, $username)
	{
		if($msg == '')
		{
			$msg = $this->get_status_text($status);
		}
		
		$to = $email; 
		$subject = 'Account has been '.$msg; 
		$message="
			<table width='100%' style='padding:10px; color:#000; font-size:15px; font-family:arial; font-wight:bold;'>
						<tr><td style='font-size:18px;color=:#0099FF;'>Hello&nbsp;".$username."!</td></tr>
						<tr><td style='font-size:15px;color=:#FFF;'>Your ". $email." has been ".$msg.".</td></tr>
						</tr> <tr><td style='font-size:15px;color=:#FFF;'>Your account has been ".$msg. " by administrator of BlackList</td>
						</tr>
						</table>"; 

				
	 		$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		    	$headers .= 'From: <"votiveanilpr@gmail.com">' . "\r\n";
			$send = mail($to, $subject, $message, $headers);

    	return $send;		
	}

public function select_product($id)
	{
		$this->db->select('*')
		->from('es_product')
		->where('p_id',$id);
		$query = $this->db->get();
		return	$query->result_array();	
	}	




 public  function addvehicle()
  {
	    //print_r($_POST); 
		 extract($this->input->post());
																				
			$this->db->where('reg_no',$reg_no);
			$q=$this->db->get('wl_vehicle');
			 if($q->num_rows()>0)
			 {
				 	return "already";
			 }
	 else {
			
			$mdata['date_to']=date('Y-m-d',strtotime($to_date));
			$mdata['date_from']=date('Y-m-d',strtotime($from_date));
			$mdata['year']=$make_year;
			$mdata['type']=$vehicle_type;
			$mdata['pick_location']=$pick_up_area;
			$mdata['price']=$price;
			$mdata['wheel_type']=$v_type;
			$mdata['city']=$city;
			$mdata['reg_no']=$reg_no;
			$mdata['model']=$model;
			$mdata['u_id']=$vendor_id;
			$mdata['Security']=$Security;
			$mdata['pick_up_area']=$pick_up_area;
			$mdata['Pick_Up_Address']=$Pick_Up_Address;
			
			$str=implode(',',$weekend_day);
			$mdata['type_security']=$securty_type;
			$mdata['weekend_days']= $str;
			$mdata['weekend_price']=$weekend_price;
			$mdata['pick_time']= $hour.':'.$minute.' '.$shift;
			$mdata['self_drive']=$drive_licence;
			$mdata['plate_type']=$plate;
			$mdata['fuel_type']=$fule;
			$mdata['permit']=$permit;
			 $this->db->insert('wl_vehicle',$mdata);
			 
			 $data_price['vehicle_id']=$this->db->insert_id();
			 
			 if ($pick_from_date[0]!='')
			 {
							
						 foreach ($pick_from_date as  $key => $value )
						 {
								$data_price['to_date']=date('Y-m-d',strtotime($pick_to_date[$key]));
								 
								 $data_price['price']= $pick_price[$key];
								 
								$data_price['from_date']=date('Y-m-d',strtotime($value));
								
								
						 $this->db->insert('wl_vehicle_price',$data_price);
						 }
						 
						 
			 }
			 
			return $this->db->insert_id();
			//}
			//else{
		//	return 0;
		//	}
		
	   }
}
	  

	 function updatevehicle($id){
	   
	  // print_r($_POST);
	      $image_name='';
		    $table_name ='wl_vehicle';
			$u_id=  $this->session->userdata('user_id');
			extract($this->input->post());
			
			$mdata['date_to']=date('Y-m-d',strtotime($to_date));
			$mdata['date_from']=date('Y-m-d',strtotime($from_date));
			$mdata['year']=$make_year;
			$mdata['type']=$vehicle_type;
			$mdata['pick_location']=$pick_up_area;
			$mdata['price']=$price;
			$mdata['wheel_type']=$v_type;
			$mdata['city']=$city;
			$mdata['reg_no']=$reg_no;
			$mdata['model']=$model;
			$mdata['u_id']=$vendor_id;

			$mdata['Security']=$Security;
			$mdata['pick_up_area']=$pick_up_area;
			$mdata['Pick_Up_Address']=$Pick_Up_Address;
			
			$str=implode(',',$weekend_day);
			$mdata['type_security']=$securty_type;
			$mdata['weekend_days']= $str;
			$mdata['weekend_price']=$weekend_price;
			$mdata['pick_time']= $hour.':'.$minute.' '.$shift;
			$mdata['self_drive']=$drive_licence;
			$mdata['plate_type']=$plate;
			$mdata['fuel_type']=$fule;
			$mdata['permit']=$permit;
			
			 $this->db->where('vehicle_id',$id);
			 $this->db->delete('wl_vehicle_price'); 
			 
			 
			 $data_price['vehicle_id']=$id;
			// print_r($pick_from_date);
			 if ($pick_from_date[0]!='')
			 {
						 foreach ($pick_from_date as  $key => $value )
						 {
								$data_price['to_date']=date('Y-m-d',strtotime($pick_to_date[$key]));
								 
								 $data_price['price']= $pick_price[$key];
								 
								$data_price['from_date']=date('Y-m-d',strtotime($value));
								
								
						 $this->db->insert('wl_vehicle_price',$data_price);
						 }
						 
			} 
			 
			              $this->db->where('vl_id',$id);
			   return  $this->db->update('wl_vehicle',$mdata);
			
			//}
			//else{
		//	return 0;
		//	}
	  }
	  




	public function check_id_after_place_order($from_date, $to_date, $vehicle_id)
		{
		     $str='select vehicle_id  from  wl_order where need_to_date >="'.$from_date.'" and  need_from_date<="'.$to_date.'"  and vehicle_id="'.$vehicle_id.'" and  status="Completed"';
			$q=$this->db->query($str);
			 return $q->num_rows();
		}



		public function get_dyanamic_value()
		{
			$q=$this->db->get('wl_setting');
			return $q->result();
		}
		
			
			public function get_vendor_commesion($id)
			{
				$str="select * from wl_vehicle v , wl_vendor ven where v.u_id=ven.v_id and v.vl_id='$id' ";
				$q=$this->db->query($str);
				
				 return $q;
			
			}

		public function cancellation_policy($type)
		{	
				$this->db->where('vehicle_type',$type);	
			$q= $this->db->get('cancellation_policy');
			return $q->result();
			
		}



}


