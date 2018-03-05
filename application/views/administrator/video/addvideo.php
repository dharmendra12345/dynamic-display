	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
  <style>
 

  </style>
		<div class="warper container-fluid">
            <div class="page-header"><h3><?php if(!empty($singledata)){?> Edit video <?php }else{ echo 'Add a new video'; }?></h3></div>
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
                        <div class="panel-heading"><?php if(!empty($singledata)){?> Edit Section <?php }else{ echo 'Add a video'; }?></div>
                        <div class="panel-body">
							 <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addvideo" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-video/<?php echo $singledata->video_item_id; ?>" <?php } ?> id="schedule_data" enctype="multipart/form-data">
 
							  
						    <div class="form-group">
                                <label class="col-sm-2 control-label">select section  </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="sectiontype"> 
								     <option value=""> 
									  select section  
									 </option>
									 <?php 
									   foreach($section as $val) { ?> 
                             	      <option value="<?php echo $val->section_id;?>" <?php if(!empty($singledata) and $val->section_id==$singledata->section_id){ echo "selected";} ?> > 
									   <?php echo $val->name;?>
									 </option>
									  <?php } ?>
								   </select>
                                </div>
                              </div>
							   
							   
						  <div class="form-group">
                                <label class="col-sm-2 control-label">video name</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="file_name" id="video_name"  value="<?php if(!empty($singledata1)){ echo $singledata1->file_name; }?>">
                                </div>
                          </div>
						  
						  
						  <?php /*?><div class="form-group">
                                <label class="col-sm-2 control-label">	File status </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="file_status"> 
								     <option value=""> 
									  	select file status 
									 </option>
									  <option value="w" <?php if(!empty($singledata1) and $singledata1->file_status=='w'){ echo "selected"; }?>> 
									  	w
									 </option>
								  <option value="d" <?php if(!empty($singledata1) and $singledata1->file_status=='d'){ echo "selected"; }?> > 
									  	d
									 </option>
									  <option value="f" <?php if(!empty($singledata1) and $singledata1->file_status=='f'){ echo "selected"; }?> >									  	                                   f
									 </option>
									  <option value="c" <?php if(!empty($singledata1) and $singledata1->file_status=='c'){ echo "selected"; }?> >									  	                                    c
									 </option>
								   </select>
                                </div>
                              </div><?php */?>
						  
						  
						  
						 
						   <!--<div class="form-group">
                                <label class="col-sm-2 control-label">video url</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->video_url; }?>" class="form-control" name="video_url" id="video_url" >
                                </div>
                          </div>-->
						  
						    <div class="form-group">
                                <label class="col-sm-2 control-label">video download url</label>
                                <div class="col-sm-7">
                                   <input type="text"  class="form-control" name="video_download_url" id="video_download_url" value="<?php if(!empty($singledata)){ echo $singledata->video_download_url; }?>" >
                                </div>
                          </div>
						  
					  <div class="form-group">
                                <label class="col-sm-2 control-label">video download start time</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="file_start_time" id="file_start_time" value="<?php if(!empty($singledata1)){ echo $singledata1->file_start_time; }?>" >
                                </div>
                          </div>
						  
						  
					  <div class="form-group">
                                <label class="col-sm-2 control-label">	Downloadable </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="downloadable"> 
									  <option value="0" <?php if(!empty($singledata) and $singledata->downloadable==0){ echo "selected"; }?>> 
									  	0
									 </option>
								  <option value="1" <?php if(!empty($singledata) and $singledata->downloadable==1){ echo "selected"; }?> > 
									  	1
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
   $('#file_start_time').datetimepicker({
   format: 'YYYY-MM-DD HH:mm:SS',
   keepOpen: true
   
   });
  });
</script>			