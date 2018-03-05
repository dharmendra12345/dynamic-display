	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
        <div class="warper container-fluid">
            <div class="page-header"><h3></h3></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">View web</div>
                        <div class="panel-body">
							<div class="row-fluid">
			<div class="block">
				<div class="block-body gallery">
				<table class="table">
				 <?php 
				  $sectionname = $this->Common_model->getsingle('section',array('section_id' => $singledata->section_id));
				 ?>
					<tr><td><b>Section</b></td><td><?php  echo $sectionname->name;?></td></tr>
					 <tr><td><b>Image Url</b></td><td><?php echo $singledata->image_url;?></td></tr>
					  <tr><td><b>Create</b></td><td><?php echo $singledata->create;?></td></tr>
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
