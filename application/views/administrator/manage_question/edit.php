			<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>
			<link href="<?php echo base_url(); ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <div class="warper container-fluid">
            <div class="page-header"><h3>Edit Question</h3></div>
            <div class="row">
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">Edit Question</div>
                        <div class="panel-body">
							 <form  class="form-horizontal"  method="post" action="<?php echo  base_url().'administrator/manage_question/edit/'.$singledata->que_id;?>" id="addQuestionform" enctype="multipart/form-data">
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Question </label>
                                <div class="col-sm-7">
                                  <!--<input type="text" name="que_desc" class="form-control" id="que_desc" value="<?php //echo $singledata->que_desc; ?>" placeholder="Question">-->
                                <textarea name="que_desc" class="form-control" id="que_desc" placeholder="Question"><?php echo $singledata->que_desc; ?></textarea>
								</div>
                              </div>							  	
							  <hr class="dotted">		
							  <div class="form-group">           
							  <label class="col-sm-2 control-label">Category</label>  
                              <div class="col-sm-7">								
							  <select name="category[]" class="form-control" multiple>		
							  <?php  if(!empty($category)){   foreach($category as $cat){	
							  $exp_cat = explode(',',$singledata->category_id);		
							  $inarray = in_array($cat->online_testing_id,$exp_cat);
							  ?>  								    
							  <option value="<?php echo $cat->online_testing_id?>" <?php  if($inarray) { echo "selected=selected"; } ?> >
							  <?php echo $cat->online_testing_title ?></option>	
							  <?php }} ?>								
							  </select>                              
							  </div>                             
							  </div>							  		
							  <hr class="dotted">							  							  <div class="form-group">                                <label class="col-sm-2 control-label">Tag</label>                                <div class="col-sm-7">								 <select name="tag[]" class="form-control" multiple>								 <?php 								 if(!empty($tag)){ 								   foreach($tag as $t){								  $exp_t = explode(',',$singledata->sub_division_id);								 				                  $inarraytag = in_array($t->id,$exp_t);								 ?>  								    <option value="<?php echo $t->id?>" <?php  if($inarraytag) { echo "selected=selected"; } ?> ><?php echo $t->title ?></option>											 <?php }} ?>								 </select>                                </div>                              </div>
							  <hr class="dotted">
							  <div class="form-group">
                                <label class="col-sm-2 control-label">Options </label>
                                <div class="col-sm-7">
								  
								  1<input type="text" class="form-control" name="ans1" value="<?php echo $singledata->ans1; ?>" />
								  2<input type="text" class="form-control" name="ans2" value="<?php echo $singledata->ans2; ?>" />
								  3<input type="text" class="form-control" name="ans3" value="<?php echo $singledata->ans3; ?>" />
								  4<input type="text" class="form-control" name="ans4" value="<?php echo $singledata->ans4; ?>" />
								  True Answer<input type="text" class="form-control" name="true_ans" value="<?php echo $singledata->true_ans; ?>" />
								  
                                </div>
                              </div>
							    <hr class="dotted">
							  <div class="form-group">
                                <label class="col-sm-2 control-label">Explanations</label>
                                <div class="col-sm-7">
								    <textarea name="explanations" class="form-control" id="explanations" placeholder="Explanations"><?php echo $singledata->explanations; ?></textarea> 
								</div>
							</div>
                              <hr class="dotted">
							  <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
								  <input type="submit" class="btn btn-info" value="Edit" name="update_data" id="update_data" />
								  <input type="hidden" value="<?php //echo $test_id ?>" name="hidden_id" />
								  <input type="button"   class="btn btn-info" value="Go Back" onClick="history.go(-1);"  />
                                </div>
                              </div>
                        	</form>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
		<script>tinymce.init({
  selector: 'textarea',
  images_upload_url: "postAcceptor.php",
    images_upload_base_path: "/some/basepath",
    images_upload_credentials: true,
  height: 500,
  fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | undo redo pastetext | fontselect | fontsizeselect',
  
  image_advtab: true,
  relative_urls : false,
remove_script_host : false,
convert_urls : true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: '//www.tinymce.com/css/codepen.min.css'
 });</script>