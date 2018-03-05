<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>

<div class="warper container-fluid">
  <div class="page-header">
    <h3>
      <?php if(!empty($singledata)){?>
      Edit Rule
      <?php }else{ echo 'Add a new rule'; }?>
    </h3>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box-body">
        <?php if($this->session->flashdata('error')){?>
        <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <b>Alert!</b><?php echo $this->session->flashdata('error') ;?> </div>
        <?php }  if($this->session->flashdata('game')) {?>
        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <?php echo  $this->session->flashdata('game');?> </div>
        <?php }?>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <?php if(!empty($singledata)){?>
          Edit Prize
          <?php }else{ echo 'Add a new rule'; }?>
        </div>
        <div class="panel-body">
          <?php validation_errors(); ?>
          <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addrule" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/editrule/<?php echo $singledata->id; ?>" <?php } ?> id="ruleform" enctype="multipart/form-data">
		  	
          <div class="form-group">
            <label class="col-sm-2 control-label">Tournament rule </label>
            <div class="col-sm-7">
              <textarea name="tournament_rule" class="ckeditor" id="tournament_rule"><?php if(!empty($singledata)){echo $singledata->rules;} ?></textarea>
			  <div class="new_erroe_one"><?php echo form_error('prize_name'); ?><?php if(isset($err_unique)) { echo "<p>$err_unique</p>";} ?></div>
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
<script>  $( function() {    $( "#dob" ).datepicker({      changeMonth: true,      changeYear: true    });  } ); 


 $(document).ready(function() {  
   $('#prizeform12').validate({
    rules: {
        prize_name: {
            required: true
        }, 
		tournament: {
            required: true
        },
	     price: {
            required: true
        },
	},
	highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success ');
    }
  });
});
 </script>
<script type="text/javascript">
tinymce.init({
		selector: "textarea",
		theme: "modern",
		height : 300,        	
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor moxiemanager",
			"insertdatetime media table contextmenu paste jbimages"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
		toolbar2: "print preview  | forecolor backcolor emoticons",
		image_advtab: true,
		relative_urls: false,
        remove_script_host : false,
convert_urls : true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],		
	});	
	
</script>