<?php if(!empty($post_data)){
									$i=1;
                                  foreach($post_data as $post){
								$media = $this->Common_model->getAllwhere('post_media',array('post_id' => $post->post_id));	  
							
								?>
								<div class="post-box-id" id="postdetail-<?php echo $post->post_id; ?>">
									<div class="post-header loadData" id="myData_<?php echo $i;?>">
										<div class="post-thumb">
										 <?php if($user->image!=''){
										    $img =base_url().'user_image/'.$user->image;
										   }else{
										   $img = base_url()."assets/images/no-image.png";
										   } ?>	
											<img src="<?php echo $img; ?>" class="img-responsive"> 
										</div>	
										<div class="write">
											<h4><?php echo ucwords($post->username); ?></h4>
											<p class="date"><!--NOV 16.2016 at 2:00 PM--> <?php echo convert_time($post->post_date,'F j, Y, g:i a'); ?></p>
										  <div class="post-edit">
										  <ul>
										      <li class="dropdown pull-right">
												<!--<img src="assets/images/profile.jpg">-->
												<img src="<?php echo $img; ?>" >
			                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="javascript:void(0);" data-target="#editPost_<?php echo $post->post_id ?>" data-toggle="modal"><i class="fa fa-pencil"></i>Edit Post</a></li>
			                                        <li><a href="javascript:void(0);" class="removepostdel" data-postid="<?php echo $post->post_id; ?>"><i class="fa fa-trash-o"></i> Delete Post</a></li>
			                                       <!-- <li><a href="#"><i class="fa fa-cog"></i> Change Setting</a></li>-->
			                                    </ul>
			                                </li>
										   </ul>
										   </div>
										</div>
									</div>
<!-------------------------------Edit post------------------------------- -->
<div class="modal fade" id="editPost_<?php echo $post->post_id; ?>" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabelsss">
                    Edit Post
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
			
			<div class='form-row'>
                   
                    <div class='col-xs-12 form-group card required'>
                       <textarea rows="3" class="form-control" name="edit_post" id="edit_post_<?php echo $post->post_id; ?>"><?php echo $post->post_title; ?></textarea>    
					   </div>
                  </div>
			
			  
			<button type="submit" data-post-id="<?php echo $post->post_id; ?>" name="editpost_submit" id="editpost_submit" class=' btn btn-primary submit-button' style="margin-left:16px;" >Submit</button>
			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>
			
			
			</div>
        </div>
    </div>
</div>

<!--------------------------------Edit Post------------------------------------ -->

									<div class="post-img">
										<span id="edit_post_text_<?php echo $post->post_id; ?>"><h3><?php echo $post->post_title; ?></h3></span>
										<div class="post-done">
										<?php if($media){
		                             $j = 1;
								foreach($media as $md){ 
								if($md->media_type == 'image/jpeg' || $md->media_type == 'image/jpg' || $md->media_type == 'image/png'){ ?>
											
								<img <?php if($j!=1){ ?> class="img-thumbnail lazy" style="width:50px;" <?php } ?> src="<?php echo base_url(); ?>upload/<?php echo $md->media_path; ?>" />
								<?php $j++;}  ?>
								<?php if($md->media_type == 'video/mp4' || $md->media_type == 'video/flv'){ ?>
                                 <video width="100%" controls>
				  <source src="<?php echo base_url(); ?>upload/<?php echo $md->media_path; ?>" type="video/mp4">
				</video>
                                <?php } ?>								
										<?php }} ?>
										</div>
									</div>	
							<?php
							$liker = $this->Common_model->getsingle('like',array('post_id' => $post->post_id,'user_id' => $this->session->userdata('userid'))); 
                            $count_like_one = $this->Common_model->jointwotable('like', 'user_id', 'users', 'id',array('post_id' => $post->post_id,'like.type'=>1),'users.id,users.username,like.like_id');
		   $likers = '';
		   if(!empty($count_like_one)){
			   foreach($count_like_one as $likecount){
				   $likers .= $likecount->username.'<br />';
			   }
		   }
							?>
									<div class="counting-like">
										<div class="row">
											<div class="col-sm-6">
												 <div id="likecountbox-<?php echo $post->post_id; ?>" data-likecount="<?php echo COUNT($count_like_one); ?>" class="pst-like-sec" <?php if(COUNT($count_like_one) == 0){ ?> style="display:none;" <?php } ?>>
		<i class="fa fa-thumbs-up"></i><a href="javascript:void(0);"><?php echo COUNT($count_like_one); ?></a>
		
	  </div>		
											</div>
											<?php 
			$numb = 2;
	 $offset_comment = 0;	 
	  $var_types = 1;
	  
	  $sort_columnss = array();
		$sort_orders = 'asc';
		$sort_bys = 'comments.comment_id';
		$cmt = $this->Common_model->getAllJoin($numb, $offset_comment, array('comments.post_id' => $post->post_id),$var_types, 'comments', 'user_id', 'users', 'id',$sort_bys, $sort_orders, $sort_columnss, 'users.id,users.username,comments.comment_id,comments.content,comments.comment_date,users.image');         
			
			?>
											<div class="col-sm-6 text-right">
											
												<?php if($cmt['num_rows'] != '0'){ ?><a href="javascript:void(0);"><?php echo $cmt['num_rows']; ?> comment</a><?php } ?>
												  <?php
	       $count_share_one = $this->Common_model->jointwotable('post_share', 'user_id', 'users', 'id',array('post_id' => $post->post_id),'users.id,users.username,post_share.share_id');
       
	   ?>											
                          <div id="sharecountbox-<?php echo $post->post_id; ?>" data-likecount="<?php echo COUNT($count_share_one); ?>" class="pst-like-sec" <?php if(COUNT($count_share_one) == 0){ ?> style="display:none;" <?php } ?>>
		                        <a href="javascript:void(0);"><?php echo COUNT($count_share_one); ?> share</a>
	                        </div>	
											</div>	
										</div>										
									</div>
									 
									<div class="like-share">
                                    <div id="cmtid-<?php echo $post->post_id; ?>">
									<div id="cmtid2-<?php echo $post->post_id; ?>">									
										<?php if($liker){ ?>
										<a href="javascript:void(0);" class="dislike" id="likerr-<?php echo $post->post_id; ?>" data-postid="<?php echo $post->post_id; ?>" ><i class="fa fa-thumbs-up"></i> Dislike</a> 
										<?php }else{ ?>
										<a href="javascript:void(0);" class="like_post" data-postid="<?php echo $post->post_id; ?>" id="like-<?php echo $post->post_id; ?>"><i class="fa fa-thumbs-up"></i> Like</a> 
										<?php } ?>
										<a style="display:none" href="javascript:void(0);" class="like_post" id="disliker-<?php echo $post->post_id; ?>" data-postid="<?php echo $post->post_id; ?>" id="like-<?php echo $post->post_id; ?>"><i class="fa fa-thumbs-up"></i> Like</a> 
										<a style="display:none" href="javascript:void(0);" class="dislike" id="liker-<?php echo $post->post_id; ?>" data-postid="<?php echo $post->post_id; ?>" ><i class="fa fa-thumbs-up"></i> Dislike</a>
										<a href="javascript:void(0);" <?php if(!empty($cmt['rows'])){ ?> class="commnent_box" <?php }else{ ?> class="commnent_boxs commnent_box" <?php } ?> id="comment-<?php echo $post->post_id; ?>" data-postid="<?php echo $post->post_id; ?>"><i class="fa fa-comment"></i> Comment</a>
										<a href="javascript:void(0);" class="sharPost" data-postid="<?php echo $post->post_id; ?>" id="share_post-<?php echo $post->post_id; ?>"><i class="fa fa-share"></i> Share</a>								
										         <?php 
									if(!empty($cmt['rows'])){?>
									<div class="main-cmt-box" id="main-cmment-id-<?php echo $post->post_id; ?>">
								<?php foreach($cmt['rows'] as $cmt_value){ ?>
									<div class="post-header cmt-head">
										<div class="post-thumb">
											<img src="<?php echo $img; ?>" class="img-responsive"> 
										</div>	
										<div class="write">
											<h4><?php echo ucwords($cmt_value->username); ?></h4>
											<p><?php echo $cmt_value->content; ?></p>
											<p class="date"><?php echo convert_time($cmt_value->comment_date,'F j, Y, g:i a'); ?></p>
											
										</div>
									</div>
									 
									<?php }if($cmt['num_rows'] > count($cmt['rows'])){ ?>
									<a href="javascript:void(0);" data-frnd="1" data-postid="<?php echo $post->post_id; ?>" class="rdmorecom" >Read More</a>
						<?php } ?>
									</div>
									<input class="cnt-writ-div submit_on_enter" id="cmt-<?php echo $post->post_id; ?>" name="cmt_box" placeholder="Write a comment.." data-postid="<?php echo $post->post_id; ?>" type="text" contenteditable="true">
									<?php } ?>
									<span class="open_comment_box-<?php echo $post->post_id; ?>" data-postid="<?php echo $post->post_id; ?>" style="display:none;">
								      <input class="cnt-writ-div submit_on_enter" id="cmt-<?php echo $post->post_id; ?>" name="cmt_box" placeholder="Write a comment.." data-postid="<?php echo $post->post_id; ?>" type="text" contenteditable="true">
								    </span>
									</div>							
								</div>
								</div></div>
								<?php }}?>								