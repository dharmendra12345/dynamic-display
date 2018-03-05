	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
  <style>
 

  </style>
		<div class="warper container-fluid">
            <div class="page-header"><h3><?php if(!empty($singledata)){?> Edit text item <?php }else{ echo 'Add a text item'; }?></h3></div>
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
                        <div class="panel-heading"><?php if(!empty($singledata)){?> Edit text item <?php }else{ echo 'Add a text item'; }?></div>
                        <div class="panel-body">
							 <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addtext" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-text/<?php echo $singledata->text_item_id; ?>" <?php } ?> id="schedule_data" enctype="multipart/form-data">
 
							  
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
                                <label class="col-sm-2 control-label">text size</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="text_size" id="text_size"  value="<?php if(!empty($singledata)){ echo $singledata->text_size; }?>">
                                </div>
                          </div>
						 
						   <div class="form-group">
                                <label class="col-sm-2 control-label">text color</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->text_color; }?>" class="form-control" name="text_color" id="text_color" >
                                </div>
                          </div>
						  
						    <div class="form-group">
                                <label class="col-sm-2 control-label">text file name</label>
                                <div class="col-sm-7">
                                   <input type="text"  class="form-control" name="text_file_name" id="text_file_name" value="<?php if(!empty($singledata)){ echo $singledata->text_file_name; }?>" >
                                </div>
                          </div>
						  
					     <div class="form-group">
                                <label class="col-sm-2 control-label">text file download url</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="text_file_download_url" id="text_file_download_url" value="<?php if(!empty($singledata)){ echo $singledata->text_file_download_url; }?>" >
                                </div>
                          </div>
						  <div class="form-group">
                                <label class="col-sm-2 control-label">text value</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="text_value" id="text_value" value="<?php if(!empty($singledata)){ echo $singledata->text_value; }?>" >
                                </div>
                          </div>
						   <div class="form-group">
                                <label class="col-sm-2 control-label">text scroll speed</label>
                                <div class="col-sm-7">
                                   <input type="text" class="form-control" name="text_scroll_speed" id="text_scroll_speed" value="<?php if(!empty($singledata)){ echo $singledata->text_scroll_speed; }?>" >
                                </div>
                          </div>
						  
						  
					 		  <div class="form-group">
                                <label class="col-sm-2 control-label">	text lang </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="text_lang"> 
								     <option value=""> 
									  	select text lang 
									 </option>
									  <option value="0" <?php if(!empty($singledata) and $singledata->text_lang==0){ echo "selected"; }?>> 
									  	left(LTR)
									 </option>
								  <option value="1" <?php if(!empty($singledata) and $singledata->text_lang==1){ echo "selected"; }?> > 
									  	right(RTL)
									 </option>
									 
								   </select>
                                </div>
                              </div>
							  
							  <div class="form-group">
                                <label class="col-sm-2 control-label">text scrolable </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="text_scrollable"> 
								     <option value=""> 
									  	select text scrollable
									 </option>
									  <option value="0" <?php if(!empty($singledata) and $singledata->text_scrollable==0){ echo "selected"; }?>> 
									  yes
									 </option>
								  <option value="1" <?php if(!empty($singledata) and $singledata->text_scrollable==1){ echo "selected"; }?> > 
									  	no
									 </option>
									 
								   </select>
                                </div>
                              </div>
							  
							   <div class="form-group">
                                <label class="col-sm-2 control-label">	text orientation </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="text_scroll_direction"> 
								     <option value=""> 
									   text scroll direction
									 </option>
									  <option value="0" <?php if(!empty($singledata) and $singledata->text_scroll_direction==0){ echo "selected"; }?>> 
									  horizontal
									 </option>
								  <option value="1"  <?php if(!empty($singledata) and $singledata->text_scroll_direction==1){ echo "selected"; }?> > 
									  	vertical
									 </option>
									 
								   </select>
                                </div>
                              </div>
							  
							  
							<?php /*?>  <div class="form-group">
                                <label class="col-sm-2 control-label"> text type </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="text_type"> 
								     <option value=""> 
									   	text type
									 </option>
									  <option value="0"  <?php if(!empty($singledata) and $singledata->text_type==0){ echo "selected"; }?> > 
									  text
									 </option>
								  <option value="1" <?php if(!empty($singledata) and $singledata->text_type==1){ echo "selected"; }?> > 
									  	file
									 </option>
									 
								   </select>
                                </div>
                              </div><?php */?>
							  
							  
							   <div class="form-group">
                                <label class="col-sm-2 control-label">Text download start time</label>
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
		