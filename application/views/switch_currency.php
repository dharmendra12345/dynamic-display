<section>
	<div class="tournamet-table features swtc_curr">
    	<div class="container">
        	<div class="row">
            	<div class="banner-box">
                	<h1>
                    	Switch currency
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="payment-page">
                    <div class="deposit-box">
                    	<p class="depo_txt">Convert online wallet to :</p>
                        <button type="submit" class="bnt btn-default change_cuurency" value="EUR">0.00 EUR </button>
						<button type="submit" class="bnt btn-default change_cuurency" value="RUB" >0.00 RUB </button>
                        <p class="bt-text">We tack a small conversion fee when you convert the currency of your online wallet. this is prevent abuse</p>
                    </div>
                    <div class="back_arr">
                        <a href="javascript:void(0);" onClick="history.go(-1);" ><img src="<?php echo base_url(); ?>assets/images/depo_mony_arr.png" /></a>    
                    </div>
                </div>
            </div>       

        </div>
    </div>
</section>

<script>
  $(".change_cuurency").on("click",function(){
  
    var to = $(this).val();
	
	  $.ajax({
    url:"<?php echo base_url(); ?>Online_wallet/change_cuurency",
	type: "POST",   
    data: ({to:to}),
	//dataType: "json",
    success: function(data)
    {
    	 
    }
    });
  
  
  });
</script>