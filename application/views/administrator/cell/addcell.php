	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
  <style>
  </style>
		<div class="warper container-fluid">
            <div class="page-header"><h3><?php if(!empty($singledata)){?> Edit Image item <?php }else{ echo 'Add a new cell'; }?></h3></div>
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
                        <div class="panel-heading"><?php if(!empty($singledata)){?> Edit Image <?php }else{ echo 'Add a new cell'; }?></div>
                        <div class="panel-body">
							 <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addcell" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-cell/<?php echo $singledata->cell_item_id; ?>" <?php } ?> id="schedule_data" enctype="multipart/form-data">
							 
							 
						  <div class="col-sm-6">
 
						  <div class="form-group">
                                <label class="col-sm-2 control-label">Select section  </label>
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
                                <label class="col-sm-2 control-label">Back ground color</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_bg_color; }?>" class="form-control" name="cell_bg_color" id="cell_bg_color" >
                                </div>
                          </div>
						  
						  <div class="form-group">
                                <label class="col-sm-2 control-label">Border color</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_border_color; }?>" class="form-control" name="cell_border_color" id="cell_border_color" >
                                </div>
                          </div>
						  
						  	
						 <?php /*?> <div class="form-group">
                                <label class="col-sm-2 control-label">cell type</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_type; }?>" class="form-control" name="cell_type" id="cell_type" >
                                </div>
                          </div><?php */?>
						  
						  
						  	
						  

						  <div class="form-group">
                                <label class="col-sm-2 control-label">cell start x</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_start_x; }?>" class="form-control" name="cell_start_x" id="cell_start_x" >
                                </div>
                          </div>	
						  
						  <div class="form-group">
                                <label class="col-sm-2 control-label">cell start y</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_start_y; }?>" class="form-control" name="cell_start_y" id="cell_start_y" >
                                </div>
                          </div>
						  
						   <div class="form-group">
                                <label class="col-sm-2 control-label">cell end x</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_end_x; }?>" class="form-control" name="cell_end_x" id="cell_end_x" >
                                </div>
                          </div>
						  
						  <div class="form-group">
                                <label class="col-sm-2 control-label">cell end y</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_end_y; }?>" class="form-control" name="cell_end_y" id="cell_end_y" >
                                </div>
                          </div>
						  
						  
						  <div class="form-group">
                                <label class="col-sm-2 control-label">Page No.</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->page_no; }?>" class="form-control" name="page_no" id="page_no" >
                                </div>
                          </div>	
						  
						  <div class="form-group">
                                <label class="col-sm-2 control-label">Radius</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->radius; }?>" class="form-control" name="radius" id="radius" >
                                </div>
                          </div>
						  
						  <div class="form-group">
                                <label class="col-sm-2 control-label">Required </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="required"> 
									  <option value="1" <?php if(!empty($singledata) and $singledata->required==1){ echo "selected"; }?>> 
									  	Yes
									 </option>
								  <option value="2" <?php if(!empty($singledata) and $singledata->required==2){ echo "selected"; }?> > 
									  	No
									 </option>
								   </select>
                                </div>
                              </div>
						  
						  
						   
						  </div>
						   <?php /*?><div class="col-sm-6">
						     
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Image path</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->cell_image_url; }?>" class="form-control" name="cell_image_url" id="cell_image_url" >
                                </div>
                          </div>  
							   <div class="form-group">
                                <label class="col-sm-2 control-label">Image start x</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->imgStartx; }?>" class="form-control" name="imgStartx" id="imgStartx" >
                                </div>
                          </div>
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Image start y</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->imgStartY; }?>" class="form-control" name="imgStartY" id="imgStartY" >
                                </div>
                          </div>
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Image end x</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->imgendX; }?>" class="form-control" name="imgendX" id="imgendX" >
                                </div>
                          </div>
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Image end y</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->imgendY; }?>" class="form-control" name="imgendY" id="imgendY" >
                                </div>
                          </div>
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Text value1</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->text_value1; }?>" class="form-control" name="text_value1" id="text_value1" >
                                </div>
                          </div>
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Text value2</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->text_value2; }?>" class="form-control" name="text_value2" id="text_value2" >
                                </div>
                          </div>
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Text Colour</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->text_color; }?>" class="form-control" name="text_color" id="text_color" >
                                </div>
                          </div>
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Text size</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->text_size; }?>" class="form-control" name="text_size" id="text_size" >
                                </div>
                          </div>
						       
						       
						       
						       <div class="form-group">
                                <label class="col-sm-2 control-label">Flash </label>
                                <div class="col-sm-7">
                                   <select class="form-control" name="flash"> 
									  <option value="1" <?php if(!empty($singledata1) and $singledata1->flash==1){ echo "selected"; }?>> 
									  	yes
									 </option>
								  <option value="2" <?php if(!empty($singledata1) and $singledata1->flash==2){ echo "selected"; }?> > 
									  	No
									 </option>
								   </select>
                                </div>
                              </div>
							  
						       <div class="form-group">
                                <label class="col-sm-2 control-label">flash colour</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->flash_color; }?>" class="form-control" name="flash_color" id="flash_color" >
                                </div>
                          </div>
						     
							   <div class="form-group">
                                <label class="col-sm-2 control-label">Padding</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata1)){ echo $singledata1->padding; }?>" class="form-control" name="padding" id="padding" >
                                </div>
                          </div>
						  
						  
						   </div><?php */?>
						  
						  
						  
						<?php /*?>  
						   <div class="form-group">
                                <label class="col-sm-2 control-label">cell blink color</label>
                                <div class="col-sm-7">
                                   <input type="text" value="<?php if(!empty($singledata)){ echo $singledata->cell_blink_color; }?>" class="form-control" name="cell_blink_color" id="cell_blink_color" >
                                </div>
                          </div>
						  <?php */?>
						  
						
						  
							  
						  	
							  
						
						   	    
						
							 
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
		