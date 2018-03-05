	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
  <style>
 

  </style>
		<div class="warper container-fluid">
            <div class="page-header"><h3><?php if(!empty($singledata)){?> Edit Schedule <?php }else{ echo 'Add a new schedule'; }?></h3></div>
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
                        <div class="panel-heading"><?php if(!empty($singledata)){?> Edit Schedule <?php }else{ echo 'Add a new schedule'; }?></div>
                        <div class="panel-body">
							 <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addschedule" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-schedule/<?php echo $singledata->schedule_id; ?>" <?php } ?> id="schedule_data" enctype="multipart/form-data">
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Schedule Name </label>
                                <div class="col-sm-7">
                                  <input type="text" name="schedule_name" class="form-control " value="<?php if(!empty($singledata)){echo $singledata->schedule_name; }?>" id="schedule_name" placeholder="Schedule Name">
                                </div>
                              </div>
							  <div id="tests"></div>
							   <div class="form-group">
                                <label class="col-sm-2 control-label">Schedule Start Time</label>
                                <div class="col-sm-7">
							  <div id="" class="input-append1">
								<input type="text" name="schedule_start_time" id="schedule_start_time" value="<?php if(!empty($singledata)){ echo $singledata->schedule_start_time; }?>" class="form-control"></input>
							    </div>
							  </div>
							 </div>
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Schedule End Time</label>
                                <div class="col-sm-7">
							  <div id="" class="input-append1">
								<input type="text" name="schedule_end_time" id="schedule_end_time" value="<?php if(!empty($singledata)){ echo $singledata->schedule_end_time; }?>" class="form-control"></input>
							    </div>
							  </div>
							 </div>
							 
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Schedule Start Date</label>
                                <div class="col-sm-7">
							  <div id="" class="input-append1 date_picker">
								<input type="text" name="schedule_start_date" id="schedule_start_time" value="<?php if(!empty($singledata)){ echo $singledata->schedule_start_date; }?>" class="form-control"></input>
							    </div>
							  </div>
							 </div>
							 
							 
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Schedule End Date</label>
                                <div class="col-sm-7">
							  <div id="" class="input-append1 date_picker">
								<input type="text" name="schedule_end_date" id="schedule_end_date" value="<?php if(!empty($singledata)){ echo $singledata->schedule_end_date; }?>" class="form-control"></input>
							    </div>
							  </div>
							 </div>
							 
							 <?php /*?><div class="form-group">
                                <label class="col-sm-2 control-label">Schedule Destroy Time</label>
                                <div class="col-sm-7">
							  <div id="" class="input-append1 date_picker">
								<input type="text" name="schedule_distroy_time" id="schedule_distroy_time" value="<?php if(!empty($singledata)){ echo $singledata->destroy_time; }?>" class="form-control"></input>
							    </div>
							  </div>
							 </div><?php */?>
							 
							 
							 <div class="form-group">
                                <label class="col-sm-2 control-label">Brightness </label>
                                <div class="col-sm-7">
                                  <input type="text" name="brightness" class="form-control " value="<?php if(!empty($singledata)){echo $singledata->brightness; }?>" id="brightness" placeholder="">
                                </div>
                              </div>
							 
							 
							  <div class="form-group">
                                <label class="col-sm-2 control-label">Schedule Repeated</label>
                                <div class="col-sm-7">
							  <div id="" class="input-append1">
								<input type="checkbox" name="repeat_schedule" <?php if(!empty($singledata) and $singledata->repeat_schedule=='1'){ echo "checked"; } ?> value="1" > 
								repeated
							    </div>
							  </div>
							 </div>
							 
							 
							 
							  <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
								  <?php if(!empty($singledata)){?>
								  <input type="submit" class="btn btn-info" value="Edit"  />
								  <?php } else { ?>
								    <input type="submit" class="btn btn-info" value="Add"  />
								  <?php }?>
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
   format: 'YYYY-MM-DD',
   keepOpen: true
   
   });
    
  });
</script>		
		