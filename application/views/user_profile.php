<!--Sign form-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-close"></span>
                    </button>
        <div class="loginmodal-container select-account">
            <h3>Add GameAccount</h3>
            <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="select">
                            <lable>Select Game</lable> 
                        </div>
                        <div class="select-style">
	                        <select>
	                            <option value="select"></option>
	                            <option value="">01</option>
	                            <option value="">02</option>
	                            <option value="">03</option>
	                            <option value="">04</option>
	                            <option value="">05</option>
	                            <option value="">06</option>
	                            <option value="">07</option>
	                            <option value="">08</option>
	                            <option value="">09</option>
	                            <option value="">10</option>
	                            <option value="">11</option>
	                            <option value="">12</option>
	                        </select>
                    	</div>
                    </div>
                </div>
              </form>
                <div class="input-filed1">
                   <lable>Account Name</lable>
                    <div class="input-append">
                        <input type="text" id="" name="" placeholder=""><span class="add-on"><i class="fa fa-user-circle-o"></i></span>
                    </div>
                </div>                

                <div class="add-game text-center">
                    <button type="button" class="btn btn-primary join-this">Add new gameaccount</button>    
                </div>          
            </form>

        </div>
    </div>
</div>
<!--End sign up-->

<section class="usr_pro_page">
	<div class="profile-page">
		<div class="container">
			<div class="row">
				<div class="profile-viwe">
					<div class="cover-page">
						<div class="cover-box">
							<div class="col-sm-4 col-md-3">
								<div class="profile-img-set">
									<div class="profile-img">
									<?php if($userprofile->image!=''){
										    $img =base_url().'user_image/'.$userprofile->image;
										   }else{
										   $img = base_url()."assets/images/no-image.png";
										   } ?>
										<img src="<?php echo $img; ?>" class="img-responsive">
									</div>	
									<!--<div class="edit"><p><a href="#"><i class="fa fa-camera"></i> Change Profile</a></p></div>-->
								</div>
							</div>
							<div class="col-sm-8 col-md-8">
								<div class="profile-name">
								<?php $user_profile = $this->Common_model->getsingle('friends',array('user_id' => $this->session->userdata('userid'))); 
								//print_r($user_profile);
                                $friend_request = $this->Common_model->getsingle('friends',array('friend_user_id' => $userId));
												
								?>									
									<h2><?php echo ucwords($userprofile->username); ?> <img src="<?php echo base_url(); ?>assets/images/flag.png">
									<?php if(!empty($test_value)){ ?>
									<?php if($test_value->request_status == 1 && $test_value->user_id == $this->session->userdata('userid')){ ?>
									<a href="javascript:void(0);" data-userid="<?php echo $test_value->friend_user_id; ?>" class="btn add-friends-btn rmvfriend" >Remove Friend</a>
									<?php }elseif($test_value->request_status == 1 && $test_value->user_id == $userId){ ?>
                                     <a href="javascript:void(0);" data-userid="<?php echo $test_value->user_id; ?>" class="btn add-friends-btn rmvfriend" >Remove Friend</a>
									<?php }elseif($test_value->request_status == 0 && $test_value->user_id == $this->session->userdata('userid')){ ?>
									<a href="javascript:void(0);" class="btn add-friends-btn rmvfriend" data-userid="<?php echo $test_value->friend_user_id; ?>" >Request sent</a>
									<?php }elseif($test_value->request_status == 0 && $test_value->user_id == $userId){ ?>
										<?php   $uid = $this->session->userdata('userid');
						                        $res = $this->db->query("select * from friends where ((friend_user_id = '".$userId."' and user_id = '".$uid."') or (friend_user_id = '".$uid."' and user_id = '".$userId."')) and request_status = 0")->row_array(); 
												?>
										<a id="confm_req" class="btn add-friends-btn accept_requestss" data-frndid="<?php echo $userId; ?>" href="javascript:void(0);">Confirm Request</a>
										<?php //} ?>
									<?php }}else{ ?>
									<a id="add_friend" class="btn add-friends-btn" data-userid="<?php echo $test_value->friend_user_id; ?>" href="javascript:void(0);">Add Friend</a>
									<?php } ?></h2>	
									<?php /* ?><h2><?php echo ucwords($userprofile->username); ?> <img src="<?php echo base_url(); ?>assets/images/flag.png">
									<?php  if(!empty($test_value)){ foreach($test_value as $q){ ?>
								    <?php if($q->user_id == $userId){ ?>
								    <?php $qr = $this->Common_model->getsingle('users',array('id' => $q->friend_user_id)); ?>
								    
									<a href="javascript:void(0);" data-userid="<?php echo $q->user_id; ?>" class="btn add-friends-btn rmvfriend" >Remove Friend</a>
								   <?php  }elseif($q->friend_user_id == $userId){ 
								   $qr = $this->Common_model->getsingle('users',array('id' => $q->user_id));
								   ?>
								    <a href="javascript:void(0);" data-userid="<?php echo $q->friend_user_id; ?>" class="btn add-friends-btn rmvfriend" >Remove Friend</a>  
									<?php }}}  ?>
									
									</h2>	<?php */ ?>							
								<div id="send_data"></div>
								</div>
							</div>
 					
						</div>

						<div class="profile-footer">
							<div class="col-sm-4 col-md-3"></div>
							<div class="col-sm-8 col-md-8">
								<div class="friend-count">
									<div class="panel-heading">
					                    <span class="profile-tab">
					                        <!-- Tabs -->
					                        <ul class="nav panel-tabs">
					                            <li class="active"><a href="#tab1" data-toggle="tab">Matches</a></li>
					                            <li><a href="#tab2" data-toggle="tab">Tournaments</a></li>
					                            <li><a href="#tab3" data-toggle="tab">Friends</a></li>					                            
					                        </ul>
					                    </span>
					                </div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 show-div">
							<div class="left-pro">
								<div class="pro-list p-b-40">
								
									<h5>Young gamer from stockholm <button class="btn-default">Edit text</button></h5>
									<ul>
										<li>Tournaments entered 112</li>
										<li>Tournaments won 110 <button class="btn-default">Hide start</button></li>
									</ul>
								</div>	
								<!--<div class="pro-list">
									<ul>
										<li><a href="" data-toggle="modal" data-target="#login-modal">Add gameaccount  >></a></li>
									</ul>
								</div>-->
							</div>
						</div>
						<div class="col-sm-8">
							<div class="post page-profile-tab">
								<div class="post-box">									
									<div class="post-box-id">
										<div class="panel-body">
						                    <div class="tab-content">
						                        <div class="tab-pane active" id="tab1">
						                        	<h4> Matches</h4>
                                                         Matches													
												</div>
						                        <div class="tab-pane" id="tab2">
						                        	<h4>Tournaments</h4>
													 <?php if(!empty($detail_page)){ foreach($detail_page as $detail){ ?>
						                                     <?php if(!empty($detail->game_account_id)){ ?><p><?php echo ucwords($detail->username).' has added a new gameaccount'.'</p>'; ?><?php } if(!empty($detail->participants_id)){?><p><?php echo ucwords($detail->username).' has joined a tournament'.'<a href="'.base_url().'welcome/single_tournament/'.$detail->tournament_id.'" > See tournament details</a>'.'</p>'; }?>
													 <?php }} ?>
						                        </div>

						                        <div class="tab-pane" id="tab3">  
						                        	<h4>Friends</h4>
			                                        <?php $where = "(friends.friend_user_id = ".$userId." or friends.user_id = ".$userId.")  and request_status = 1";
		     $query = $this->Common_model->jointwotable('friends','friend_user_id','users','id',$where,'users.username,friends.friend_user_id,friends.user_id');
						 ?>
						  <div class="col-xs-12 form-group card required" id="frnd_list">
                <div class="frnds-rqvst-list" id="frnd_list_sub">
                  <?php if(!empty($query)){
				foreach($query as $q)
				{ ?>
                  <?php if($q->user_id == $userId)
					{
					   $qr = $this->Common_model->getsingle('users',array('id' => $q->friend_user_id));?>
                 <?php if($qr->image!=''){
										    $img =base_url().'user_image/'.$qr->image;
										   }else{
										   $img = base_url()."assets/images/no-image.png";
										   } ?>
                  <div class="usr-msg-box">
                    <div class="usr-msg-img"><img src="<?php echo $img; ?>" /></div>
                    <div class="user-frd-mng" style="text-align:left" id="frnd-<?php echo $qr->user_id; ?>"> <span><?php if($qr->id != $this->session->userdata('userid')){ ?><a href="<?php echo base_url(); ?>user-profile/<?php echo $qr->id; ?>" ><?php }else{ ?><a href="<?php echo base_url(); ?>profile-page" ><?php } ?><?php echo ucwords($qr->username).''; ?></a></span><!--<button class="del_cat pull-right" data-catid="<?php //echo  $q->friend_user_id; ?>"><i class="fa fa-plus"></i> Add Friend</button>-->
                      
                    </div>
                    <!--<div class="user-frd-mng-btn" style="text-align:right">
                     <button class="del_cat" data-catid="<?php //echo  $q->friend_user_id; ?>">Remove Friend</button>
                      
                    </div>-->
                  </div>
                  <?php }
                    elseif($q->friend_user_id == $userId)
					{
						$qr = $this->Common_model->getsingle('users',array('id' => $q->user_id));
						?>
                   <?php if($qr->image!=''){
										    $img =base_url().'user_image/'.$qr->image;
										   }else{
										   $img = base_url()."assets/images/no-image.png";
										   } ?>
                  <div class="usr-msg-box">
                    <div class="usr-msg-img"><img src="<?php echo $img; ?>" /></div>
                    <div class="user-frd-mng" style="text-align:left" id="frnd-<?php if(!empty($qr)){ echo $qr->user_id; } ?>"> <span><?php if($qr->id != $this->session->userdata('userid')){ ?><a href="<?php echo base_url(); ?>user-profile/<?php echo $qr->id; ?>" ><?php }else{ ?><a href="<?php echo base_url(); ?>profile-page" ><?php } ?><?php if(!empty($qr)){ echo ucwords($qr->username.''); } ?></a></span>
                      
                    </div>
                    
                  </div>
                  <?php }					
				} ?>
                  <?php }else{ ?>
					  <div class="col-md-12"> 
						<div class="alert alert-danger">Friends Not Available</div>
						</div>
				  <?php } ?>
                </div>
              </div>
						                        </div>						                        
						                    </div>
						                </div>
									</div>									
								</div>
							</div>                            
						</div>	
                        <div class="col-xs-12 hide-div">
							<div class="left-pro">
								<div class="pro-list p-b-40">
									<h5>Young gamer from stockholm <button class="btn-default">Edit text</button></h5>
									<ul>
										<li>Tournaments entered 112</li>
										<li>Tournaments won 110 <button class="btn-default">Hide start</button></li>
									</ul>
								</div>	
								<div class="pro-list">
									<ul>
										<li><a href="" data-toggle="modal" data-target="#login-modal">Add gameaccount  >></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
</section>
<script>   
   $(document).on('click','#add_friend',function(e){
	  
		var userid = '<?php echo $this->uri->segment('2'); ?>';
		 e.preventDefault();
		//$('#loadermodal').modal('show');
		
		$.post("<?php echo base_url().'Welcome/friendRequest'; ?>",   
		{ userid: userid },
				function(response){
				
				//location.reload();
					$("#send_data").html(response.message);
				
				location.reload();
					 
		}, "json");
	});
	
	$(document).on('click','.rmvfriend',function(){ 
		var userid = $(this).attr('data-userid');
		
		$.post("<?php echo base_url().'Welcome/removefriend'; ?>",  
		{ userid: userid },
				function(response){
				//setTimeout(function(){
				  //$('#loadermodal').modal('hide');
				//}, 2000);
				location.reload();
					 
		}, "json");
	});
	$(document).on('click','.accept_requestss',function(){ 
			var listid = $(this).attr("data-listid");
			var frnd_id = $(this).attr("data-frndid");			
			$.post("<?php echo base_url().'Welcome/respondRequestval'; ?>",  
			{ listid: listid, frnd_id: frnd_id},
					function(response){ 							
							location.reload();							
			}, "json");
		});
</script>