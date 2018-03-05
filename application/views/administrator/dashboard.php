    <?php include('include/left_sidebar.php'); ?>
        <div class="warper container-fluid">
            <div class="page-header"><h1>Dashboard <small>Let's get a quick overview...</small></h1></div>
			<div class="dash_whole_body_wrap">
			<div class="row">
			
	<?php /*?><div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
		<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="white-link fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">

						<div class="huge"><?php echo count($total_user);?></div>
						<div>Users</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url();?>administrator/users-manage">

				<div class="panel-footer gray-gradient">

					<span class="pull-left">View Details</span>

					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div><?php */?>
	<?php /*?><div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
		<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="white-link fa fa-trophy fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">

						<div class="huge"><?php echo count($tournamentCount);?></div>
						<div>Tournaments</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url();?>administrator/manage-tournament">

				<div class="panel-footer gray-gradient">

					<span class="pull-left">View Details</span>

					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div><?php */?>
	
	<div class="col-lg-12">  
            <div class="panel panel-default">
	<div class="panel-heading gray-gradient">
		<i class="fa fa-briefcase fa-fw"></i> 
		Dynamic Display	</div>
	<!-- /.panel-heading -->
	<div class="btn-block" style="padding:10px">
	<?php /*?><div class="xpanel-body">
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">       
	  <thead>         
	  <tr>       
	  <th>Tournament Name</th>
       <th>Types of tournament</th>	  
	  <th>Tournament Date</th>	  
	  <th>Tournament Time</th> 
	  <th>Entry Fee</th>	
	  <th>Date</th>		
	  <th>Action</th>         
	  </tr>                
	  </thead>             
	  <tbody>				
	  <?php                  
	  if(!empty($tournament)){	
	  foreach($tournament as $val) { ?>     
	  <tr class="odd gradeX">                
	  <td><?php echo $val->tournament_name; ?></td> 
	   <td><?php echo $val->tournament_status; ?></td>	
      <td><?php echo date('d-m-Y', strtotime($val->create_date_time)); ?></td>
      <td><?php echo date('h:i:s', strtotime($val->create_date_time)); ?></td>		  
	 	
	  <td><?php echo $val->tournament_charges;  ?></td>          
	  <td><?php echo date('l,jS F  Y', strtotime($val->create_date_time)); ?></td>		
	  <td>		
	  <a class="admin_btn1"  href="<?php echo base_url().'administrator/edit-tournament/'.$val->id; ?>">Edit</a>	
	  <a class="admin_btn1"  href="<?php echo base_url().'administrator/viewtournament/'.$val->id; ?>">View</a>  
	  <a class="admin_btn1"  href="<?php echo base_url().'administrator/disable-tournament/'.$val->id; ?>"><?php if($val->status == 1){echo 'Active';}else{echo 'deactive';} ?></a>	
	  <a class="admin_btn1" href="<?php echo base_url(); ?>administrator/delete-tournament/<?php echo $val->id; ?>" onclick="return confirm('Are you sure delete this Page?')">Delete</a>	 </td>      
	  </tr>			
	  <?php }} ?>          
	  </tbody>                 
	  </table>
		</div>
		
	</div><?php */?>
	
		<!--<a class="btn btn-default btn-block" href="<?php //echo base_url();?>admin/orders">View All</a>-->
	</div>
	
</div>
            </div>
</div>
</div>
	    </div>
      
