<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/crop/css/imgareaselect-default.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/crop/jquery.imgareaselect.pack.js"></script>
<style>
.img_select{
height:50px;
width:50px;
}
.img_div{
padding:5px;
}
output {
    display: block;
    padding-top: 7px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    float: left;
    width: 100%;
}
</style>
<script>
window.onload = function(){
   
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
		
        var filesInput = document.getElementById("post_videos");
        
        filesInput.addEventListener("change", function(event){
            $("#result").empty();
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
				
                if(file.type.match('image') && file.size >= (1048576*3) ){
					alert('Please select valid file size image');
					continue;
				}
				
				if(file.type.match('video') && file.size >= (1048576*20) ){
					alert('Please Upload video less than 20MB');
					continue;
				}
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                   
                    var div = document.createElement("div");
                    div.className = "pull-left img_div";
                    div.innerHTML = "<img class='img_select' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
	
} 

</script>

<!--Sign form-->
<div class="modal fade add-game add_game_pop" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-close"></span>
                    </button>
        <div class="loginmodal-container select-account">
            <h3>Add gameaccount</h3>
            <form id="game_account" method="post" >
			<div class="eror"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="select">
                            <lable>Select game</lable> 
                        </div>
                        <div class="select-style">
	                        <select name="game_id" id="gamid">
							
	                            <option value=""></option>
								<?php foreach($games as $gam){ ?>
								
								 <option value="<?php echo $gam->id?>" ><?php echo $gam->game_name;?></option>
								 <?php } ?>
	                           
	                        </select>
                    	</div>
                    </div>
                </div>

                <div class="input-filed1">
                   <lable>Account name</lable>
                    <div class="input-append">
                        <input type="text" id="accountname" name="accountname" placeholder="">
                    </div>
					<div class="suc">
					</div>
                </div>                
                 
                <div class="add-game text-center">
                    <button type="submit" class="btn btn-primary join-this">Add new gameaccount</button>    
                </div>          
            </form>

        </div>
    </div>
</div>
<!--End sign up-->

<section>
	<div class="profile-page">
		<div class="container">
			<div class="row">
				<div class="profile-viwe">
					<div class="cover-page">
						<div class="cover-box">
						
							<div class="col-sm-4 col-md-3">
								<div class="profile-img-set">
									<div class="profile-img">
									
									      <?php if($user->image!=''){
										    $img =base_url().'user_image/'.$user->image;
										   }else{
										   $img = base_url()."assets/images/no-image.png";
										   } ?>
										<img src="<?php echo $img;?>" class="img-responsive">
									</div>	
									<div class="edit"><p>
									<a href="javascript:void(0);" id="file_uplaod"><i class="fa fa-camera"></i> Change Picture</a>
									<!--<input id="image" name="image" type="file" required style="float: left;opacity: 0;width:5px;">-->
									</p></div>
								</div>
							</div>
							<?php $user_detail = $this->Common_model->getsingle('users',array('id' => $this->session->userdata('userid'))); ?>
							<div class="col-sm-8 col-md-8">
								<div class="profile-name">
									<h2><?php echo ucwords($user_detail->username); ?> <img src="assets/images/flag.png"></h2>	
								</div> 
							</div>	
						</div>

						<div class="profile-footer">
							<div class="col-sm-4 col-md-3"></div>
							<div class="col-sm-8 col-md-8">
								<div class="friend-count">
<?php 
    $where_friend = "(friends.friend_user_id = ".$this->session->userdata('userid')." or friends.user_id = ".$this->session->userdata('userid').") and request_status = 1";
	$query_friend = $this->Common_model->jointwotable('friends','friend_user_id','users','id',$where_friend,'users.username,friends.friend_user_id,friends.user_id,friends.friend_id');
 
 ?>
                    <p>Friends<span><?php if(!empty($query_friend)){ echo count($query_friend); }else{ echo '0';} ?></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4" >
    
            <div class="left-pro">
                <div class="pro-list p-b-40">
                    <div id="reload_about1"><div id="reload_about2"><h5><?php echo $user_detail->about_me; ?> <input type="text" name="edit_comment" value="<?php echo $user_detail->about_me; ?>" id="edit_comment" class="update_on_enter" style="display:none;" /><button id="edit_button" style="display:none;" class="btn-default">Update</button><button id="edit_text" class="btn-default">Edit text</button></h5></div></div>
                    <ul>
                        <li>Tournaments entered 112</li>
                        <li>Tournaments won 110 <button class="btn-default">Hide start</button></li>
                    </ul>
                </div>	
                <div class="pro-list">
                    <ul>
                        <li><a href="" data-toggle="modal" data-target="#login-modal">Add gameaccount  <i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>
        
        </div>
        <div id="post1">
                <div id="post2">
        <div class="col-sm-8">
            <div class="post" id="main-post-sec">
            <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                <div class="post-box">
                    <div class="post-editing">
                        <ul>										
                            <li><a href="javascript:void(0);" data-target="#status" data-toggle="modal"><i class="pencil"></i> Status</a>	</li>
                            <li><a href="javascript:void(0);" id="video" class="picture"><i class="camera">					</i> Photo / video</a></li>
                            <input type="file" name="file[]" id="post_videos" multiple style="display:inline;opacity: 0;width:5px;" />
                           <output id="result" />
						   <?php /* ?><li class="dropdown pull-right">
                                <!--<img src="assets/images/profile.jpg">-->
                                <img src="<?php echo base_url(); ?>user_image/<?php echo $user_detail->image; ?>" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"> <i class="fa fa-pencil"></i>
                                    Edit Post</a></li>
                                    <li><a href="#"><i class="fa fa-trash-o"></i> Delete Post</a></li>
                                    <li><a href="#"><i class="fa fa-cog"></i> Change Setting</a></li>
                                </ul>
                            </li><?php */ ?>
                        </ul>								
                    </div>

                    
                    <div class="post-box-id">
                        <div class="post-thumb">
                             <?php if($user->image!=''){
                            $img =base_url().'user_image/'.$user->image;
                           }else{
                           $img = base_url()."assets/images/no-image.png";
                           } ?>										
                            <img src="<?php echo $img; ?>" class="img-responsive"> 
                        </div>	
                        <div class="write">
                            <textarea name="what_new" class="text-area-main" value="" placeholder="Write something on this page"></textarea>
                            <button name="submit" type="submit" id="postdata"  class="btn  pull-right">Post</button>
                                        </div>
                        
                    </div>									
                </div>	
                </form>
								
								<!--------------------------------------Edit status------------------------------- -->
<div class="modal fade add-status" id="status" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
            <div class="modal-content">
                               
                
                <!-- Modal Body -->
                <div class="modal-body">
                
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div class="post-box">
                        <div class="post-editing">
                            <ul>										
                                <li><a href="javascript:void(0);" data-target="#status" data-toggle="modal"><i class="pencil"></i> Status</a>	</li>
                                <li><a href="javascript:void(0);" id="video" class="picture"><i class="camera"> </i> Photo / video <input type="file" name="file[]" id="post_videos" multiple style="display:inline;opacity: 0;" /></a></li>
                                
                                <?php /* ?><li class="dropdown pull-right">
                                    <!--<img src="assets/images/profile.jpg">-->
                                    <img src="<?php echo base_url(); ?>user_image/<?php echo $user_detail->image; ?>" >
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"> <i class="fa fa-pencil"></i>
                                        Edit Post</a></li>
                                        <li><a href="#"><i class="fa fa-trash-o"></i> Delete Post</a></li>
                                        <li><a href="#"><i class="fa fa-cog"></i> Change Setting</a></li>
                                    </ul>
                                </li><?php */ ?>
                                <button type="button" class="close" 
                                   data-dismiss="modal">
                                       <span aria-hidden="true">&times;</span>
                                       <span class="sr-only">Close</span>
                                </button>
                            </ul>								
                        </div>

                        
                        <div class="post-box-id">
                            <div class="post-thumb">
                                 <?php if($user->image!=''){
                                $img =base_url().'user_image/'.$user->image;
                               }else{
                               $img = base_url()."assets/images/no-image.png";
                               } ?>										
                                <img src="<?php echo $img; ?>" class="img-responsive"> 
                            </div>	
                            <div class="write">
                                <textarea name="what_new" class="text-area-main" value="" placeholder="Write something on this page"></textarea>
                                <button name="submit" type="submit" id="postdata"  class="btn  pull-right">Post</button>
                                            </div>
                            
                        </div>									
                    </div>	
                </form>
				<!--<button type="submit" data-post-id = "<?php echo $post->post_id; ?>" name="editpost_submit" id="editpost_submit" class=' btn btn-primary submit-button' style="margin-left:16px;" >Submit</button>
			 	<button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>	-->	
			</div>
        </div>
    </div>
</div>

<!--------------------------------Edit status------------------------------------ -->

								
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
			
			  
			<button type="submit" data-post-id = "<?php echo $post->post_id; ?>" name="editpost_submit" id="editpost_submit" class=' btn btn-primary submit-button' style="margin-left:16px;" >Submit</button>
			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>
			
			
			</div>
        </div>
    </div>
</div>

<!--------------------------------Edit Post------------------------------------ -->


									<div class="post-img">
									<?php 
									    $string = $post->post_title;
									    $val_length = str_word_count($string);
										if($val_length > 20){
									?>
										<span id="edit_post_text_<?php echo $post->post_id; ?>">
										<?php $newstr = word_limiter($string, 20); ?>
		
										<div><h3><?php echo $newstr; ?></h3>
										<a href="javascript:void(0)" data-pid="<?php echo $post->post_id; ?>" class="read" >Read More..</a></div>
										<div id="read_more-<?php echo $post->post_id; ?>" style="display:none;"><?php echo $post->post_title; ?></div>
										<?php }else{ 
										 $newstr = word_limiter($string, 20);
		 
		                              echo $newstr;
		   								 } ?>
										</span>
										
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
												<!--<a href="#"><i class="fa fa-thumbs-up"></i> 234</a>-->	
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
												<!--<a href="#">25 share</a>-->
<?php
	       $count_share_one = $this->Common_model->jointwotable('post_share', 'user_id', 'users', 'id',array('post_id' => $post->post_id),'users.id,users.username,post_share.share_id');
       
	   ?>	
 <div id="sharecountbox-<?php echo $post->post_id; ?>" data-likecount="<?php echo COUNT($count_share_one); ?>" class="pst-like-sec" <?php if(COUNT($count_share_one) == 0){ ?> style="display:none;" <?php } ?>>
		                        <a href="javascript:void(0);"><?php echo COUNT($count_share_one); ?> share</a>
	                        </div>	   
											</div>	
										</div>										
									</div>
									<?php //$cmt = $this->Common_model->jointwotable('comments', 'user_id', 'users', 'id',array('comments.post_id' => $post->post_id),'users.id,users.username,comments.comment_id,comments.content,comments.comment_date,users.image');?>
	        
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
										
										<!--<a href="#"><i class="fa fa-thumbs-up"></i> Like</a> -->
										<a href="javascript:void(0);" <?php if(!empty($cmt['rows'])){ ?> class="commnent_box" <?php }else{ ?> class="commnent_boxs commnent_box" <?php } ?> id="comment-<?php echo $post->post_id; ?>" data-postid="<?php echo $post->post_id; ?>"><i class="fa fa-comment"></i> Comment</a>
										<a href="javascript:void(0);" class="sharPost" data-postid="<?php echo $post->post_id; ?>" id="share_post-<?php echo $post->post_id; ?>"><i class="fa fa-share"></i> Share</a>								
										                     <?php 
									if(!empty($cmt['rows'])){ ?>
									<div class="main-cmt-box" id="main-cmment-id-<?php echo $post->post_id; ?>">
									<?php $tot_cmt = COUNT($cmt); foreach($cmt['rows'] as $cmt_value){ ?>
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
						<?php }
						?>
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
								<!--    post area     -->
							</div>
						</div>	
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	

	  <div class="container chatarea " >
	  
	 </div>
	</section>
<!-- popupp for -->
<div class="modal fade bs-example-modal-lg" data-backdrop="static" data-keyboard="false" id="loadermodal_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
		    <div class="modal-header">
				  <form name="thumbnail" method="post">
				<input type="hidden" value="400" id="img_height" />
				<input type="hidden" value="450" id="img_width" />
				<input type="hidden" name="x1" value="163" id="x1" />
				<input type="hidden" name="y1" value="100" id="y1" />
				<input type="hidden" name="x2" value="310" id="x2" />
				<input type="hidden" name="y2" value="247" id="y2" />
				<input type="hidden" name="w" value="147" id="w" />
				<input type="hidden" name="h" value="147" id="h" />
				<input type="hidden" value="" id="image_name" />
				<input type="button" class="btn" name="upload_thumbnail" style="display:none;" value="Save" id="save_thumb" />
			      </form>
			
			
			     <button class="btn" id="temp_img_upload">Upload Image</button>
			
                <button type="button" onclick="javascript:location.reload();" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
           
            </div>
            <div class="modal-body"  id="model_bodey"> 

			       
			      <form id="upload_img" action="<?php echo base_url(); ?>Crop/imgs_upload/" method="post" enctype="multipart/form-data">
				  
				  
				  
				  <input type="file" style="display:none" class="btn" name="files" id="files" style="" />
				  
				  </form>
				 
               <img  id="main_image" class="img-responsive profile_pic">
			</div>
        </div>
    </div>
</div>	
<?php 
       $thumb_width = 170;
	   $thumb_height = 170;
 ?>
<script>
$("#temp_img_upload").on("click",function(){
   $("#files").trigger("click");
});
$('#file_uplaod').click(function(e)
	{
		$("#loadermodal_profile").modal('show');
	  });
	
	
	$("#files").on('change',function(){
	  $("#upload_img").submit();
	})
	
	
	
	$("#upload_img").on('submit',(function(e) 
	   {  
	     
		e.preventDefault();		
		 
		$.ajax
		({
			url: "<?php echo base_url(); ?>imgs_upload",
			type: "POST",             
			data: new FormData(this), 
			dataType: "json",
			contentType: false,       
			cache: false,             
			processData:false,        
			success: function(data)   
			{
				if(data.success==true){
				
					$("#files").css("display","none");
					$("#temp_img_upload ").css("display","none");
					$("#save_thumb").css("display","block");
				 $("#main_image").attr('src',data.message);
				     document.getElementById('image_name').value=data.image_name;
					 document.getElementById('img_height').value=data.height;
					 document.getElementById('img_width').value=data.width;
					 
					 $('#main_image').imgAreaSelect({ x1: 163, y1: 100, x2: 310, y2: 247, aspectRatio: '1:<?php echo $thumb_height/$thumb_width;?>', onSelectChange: preview });
				}else{
				
				 alert(data.message);
				}				
			}
	    });
	}));
	
   function preview(img, selection) {  
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
	var height1 = document.getElementById('img_height').value;
	var width1 = document.getElementById('img_width').value;
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * width1) + 'px', 
		height: Math.round(scaleY * height1) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1
	);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("You must make a selection first");
			return false;
		}else{
			 submit_form();
		}
	});
	
 

}); 


