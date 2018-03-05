<?php if($this->uri->segment('4') == 'paypal'){ ?>
<form name="confirmation" id="confirmation" method="post" action="https://www.paypal.com/cgi-bin/webscr">
						<input type="hidden" name="business" value="<?php echo $tournament->id; ?>">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="amount" id="selected_subscription" value="<?php echo $tournament->tournament_charges; ?>">
						 <input type="hidden" name="notify_url" value="<?php echo base_url(); ?>online_wallet/payment_success/<?php echo $this->session->userdata('userid'); ?>">
						<input type="hidden" name="return" value="<?php echo base_url(); ?>online_wallet/payment_done">
						<input type="hidden" name="cancel_return" value="<?php echo base_url(); ?>online_wallet/payment_done">
						<input type="hidden" name="item_name" id="item_name" value="<?php echo $tournament->tournament_name; ?>">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="no_note" value="0">
						<input type="hidden" name="rm" value="2">
						<?php $user = $this->Common_model->getsingle('users',array('id' => $this->session->userdata('userid'))); ?>
						<input type="hidden" name="first_name" value="<?php echo $user->firstname; ?>">
						<input type="hidden" name="email" value="<?php echo $user->email; ?>">
						<input type="hidden" name="country" value="india">
</form>
<?php } ?>

