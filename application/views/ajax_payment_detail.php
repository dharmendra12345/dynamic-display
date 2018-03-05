<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">      
   <thead>             
   <tr>                
   <th>#</th>              
   <!--<th>Name</th> -->               
   <th>Transaction Id</th>			
   <th>Payment</th>
   <th>Currency</th>
   <th>Payment Status</th>   
   </tr>                         
   </thead>                      
   <tbody>						
   <?php                         
   if(!empty($checkboxData)){  
   $i=1;
   foreach($checkboxData as $val) {
    $users = $this->Common_model->getsingle('users',array('id' => $val->id));
   ?>  
   <tr class="odd gradeX">   
   <td><?php echo $i++; ?></td>
   <!--<td><?php //echo $users->username; ?></td>-->      
   <td><?php echo $val->txn_id; ?></td>				
   <td><?php echo $val->payment_gross; ?></td>
   <td><?php echo $val->currency_code; ?></td>
   <td><?php echo $val->payment_status; ?></td>          
   </tr>					
   <?php }} ?>                            
   </tbody>                   
   </table> 