function submit_form(){
	
	var x1 = document.getElementById("x1").value;
	var x2 = document.getElementById("x2").value;
	var y1 = document.getElementById("y1").value;
	var y2 = document.getElementById("y2").value;
	var h = document.getElementById("h").value;
	var w = document.getElementById("w").value;
	var image_name = document.getElementById("image_name").value;
	
	
	
	   $.ajax({
		    type:'POST',
            url: "<?php echo base_url().'Crop/add_crop_image'; ?>",
            data:({x:x1,xx:x2,y:y1,yy:y2,h:h,w:w,image_name:image_name}),
			dataType:'html',
            success:function(data){
				
			   
			 location.reload();
			 }	
		    })		
			
	
}

 $(document).ready(function (e) 
  {
	$(window).scroll(function()
	{
		scrollMore();
	});
	$(document).on('submit','#uploadimage',function(e)
	{
	
	    $("#loadermodal").modal('show');
		e.preventDefault();		
		$("#message").empty();
		$('#loading').show();
		$.ajax
		({
			url: "<?php echo base_url(); ?>Welcome/upload_video",
			type: "POST",             
			data: new FormData(this), 
			dataType: "json",
			contentType: false,       
			cache: false,             
			processData:false,        
			success: function(data)   
			{
				//alert(data);
				 //$("#post2").load(location.href + " #post1");
				 if(data.code == '100'){
				 location.reload();
				 }else if(data.code == '200'){
					alert(data.message); 
				 }
			}
	    });
	});
	
	 });
	
	function scrollMore()
{
  if($(window).scrollTop() == ($(document).height() - $(window).height()))
  {
	$(window).unbind("scroll");
	var records = '<?php echo $count_total;?>';
	
	var offset = $('[id^="myData_"]').length;
	
	  if(records != offset)
	  {  
		$('#main-post-sec').append('<img id="loader_img" style="width:50px" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" />');
		loadMoreData(offset);
	  }
  } 
}

  function loadMoreData(offset)
  {
	
	$.ajax({
		type: 'post',
		async:false,
		url: '<?php echo base_url(); ?>Welcome/get_offset/',
		data: 'offset='+offset,
		success: function(data)
		{		
			//$("#loaderImg").empty();
			//$("#loaderImg").hide();
			$('#main-post-sec').append(data);
			$('#loader_img').remove();
		},
		error: function(data)
		{
		  alert("ajax error occured…"+data);
		}
	}).done(function()
	{	
	    //getliveurl();
		$(window).bind("scroll",function()
		{
		
		   scrollMore();	
	    });
	});
}
$('#video').click(function(e)
	{
	   e.preventDefault();
	   $("#post_videos").trigger("click"); 
    });

