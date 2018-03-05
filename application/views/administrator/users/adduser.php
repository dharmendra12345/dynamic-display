	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>	 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
	<div class="warper container-fluid">      
	<div class="page-header">
	<h3><?php if(!empty($singledata)){?> Edit user <?php }else{ echo 'Add a new user'; }?></h3>
	</div>           
	<div class="row">    
	<div class="col-md-12">    
	<div class="panel panel-default">    
	<div class="panel-heading"><?php if(!empty($singledata)){?> Edit user <?php }else{ echo 'Add a new user'; }?></div>                        <div class="panel-body"><?php validation_errors(); ?>	
	<form  class="form-horizontal" name="users_add"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/adduser" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-user/<?php echo $singledata->id; ?>" <?php } ?> id="users_add" enctype="multipart/form-data">  
	<div class="form-group">           
	<label class="col-sm-2 control-label">Firstname </label>        
	<div class="col-sm-7">                             
	<input type="text" name="firstname" class="form-control" value="<?php if(!empty($singledata)){echo $singledata->firstname; }?>" id="firstname" placeholder="Firstname">	
	<div class="new_erroe_one"><?php echo form_error('firstname'); ?></div>    
	</div>     
	</div>     
	<div class="form-group">   
	<label class="col-sm-2 control-label">Lastname </label>    
	<div class="col-sm-7">   
	<input type="text" name="lastname" class="form-control" id="lastname" value="<?php if(!empty($singledata)){echo $singledata->lastname;} ?>" placeholder="Lastname">		
	<div class="new_erroe_one"><?php echo form_error('lastname'); ?></div>      
	</div>                  
	</div>  								
	<div class="form-group">                  
	<label class="col-sm-2 control-label">Username </label>       
	<div class="col-sm-7">                          
	<input type="text" name="username" class="form-control" id="username" value="<?php if(!empty($singledata)){echo $singledata->username; }?>" placeholder="Username">		
	<div class="new_erroe_one"><?php echo form_error('username'); ?></div>          
	</div>              
	</div>						
	<div class="form-group">           
	<label class="col-sm-2 control-label">Email </label>      
	<div class="col-sm-7">                           
	<input type="email" name="email" class="form-control" id="email" value="<?php if(!empty($singledata)){echo $singledata->email;} ?>" placeholder="Email">	
	<div class="new_erroe_one"><?php echo form_error('email'); ?></div>       
	</div>             
	</div>			
	<?php if(empty($singledata->password)){ ?>			
	<div class="form-group">                   
	<label class="col-sm-2 control-label">Password </label>  
	<div class="col-sm-7">                          
	<input type="password" name="password" class="form-control" id="password" placeholder="Password">	
	<div class="new_erroe_one"><?php echo form_error('password'); ?></div>           
	</div>            
	</div>						
	<?php } ?>					
	<div class="form-group">      
	<label class="col-sm-2 control-label">DOB </label>           
	<div class="col-sm-7">                              
    <input type="text" name="dob" class="form-control" value="<?php if(!empty($singledata)){echo $singledata->dob;} ?>" id="dob" placeholder="Date of birth">		
	<div class="new_erroe_one"><?php echo form_error('dob'); ?></div>            
	</div>                        
	</div>							  		
	<div class="form-group">                 
	<label class="col-sm-2 control-label">Address </label>       
	<div class="col-sm-7">                            
	<textarea name="address" id="address" class="form-control"><?php if(!empty($singledata)){echo $singledata->address;} ?></textarea>		
	<div class="new_erroe_one"><?php echo form_error('address'); ?></div>    
	</div>                  
	</div>							  		
	<div class="form-group">                
	<label class="col-sm-2 control-label">Mobile No </label>       
	<div class="col-sm-7">                              
    <input type="text" name="mobile_no" value="<?php if(!empty($singledata)){echo $singledata->mobile_no;} ?>" class="form-control" id="mobile_no" placeholder="Mobile No">	
	<div class="new_erroe_one"><?php echo form_error('mobile_no'); ?></div>        
	</div>                        
	</div>							  			
	<div class="form-group">         
	<label class="col-sm-2 control-label">Image</label>          
	<div class="col-sm-7">                         
	<input type="file" name="images" value="<?php if(!empty($singledata)){echo $singledata->image;} ?>" id="image" placeholder="Image">    
	<?php if(!empty($singledata->image)){ ?>			
	<br/> <img src="<?php echo base_url(); ?>user_image/<?php echo $singledata->image; ?>" style="width:30%" />			
	<?php } ?>	
	<div class="new_erroe_one"><?php echo form_error('mobile_no'); ?></div>       
	</div>                   
	</div>					
	<div class="form-group">                  
	<label class="col-sm-2 control-label">Status </label>       
	<div class="col-sm-7">                  
	<select name="status" id="status" class="form-control">	
	<option value="1" <?php if(!empty($singledata)){ if($singledata->status == 1){echo 'selected';} }?>>Active</option>		
	<option value="2" <?php if(!empty($singledata)){ if($singledata->status == 2){echo 'selected';} }?>>Deactive</option>			
	</select>							
	<div class="new_erroe_one"><?php echo form_error('status'); ?></div>     
	</div>           
	</div>						
	<div class="form-group">          
	<div class="col-sm-offset-3 col-sm-9">	
	<input type="submit" class="btn btn_styling btn-info" value="Add"  />		
	<input type="button"   class="btn btn_styling btn-info" value="Go Back" onClick="history.go(-1);"  />       
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
    $("#users_add").validate({  
        rules: {
            firstname: {
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
           images: {
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
	<?php }else{ ?>
	$(document).ready(function() {  
    $("#users_add").validate({  
        rules: {
            firstname: {
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