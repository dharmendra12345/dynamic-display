<?php include(dirname(__FILE__)."/include/left_sidebar.php"); ?>
  
      <div class="warper container-fluid prtnr_chat">     
	  <div class="page-header"><h1>Participant Chat</h1></div>	
	  <div class="panel panel-default">          
	      
	  <div class="panel-body">                        
	  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">       
	  <thead>         
	  <tr>       
	  <th>#</th>
      <th>Sender name</th>
      <th>Receiver name</th>	  
	  <th>Chat</th>     
	  <th>Date</th>	           
	  </tr>                
	  </thead>             
	  <tbody>				
	  <?php                
	  if(!empty($participant_chat)){	
	  $i=1;
	  foreach($participant_chat as $val) { 
	  $senderwhere = 'id='.$val->send_participate;
      $senderuser = $this->Common_model->getsingle('users',$senderwhere);
      $receiverwhere = 'id='.$val->reciver_participate ;
      $receiveruser = $this->Common_model->getsingle('users',$receiverwhere);	   
	  ?>     
	  <tr class="odd gradeX">  
      <td><?php echo $i++; ?></td>	  
      <td><?php echo $senderuser->username; ?></td> 
      <td><?php echo $receiveruser->username; ?></td>
      <td><?php echo $val->message; ?></td>	  
	  <td><?php echo date('l,jS F  Y', strtotime($val->sent_on )); ?></td>
	  
	   </tr>			
	  <?php }} ?>          
	  </tbody>                 
	  </table>              
      </div>       
	  </div>        
	  </div>   
	  
	     <script>
$(document).ready(function() {	
 $('#basic-datatable').dataTable({
    "order": []
 });
});
</script>
	  <style>
	  td.highlited{background-color: #C42121 !important;
	  color: #fff !important; border: 1px solid #FFF !important;}
	  td.highlited a{color: #fff !important;	}
	  .add_title {
		  background: #FF404B;
		  padding: 12px;
		  margin-right: 15px;
		  font-size: 13px;
		  font-weight: 100;
		  color: #fff;
		  letter-spacing: 1px;
		  border-radius: 4px;
	  }</style>		