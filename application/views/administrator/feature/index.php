<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
<div style="float:right"> 
   <a href="<?php echo base_url(); ?>administrator/add-feature" class="small-tile green-back">
   <img width="32" src="<?php echo base_url(); ?>assets_admin/images/icons/tick.png" class="hide-sm pull-right">
   <h3 class="h3-tile add_title">Add a new features</h3></a>
   </div>      
   <div class="warper container-fluid mng_feat_wrap">    
   <div class="page-header">
   <h1>Features</h1>
   </div>	
   <?php //echo   @$this->session->flashdata('onlinetestingcategoryAddSucMsg');	?>		
   <?php if($this->session->flashdata('item')) {?>  
   <div class="alert alert-success alert-dismissable">    
   <i class="fa fa-check"></i>     
   <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>   
   <b>Alert! </b><?php echo  $this->session->flashdata('item');?> 
   </div>
   <?php }?>		
   <div id="onlinetestingcategoryDeleteSucMsg"></div>            
   <div class="panel panel-default">           
     
   <div class="panel-body">                  
   <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">      
   <thead>             
   <tr>                
   <th>Feature Name</th>              
   <th>Feature Icon</th>                
   <th>Feature Description</th>			
   <th>Action</th>               
   </tr>                         
   </thead>                      
   <tbody>						
   <?php                         
   if(!empty($features)){			
   foreach($features as $val) { ?>  
   <tr class="odd gradeX">       
   <td><?php echo $val->feature_name; ?></td>      
   <td><img height="50" width="50" src="<?php echo base_url(); ?>feature_image/<?php echo $val->feature_icon ?>" ></td>				
   <td><?php echo $val->feature_desc; ?></td>			
   <td>		
   <a class="mng_feat_btn"  href="<?php echo base_url().'administrator/edit-feature/'.$val->id; ?>">Edit</a>	
   <!--<a class=""  href="<?php echo base_url().'administrator/viewuser/'.$val->id; ?>">View</a>  --> 
   <a class="mng_feat_btn"  href="<?php echo base_url().'administrator/disable-feature/'.$val->id; ?>"><?php if($val->status == 0 ){echo 'Deactive';}else{echo 'Active';} ?></a>	
   <a class="mng_feat_btn" href="<?php echo base_url(); ?>administrator/delete-feature/<?php echo $val->id; ?>" onclick="return confirm('Are you sure delete this Page?')">Delete</a>
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
   */
   
   </script>
   
   <style>  
   td.highlited{background-color: #C42121 !important;
   color: #fff !important; border: 1px solid #FFF !important;}
   td.highlited a{color: #fff !important;	}	
   .add_title {background: #FF404B;padding: 12px;margin-right: 15px;font-size: 13px;font-weight: 100;color: #fff;letter-spacing: 1px;border-radius: 4px;}
   </style>		