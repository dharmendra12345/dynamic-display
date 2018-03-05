<style>
 .btn.btn-primary.join-this
 {
	 color:#fff;
 }
</style>
<section>
	<div class="tournamet-table features onlin_walet">
    	<div class="container">
        	<div class="row">
            	<div class="banner-box">
                	<h1>
                    	Online wallet
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="payment-page">
                    <div class="deposit-box text-center wallet">
                    	<h1><?php echo $user->wallet; ?> USD</h1>
                    	<div class="row">
                    		<div class="col-sm-6">
                    			<a href="<?php echo base_url(); ?>deposite-money" class="btn btn-primary join-this">Deposit money</a>
                    		</div>
                    		<div class="col-sm-6">
                    			<button type="button" class="btn btn-primary join-this">Support us (coming soon)</button>
                    		</div>
                    	</div> 
                    	<p class="bt-text"><i><a href="<?php echo base_url(); ?>switch-currency">Switch to another currency</a></i> or <i><a href="<?php echo base_url(); ?>request-payout" >request a payment </a></i></p>              
                    </div>
                </div>
            </div>       

        </div>
    </div>
</section>
