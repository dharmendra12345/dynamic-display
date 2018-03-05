<!--Login-->
<div class="modal fade one log-sign-page" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span class="fa fa-close"></span>
		</button>
    	<div class="loginmodal-container">
    		<h3>Login your Account</h3>
			<div id="login_message" style="color:red;"></div>
    	  	<form name="login" id="login" action="" method="post">
		    	<div class="input-filed1">
					<div class="input-append">
						<input type="text" id="email_id" name="email_id" placeholder="Email or Username"><span class="add-on"><img src="<?php echo base_url();?>assets/images/user-icons.png"></span>
					</div>
					<div class="input-append">
						<input type="password" id="password_login" name="password_login" placeholder="Password"><span class="add-on"><img src="<?php echo base_url();?>assets/images/signup_lock1.png" /></span>
					</div>
		    	</div>
		    	<div class="submit-form1">
		    		<input type="submit" name="submit" id="submit_login" value="Login" class="btn btn-primary join-this">
		    	</div>  		
    	 	</form>    		
    	  <div class="login-help">
    		<a href="#" class="ragis" data-toggle="modal" data-target="#login-modal">Register</a> - <a href="#" data-toggle="modal" data-target="#login-modalp" class="for-p">Forgot Password</a>
    	  </div>
    	</div>
    </div>
</div>

<!--change password-->
<div class="modal fade three log-sign-page" id="login-modalp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span class="fa fa-close"></span>
		</button>
    	<div class="loginmodal-container">
    		<h3>Forgot Password</h3>
			<div id="forgot_messge" style="display:none" class="alert alert-success alert-dismissable"></div>
    	  	<form name="forgot_pass" id="forgot_pass" method="post" action="">
		    	<div class="input-filed1">
					<div class="input-append">
						<input type="email" id="email_forgot" name="email_forgot" placeholder="Email"><span class="add-on"><img src="<?php echo base_url();?>assets/images/signup_mail1.png" /></span>
					</div>
		    	</div>
		    	<div class="submit-form1">
		    		<input type="submit" name="forgot_submit" id="forgot_submit" value="Send Request" class="btn btn-primary join-this">	
		    	</div>  		
    	 	</form>    		
    	  <div class="login-help">
    		<a href="#" class="ragis" data-toggle="modal" data-target="#login-modal">Register</a>
    	  </div>
    	</div>
    </div>
</div>

