	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
        <div class="warper container-fluid">
            <div class="page-header"><h3></h3></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">View cell</div>
                        <div class="panel-body">
							<div class="row-fluid">
			<div class="block">
				<div class="block-body gallery">
				<table class="table">
				 <?php 
				  $sectionname = $this->Common_model->getsingle('section',array('section_id' => $singledata->section_id));
				 ?>
					<tr><td><b>Section</b></td><td><?php  echo $sectionname->name;?></td></tr>
					 <tr><td><b>cell bg color</b></td><td><?php echo $singledata->cell_bg_color;?></td></tr>
					 <tr><td><b>cell type</b></td><td><?php echo $singledata->cell_type;?></td></tr>
					 <tr><td><b>cell image url</b></td><td><?php echo $singledata->cell_image_url;?></td></tr>
					 <tr><td><b>cell blink color</b></td><td><?php echo $singledata->cell_blink_color;?></td></tr>
					 <tr><td><b>cell start x</b></td><td><?php echo $singledata->cell_start_x;?></td></tr>
					 <tr><td><b>cell start y</b></td><td><?php echo $singledata->cell_start_y;?></td></tr>
					 <tr><td><b>cell end x</b></td><td><?php echo $singledata->cell_end_x;?></td></tr>
					 <tr><td><b>cell end y</b></td><td><?php echo $singledata->cell_end_y;?></td></tr>
					   
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
