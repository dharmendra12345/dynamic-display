<?php include(dirname(__FILE__)."/../include/left_sidebar.php"); ?>

<div class="warper container-fluid">
  <div class="page-header">
    <h3>
      <?php if(!empty($singledata)){?>
      Edit Prize
      <?php }else{ echo 'Add a new prize'; }?>
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
          <?php }else{ echo 'Add a new prize'; }?>
        </div>
        <div class="panel-body">
          <?php validation_errors(); ?>
          <form  class="form-horizontal"  method="post" <?php if(empty($singledata)){ ?> action="<?php echo base_url(); ?>administrator/addprize" <?php }else{ ?> action="<?php echo base_url(); ?>administrator/edit-prize/<?php echo $singledata->prize_poll_id; ?>" <?php } ?> id="prizeform" enctype="multipart/form-data">
		  
				<div class="form-group">

						<label class="col-sm-2 control-label"> Select Tournament </label>

						<div class="col-sm-7">

							<select class="form-control" id="tournament" name="tournament">
								<option value="">
								Select tournaments
								</option>
								<?php 
								foreach($tournaments as $tour){ ?>                                      
								<option value="<?php echo $tour->id?>" <?php  if(!empty($singledata) and $tour->id == $singledata->tournament_id){ echo 'selected'; }elseif(isset($_POST['tournament']) and $_POST['tournament']== $tour->id){ echo  'selected'; }else{}   ?>>
								<?php echo $tour->tournament_name?>
								</option>

								<?php }
								?>

							</select>

						</div>

				</div>
		  
          <div class="form-group">
            <label class="col-sm-2 control-label">Prize Position </label>
            <div class="col-sm-7">
              <input type="number" name="prize_name" min="1" class="form-control" value="<?php if(!empty($singledata)){echo $singledata->prize_position; }elseif(isset($_POST['prize_name'])){ echo $_POST['prize_name']; }else{} ?>" id="game_name" placeholder="Prize Position">
              <div class="new_erroe_one"><?php echo form_error('prize_name'); ?><?php if(isset($err_unique)) { echo "<p>$err_unique</p>";} ?></div>
            </div>
          </div>
   
           <div class="form-group">
            <label class="col-sm-2 control-label">Price </label>
            <div class="col-sm-7">
              <input type="number" name="price" class="form-control" value="<?php if(!empty($singledata)){echo $singledata->price; }elseif(isset($_POST['price'])){ echo $_POST['price']; }else{} ?>" id="price" placeholder="Price">
              <div class="new_erroe_one"><?php echo form_error('price'); ?></div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Status </label>
            <div class="col-sm-7">
              <select name="status" id="status" class="form-control">
                <option value="1" <?php if(!empty($singledata)){ if($singledata->status == 1){echo 'selected';} }?>>Active</option>
                <option value="2" <?php if(!empty($singledata)){ if($singledata->status == 2){echo 'selected';} }?>>Deactive</option>
              </select>
              <div class="new_erroe_one"><?php echo form_error('status'); ?></div>
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
