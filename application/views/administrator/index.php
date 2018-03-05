<style>
		body {background:#e6e6e6;}
</style>   
   <div class="container">
    	<div class="row">
    	<div class="col-lg-4 col-lg-offset-4">
			<div class="admin_login_frst">
		    <h4><?php echo $this->session->flashdata('check_login'); ?></h4>
        	<h3 class="text-center">Dynamic Display</h3>
            <p class="text-center">Sign in to continue to the Administration Panel</p>
			<span class="new_erroe_one"><?php echo @$this->session->flashdata('error'); ?></span>
            <hr class="clean">
        	<form role="form" id="admin_login" method="post" action="<?php echo base_url(); ?>administrator/login_check">
              <div class="form-group input-group">
              	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control required email"  placeholder="Email Adress">
              </div>
              <div class="form-group input-group">
              	<span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" name="password" class="form-control required password"  placeholder="Password">
              </div>
              <?php /*?><div class="form-group">
                <label class="cr-styled">
                    <input type="checkbox" ng-model="todo.done">
                    <i class="fa"></i> 
                </label>
                Remember me
              </div><?php */?>
			  <input type="submit" class="btn btn-purple btn-block" value="Sign in" >
            </form>
			</div>
        </div>
        </div>
    </div>