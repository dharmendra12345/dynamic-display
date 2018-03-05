<section class="feat_indiv page-white our-featuer">
	<div class="tournamet-table features chatarea">
    	<div class="container">
        	<div class="row">
            	<div class="banner-box">
                	<h1>
                    	Our Features
                    </h1>
                </div>
            </div>
            <div class="row text-center">
                <div class="icon-container">
				<?php  foreach($features as $fea) {?>
                	<div class="col-sm-4">
                        <div class="fea-icons-box">
                             <img src="<?php echo base_url()?>feature_image/<?php echo $fea->feature_icon;?>" >
                        </div>
                        <h2><?php echo $fea->feature_name; ?></h2>
                        <p><?php echo $fea->feature_desc; ?></p>
                    </div>
					
					<?php } ?>
                    
                </div>
            </div>

           <!-- <div class="row text-center">
                <div class="icon-container">
                    <div class="col-sm-4">
                        <div class="fea-icons-box">
                            <p class="count">100</p>
                        </div>
                        <h2>Immediate Payouts</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="fea-icons-box">
                            <i class="fa fa-refresh"></i>
                        </div>
                        <h2>Automatic Victory Report</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="fea-icons-box">
                            <i class="fa fa-comment-o"></i>
                        </div>
                        <h2>Lobby & Match Chat</h2>.
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>-->

        </div>
    </div>
</section>


</body>
</html>
