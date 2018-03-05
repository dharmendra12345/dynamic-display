	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>	 
		<div class="warper container-fluid">      
	<div class="page-header">
	<h3><?php if(!empty($singledata)){?> Edit Bracket <?php }else{ echo 'Add a new bracket'; }?></h3>
	</div>           
	<div class="row">    
	<div class="col-md-12">    
	<div class="panel panel-default">    
	<div class="panel-heading"><?php if(!empty($singledata)){?> Edit bracket <?php }else{ echo 'Add a new bracket'; }?></div>                        <div class="panel-body"><?php validation_errors(); ?>	
	<form  class="form-horizontal" name="users_add"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addbracket" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit_bracket/<?php echo $singledata->bracket_id; ?>" <?php } ?> id="users_add" enctype="multipart/form-data">  
	<div class="form-group">           
	<label class="col-sm-2 control-label">Tournament </label>        
	<div class="col-sm-7">     
      <select name="tournament_id" id="tournament_id" class="form-control">
	  <option value="">Select</option>
	  <?php if(!empty($tournament_value)){ 	   
	     foreach($tournament_value as $tour){
	  ?>
	     <option value="<?php echo $tour->id; ?>" <?php if($tour->id == $singledata->tournament_id){echo 'selected';} ?>><?php echo $tour->tournament_name; ?></option>
	  <?php }} ?>
	  </select>	
		<div class="new_erroe_one"><?php echo form_error('tournament_id'); ?></div>    
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
	$(document).ready(function() {  
    $("#users_add").validate({  
        rules: {
            tournament_id: {
			    required:true,				 			   
			},
				   
        }     
    });
  }); 
	
	</script>