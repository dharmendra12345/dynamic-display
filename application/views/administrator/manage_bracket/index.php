<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
<div style="float:right"> 
   <a href="<?php echo base_url(); ?>administrator/addbracket" class="small-tile green-back">
   <img width="32" src="<?php echo base_url(); ?>assets_admin/images/icons/tick.png" class="hide-sm pull-right">
   <h3 class="h3-tile add_title">Add a new Bracket</h3></a>
   </div>      
   <div class="warper container-fluid">    
   <div class="page-header">
   <h1>Bracket</h1>
   </div>	
   <?php //echo   @$this->session->flashdata('onlinetestingcategoryAddSucMsg');	?>		
   <?php if($this->session->flashdata('item')) {?>  
   <div class="alert alert-success alert-dismissable">    
   <i class="fa fa-check"></i>     
   <button aria-hidden="true" data-dismiss="alert" class="close" type="button">�</button>   
   <b>Alert! </b><?php echo  $this->session->flashdata('item');?> 
   </div>
   <?php }?>		
   <div id="onlinetestingcategoryDeleteSucMsg"></div>            
   <div class="panel panel-default">           
       
   <div class="panel-body">                  
   <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">      
   <thead>             
   <tr>                
   <th>Tournament</th>                 
   <th>Create Date</th>			
   <th>Action</th>               
   </tr>                         
   </thead>                      
   <tbody>						
   <?php                         
   if(!empty($bracket)){			
   foreach($bracket as $val) { 
   $tournament = $this->Common_model->getsingle('tournament',array('id' =>$val->tournament_id));
   ?>  
   <tr class="odd gradeX">       
   <td><?php echo $tournament->tournament_name; ?></td>      
   <td><?php echo date('d-m-Y', strtotime($val->date_added)); ?></td>   			
   <td>		
   <a class=""  href="<?php echo base_url().'administrator/edit_bracket/'.$val->bracket_id; ?>">Edit</a>	
   <a class=""  href="<?php echo base_url().'administrator/viewbracket/'.$val->bracket_id; ?>">View</a>   
   <a class=""  href="<?php echo base_url().'administrator/deletebracket/'.$val->bracket_id; ?>" onclick="return confirm('Are you sure delete this Bracket?')">Delete</a>
   </td>      
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
   });	 
   }  
   }	
   */</script>   <script>
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
   .add_title {background: #FF404B;padding: 12px;margin-right: 15px;font-size: 13px;font-weight: 100;color: #fff;letter-spacing: 1px;border-radius: 4px;}
   </style>		