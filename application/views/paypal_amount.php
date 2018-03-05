<section>
	<div class="contact-us paypl_amt">
    	<div class="container">
        	<div class="row">
            	<div class="bg-whit-1000">
            		<div class="banner-box">
						<div class="reset-pass">						
						<h2>Paypal</h2>
						  <form name="paypal_amount" action="<?php echo base_url();?>wallet/buy"  method="post" id="paypal_amount">
							<?php echo validation_errors(); ?>
							<label>Select Amount:</label>
							<input name="paypal_address" class='form-control card-number' min="10" type='number' id="paypal_address" placeholder="Your PayPal..">
							<div class="btn_center">
								<input class='btn btn-success btn-lg pypl_inv_btn' type="submit" name="submit" value="Send me a PayPal invoice!" />							
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
    $(document).ready(function() { 
   $('#paypal_amount').validate({
    rules: {
        paypal_address: {
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