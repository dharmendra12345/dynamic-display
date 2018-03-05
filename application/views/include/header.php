<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7" />
<title>SPORT TOURNAMENT</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/master.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/js/scroll/jquery.scrollbox.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
</head>
<body>
<header>
	<div class="header without_login_head">
    	<div class="">
            <nav class="navbar navbar-default" role="navigation"><!-- "navbar-fixed-top"-->
                <div class="">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" class="img-responsive"></a>
                    </div>
        
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo base_url();?>tournaments">Tournament</a></li>
							<?php $tournament = $this->Common_model->getAll('tournament'); ?>							
                            <li><a href="<?php echo base_url();?>tournaments" class="all-br"><?php echo count($tournament); ?></a></li>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
						<?php if($this->session->userdata('userid') == ''){ ?>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal1">Log in</a></li>
                            <li><a href="#" class="sign" data-toggle="modal" data-target="#login-modal">Sign up</a></li>
                        <?php }else{ ?>
						<li><a href="<?php echo base_url(); ?>Welcome/logout" >Logout</a></li>
						<?php } ?>
						</ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</header>