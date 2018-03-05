	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
        <div class="warper container-fluid">
            <div class="page-header"><h3></h3></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">View User</div>
                        <div class="panel-body">
							<div class="row-fluid">
			<div class="block">
			<!--<p class="block-heading"><?php //echo $online_testing_cat_info[0]->online_testing_title?> Information</p>-->
				<div class="block-body gallery">
				<table class="table">
					<tr><td><b>Game Name</b></td><td><?php echo $view_game->game_name;?></td></tr>
					<tr><td><b>Image</b></td><td><img src="<?php echo base_url(); ?>upload/<?php echo $view_game->image; ?>" style="width:30%"></td></tr>
					<tr><td><b>Status</b></td><td><?php if($view_game->status == '1'){echo 'Active';}else{echo 'Deactive';} ?></td></tr>
					
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
