	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
  <style>
  </style>
		<div class="warper container-fluid">
            <div class="page-header"><h3><?php if(!empty($singledata)){?> Edit version <?php }else{ echo 'Add a new version'; }?></h3></div>
            <div class="row">
            	<div class="col-md-12">
				<div class="box-body">
		<?php if($this->session->flashdata('error')){?>
          <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <b>Alert!</b><?php echo $this->session->flashdata('error') ;?>
        </div>
       <?php }  if($this->session->flashdata('schedule')) {?>
        <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?php echo  $this->session->flashdata('schedule');?>
      </div>
	  <?php }?>
    </div>
                 	<div class="panel panel-default">
                        <div class="panel-heading"><?php if(!empty($singledata)){?> Edit Audio <?php }else{ echo 'Add a new version'; }?></div>
                        <div class="panel-body">
							 <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addVersion" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-version/<?php echo $singledata->id; ?>" <?php } ?> id="schedule_data" enctype="multipart/form-data">
							  
						   <div class="form-group">
                                <label class="col-sm-2 control-label">Link</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->link; }?>" class="form-control" name="link" id="link" >
                                </div>
                          </div>
						  
						   
						   <div class="form-group">
                                <label class="col-sm-2 control-label">Version Number</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->version_number; }?>" class="form-control" name="version_name" id="version_name" >
                                </div>
                          </div>
						  
						  
						  	
						  <?php /*?><div class="form-group">
                                <label class="col-sm-2 control-label">Device Id</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_image_url; }?>" class="form-control" name="cell_image_url" id="cell_image_url" >
                                </div>
                          </div><?php */?>
						  
						  <?php /*?><div class="form-group">
                                <label class="col-sm-2 control-label">Select user  </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="user"> 
								     <option value=""> 
									  select user id  
									 </option>
									 <?php 
									   foreach($users as $val) { ?> 
                             	      <option value="<?php echo $val->user_id;?>" <?php if(!empty($singledata) and $val->user_id==$singledata->user_id){ echo "selected";} ?> > 
									   <?php echo $val->user_id;?>
									 </option>
									  <?php } ?>
								   </select>
                                </div>
                              </div><?php */?>
						  
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
 $(document).ready(function(){
   $('.date_picker').datetimepicker({
   format: 'YYYY-MM-DD HH:mm:SS',
   keepOpen: true
   
   });
    
  });
</script>	
		