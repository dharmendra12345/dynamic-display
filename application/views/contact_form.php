<section>
	<div class="contact-us chatarea contact_page_indiv">
    	<div class="container">
        	<div class="row">
            	<div class="bg-whit-1000">
            		<div class="banner-box">
	                	<h1>
	                    	contact us
	                    </h1>
	                    <p class="text-center">Questions? Comment? Ideas? Sponsorship Request? Feel free to contact us!</p>
 				   <?php if(!empty($message)){ ?> <div class="alert alert-success alert-dismissable"><?php echo $message; ?></div><?php } ?>
					<?php  if(null !==($this->session->flashdata('item')))
					   {
						$message = $this->session->flashdata('item'); ?>
						<div style="color:green;"><?php success_msg($message['message']); ?></div>
					  <?php  } ?>
				   </div>
	                <div class="form-box">
	                	<form class="home-contact-form" id="contact_fo" name="contact_fo" action="" method="post">
	                		<div class="form-box">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <input class="form-control" id="contact_name" name="contact_name" placeholder="Name*" type="text" />
	                                </div>
	                            </div> 

	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <input class="form-control" id="id_email" name="id_email" placeholder="E-mail*" type="email" />
	                                </div>
	                            </div>   

	                            <div class="col-sm-12">
	                                <div class="form-group text-home">
	                                    <textarea class="text-area-m" id="massege" name="massege"  placeholder="Massege*"></textarea>
	                                </div>
	                            </div>      
	                        </div>
	                        <div class="col-sm-12 text-center">
	                        	<button type="submit" name="submit_message" class="btn btn-primary join-this">
	                            	Send Message
	                            </button>
	                        </div>
	                	</form>
	                </div>	
            	</div>
            </div>
        </div>
    </div>
</section>
<script>
$("#contact_fo").validate({
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
    }
});
</script>