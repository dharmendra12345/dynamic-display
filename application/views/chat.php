<link rel="stylesheet" href="<?php echo base_url();?>chat_assets/chat.css">
<script type="text/javascript" src="<?php echo base_url();?>chat_assets/jquery.form.js"></script>
<script>                        Array.remove = function(array, from, to) {                var rest = array.slice((to || from) + 1 || array.length);                array.length = from < 0 ? array.length + from : from;                return array.push.apply(array, rest);            };                var intervalIds='';            /*this variable represents the total number of popups can be displayed according to the viewport width */            var total_popups = 0;                        /*arrays of popups ids*/            var popups = [];						var intervalIds = [];                    /*this is used to close a popup */            function close_popup(id,mainid)            {



clearInterval(intervalIds[mainid]);							 			                 for(var iii = 0; iii < popups.length; iii++)                {                    if(id == popups[iii])                    {                        Array.remove(popups, iii);                                                /*document.getElementById(id).style.display = "none";*/

$("#"+id).fadeOut( "slow" , function (){

$("#"+id).css({display:"none"});

} );                                             calculate_popups();                                                return;                    }                }  }                    /*displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width */            function display_popups()            {     var right = 220;                                var iii = 0;                for(iii; iii < total_popups; iii++)                {                    if(popups[iii] != undefined)                    {                        var element = document.getElementById(popups[iii]);                        element.style.right = right + "px";  right = right + 300;                        element.style.display = "block";                    }                }                                for(var jjj = iii; jjj < popups.length; jjj++)                {                    var element = document.getElementById(popups[jjj]);                    element.style.display = "none";                }            }            /*for click the input type file;*/		 function chang_image(mainid){									document.getElementById("file"+mainid).click();								  }			            /*creates markup for a new popup. Adds the id to popups array. */            function register_popup(id,mainid, name)            {                                for(var iii = 0; iii < popups.length; iii++)                {                       /*already registered. Bring it to front. */                    if(id == popups[iii])                    {                        Array.remove(popups, iii);                                            popups.unshift(id);                                                calculate_popups();                                                                        return;                    }                }				               intervalIds[mainid] = setInterval( function() { getMessages(mainid); }, 2000 ); 

scroll_botom(mainid);

			   			  /* getMessages(mainid);*/				                var element = '<div class="popup-box chat-popup popup-box'+mainid+' normal" id="'+ id +'">';                element = element + '<div class="popup-head">';                element = element + '<div class="popup-head-left">'+ name +'</div>';                element = element + '<div class="popup-head-right"><a id="minmize'+mainid+'" onclick="minimize('+mainid+','+id+');" class="myminimize">---</a><a href="javascript:close_popup(\''+ id +'\',\''+ mainid +'\');" >&#10005;</a></div>';			element = element + '<div style="clear: both"></div></div><div class="popup-messages" id="msgdata'+mainid+'" ><img src="<?php echo base_url();?>chat_assets/img/loader.gif" id="loader'+mainid+'"></div><div id="progressbox'+mainid+'"><div id="progressbar'+mainid+'"></div ><div class="progres" style="display:none;" id="statustxt'+mainid+'" >0%</div ></div><div class="mymessage"><textarea id="chatMsg'+mainid+'" placeholder="Type your message then Enter to send" class="msg" onkeypress="keyboard_bind('+mainid+',event);"></textarea><input type="button" style="visibility:hidden;" id="searchButton'+mainid+'" onclick="send_message('+mainid+');"><a class="button" onclick="chang_image('+mainid+');" style="cursor:pointer;" id="photo_'+mainid+'" title="Type in a message and choose image to send"><img src="<?php echo base_url();?>chat_assets/img/camera.png" ></a></div></div><form style="visibility:hidden;" id="UploadForm'+mainid+'" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>chat/processupload"><input type="file" onchange="upload_img('+mainid+');" id="file'+mainid+'" name="ImageFile" accept="image/*" ><input type="hidden" name="reciver_id" value="'+mainid+'"></form><input type="hidden" id="offset'+mainid+'" value="0"><input type="hidden" id="limit'+mainid+'" value="15">'; document.getElementsByClassName("chatarea")[0].innerHTML = document.getElementsByClassName("chatarea")[0].innerHTML + element;
/*window.document.body.insertAdjacentHTML('afterbegin',document.getElementsByTagName("body")[0].innerHTML+element);*/




/* getMessages(mainid); */				                  			      /* getMessages(id); */
popups.unshift(id);                                        calculate_popups();				                            }                        /*calculate the total number of popups suitable and then populate the toatal_popups variable. */            function calculate_popups()            {                var width = window.innerWidth;                if(width < 540)                {                    total_popups = 0;                }                else                {                    width = width - 200;                                        total_popups = parseInt(width/320);                }                                display_popups();                            }                        /*recalculate when window is loaded and also when window is resized. */            window.addEventListener("resize", calculate_popups);            window.addEventListener("load", calculate_popups);            			function send_message(id){								var  msg = document.getElementById("chatMsg"+id).value;								msg = msg.replace(/\s+/g, ' ');							 if(msg != " " && msg !=""){				    $.ajax({					  url: '<?php echo base_url();?>chat/add_msg',					  method: 'post',					  data: {msg: msg,id:id},					  success: function(data) {						  						/*$("#loader"+id).css('display','none'); */					     document.getElementById("chatMsg"+id).value ='';					  }					});				 }			}						function getMessages(id){								 var offset = document.getElementById('offset'+id).value;				 var limit = document.getElementById('limit'+id).value;				 				    $.ajax({						url: '<?php echo base_url();?>chat/get_messages',						method: 'GET',						data: {id:id,offset:offset,limit:limit},						beforeSend: function() { 					                            /* $("#loader"+id).css('display','block'); */						                                               },						success: function(data) {														document.getElementById('msgdata'+id).innerHTML = data;												/*document.getElementById('msgdata'+id).innerHTML = data; */		






				}						});			}									setInterval( function() { getmsgstatus(); }, 2000 );						function getmsgstatus(){								 						$.ajax({						url: '<?php echo base_url()?>chat/get_messages_status',						method: 'GET',												success: function(data) {														if(data !=''){						var myArray = data.split('-') ;						                           register_popup('1',myArray[0], myArray[1]); 						  }						}						});										}			/*function chang_image(id){								document.getElementById("file"+id).click();							}*/	setInterval( function() { GetLoginStatus(); }, 2000 );		