<!--Sign form-->
<div class="modal fade two log-sign-page" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-close"></span>
					</button>
    	<div class="loginmodal-container">
    		<h3>Create your Account</h3>
			<div id="test_account" style="display:none" class="alert alert-success alert-dismissable"></div>
    	  	<form name="account" id="account" action="" method="post">
		    	<div class="input-filed1">
					<div class="input-append">
						<input type="text" id="gamer_name" name="gamer_name" placeholder="Choose your username"><span class="add-on"><img src="<?php echo base_url();?>assets/images/user-icons.png" /></span>
					</div>
					<div class="input-append">
						<input type="email" id="game_email" name="game_email" placeholder="Email"><span class="add-on"><img src="<?php echo base_url();?>assets/images/signup_mail1.png" /></span>
					</div>
					<div class="input-append">
						<input type="password" id="game_password" name="game_password" placeholder="Password"><span class="add-on"><img src="<?php echo base_url();?>assets/images/signup_lock1.png" /></span>
					</div>
		    	</div>
		    	<div class="select date-select">
		    		<div class="row">
		    			<div class="col-sm-12">
		    				<lable>Date of birth</lable>	
		    			</div>
		    			<div class="col-sm-4 padr">
		    				<div class="select-style">
			    				<select name="day" id="day">
					    			<option value="">Day</option>					    			
									<?php for($day = 1; $day < 32; $day++) { ?>
									<option value="<?php echo $day; ?>"><?php echo $day; ?></option>
									<?php } ?>
					    		</select>
				    		</div>
		    			</div>
		    			<div class="col-sm-4">
		    				<div class="select-style">
			    				<select name="month" id="month">
					    			<option value="">Month</option>
					   <?php    $months = array('1' => 'Jan', '2' => 'Feb', '3' => 'Mar', '4' => 'Apr', '5' => 'May', '6' => 'June', '7' => 'July ', '8' => 'Aug', '9' => 'Sept', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec');
                         foreach($months as $m => $month) {
							?>
						<option value="<?php echo $m; ?>">
						<?php echo $month; ?>
						</option>
						 <?php } ?>
					    		</select>
			    			</div>
		    			</div>
		    			<div class="col-sm-4 padl">
		    				<div class="select-style">
			    				<select name="year" id="year">
								<option value="">Year</option>
					    			<?php                                        
										$year = date("Y");                                      
										for($j = $year; $j > 1949; $j--) {
									?>
								<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
									<?php } ?>
					    		</select>
			    			</div>
		    			</div>
		    		</div>
		    	</div>
		    	<div class="currency">
		    		<lable>Your Currency</lable>
		    		<div class="radio-button-box">
	                    <div data-toggle="buttons">
				          <label class="btn btn-default btn-circle btn-lg radio active"><input type="radio" name="currency" value="EUR"></label> EUR
				          <label class="btn btn-default btn-circle btn-lg radio"><input type="radio" name="currency" value="USD"></label> USD
				          <label class="btn btn-default btn-circle btn-lg radio"><input type="radio" name="currency" value="RUB"></label> RUB
				        </div>
	                 </div>	
		    	</div>  

		    	<div class="row">
			    	<div class="col-sm-12">
			    		<div class="select">
			    			<lable>Country Of Residency</lable>	
			    		</div>
			    		<div class="select-style country-select">
		    				<select name="country" id="country">
				    			<option value="">Select country</option>
								<?php 
								   if(!empty($country)){
                                     foreach($country as $count){   
								?>
				    			<option value="<?php echo $count->id; ?>"><?php echo $count->name; ?></option>
								   <?php }} ?>				    			
				    		</select>
			    		</div>
	    			</div>
    			</div>

    			<p>By continuing to the next screen I confirm that I am at least 18 years of age and I agree to the terms in the <a href="#"> End User Licence Agreement </a></p>
		    	<div class="submit-form1">
		    		<input type="submit" name="sign_up" id="sign_up" value="Submit" class="btn btn-primary join-this">
		    	</div>  		
    	 	</form>
    		
    	  <div class="login-help hidden">
    		<a href="#">Register</a> - <a href="#">Forgot Password</a>
    	  </div>
    	</div>
    </div>
</div>
   <script>
    
$('.scrollbox').enscroll();
    </script>
<script>
   
 $(document).ready(function(){
	$("#login").validate({
  rules: {
        email_id: {
            required: true,			
        },
        password_login: {
            required: true,
        },        
    },
  submitHandler: function() { 
   var email = $('#email_id').val();
   var password = $('#password_login').val();
      $.ajax 
		({
			url: "<?php echo base_url(); ?>login",
			type: "POST",             
			data: 'email='+email + '&password=' + password, 
            dataType: "json",			
			success: function(response)   
			{
				if(response.status == 100)
				{
					window.location.replace("<?php echo base_url(); ?>");
				}else if(response.status == 200)
				{ 
					$('#login_message').text('Wrong username/Password');
				}else if(response.status == 300)
				{ 
					$('#login_message').text('Wrong username/Password');
				}
			}
	    });
   }
});

$("#account").validate({
  rules: {        
		gamer_name: {
		required: true,		
		remote: {
			url: "<?php echo base_url(); ?>Welcome/register_username_exists",
			type: "post",
			data: {
				game_name: function(){ return $("#gamer_name").val(); }
			}
		}
	},
		 game_email: {
		required: true,
		email: true,
		remote: {
			url: "<?php echo base_url(); ?>Welcome/register_email_exists",
			type: "post",
			data: {
				email: function(){ return $("#game_email").val(); }
			}
		}
	},
		 game_password: {
            required: true,			
        },
		day: {
            required: true,			
        },
		month: {
            required: true,			
        },
		year: {
            required: true,			
        },        
         country: {
            required: true,			
        },		
    },
	
	 messages: {		    
            gamer_name: {
			    required: "Please enter your Email ",
				email: "Please enter valid email",
				remote: 'Username already used. Log in to your existing account.'
				},
            game_email: {
			    required: "Please enter your Email ",
				email: "Please enter valid email",
				remote: 'Email already used. Log in to your existing account.'
				},					
        },     
  submitHandler: function() {   
   var array_data =  $('#account').serialize(); 
      $.ajax 
		({
			url: "<?php echo base_url(); ?>sign_up",
			type: "POST",             
            data: array_data,  
			dataType: "json",			
			success: function(response)   
			{				
				$('#test_account').text('User successfully registered').show();
                location.reload();				
				
			}
	    });
   }
});

$("#forgot_pass").validate({
  rules: {
      email_forgot:{
		  required: true,
          email:true,		  
	  }, 
    },
  submitHandler: function() {   
   var array_data =  $('#forgot_pass').serialize(); 
      $.ajax 
		({
			url: "<?php echo base_url(); ?>forgotPassword",
			type: "POST",             
            data: array_data,  
			dataType: "json",			
			success: function(response)   
			{				
				$('#forgot_messge').text('Please check your Email and Follow the Instructions.').show();			
				location.reload();
			}
	    });
   }
});

$("#contact_f").validate({
  rules: {      
	  contact_name:{
		  required: true,
	  },
	  id_email:{
		  required: true,
          email:true,		  
	  },
	   massege:{
		  required: true,         		  
	  },
    },
  submitHandler: function() {   
   var array_data =  $('#contact_f').serialize(); 
      $.ajax 
		({
			url: "<?php echo base_url(); ?>contact-form",
			type: "POST",             
            data: array_data,  
			//dataType: "json",			
			success: function(response)   
			{	
               // window.location.replace("<?php echo base_url(); ?>");			
				$('#message-box').text('Thank you for contacting us.').show();
                $('#contact_name').val('');				
				$('#id_email').val('');
				$('#massege').val('');
			}
	    });
   }
});
});


</script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	 <script>	
		/*$(function() {
    $( "#search_tournament" ).autocomplete({
		 minLength: 3,
        source: '<?php echo base_url().'Welcome/tournament_value' ?>'
    });
});*/
 <?php if($this->uri->segment('1') != 'profile-page'){ ?>
     (function($){
  
  var $project = $('#search_tournament'); 
  
  $project.autocomplete({
    minLength: 0,
    source: '<?php echo base_url().'Welcome/tournament_value' ?>',
    focus: function( event, ui ) { 
      $project.val( ui.item.label);
	   
      return false;
    }
  });
	 
  $project.data( "ui-autocomplete" )._renderItem = function( ul, item ) {    
    var $li = $('<li>'),
        $img = $('<img>');

    $img.attr({
      src: '<?php echo base_url(); ?>upload/' + item.icon,
      //alt: item.label
    });

    $li.attr('data-value', item.label);	
    $li.append('<a href="<?php echo base_url(); ?>welcome/single_tournament/'+item.id+'" class="auto_cls">');
    $li.find('a').append($img).append(item.label);    

    return $li.appendTo(ul);
  };
  

})(jQuery);
<?php }else{ ?> 
(function($){ 
  
  var $projects = $('#search_users'); 
  
  $projects.autocomplete({
    minLength: 0,
    source: '<?php echo base_url().'Welcome/users_value' ?>',
    focus: function( event, ui ) { 
      $projects.val( ui.item.label);
	   
      return false;
    }
  });
  
  $projects.data( "ui-autocomplete" )._renderItem = function( ul, item ) {    
    var $li = $('<li>'),
        $img = $('<img>');
   if(item.icon){
    $img.attr({
      src: '<?php echo base_url(); ?>user_image/' + item.icon,
      //alt: item.label
    });
   }else{
	   $img.attr({
      src: '<?php echo base_url(); ?>assets/images/no-image.png',
      //alt: item.label
    }); 
   }

    $li.attr('data-value', item.label);	
    $li.append('<a href="<?php echo base_url(); ?>user-profile/'+item.id+'" class="auto_cls">');
    $li.find('a').append($img).append(item.label);    

    return $li.appendTo(ul);
  };
  

})(jQuery);
<?php } ?>

 $(document).ready(function(){
     $("#game_account").validate({
        rules: {
            game_id: "required",
           // accountname: "required"
        accountname: {
		required: true,      	
		
	},		   
        },
        messages: {
            game_id: "Please select game",
			email: "Please enter account name email",
        },
        
        submitHandler: function(form) {
		var gameid = $("#gamid").val();
		var accountname = $("#accountname").val();
        $.ajax
		({
			url: "<?php echo base_url(); ?>Welcome/addGmeAjax",
			type: "POST",             
			data: ({gmaid:gameid,accountname:accountname}), 
			dataType: "json",    
			success: function(data)   
			{
				if(data.code == '200'){
				   $(".eror").html('<h4 style="color:red">'+data.message+'</h4>')
				}
				
              if(data.code =='100'){
			  $(".suc").html('<h4 style="color:green">Account Added Successfully</h4>')
			   
			     location.reload();
			  // $(".suc").append('<h4 style="color:red">'+data.message+'</h4>')
			  }
			}
	     });
        }
    });
 });
		</script>
</body>
</html>
