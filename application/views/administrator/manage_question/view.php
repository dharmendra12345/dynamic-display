	<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>

        <div class="warper container-fluid">
            <div class="page-header"><h3></h3></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">View Questions</div>
                        <div class="panel-body">
							<div class="row-fluid">
			<div class="block">		
				<div class="block-body gallery">
				<table class="table">
					<tr><td><b>Question</b></td><td><?php echo $viewquestion->que_desc;?></td></tr>   
               	<tr><td><b>Category Name</b></td>
				<td>					
				<?php  
				if(!empty($viewquestion->category_id)){
				$explode = explode(',',$viewquestion->category_id);				
				if(!empty($explode)){	
				foreach($explode as $ex){ 		
				$category = $this->Common_model->getsingle('online_testing_category',array('online_testing_id' => $ex));            
				echo $category->online_testing_title.',';			
				}}}				
				?>				
				</td></tr> <tr><td><b>Tag</b></td><td>
				<?php
                if(!empty($viewquestion->sub_division_id)){
				$explodesub = explode(',',$viewquestion->sub_division_id);		
				if(!empty($explodesub)){ 	
				foreach($explodesub as $sub){ 		
				$categorysub = $this->Common_model->getsingle('category_subdivision',array('id' => $sub)); 
				echo $categorysub->title.',';		
				}}}	 ?>		
			</td>
			</tr>
					<tr>
					<td><b>Options</b></td>
					<td>
					   <b>1)</b> <?php echo $viewquestion->ans1; ?><br/>
					   <b>2)</b> <?php echo $viewquestion->ans2; ?><br/>
					   <b>3)</b> <?php echo $viewquestion->ans3; ?><br/>
					   <b>4)</b> <?php echo $viewquestion->ans4; ?><br/>
					</td>
					</tr>
					<tr><td><b>True Answer</b></td><td><?php echo $viewquestion->true_ans;?></td></tr>
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
