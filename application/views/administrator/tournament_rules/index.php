<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
<div style="float:right">  
  <?php if(empty($singledata)){ ?><a href="<?php echo base_url(); ?>administrator/addrule" class="small-tile green-back">
  <img width="32" src="<?php echo base_url(); ?>assets_admin/images/icons/tick.png" class="hide-sm pull-right">
  <h3 class="h3-tile add_title">Add a new rule</h3></a><?php } ?>
</div>  
      <div class="warper container-fluid trnamnt_rules">     
	  <div class="page-header"><h1>Tournament Rules</h1></div>	
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
	  <th>Tournament Rules</th>     
	  <th>Tournament Rule Date</th>	  		
	  <th>Action</th>         
	  </tr>                
	  </thead>             
	  <tbody>				
	  <?php                  
	  if(!empty($tournament_rules)){	
	  foreach($tournament_rules as $val) { ?>     
	  <tr class="odd gradeX">                
	  <td><?php echo $val->rules; ?></td>     
	 	  <td><?php echo date('d-m-Y', strtotime($val->date_added)); ?></td>      
	  <td>		
	  <a class=""  href="<?php echo base_url().'administrator/editrule/'.$val->id; ?>">Edit</a>	
	  <a class=""  href="<?php echo base_url().'administrator/viewrule/'.$val->id; ?>">View</a>  
	  <a href="<?php echo base_url(); ?>administrator/deleterule/<?php echo $val->id; ?>" onclick="return confirm('Are you sure delete this rule?')">Delete</a>	 </td>      
	  </tr>			
	  <?php }} ?>          
	  </tbody>                 
	  </table>              
      </div>       
	  </div>        
	  </div>   
	  <!-- Warper Ends Here (working area) -->		
	   <script>
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