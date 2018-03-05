<style>
.no_tournamants{
text-align: center;
    padding: 20px;
    border: 2px solid black;
    border-box: 47px;
    box-shadow: 10px;
    margin-top: 50px;
    color: red;
    font-size: 23px;
    font-stretch: ultra-condensed;
    letter-spacing: inherit;
    font-family: -webkit-pictograph;
    font-weight: bold;
}
.dangerous_class{color:red;}
</style>
<!--Sign form-->
<div class="modal fade add-game" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-close"></span>
                    </button>
        <div class="loginmodal-container select-account">
            <h3>Add GameAccount</h3>
            <form id="game_account" method="post" >
			<div class="eror"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="select">
                            <lable>Select Game</lable> 
                        </div>
                        <div class="select-style">
	                        <select name="game_id" id="gamid">
							
	                            <option value="">select game</option>
								<?php foreach($games as $gam){ ?>
								
								 <option value="<?php echo $gam->id?>" ><?php echo $gam->game_name;?></option>
								 <?php } ?>
	                           
	                        </select>
                    	</div>
                    </div>
                </div>

                <div class="input-filed1">
                   <lable>Account Name</lable>
                    <div class="input-append">
                        <input type="text" id="accountname" name="accountname" placeholder=""><span class="add-on"><i class="fa fa-user-circle-o"></i></span>
                    </div>
					<div class="suc">
					</div>
                </div>                
                 
                <div class="add-game text-center">
                    <button type="submit" class="btn btn-primary join-this">Add new gameaccount</button>    
                </div>          
            </form>

        </div>
    </div>
</div>
<!--End sign up-->
<div class="tourna_wrappr">
<section class="page-white our-featuer tournament">
	<div class="tournamet-table features chatarea">
        <div id="demo">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div id="owl-demo" class="owl-carousel">
						
						    <?php							
							foreach($games as $game){							
							$count =   $this->Common_model->countwhereuser('tournament',array('game_id'=>$game->id));
							?>
                            <div class="item active_tournament" onclick="gettournamant('<?php echo $game->id;?>');" >
                                <img class="lazyOwl img-responsive " data-src="<?php echo base_url().'upload/'.$game->image; ?>" >
                                <div class="slider-bt-h"><?php echo $count;?></div>
								
                            </div>
							
							<?php } ?>
                            
                         
                        </div>
                        <div class="mng-trnmnt-box">
                        	<div class="mng-trnmnt-btn">
                        	<a href="javascript:void(0);" id="coming_tour"  class="btn btn-primary" >Coming tournaments</a>
                            </div>
                            <div class="mng-trnmnt-btn">
							<a href="javascript:void(0);" id="ongoing_tour" class="btn btn-primary active-turnmnt" >On-going tournaments</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	<div class="container">
        	<div class="row">
                <div class="tournament-box tournament_ajax">
                    <!--1st-datatable-->
					<?php if(!empty($tournaments)){
                        foreach($tournaments as $tour){           
			   ?>
			   <?php
					$sum_val = $this->db->query("SELECT SUM(price) as total FROM prize_poll WHERE tournament_id = '".$tour->id."'")->row_array();
                    
					?>
                    <div class="tournament-data" id="tournament-id-1-<?php echo $tour->id; ?>">
                       <div id="tournament-id-2-<?php echo $tour->id; ?>"> 
						<div class="col-sm-5">
                            <div class="details-data">
                                <h3><?php echo $tour->tournament_name; ?></h4>
                                <ul class="trnmnt_detail_p"><li>1 vs 1 </li><li> <?php echo $tour->currency; ?></li> <?php if($tour->tournament_status != 'Paid'){ ?><li><?php echo $tour->tournament_status; ?> to play</li><?php } ?> <?php if($tour->tournament_status == 'Paid'){ ?><li> <?php echo $tour->tournament_charges.' '.$tour->currency; ?></li><?php } ?><?php if($sum_val['total'] !='' ){ ?><li> <span class="red"><?php echo $sum_val['total'].' '.$tour->currency;; ?></span></li><?php } ?> </ul>
                                    <p><?php echo date('l , jS F  Y h:i:s', strtotime($tour->create_date_time)); ?></p>    
                                </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="count-rating">
							<?php $participations = $this->Common_model->getAllwhere('participations',array('tournament_id' => $tour->id)); ?>
                               <h4><?php echo count($participations); ?> / <?php echo $tour->participants; ?> <img src="<?php echo base_url();?>assets/images/user-icons.png"></h4>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <!--<button type="button" class="btn btn-primary join-this">Join this tournament</button>-->
							<?php if($this->session->userdata('userid')){ ?>							
								<a href="javascript:void(0);" id="join_tournament" data-tournamentid="<?php echo $tour->id; ?>" class="btn btn-primary join-this" >Join this tournament</a>
                    <?php }else{ ?> 
					            <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal1" class="btn btn-primary join-this" >Join this tournament</a>
                    <?php } ?>	
					        <div id="show_msg-<?php echo $tour->id; ?>" class="dangerous_class" ></div>
                            <p>Add a <span class="red"><?php if($this->session->userdata('userid')){ ?><a href="" data-toggle="modal" data-target="#login-modal">gameaccount</a><?php }else{ ?><a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal1" >gameaccount</a><?php } ?></span> to join</p>
                        </div>                            
                    </div>
					</div>
						<?php }} ?>
                    <!--1st-datatable-->

                </div>  
            </div>
        </div>
    </div>
</section>
</div>
<script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        items : 3,
        itemsDesktop : [1199,3],
        lazyLoad : true,
        navigation : true,
        pagination : false
      });
    });
	function gettournamant(id){
	
	  $.ajax({
        url: "<?php echo base_url();?>Crop/get_tournamants",
        type: "post",
        data: ({id:id}),
        dataType: "html" ,
	    beforeSend: function() {
            $(".tournament_ajax").html('<img class="no_tournamants" src="<?php echo base_url();?>assets/images/200_s.gif">'); 
         },
        success: function (data) {
                if(data=='false'){
				$(".tournament_ajax").html('<h4 class="no_tournamants">No Tournaments Found in This Game</h4>');
				}else{
				$(".tournament_ajax").html(data);
				}             
        },
		  
	  });
	}

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
                if(response.code == '300')
				{
					$('#show_msg-'+tournament_id).html(response.message).show();
					
				}else{
				
                $("#load_dynamic").html(response.message);	
				
				$("#tournament-id-2-"+tournament_id).load(location.href + " #tournament-id-1-"+tournament_id);
				
				
				
				}
			}
	    });
	});
	
	 $(document).on('click','#coming_tour',function(e){  
		$.ajax 
		({
			url: "<?php echo base_url(); ?>Welcome/coming_tournament",
			type: "POST",             
			data: "", 
			dataType: "json",
			success: function(response)    
			{	
                
			}
	    });
	});
</script>
</body>
</html>