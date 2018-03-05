	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>	 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
	<div class="warper container-fluid">      
	<div class="page-header">
	<h3><?php if(!empty($singledata)){?> Edit feature <?php }else{ echo 'Add a new feature'; }?></h3>
	</div>           
	<div class="row">    
	<div class="col-md-12">    
	<div class="panel panel-default">    
	<div class="panel-heading"><?php if(!empty($singledata)){?> Edit feature <?php }else{ echo 'Add a new feature'; }?></div>                        <div class="panel-body"><?php validation_errors(); ?>	
	<form  class="form-horizontal" name="feature_add"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/add-feature" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-feature/<?php echo $singledata->id; ?>" <?php } ?> id="feature_add" enctype="multipart/form-data">  
	<div class="form-group">           
	<label class="col-sm-2 control-label">Name </label>        
	<div class="col-sm-7">                             
	<input type="text" name="name" class="form-control" value="<?php if(!empty($singledata)){echo $singledata->feature_name; }?>" id="name" placeholder="name">	
	<div class="new_erroe_one"><?php echo form_error('name'); ?></div>    
	</div>     
	</div>     
  								
 						  		
	<div class="form-group">                 
	<label class="col-sm-2 control-label">Description </label>       
	<div class="col-sm-7">                            
	<textarea name="description" id="description" class="form-control"><?php if(!empty($singledata)){echo $singledata->feature_desc;} ?></textarea>		
	<div class="new_erroe_one"><?php echo form_error('description'); ?></div>    
	</div>                  
	</div>							  		
 						  			
	<div class="form-group">         
	<label class="col-sm-2 control-label">Icon</label>          
	<div class="col-sm-7">                         
	<input type="file" name="images" value="<?php if(!empty($singledata)){echo $singledata->feature_icon;} ?>" id="image" placeholder="Image">    
	<?php if(!empty($singledata->feature_icon)){ ?>			
	<br/> <img src="<?php echo base_url(); ?>feature_image/<?php echo $singledata->feature_icon; ?>" style="width:30%" />			
	<?php } ?>	
	<div class="new_erroe_one"><?php echo form_error('mobile_no'); ?></div>       
	</div>                   
	</div>					
	<div class="form-group">                  
	<label class="col-sm-2 control-label">Status </label>       
	<div class="col-sm-7">                  
	<select name="status" id="status" class="form-control">	
	<option value="1" <?php if(!empty($singledata)){ if($singledata->status == 1){echo 'selected';} }?>>Active</option>		
	<option value="0" <?php if(!empty($singledata)){ if($singledata->status == 0){echo 'selected';} }?>>Deactive</option>			
	</select>							
	<div class="new_erroe_one"><?php echo form_error('status'); ?></div>     
	</div>           
	</div>						
	<div class="form-group">          
	<div class="col-sm-offset-3 col-sm-9">	
	<input type="submit" class="btn btn-info" value="Add"  />		
	<input type="button"   class="btn btn-info" value="Go Back" onClick="history.go(-1);"  />       
	</div>                  
	</div>                 
	</form>                  
	</div>         
	</div>     
	</div>         
	</div>      
	</div>
	<script> 
	$( function() {
		$( "#dob" ).datepicker({  
		yearRange: '1970:2013', 
		changeMonth: true,  
		changeYear: true    
		});  
		});  
	<?php if(empty($singledata)){ ?>	
	$(document).ready(function() {  
    $("#feature_add").validate({  
        rules: {
            name: {
			    required:true,
				 minlength:2,			   
			},
 		  
	 
           images: {
			   required:true,	
		   },  
		   description: {
			   required:true,	
		   },
	 
           status: {
			   required:true,	
		   }		   
        }     
    });
  }); 
	<?php }else{ ?>
	$(document).ready(function() {  
    $("#users_add").validate({  
        rules: {
            name: {
			    required:true,
				 minlength:2,			   
			},
			lastname: {
			    required:true,
				 minlength:2,			   
			},
		
			username: {
			    required:true,
				 minlength:2,			   
			},		  
			email: {
			    required:true,
				 minlength:2,
                 email:true,				 
			},		  
			password: {
			    required:true,
				 minlength:2,			   
			},			
			dob: {
			    required:true,							   
			},
			address: {
			   required:true,	
			},          
		   mobile_no: {
			  required:true,
			  minlength:10,
			  maxlength:15,
			  number: true			   
		   },
           status: {
			   required:true,	
		   }		   
        }     
    });
  }); 
	<?php } ?>
	</script>