$(document).on('click','#edit_text',function(e)
	{
	   e.preventDefault();
	   $("#edit_comment").show(); 
	   $("#edit_text").hide();
	   $("#edit_button").show();
    });	
	
	$(document).on('click','#edit_button',function(e)
	{
	
  e.preventDefault();
 
   var edit_comment  = $('#edit_comment').val();    
   $.ajax 
    ({
      url: "<?php echo base_url(); ?>Welcome/update_about",
      type: "POST",             
      data: "edit_comment=" + edit_comment,
      //dataType: "json",               
      success: function(response)   
      {
		 
		 $("#reload_about2").load(location.href + " #reload_about1");
      }
      });
   //}
 }); 
 
 

 
 $(document).on('click','#editpost_submit',function(){ 
        var post_id = $(this).attr('data-post-id');      
	    var value = $('#edit_post_'+ post_id).val();		
			$.ajax 
		({
			url: "<?php echo base_url(); ?>Welcome/change_post",
			type: "POST",             
			data: "value=" + value + "&post_id=" + post_id,
            dataType: "json", 			
			success: function(response)   
			{
				if(response.success)
				{
				   $('#edit_post_text_'+ post_id).text(value);
				   $("#editPost_"+ post_id).modal('hide');
				}
			}
	    });
	 
 });
  $(document).on('click','.removepostdel',function(){
		 if(confirm('Are you sure you want to delete this post?')){
		    var postid = $(this).attr('data-postid');
			$.post("<?php echo base_url().'Welcome/deletepost'; ?>",  
			{postid: postid },
					function(response){ 
						  if(response.success){
							  $("#postdetail-"+postid).remove();
						  }
			}, "json");
		 }
		
	});
	
 $(document).on('click','.like_post',function(){
	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>assets/images/url-loader.gif" />');
	 var like = $(this);
	 //alert(like);
     var postid = $(this).attr('data-postid');
	 $.ajax 
		({
			url: "<?php echo base_url(); ?>Welcome/like",
			type: "POST",             
			data: "post=" + postid, 
			dataType: "json",
			success: function(response)   
			{ //alert(response.like);
				// $(".refresh2-"+postid).load(location.href + " .refresh1-"+postid);
               if(response.like == 0){
					   $("#likecountbox-"+postid).hide();
				   }else{
					   $("#likecountbox-"+postid).show();
					   $("#likecountbox-"+postid).find('a').text(response.like);
				   }	
			   $("#loading_img").remove();				
			   $("#liker-"+postid).show();
			   $("#disliker-"+postid).hide();
			   $("#like-"+postid).hide(); 
			}
	    });
 });
 $(document).on('click','.dislike',function(){
	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>assets/images/url-loader.gif" />');
	 var like = $(this);
	//alert(like);
     var postid = $(this).attr('data-postid');
	 $.ajax 
		({
			url: "<?php echo base_url(); ?>Welcome/dislike",
			type: "POST",             
			data: "post=" + postid, 
			dataType: "json",
			success: function(response)   
			{				
			   //$(".refresh2-"+postid).load(location.href + " .refresh1-"+postid);
               $("#loading_img").remove();	
                   if(response.like == 0){
					   $("#likecountbox-"+postid).hide();
				   }else{
					   $("#likecountbox-"+postid).show();
					   $("#likecountbox-"+postid).find('a').text(response.like);
				   }			   
			   $("#disliker-"+postid).show();
			   $("#liker-"+postid).hide();
			   $("#likerr-"+postid).hide(); 
			}
	    });
 });
  $(document).on('click','.sharPost',function(){
	$(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>assets/images/url-loader.gif" />');
	 var share = $(this);	 
     var postid = $(this).attr('data-postid');
	 //alert(postid);
	 $.ajax 
		({
			url: "<?php echo base_url(); ?>Welcome/share",
			type: "POST",             
			data: "post=" + postid, 
			dataType: "json",
			success: function(response)   
			{
			    $("#loading_img").remove();
    
             if(response.count_share_one == 0){
					   $("#sharecountbox-"+postid).hide();
				   }else{
					   $("#sharecountbox-"+postid).show();
					   $("#sharecountbox-"+postid).find('a').text(response.count_share_one+ " share");
				   }		
			}
	    });
	 
 });
 $(document).on('click','.commnent_boxs',function(e)
	{
	   e.preventDefault();
	   var postid = $(this).attr('data-postid');
	   $(".open_comment_box-"+postid).show(); 	  
    });	
 
   $(document).on('keypress','.submit_on_enter',function(event){ 
  
  if (event.keyCode == 13) {
  
  event.preventDefault();
     var postid = $(this).attr('data-postid');
      var comment  = $(this).val();
	 $.ajax 
		({
			url: "<?php echo base_url(); ?>Welcome/comment",
			type: "POST",             
			data: "post=" + postid + "&comment=" + comment, 
			dataType: "json",
			success: function(response)   
			{ 
			 //$("#show-"+post_id).find('.rdmorecom').remove();
				$("#cmtid2-"+postid).load(location.href + " #cmtid-"+postid);
				
			}
	    });
 }
 });
 $(document).on('click','.read',function(){
     var readmore = $(this).attr('data-pid');	
	 $("#read_more-"+readmore).show();
	 $(this).parent().remove();
 });
 
  $(document).on('click','.rdmorecom',function(){ 
	    var offset_comment = $(this).attr('data-frnd');			
		var postid = $(this).attr('data-postid');	
		$(this).remove();
			$.post("<?php echo base_url().'Welcome/get_more_comments'; ?>",  
			{offset_comment: offset_comment,postid: postid},
					function(response){
               if(response.success){
							
							  $("#main-cmment-id-"+ postid).append(response.list);
						  }					
			}, "json");	 
	 });
</script>