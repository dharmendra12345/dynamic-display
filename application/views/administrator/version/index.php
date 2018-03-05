<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
	<div style="float:right">  
	  <a href="<?php echo base_url(); ?>administrator/addVersion" class="small-tile green-back">
	  <img width="32" src="<?php echo base_url(); ?>assets_admin/images/icons/tick.png" class="hide-sm pull-right">
	  <h3 class="h3-tile add_title"> Add Version</h3>
	  </a>	
	</div>  
      <div class="warper container-fluid">     
	  <div class="page-header"><h1>Version</h1></div>	
	  <?php echo   @$this->session->flashdata('onlinetestingcategoryAddSucMsg');	?>		
	  <?php if($this->session->flashdata('item')) {?>      
	  <div class="alert alert-success alert-dismissable">       
	  <i class="fa fa-check"></i>    
	  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
      <b>Alert! </b><?php echo  $this->session->flashdata('item');?>   
	  </div>	  <?php }?>	
	  <div id="onlinetestingcategoryDeleteSucMsg"></div>         
	  <div class="panel panel-default">          
	       
	  <div class="panel-body">                        
	  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">       
	  <thead>         
	  <tr>       
	      
  <?php /*?>    <th>Cell type</th>	<?php */?>
      <th>Link</th>	 
	   <th>Version Name</th>	 
      <?php /*?><th>Cell Blink Color</th>	<?php */?>  	
	  <th>Action</th> 
       
	  </tr>                
	  </thead>             
	  <tbody>				
	  <?php 
	                   
	  if(!empty($version)){	
	  foreach($version as $val) { ?>     
	  <tr class="odd gradeX"> 
	  
	  <td><?php echo $val->link; ?></td>                
	  <td><?php echo $val->version_number; ?></td>     
	  <?php /*?><td><?php echo $val->cell_type; ?></td>	<?php */?>	
	 <?php /*?> <td><?php echo $val->radius; ?></td>	<?php */?>	
	 <?php /*?> <td><?php echo $val->cell_blink_color; ?></td><?php */?>		
	  <td>		
	  <a class=""  href="<?php echo base_url().'administrator/edit-version/'.$val->id; ?>">Edit</a>	
	  <?php /*?><a class=""  href="<?php echo base_url().'administrator/viewcell/'.$val->sound_id; ?>">View</a>  <?php */?>
	<?php /*?>  <a class=""  href="<?php echo base_url().'administrator/disable-tournament/'.$val->id; ?>"><?php if($val->status == 1){echo 'Active';}else{echo 'deactive';} ?></a><?php */?>	
	  <a href="<?php echo base_url(); ?>administrator/delete-audio/<?php echo $val->id; ?>" onclick="return confirm('Are you sure delete this  ?')">Delete</a>	 </td>   
	     
	  </tr>			
	  <?php }} ?>          
	  </tbody>                 
	  </table>              
      </div>       
	  </div>        
	  </div>   
	  <!-- Warper Ends Here (working area) -->		
	  <script type="text/javascript">
	  /*function delete_Online_test_cat(id){	
	  var r=confirm("Do You Really Want to delete?");	
	  var url = '<?php echo base_url();?>administrator/delete-user/'.id;alert(url);	 
	  var tbl_name = 'online_testing_category'; 
	  var formdata = 'id='+id+'&tbl_name='+tbl_name;
	  if (r==true){		
	  $.post(url,formdata, function(data){ 		
	  $('#onlinetestingcategoryDeleteSucMsg').html(data).show().fadeOut(3000);	
	  setTimeout(function(){ location.reload(); },2000);	    
	  });	  	}  	}	*/
	  </script>   <script>
$(document).ready(function() {	
 $('#basic-datatable').dataTable({
    "order": []
 });
});
</script>
	  <style>
	  td.highlited{background-color: #C42121 !important;
	  color: #fff !important; border: 1px solid #FFF !important;}
	  td.highlited a{color: #fff !important;	}
	  .add_title {
		  background: #FF404B;
		  padding: 12px;
		  margin-right: 15px;
		  font-size: 13px;
		  font-weight: 100;
		  color: #fff;
		  letter-spacing: 1px;
		  border-radius: 4px;
	  }</style>		