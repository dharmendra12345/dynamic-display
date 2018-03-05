<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.8.16.custom.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.bracket.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.json-2.3.min.js"></script>
<?php 
if($this->uri->segment('3')){
		$q = $this->Common_model->getsingle('brackets',array('tournament_id' => $this->uri->segment('3')));
		$json = $q->json;				 
  if(!empty($json))
    echo '<script type="text/javascript">var autoCompleteData = '.$json.' </script>';
  else
    echo '<script type="text/javascript">var autoCompleteData = { 
    teams : [["Devon", ""],["", ""]], results : []}</script>';
}
else
    echo '<script type="text/javascript">var autoCompleteData = {
    teams : [["Devon", ""],["", ""]], results : []}</script>';
 ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/brackets.js"></script>
<?php /*?><script type="text/javascript" src="js/brackets-rd.js"></script><?php */?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.bracket.css" />

<section class="thursday-banner sing_tour1">
	<div class="sport-banner">
    	<div class="container">
        	<div class="row">
            	<div class="banner-content">
                	<h1>
                    	thursday night fun
                    </h1>
                    <h5>Sponsored by DEMO NAME</h5>
                    <button class="btn btn-default btn-tournament active">
                    	Join this Tournaments
                    </button>
                    <p class="btn_bot_txt">Add a <span class="red">gameaccount</span> to join</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="thusday-section single-ruls">
    <div class="col-md-3 col-sm-3">
        <div class="left-bar">
            <div class="left-box">
                <div class="left-list">
                    <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
		              <li class="active"><a href="#vtab1" data-toggle="tab">Lobby  <i class="fa fa-comment pull-right"></i></a></li>
		              <li><a href="#vtab2" data-toggle="tab">Bracket <span class="pull-right">}</span></a></li>
		              <li><a href="#vtab3" data-toggle="tab">Rules <i class="fa fa-th-list pull-right"></i></a></li>
		            </ul>
                </div>
                <div class="price-pool">
                	<div class="text-center heading">
                		<h3>Price pool</h3>	
                	</div>
                    <ul>
					 <?php 
					
					  if(!empty($prizes)){
					 foreach($prizes as $p ){ 
					 echo "<li><span>$p->prize_position</span>$p->price $tournaments->currency </li>";
					   
					  } } ?>
                    	 
                    </ul>
                </div>  
            </div>
        </div>  
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                <div class="center-bar">
		            <div class="center-box">
		                <div class="timer">
		                    <div id="countdown-1"></div>
							
		                </div>  
		                <div class="lobby chat">
		                	<h3>Tournaments Lobby</h3>
		                    <div class="comment-box dumMsg for-scrl"  id="magscroll"  onscroll="scrollmessage();">
                              <img  src="<?php echo base_url();?>chat_assets/img/msg_loader.gif">
		                    </div>
		                    <div class="chat-submit">
							
		                        <input type="text" name="" id="sendMsg" placeholder="Type Something"> 
								
								<input type="hidden" id="active_sender">
								<button type="button" id="submitMsg" class="btn">Send</button>
		                    </div>
							
		                </div>
		            </div>
		        </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="vtab3">
                <div class="center-bar">
                    <div class="center-box">                
                        <div class="rule">
                            <div class="heading">
                                <h2>SPECIFIC TOURNAMENT RULES</h2>  
                            </div>
                            <div class="rule-box">
                                <p>Screenshot Rule is active</p>
                                <p>
                                    You're not allowed to have multiple decks per class prepared! Your opponent can ask for a screenshot of the challenge lobby in order to check your deck screen. If you have several decks for one class prepared or leave the challenge at any time,your opponent can ask for a one-game defwin!
								</p>
                            </div>
                            <div class="rule-box">  
                                <p>
                                    Please note that our General Tournament Rules,the Terms of Use and the Code of Conduct apply for all tournaments on this website.
                                </p>
                            </div>
                            <div class="rule-box">
							<?php echo $tournament_rules->rules; ?>
							<!--<h3>Official StriveWire Tournament</h3>
                                <p>
								   www.strivewire.com/general  
                                </p>
								<h3>Standard Tournament</h3>
								<p>This tournament will be played in Standard Mode. Please make sure you start the game with the correct mode selected.</p>
                            
							<h3>Tournament Process</h3>
                                <p>
                                     Warning:New Defwin rule
                                </p>
								<p>
								     Join the tournament and have a place at the participant or the waiting list(You need the StriveWire account and a valid gameaccount in order to be able to sign up for a tournament)
									 Come back when the checkin phase begin and click the "checkin button".As soon as the tournament starts and the grid is created you'll see if you have a slot or not.(Hint: if you have checked in soon enough,you have a slot for sure!)
									 Click the current match button as soon as the grid is created and follow the instructions in your current match.
									 Take screenshots of the winning screens in order to be able to prove that you won in case of disputes.
								</p>
								<h3>Tournament Process</h3>
                                <p>
                                     Warning:New Defwin rule
                                </p>
								<p>The tournament will be played using the Hero Elimination Mode</p>
                                <p>Every player has to prepare three decks for a best-of-three series, using three unique classes.(That means: you are not allowed to switch from zoolock to handlock vs the same opponent.If your opponent can prove that you've used different decks,you will be disqualified immediately)
								Every player picks three heroes in the current match for a best-of-three / four heroes for a best-of-five series. After both players have picked each player will ban one of the opponents heroes(this hero is not allowed to be played!)
								If you have won with a class,you have to keep playing it in the next game.If you've lost with a class,you have to change and are not allowed to play it in this series again.
								You won the series if you win two games in a best-of-three or three games in a best-of-five.
								Regulations (For all punishments / regulations please recheck our Rule Book.The following list is only a list of some of them and is not complete!)
								 (https://strivewire.com/general )</p>
								<p>Warning:New Defwin rule </p>
								<p>Don't forget to set youself ready. if you miss this within the ten minutes timeframe,your opponent receives a defwin which is irreversible.Don't enter your collection in case you leave the challenge for any reason,make sure you don't change your status or enter your card collection. A defwin your will be granted if your opponent screenshot that you have entered the collection,have made a deck or have changed the status to AFK / DND(this might hide the fact you entered the collection).The challenge cancel itself won't lead to a defwin anymore!!(-> Rechallenge your opponent and play the next game!) 
							     If you remove your opponent from your friend list during the game,he will receive a complete match win.
								 If you pick the wrong hero, your opponent can grant a rematch or call a defwin for this game.
								 In case of disconnection or Hearthstone bug its up to your opponent whether he grants you a rematch or take a defwin for this game.(He needs to show a screenshot that he was able to finish-and win-the match in order to take a defwin)
								 <h3>Payouts</h3>
								 <p>Your prize money will be transferred to your StriveWire Wallet after the tournament has finished.</p>
								 <h3>Admin Contact</h3>
								 <p>If you need to contact an admin,have a question or need a score appove,just write into the tournamnet lobby and you will instantly receive an answer.<p>
								</p> -->
						   </div>
                                                 
                        </div>
                    </div>
                </div> 
            </div>
            
            <div role="tabpanel" class="tab-pane fade in bracket" id="vtab2">
                <div class="center-bar">
		            <div class="center-box bracket-page">
			
	<div id="autoComplete"></div>		
			
		                <!-- <div class="bracket-list-box">
                    <div class="list-bracket">
                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>
                        <div class="border-point">
                            <div class="bracket-box">
                                <h4>
                                    <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                                </h4>
                            </div>
                            <div class="bracket-empty"></div>
                            <div class="bracket-box">
                                <h4>
                                    <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                                </h4>
                            </div>                          
                        </div>
                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>
                    </div>

                    <div class="bracket-empty"></div>

                    <div class="list-bracket">
                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>

                        <div class="border-point">
                            <div class="bracket-box">
                                <h4>
                                    <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                                </h4>
                            </div>

                            <div class="bracket-empty"></div>

                            <div class="bracket-box">
                                <h4>
                                    <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                                </h4>
                            </div>                          
                        </div>

                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="bracket-list-box center">
                    <div class="list-bracket">
                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>
                        <div class="border-point">
                            <div class="bracket-box">
                                <h4>
                                    <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                                </h4>
                            </div>

                            <div class="bracket-empty120"></div>

                            <div class="bracket-box">
                                <h4>
                                    <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                                </h4>
                            </div>                          
                        </div>
                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="bracket-list-box right-side-list">
                    <div class="list-bracket">
                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>
                        <div class="border-point">
                                                    
                        </div>
                        <div class="bracket-box">
                            <h4>
                                <img src="<?php echo base_url();?>assets/images/profile.jpg"> SBNR 89
                            </h4>
                        </div>
                    </div>
                </div>	-->	               
		            </div>
		        </div>
            </div>

        </div> 
    </div>

    <div class="col-md-3 col-sm-3">
        <div class="right-bar">
            <div class="available">
                <div class="on-chat">
                    <div class="heading">
                    	<h4><img src="<?php echo base_url();?>assets/images/user_icon_blck.png"> Participant <small>2 check-ins</small></h4>
                    </div>
					<?php 
					$first_id='';
					 if(!empty($users)){
					$i = 1 ; foreach($users as $u) { 
					if($i==1){
					 $active = 'active';
					 
					 $first_id = $u->id;
					 
					}else{
					$active = 'noactive';
					}
					  if(isset($u->image) and $u->image !='') {
					  
					  $img = base_url().'user_image/'.$u->image; 
					  }
					  
					  else{
					  $img = base_url().'assets/images/no-image.png';
					  }
					
					?>
                  
        				  <div class="person">
                        
						<h4><a href="<?php echo base_url(); ?>user-profile/<?php echo $u->id; ?>" ><img src="<?php echo $img; ?>"></a>
						<a class="userparticipant <?php echo $active ;?>" id="<?php echo $u->id;?>" ><?php echo ucwords($u->username);?></a></h4>
                       </div>

					<?php $i++; } }else{ echo 'No participants available'; } ?>
                </div>  
            </div>
        </div>  
    </div>    
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/timer/jquery.time-to.js"></script>
    <script>
        /**
         * Set timer countdown in seconds with callback
         
        $('#countdown-1').timeTo(32, function(){
            alert('Countdown finished');
        }); 	 
 $('#countdown-1').timeTo(<?php echo $round; ?>, function(){
            alert('Countdown finished');
        });*/
$('#countdown-1').timeTo(new Date('<?php echo $date_time; ?> GMT+0530 (India Standard Time)')); 
 
$(document).ready(function(){
 $("#active_sender").val('<?php echo $first_id;?>');
 
 
 
 	setInterval( function() {  
	
	var id = $("#active_sender").val();
				$.ajax  
		         ({
					url: "<?php echo base_url();?>Partisipantchat/getchat",
					type: "POST",             
					data: ({id:id}),
					dataType:"html",
					success: function(data)   
					{ 
            
                         $('.dumMsg').html(data);  					  
					  
					}
	             });

	}, 2000 );	
 
 
 
 });

 $("#submitMsg").on("click",function(){
       var msg = $('#sendMsg').val();
       var id = $("#active_sender").val();
	   
	    if(msg !=''){
				$.ajax  
		         ({
					url: "<?php echo base_url();?>Partisipantchat/submitchat",
					type: "POST",             
					data: ({msg:msg,id:id}),
					dataType:"html",
					success: function(data)   
					{ 
                      if(data=='true'){
                         $('#sendMsg').val('');  					  
                         					  
					  }
					}
	             });
		
		  }
 
  });
  
  $(".userparticipant").on('click',function(){ 
	  $('.userparticipant').removeClass('active');
	   $(this).addClass('active');
	   var id = $(this).attr('id');
	    $("#active_sender").val(id);
  });
  
function scrollmessage(){
 
if($("#magscroll").scrollTop(0))
{

 
 alert( $("#magscroll").scrollTop())
  var offset ='10';// $("#magscroll li").last().attr('data-msgid');

$.post("<?php echo base_url().'User_dashboard/get_more_notification'; ?>",  
{ offset: offset },
function(response){ 
 if(response.success){

 $("#magscroll").append(response.list);
 }
}, "json");
}
}
 
 	
    </script>
	<script>
   $(document).ready(function() { 
    $('#autoComplete').bracket({ 
      init: autoCompleteData,
      save: saveFn,
      decorator: {edit: acEditFn,
                  render: acRenderFn}})
  })
</script>