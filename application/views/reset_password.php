<section>
	<div class="contact-us paypl_amt">
    	<div class="container">
        	<div class="row">
            	<div class="bg-whit-1000">
            		<div class="banner-box">
						<div class="reset-pass">
						<!--<div style="color:green;"><?php //success_msg($message['message']); ?></div>-->
						<?php 
						 /*if(null !==($this->session->flashdata('item')))
						   {
							$message = $this->session->flashdata('item'); ?>
							<div style="color:green;"><?php echo $message; ?></div>
						<?php  }*/ ?>
						<h2>Reset your password</h2>
						  <form name="change_pass" method="post" id="change_pass">
							<?php echo validation_errors(); ?>
							<label>New Password</label>
							<input name="new_pass" class='form-control card-number' size='20' type='password' id="new_pass" placeholder="New Password">
							<label>Confirm Password</label>
							<input name="conf_pass" class='form-control card-number' size='20' type='password' id="conf_pass" placeholder="Confirm Password">
							<div class="btn_center">
								<input class='btn btn-primary join-this' type="submit" name="submit" value="Send" />	
							</div>		
						  </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
$("#change_pass").validate({
  rules: {      
	  new_pass:{
		  required: true,
	  },
	  conf_pass:{
		  required: true,           
	  },
	  
    }
});
</script>