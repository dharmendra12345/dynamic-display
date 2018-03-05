	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
        <div class="warper container-fluid">
            <div class="page-header"><h3></h3></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">View Text item</div>
                        <div class="panel-body">
							<div class="row-fluid">
			<div class="block">
			<!--<p class="block-heading"><?php //echo $online_testing_cat_info[0]->online_testing_title?> Information</p>-->
				<div class="block-body gallery">
				<table class="table">
				 <?php 
				 
				  $sectionname = $this->Common_model->getsingle('section',array('section_id' => $singledata->section_id));
				 
				 ?>
				 
					<tr><td><b>sectione</b></td><td><?php  echo $sectionname->name;?></td></tr>
				     <tr><td><b>text size</b></td><td><?php echo $singledata->text_size;?></td></tr>
				     <tr><td><b>text color</b></td><td><?php echo $singledata->text_color;?></td></tr>
				     <tr><td><b>text lang</b></td><td>
					 <?php if($singledata->text_lang==0){ echo "left" ; }else{ echo "right";}?>
					 
					 </td></tr>
				     <tr><td><b>text scrollable</b></td><td>
					 <?php if($singledata->text_scrollable==0){ echo "left start";}else{ echo "right start";} ?>
					 
					 </td></tr>
				     <tr><td><b>text scroll speed</b></td><td><?php echo $singledata->text_scroll_speed;?></td></tr>
				     <tr><td><b>text scroll direction</b></td><td>
					 
					 <?php if($singledata->text_scroll_direction==0){echo 'horizontal';} else{ echo 'vertical'; } ?>
					 </td></tr>
				     <tr><td><b>text type</b></td><td><?php if($singledata->text_type==0){ echo "text" ;}else{ echo "file";}?></td></tr>
				     <tr><td><b>text file name</b></td><td><?php echo $singledata->text_file_name;?></td></tr>
				     <tr><td><b>text file download url</b></td><td><?php echo $singledata->text_file_download_url;?></td></tr>
				     <tr><td><b>text value</b></td><td><?php echo $singledata->text_value;?></td></tr>
				 
					
					
					
				<?php /*?><tr><td><b>Currency</b></td><td><?php echo $view_tournament->currency;?></td></tr>	<?php */?>
				<?php /*?><tr><td><b>Participants</b></td><td><?php echo $view_tournament->participants;?></td></tr><?php */?>
								
				<?php /*?>	<tr><td><b>Status</b></td><td><?php if($view_tournament->status == 1){echo 'Active';}else{echo 'Deactive';}?></td></tr><?php */?>
					<?php /*?><tr><td><b>Date</b></td><td><?php echo date('l , jS F  Y', strtotime($view_tournament->create_date_time)); ?></td></tr><?php */?>					
					
					
				</table>
				<div class="clearfix"></div>
				<input type="button"   class="btn btn-info" value="Go Back" onClick="history.go(-1);"  />
        	</div>
			</div>
                        </div>
                    </div>
                 </div>
            
            </div>
        </div>
