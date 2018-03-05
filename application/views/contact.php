<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7" />
<title>SPORT TOURNAMENT</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" >
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/master.css">
</head>
<body>
<header>
    <div class="header new">
        <div class="page-new old">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url();?>"><img src="assets/images/logo.png" class="img-responsive"></a>
                    </div>
        
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="row">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo base_url();?>tournaments">Tournament</a></li>
                                <li><a href="#" class="all-br">795</a></li>
                                <li class="search-li">
                                    <div class="input-append">
                                        <input type="text" id="" name="" placeholder="Search game and tournaments"><a href="#"> <span class="add-on"><i class="fa fa-search"></i></span></a>
                                    </div>
                                </li>
                            </ul>
                            
                            <ul class="nav navbar-nav navbar-right">
                                <li class="profile"><a href="#"><img src="assets/images/user.jpg"> SCN96 0.00USD</a></li>
                                <!--user request-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-o"></i></a>
                                    <ul class="dropdown-menu">
                                        <div class="requests">
                                            <P>Friend Requests</P>
                                            <div class="requ-box">
                                                <div class="requ-profile">
                                                    <img src="assets/images/user.jpg">  
                                                </div>
                                                <div class="requ-data">
                                                    <p class="name">CR7</p>
                                                    <a href="" class="conf">Confirm</a> <a href="">Delete request</a>   
                                                </div>                                              
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <!--Chat-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comment"></i></a>
                                    <ul class="dropdown-menu">
                                        <div class="chat1">
                                            <P>Chat</P>
                                            <div class="requ-box">
                                                <div class="requ-profile">
                                                    <img src="assets/images/user.jpg">  
                                                </div>
                                                <div class="requ-data">
                                                    <p class="name">CR7</p>
                                                    <p><span class="msg">Yes ha ha</span></p>   
                                                </div>                                              
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <!--Sign-out-setting-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="hall_of_fame.html">
                                        Hall of Fame</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="<?php echo base_url();?>features">Freatures</a></li>
                                        <li><a href="<?php echo base_url();?>contact">Contact us</a></li>
                                        <li><a href="index.html">Sign out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </div>
            </nav>
        </div>
        <div class="mobi-new">
        	<ul class="ul-fisrt">
        		<li class="logo-li"><a href="#"><img src="assets/images/logo.png" class="img-responsive"></a></li>
        		<li><a href="tournaments.html">Tournament</a></li>
        		<li><a href="#" class="all-br">795</a></li>
        		<li class="profile pull-right"><a href="profile_page.html"><img src="assets/images/user.jpg"></a></li>
        	</ul>
        	<ul class="nav navbar-nav">
        		 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-o"></i></a>
                    <ul class="dropdown-menu">
                        <div class="requests">
                            <P>Friend Requests</P>
                            <div class="requ-box">
                                <div class="requ-profile">
                                    <img src="assets/images/user.jpg">  
                                </div>
                                <div class="requ-data">
                                    <p class="name">CR7</p>
                                    <a href="" class="conf">Confirm</a> <a href="">Delete request</a>   
                                </div>                                              
                            </div>
                        </div>
                    </ul>
                </li>
                <!--Chat-->
                <li class="dropdown chat-demo">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comment"></i></a>
                    <ul class="dropdown-menu">
                        <div class="chat1">
                            <P>Chat</P>
                            <div class="requ-box">
                                <div class="requ-profile">
                                    <img src="assets/images/user.jpg">  
                                </div>
                                <div class="requ-data">
                                    <p class="name">CR7</p>
                                    <p><span class="msg">Yes ha ha</span></p>   
                                </div>                                              
                            </div>
                        </div>
                    </ul>
                </li>
    			<li class="dropdown requ-demo">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="hall_of_fame.html">
                        Hall of Fame</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="<?php echo base_url();?>">Freatures</a></li>
                        <li><a href="<?php echo base_url();?>contact">Contact us</a></li>
                        <li><a href="index.html">Sign out</a></li>
                    </ul>
                </li>

        		<li class="search-li pull-right">
		            <div class="input-append">
		                <input type="text" id="" name="" placeholder="Search game and tournaments"><a href="#"> <span class="add-on"><i class="fa fa-search"></i></span></a>
		            </div>
		        </li>
        	</ul>
        </div>
    </div>
</header>

<section>
	<div class="contact-us chatarea">
    	<div class="container">
        	<div class="row">
            	<div class="bg-whit-1000">
            		<div class="banner-box">
	                	<h1>
	                    	contact us
	                    </h1>
	                    <p class="text-center">Questions? Comment? Ideas? Sponsorship Request? Feel free to contact us!</p>
	                </div>
	                <div class="form-box">
	                	<form class="home-contact-form" id="contact" name="contact">
	                		<div class="form-box">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <input class="form-control" id="name" name="name" placeholder="Name*" type="text" />
	                                </div>
	                            </div> 

	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <input class="form-control" id="id_email" name="email" placeholder="E-mail*" type="email" />
	                                </div>
	                            </div>   

	                            <div class="col-sm-12">
	                                <div class="form-group text-home">
	                                    <textarea class="form-control" cols="40" id="massege" name="massege" placeholder="Massege*" rows="10"></textarea>
	                                </div>
	                            </div>      
	                        </div>
	                        <div class="col-sm-12 text-center">
	                        	<button type="submit" class="btn btn-primary join-this">
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

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</body>
</html>
