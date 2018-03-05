                <div class="tournament-box">
                    <!--1st-datatable-->
					<?php if(!empty($tournaments)){
                        foreach($tournaments as $tour){             

			   ?>
                    <div class="tournament-data">  
                        <div class="col-sm-5">
                            <div class="details-data"> 
                                <h3><?php echo $tour->tournament_name; ?></h4> 
                                <p>1 vs 1 | <?php echo $tour->currency; ?> | <?php echo $tour->tournament_status; ?> to play <?php if($tour->tournament_status == 'Paid'){ ?> | <span class="red"><?php echo $tour->tournament_charges.$tour->currency; ?></span><?php } ?></p>
                                <p><?php echo date('l , jS F', strtotime($tour->date_added)); ?></p>    
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="count-rating">
                               <?php $participations = $this->Common_model->getAllwhere('participations',array('tournament_id' => $tour->id)); ?>
                               <h4><?php echo count($participations); ?> / <?php echo $tour->participants; ?> <img src="<?php echo base_url();?>assets/images/user-icons.png"></h4>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <?php if($this->session->userdata('userid')){ ?>							
								<a href="javascript:void(0);" id="join_tournament" data-tournamentid="<?php echo $tour->id; ?>" class="btn btn-primary join-this" >Join this tournament</a>
                    <?php }else{ ?> 
					            <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal1" class="btn btn-primary join-this" >Join this tournament</a>
                    <?php } ?>	
                            <p>Add a <span class="red"><?php if($this->session->userdata('userid')){ ?><a href="" data-toggle="modal" data-target="#login-modal">gameaccount</a><?php }else{ ?><a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal1" >gameaccount</a><?php } ?></span> to join</p>
                        </div>                            
                    </div>
						<?php }} ?>
                    <!--1st-datatable-->

                </div>  
          