	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
  <style>
 

  </style>
		<div class="warper container-fluid">
            <div class="page-header"><h3><?php if(!empty($singledata)){?> Edit Section <?php }else{ echo 'Add a new Section'; }?></h3></div>
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
                        <div class="panel-heading"><?php if(!empty($singledata)){?> Edit Section <?php }else{ echo 'Add a new Section'; }?></div>
                        <div class="panel-body">
							 <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addsection" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-section/<?php echo $singledata->section_id; ?>" <?php } ?> id="schedule_data" enctype="multipart/form-data">
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Select Schedule </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="schedule"> 
								     <option value=""> 
									  select Schedule
									 </option>
									 <?php 
									   foreach($schedule as $val) { ?> 
                             	      <option value="<?php echo $val->schedule_id;?>" <?php if(!empty($singledata) and $val->schedule_id==$singledata->schedule_id){ echo "selected";} ?> > 
									   <?php echo $val->schedule_name;?>
									 </option>
									  <?php } ?>
								   </select>
                                </div>
                              </div>
							  
						    <div class="form-group">
                                <label class="col-sm-2 control-label">select section type</label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="sectiontype"> 
								     <option value=""> 
									  select section type
									 </option>
									 <?php 
									   foreach($sectiontype as $val) { ?> 
                             	      <option value="<?php echo $val->section_type_id;?>" <?php if(!empty($singledata) and $val->section_type_id==$singledata->section_type){ echo "selected";} ?> > 
									   <?php echo $val->section_type_name;?>
									 </option>
									  <?php } ?>
								   </select>
                                </div>
                              </div>
							   
						  <div class="form-group">
                                <label class="col-sm-2 control-label">Section Name</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="name" id="name"  value="<?php if(!empty($singledata)){ echo $singledata->name; }?>">
                                </div>
                          </div>	   
						  <div class="form-group">
                                <label class="col-sm-2 control-label">Start_x_cordinate</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="start_x_cordinate" id="start_x_cordinate"  value="<?php if(!empty($singledata)){ echo $singledata->start_x_cordinate; }?>">
                                </div>
                          </div>
						 
						   <div class="form-group">
                                <label class="col-sm-2 control-label">start_y_cordinate</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->start_y_cordinate; }?>" class="form-control" name="start_y_cordinate" id="start_y_cordinate" >
                                </div>
                          </div>
						  
						    <div class="form-group">
                                <label class="col-sm-2 control-label">end_x_cordinate</label>
                                <div class="col-sm-7">
                                   <input type="text"  class="form-control" name="end_x_cordinate" id="end_x_cordinate" value="<?php if(!empty($singledata)){ echo $singledata->end_x_cordinate; }?>" >
                                </div>
                          </div>
						  
					  <div class="form-group">
                                <label class="col-sm-2 control-label">end_y_cordinate</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="end_y_cordinate" id="end_y_cordinate" value="<?php if(!empty($singledata)){ echo $singledata->end_y_cordinate; }?>" >
                                </div>
                          </div>
						   <div class="form-group">
                                <label class="col-sm-2 control-label">section_backgorund_color</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="section_backgorund_color" id="section_backgorund_color" value="<?php if(!empty($singledata)){ echo $singledata->section_backgorund_color; }?>" >
                                </div>
                          </div>
						  
						  
						   <div class="form-group">
                                <label class="col-sm-2 control-label">image flip interval</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="image_flip_interval" id="image_flip_interval" value="<?php if(!empty($singledata)){ echo $singledata->image_flip_interval; }?>" >
                                </div>
                          </div>
						  
						   <div class="form-group">
                                <label class="col-sm-2 control-label">page flip interval</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="cell_flip_interval" id="cell_flip_interval" value="<?php if(!empty($singledata)){ echo $singledata->cell_flip_interval; }?>" >
                                </div>
                          </div>
						  
						  
						   <div class="form-group">
                                <label class="col-sm-2 control-label">text flip interval</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="text_flip_interval" id="text_flip_interval" value="<?php if(!empty($singledata)){ echo $singledata->text_flip_interval; }?>" >
                                </div>
                          </div>
						  
						   <div class="form-group">
                                <label class="col-sm-2 control-label">web refresh interval</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="web_refresh_interval" id="web_refresh_interval" value="<?php if(!empty($singledata)){ echo $singledata->web_refresh_interval; }?>" >
                                </div>
                          </div>
						  
						  <div class="form-group">
                                <label class="col-sm-2 control-label">order by</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="order_by" id="order_by" value="<?php if(!empty($singledata)){ echo $singledata->order_by; }?>" >
                                </div>
                          </div>


                          <div class="form-group">
                                <label class="col-sm-2 control-label">Update interval</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="update_interval" id="update_interval" value="<?php if(!empty($singledata)){ echo $singledata->update_interval; }?>" >
                                </div>
                          </div>
						  
							 
							 
						  <div class="form-group">
                                <label class="col-sm-2 control-label">	video Mute </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="video_mute"> 
									  <option value="0" <?php if(!empty($singledata) and $singledata->video_mute==0){ echo "selected"; }?>> 
									  	video unmute
									 </option>
								  <option value="1" <?php if(!empty($singledata) and $singledata->video_mute==1){ echo "selected"; }?> > 
									  	video mute
									 </option>
								   </select>
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
 $(document).ready(function(){
   $('.date_picker').datetimepicker({
   format: 'YYYY-MM-DD HH:mm:SS',
   keepOpen: true
   
   });
    
  });
</script>		
		