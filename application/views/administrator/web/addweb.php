	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
  <style>
  </style>
		<div class="warper container-fluid">
            <div class="page-header"><h3><?php if(!empty($singledata)){?> Edit web <?php }else{ echo 'Add a new web'; }?></h3></div>
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
							 <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addweb" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-web/<?php echo $singledata->web_item_id; ?>" <?php } ?> id="video_data" enctype="multipart/form-data">
 
							  
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
                                <label class="col-sm-2 control-label">web url</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->web_url; }?>" class="form-control" name="web_url" id="web_url" >
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
   $('#video_download_start_time').datetimepicker({
   format: 'YYYY-MM-DD HH:mm:SS',
   keepOpen: true
   
   });
    
  });
</script>	
		