function GetLoginStatus(){								 						$.ajax({						url: '<?php echo base_url();?>chat/getloginstatus',						success: function(data) {						document.getElementById('display_user').innerHTML = data;						}						});														}								function keyboard_bind(mainid,e){												if(e.keyCode===13){										document.getElementById("searchButton"+mainid).click();	$("#msgdata"+mainid).animate({						scrollTop: $('.scroll_botom'+mainid).offset().top		}, 1000);											}						}			  				      function upload_img(mainid){								image_form_submit(mainid);				 $("#UploadForm"+mainid).submit();							}														function image_form_submit(mainid){	        				var progressbox     = $('#progressbox'+mainid);        var progressbar     = $('#progressbar'+mainid);        var statustxt       = $('#statustxt'+mainid);        var submitbutton    = $("#SubmitButton"+mainid);        var myform          = $("#UploadForm"+mainid);        var output          = $("#output"+mainid);        var completed       = '0%';		                $(myform).ajaxForm({                    beforeSend: function() { 					                            submitbutton.attr('disabled', '');                         statustxt.empty();                        progressbox.slideDown();                         progressbar.width(completed);                         statustxt.html(completed);                        statustxt.css('display','block');                         statustxt.css('color','red');                         progressbox.css('display','block');                     },                    uploadProgress: function(event, position, total, percentComplete) {                         progressbar.width(percentComplete + '%');                         statustxt.html(percentComplete + '%');                         if(percentComplete>50)                            {                                statustxt.css('color','red');                             }                        },                    complete: function(response) {                      						statustxt.css('display','none');                        myform.resetForm();                          submitbutton.removeAttr('disabled');                        /* progressbox.slideUp();  hide progressbar */                    }            });       															}				function load_er(id){		document.getElementById("laod_er_data"+id).innerHTML='<img src="<?php echo base_url();?>chat_assets/img/msg_loader.gif">';		document.getElementById("laod_er_data"+id).onclick = false;				var offser_val = document.getElementById("offset"+id).value;		offser_val= parseInt(offser_val)+15; 				var limit_val = document.getElementById("limit"+id).value;		limit_val= parseInt(limit_val)+15;				document.getElementById("limit"+id).value = limit_val;				document.getElementById("offset"+id).value = offser_val;			} 
function minimize(mainid,id){

var main = document.getElementById(id);

var  classes = main.className; 
var myclass = classes.split(' ');

if(myclass[3]=="normal") {

$("#"+id).removeClass("normal",500);
$("#"+id).addClass("minactive",1000);
}
else{
$("#"+id).addClass("normal",500);
$("#"+id).removeClass("minactive",500);
}



}


function scroll_botom(id){

setTimeout(function(){  
 
 /*$("#msgdata"+id).scrollTop($("#msgdata"+id)[0].scrollHeight);*/
 
  $("#msgdata"+id).scrollTop($('.scroll_botom'+id).offset().top );  

}, 2300);

}
</script>


<div id="bodyDiv">
<div id="display_user"> </div>
</div>
