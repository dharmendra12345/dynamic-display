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
					<tr><td><b>Name</b></td><td><?php echo $view_user->firstname.' '.$view_user->lastname;?></td></tr>
					<tr><td><b>Username</b></td><td><?php echo $view_user->username;?></td></tr>
					<tr><td><b>Email</b></td><td><?php echo $view_user->email;?></td></tr>
					<tr><td><b>Date of birth</b></td><td><?php echo $view_user->dob;?></td></tr>
					<tr><td><b>Address</b></td><td><?php echo $view_user->address;?></td></tr>
					<tr><td><b>Mobile No</b></td><td><?php echo $view_user->mobile_no;?></td></tr>
					<tr><td><b>Image</b></td><td><?php if(!empty($view_user->image)){ ?><img src="<?php echo base_url(); ?>user_image/<?php echo $view_user->image; ?>" style="width:15%" /><?php }else{ ?><img src="<?php echo base_url(); ?>assets/images/no-image.png" style="width:15%" /><?php } ?></td></tr>
					<tr><td><b>Status</b></td><td><?php if($view_user->status == 1){echo 'Active';}else{echo 'Deactive';}?></td></tr>
					<tr><td><input type="button"   class="btn btn-primary" id="payment_information" data-user_id="<?php echo $ids; ?>" value="Payment Information" /></td></tr>
				    <span id="test"></span>
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
<script>
    $(document).on('click','#payment_information',function(e){	
		var userid = $(this).attr('data-user_id');
	    $.ajax({
            type:'POST',
            url: "<?php echo base_url().'administrator/manage_user/payment_detail'; ?>",
			data: 'userid=' + userid,
			dataType: "json",            
            success:function(response){						
			   $('#test').html(response.list);
			}
        });
	});
</script>