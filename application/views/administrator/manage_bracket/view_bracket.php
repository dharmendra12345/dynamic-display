	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
        <div class="warper container-fluid">
            <div class="page-header"></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">View Bracket</div>
                        <div class="panel-body">
							<div class="row-fluid">
			<div class="block">
			<!--<p class="block-heading"><?php //echo $online_testing_cat_info[0]->online_testing_title?> Information</p>-->
				<div class="block-body gallery">
				<table class="table">
					<tr><td><b>Tournament name</b></td><td><?php echo $tournament->tournament_name;?></td></tr>
					<tr><td><b>Date</b></td><td><?php echo date('Y-m-d',strtotime($view_bracket->date_added));?></td></tr>
					
					
					
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
