
									<?php foreach($comments['rows'] as $cmt_value){ ?>
									<div class="post-header cmt-head">
										<div class="post-thumb">
										<?php if($cmt_value->image!=''){
										    $img =base_url().'user_image/'.$cmt_value->image;
										   }else{
										   $img = base_url()."assets/images/no-image.png";
										   } ?>	
											<img src="<?php echo $img; ?>" class="img-responsive"> 
										</div>	
										<div class="write">
											<h4><?php echo ucwords($cmt_value->username); ?></h4>
											<p><?php echo $cmt_value->content; ?></p>
											<p class="date"><?php echo convert_time($cmt_value->comment_date,'F j, Y, g:i a'); ?></p>
											
										</div>
									</div>
									 <div id="hide_comment_<?php echo $cmt_value->comment_id; ?>"></div>
									<?php } if($comments['num_rows'] > $test && $test != 0){ ?>
									<a href="javascript:void(0);" data-frnd="<?php echo $offset; ?>" data-postid="<?php echo $postid; ?>" class="rdmorecom" >Read More</a>
						<?php }
						?>
								