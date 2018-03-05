<!--End sign up-->
<?php /* ?><?php if($this->session->userdata('userid')){}else{ ?>
<section>
	<div class="sport-banner">
    	<div class="container">
        	<div class="row">
            	<div class="banner-content">
                	<?php /* ?><h1>
                    	global e-sport tournaments
                    </h1>
                  
                    	<a href="<?php echo base_url(); ?>tournaments" class="btn btn-default btn-tournament">Tournaments</a>
                    
                </div>
            </div> 
        </div>
    </div>
</section>
<?php } ?><?php */ ?> 
<section class="section-white">
	<div class="tournamet-table chatarea">
    	<div class="container">
		<?php 
					  if(null !==($this->session->flashdata('item')))
					   {
						$message = $this->session->flashdata('item'); ?>
						<div style="color:green;"><?php success_msg($message['message']); ?></div>
					  <?php  } ?>
        	<div class="row">
            	<div class="col-sm-12 my-scroll-div">
                    <div class="banner-box">
                        <h1>
                            tournaments
                        </h1>
                    </div>
	<div id="payment_form"> </div>
                    <div class="tournament-box trnamnt_box_home_page">
                    <div class="scrollbox">
                    <!--1st-datatable-->
					<?php foreach($tournaments as $tour){ ?>
					<?php
					$sum_val = $this->db->query("SELECT SUM(price) as total FROM prize_poll WHERE tournament_id = '".$tour->id."'")->row_array();
                    //print_r($sum_val);
					?>
                        <div class="tournament-data" id="tournament-id-1-<?php echo $tour->id; ?>">
						<div id="tournament-id-2-<?php echo $tour->id; ?>">
                            <div class="col-sm-5">
                                <div class="details-data">
                                    <h3><?php echo $tour->tournament_name; ?></h3>
                                    <ul class="trnmnt_detail_p"><li>1 vs 1 </li><li> <?php echo $tour->currency; ?></li> <?php if($tour->tournament_status != 'Paid'){ ?><li><?php echo $tour->tournament_status; ?> to play</li><?php } ?> <?php if($tour->tournament_status == 'Paid'){ ?><li> <?php echo $tour->tournament_charges.' '.$tour->currency; ?></li><?php } ?><?php if($sum_val['total'] !='' ){ ?><li> <span class="red"><?php echo $sum_val['total'].' '.$tour->currency;; ?></span></li><?php } ?> </ul>
                                    <p><?php echo date('l , jS F  Y h:i:s', strtotime($tour->create_date_time)); ?></p>    
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="count-rating">
								<?php $participations = $this->Common_model->getAllwhere('participations',array('tournament_id' => $tour->id)); ?>
                                   <h4><?php echo count($participations); ?>/ <?php echo $tour->participants; ?> <img src="<?php echo base_url();?>assets/images/user-icons.png"></h4>
                                </div>
                            </div>
                            <div class="col-sm-4">
					<?php if($this->session->userdata('userid')){ ?>
                      <?php /*if($tour->tournament_status != 'Paid'){*/ ?>					
								<a href="javascript:void(0);" id="join_tournament" data-tournamentid="<?php echo $tour->id; ?>" class="btn btn-primary join-this" >Join this tournament</a>
                      <div id="show_msg-<?php echo $tour->id; ?>" style="color:red;" ></div>
					<?php }else{ ?> 
					            <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal1" class="btn btn-primary join-this" >Join this tournament</a>
                    <?php } ?>					
						   </div>                            
                        </div>
						</div>
					<?php } ?> 
                    </div>                  
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($this->session->userdata('userid')){}else{ ?>
<section>
	<div class="tournamet-table features index-page">
    	<div class="container">
        	<div class="row">
            	<div class="banner-box">
                	<h1>
                    	features
                    </h1>
                </div>
            </div>
            <div class="row text-center">
                <div class="icon-container">
				<?php $i = 1; foreach($features as $fea) {
				
				
				?>
                	<div class="col-sm-4">
                        <div class="fea-icons-box">
                            <!--<p class="count">100</p>-->
							<img class="img-responsive" src="<?php echo base_url()?>feature_image/<?php echo $fea->feature_icon;?>" />
                        </div>
                        <h2><?php echo $fea->feature_name; ?></h2>
                    </div>
					<?php $i++; } ?>
                </div>
                <div class="see-more">
                	<p>
                    	<a href="<?php echo base_url(); ?>features">See More Features</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php if($this->session->userdata('userid')){  }else{ ?>
<section>
	<div class="tournamet-table join-us indx_join_us">
    	<div class="container">
        	<div class="row">
            	<div class="banner-box">
                	<h1>
                    	join us today 
                    </h1>
                    <div class="btn-box">
                    	<div class="col-sm-6">
                        	<!--<button class="btn btn-default btn-tournament">Login</button>-->
							<a href="#" class="active btn btn-default btn-tournament" data-toggle="modal" data-target="#login-modal1">Log in</a>
                        </div>
                        <div class="col-sm-6">
                        	<!--<button class="btn btn-default btn-tournament">Sign-Up</button>-->
							<a href="#" class="sign btn btn-default btn-tournament" data-toggle="modal" data-target="#login-modal">Sign-up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
	<div class="tournamet-table contact-us section-white">
    	<div class="container">
        	<div class="row">
            	<div class="banner-box">
                	<h1>
                    	contact us
                    </h1>
                    <p class="text-center">Questions? Comment? Ideas? Sponsorship Request? Feel free to contact us!</p>
                  <div id="message-box" style="display:none" class="alert alert-success alert-dismissable"></div>               
			   </div>
                <div class="form-box">
                	<form class="home-contact-form" id="contact_f" name="contact_f" action="" method="post">
                		<div class="form-box">    
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Name*" />
                                </div>
                            </div>	
							
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" id="id_email" name="id_email" placeholder="E-mail*" type="email" />
                                </div>
                            </div>                            						

                            <div class="col-sm-12">
                                <div class="form-group text-home">
                                    <textarea class="text-area-m"  id="massege" name="massege" placeholder="Massege*" ></textarea>
                                </div>
                            </div>      
                        </div>
                        <div class="col-sm-12 text-center">
                        	<!--<button type="submit" class="btn btn-primary join-this">
                            	Send Message
                            </button>-->
							<input type="submit" name="submit_message" value="Send message" class="btn btn-primary join-this" />
                        </div>
                	</form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<script>

    $(document).on('click','#join_tournament',function(e){            	
	 var tournament_id = $(this).attr('data-tournamentid');	 
		$.ajax 
		({
			url: "<?php echo base_url(); ?>Welcome/join_tournament",
			type: "POST",             
			data: "tournament_id=" + tournament_id, 
			dataType: "json",
			success: function(response)   
			{	
			   if(response.code == '400')
			   {
				   // window.location.replace("<?php echo base_url(); ?>online_wallet/join_tour/"+tournament_id+'/paypal');
				 //  window.location.replace("https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-4UD650619X8179548#/checkout/login");
			   }
                if(response.code == '300')
				{
					$('#show_msg-'+tournament_id).html(response.message).show();
					
				}else{			
				$("#tournament-id-2-"+tournament_id).load(location.href + " #tournament-id-1-"+tournament_id);
				}
			}
	    });
	});
	
	$(document).on('click','#join_tournament1',function(e){
	 var tournament_id = $(this).attr('data-tournamentid');	 	
	  $.ajax({
    url:  "<?php echo base_url(); ?>Online_wallet/join_tour/"+tournament_id+'/paypal',
	type: "POST",   
    data: tournament_id,
	//dataType: "json",
    success: function(data)
    {
    	$("#payment_form").html(data);
    	$('#confirmation').submit();
    }
  });
	});
</script>
<script>
$(document).ready(function(){
   	$(".ragis").click(function(){
       	$(".one").removeClass("in");
           $(".one").hide();
   	});
   	$(".for-p").click(function(){
       	$(".one").removeClass("in");
       	$(".one").hide();
   	});
       $(".ragis").click(function(){
           $(".three").removeClass("in");
           $(".three").hide();
       });
       $(".login").click(function(){
           $(".three").removeClass("in");
           $(".three").hide();
       });
});
</script>


<!-- slider smoother -->
 <?php /* ?><script src="<?php echo base_url(); ?>js/jQuery.scrollSpeed.js"></script>
<script>
$(function() {  

    jQuery.scrollSpeed(100, 800);

});
</script><?php */ ?>

  <style>
.scrollbox {
	overflow: auto; /* Start writing your markup with this style */
	width: 100% !important;   /* The dimensions of your content pane */
	height: 100%;
	padding: 0 5px;
	padding-right: 0px !important;
}
.vertical-track {
    width: 10px;
    background-color: #fff;
    border-left: 1px solid #ccc;
}
.vertical-handle {
    width: 100%;
    background-color: #000;
    border-radius: 10px !Important;
}
</style>





