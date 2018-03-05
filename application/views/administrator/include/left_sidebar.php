<aside class="left-panel">
            <div class="user text-center">
                  <!--<img src="<?php //echo base_url(); ?>assets_admin/images/avtar/user.png" class="img-circle" alt="...">-->
                  <h4 class="user-name"><?php echo $this->session->userdata('adminname'); ?></h4>
                  <div class="dropdown user-login">
                  <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-circle status-icon available"></i> Available <i class="fa fa-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-circle status-icon signout"></i> Sign out</a></li>
                  </ul>
                  </div>	 
            </div>
            <nav class="navigation">
            	<ul class="list-unstyled">
                	<li class="<?php echo (isset($active_tab_dashboard)? $active_tab_dashboard :"") ; ?>"><a href="<?php echo base_url(); ?>administrator/dashboard"><i class="fa fa-home"></i><span class="nav-label">Dashboard</span></a></li>					
					<?php /*?><li class="<?php echo (isset($active_tab_user)? $active_tab_user :"") ; ?>"><a href="<?php echo base_url();?>administrator/users-manage"><i class="fa fa-user fa-fw"></i><span class="nav-label">Manage Schedule</span></a></li><?php */?>
					<li class="<?php echo (isset($active_tab_tournament)? $active_tab_tournament :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-schedule"><i class="fa fa-trophy"></i><span class="nav-label">Schedule</span></a></li>
					
					<li class="<?php echo (isset($active_tab_section)? $active_tab_section :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-section"><i class="fa fa-trophy"></i><span class="nav-label">Section</span></a></li>
					
					
					<li class="<?php echo (isset($active_tab_section)? $active_tab_section :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-video"><i class="fa fa-trophy"></i><span class="nav-label">Video item</span></a></li>
					
					<li class="<?php echo (isset($active_tab_section)? $active_tab_section :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-web"><i class="fa fa-trophy"></i><span class="nav-label">Web item</span></a></li>
					
				<li class="<?php echo (isset($active_textitem_schedule)? $active_textitem_schedule :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-text"><i class="fa fa-trophy"></i><span class="nav-label">Text item</span></a></li>	
				<li class="<?php echo (isset($active_image_section)? $active_image_section :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-imageitem"><i class="fa fa-trophy"></i><span class="nav-label">Image item</span></a></li>	
				<li class="<?php echo (isset($active_tab_section)? $active_tab_section :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-cell"><i class="fa fa-trophy"></i><span class="nav-label">Cell item</span></a></li>	
				
				<li class="<?php echo (isset($active_tab_sound)? $active_tab_sound :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-audio"><i class="fa fa-trophy"></i><span class="nav-label">Audio item</span></a></li>	
				
				
				<li class="<?php echo (isset($active_tab_sound_assign)? $active_tab_sound_assign :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-user-sound"><i class="fa fa-trophy"></i><span class="nav-label">Assign audio item</span></a></li>	
				
				
				
					
		
				
				<li class="<?php echo (isset($active_tab_schedule_assign)? $active_tab_schedule_assign :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-user-schedule"><i class="fa fa-trophy"></i><span class="nav-label">Assign schedule</span></a></li>
				
				
				
					
					
					<?php /*?><li class="<?php echo (isset($active_tab_match)? $active_tab_match :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-match"><i class="fa fa-adjust"></i><span class="nav-label">Match</span></a></li><?php */?>
					
					<?php /*?><li class="<?php echo (isset($active_tab_feature)? $active_tab_feature :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-feature"><i class="fa fa-database"></i><span class="nav-label">Features</span></a></li><?php */?>
					
					
					<?php /*?><li class="<?php echo (isset($active_tab_game)? $active_tab_game :"") ;  ?>"><a href="<?php echo base_url();?>administrator/manage-game"><i class="fa fa-tachometer"></i><span class="nav-label">Game</span></a></li><?php */?>
			        
			
			
			<?php /*?><li class="<?php echo (isset($active_tab_prize)? $active_tab_prize :"") ;  ?>"><a href="<?php echo base_url();?>administrator/manage-prize"><i class="fa fa-gift"></i><span class="nav-label">Prize Poll</span></a></li><?php */?>
			<?php /*?><li class="<?php echo (isset($active_tab_parti_chat)? $active_tab_parti_chat :"") ;  ?>"><a href="<?php echo base_url();?>administrator/participant-chat"><i class="fa fa-comments"></i><span class="nav-label">Participant Chat</span></a></li><?php */?>
			<?php /*?><li class="<?php echo (isset($active_tab_bracket)? $active_tab_bracket :"") ;  ?>"><a href="<?php echo base_url();?>administrator/manage-bracket"><i class="fa fa-brackets">{ }</i><span class="nav-label">Bracket</span></a></li><?php */?>
			<?php /*?><li class="<?php echo (isset($active_tab_tournament_rules)? $active_tab_tournament_rules :"") ;  ?>"><a href="<?php echo base_url();?>administrator/tournament_rules"><i class="fa fa-file-text"></i><span class="nav-label">Rules</span></a></li><?php */?>
			
			<?php /*?><li class="<?php echo (isset($active_tab_participations)? $active_tab_participations :"") ;  ?>"><a href="<?php echo base_url();?>administrator/manage-participation"><i class="fa fa-file-text-o"></i><span class="nav-label">participations</span></a></li><?php */?>		
					
					
					
					<?php /*?><li class="<?php echo (isset($active_tab_feature)? $active_tab_feature :"") ; ?>"><a href="<?php echo base_url();?>administrator/manage-feature"><i class="fa fa-file-text-o"></i><span class="nav-label">prize Poll</span></a></li><?php */?>
					
					
					
					<!--<li class="<?php //echo (isset($active_tab_game)? $active_tab_game :"") ;  ?>"><a href="<?php echo base_url();?>administrator/manage-game"><i class="fa fa-file-text-o"></i><span class="nav-label">Game</span></a></li>-->
					
					
					
				 <!--<li class="<?php //echo (isset($active_tab_post)? $active_tab_post :"") ;  ?>"><a href="<?php echo base_url();?>administrator/Manage-Post"><i class="fa fa-file-text-o"></i><span class="nav-label">Blog Post</span></a></li>
				  <li class="<?php //echo (isset($active_tab_comment)? $active_tab_comment :"") ;  ?>"><a href="<?php echo base_url();?>administrator/Manage-Comment"><i class="fa fa-user fa-fw"></i><span class="nav-label">Comments</span></a></li>
				  <li class="<?php //echo (isset($active_tab_blog_comment)? $active_tab_blog_comment :"") ;  ?>"><a href="<?php echo base_url();?>administrator/Blog-Comment"><i class="fa fa-user fa-fw"></i><span class="nav-label">Blog Comment</span></a></li>-->
				<?php /*<li class="has-submenu <?php echo (isset($active_tab_categories)? $active_tab_categories :"") ; ?>"><a href="<?php echo base_url();?>administrator/Manage-Job-Category"><i class="fa fa-tags"></i> <span class="nav-label">Categories</span></a>
                    	<ul class="list-unstyled">
                     <li><a href="<?php echo base_url();?>administrator/Manage-Online-Test-cate">Online Testing</a></li>
                          
                        </ul>
                    </li> */?>
							
				
                </ul>
            </nav>
    </aside>
    <!-- Aside Ends-->
	 <section class="content">
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </header>
        <!-- Header Ends -->		