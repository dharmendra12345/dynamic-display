	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
        <div class="warper container-fluid">
            <div class="page-header"><h3></h3></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">View video</div>
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
				     <tr><td><b>video name</b></td><td><?php echo $singledata->video_name;?></td></tr>
					 <tr><td><b>video url</b></td><td><?php echo $singledata->	video_url;?></td></tr>
					 <tr><td><b>video download url</b></td><td><?php echo $singledata->video_download_url;?></td></tr>
					  <tr><td><b>video download start time</b></td><td><?php echo $singledata->video_download_start_time;?></td></tr>
					  
					  <tr><td><b>create</b></td><td><?php echo $singledata->create;?></td></tr>
		
					
					
					
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
