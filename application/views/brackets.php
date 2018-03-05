
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.bracket.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.json-2.3.min.js"></script>

<?php 
if($this->uri->segment('3')){
				  $q = $this->Common_model->getsingle('brackets',array('tournament_id' => $this->uri->segment('3')));
				 $json = $q->json;
				
				 
  if(!empty($json))
    echo '<script type="text/javascript">var autoCompleteData = '.$json.' </script>';
  else
    echo '<script type="text/javascript">var autoCompleteData = {
    teams : [["Devon", ""],["", ""]], results : []}</script>';
}
else
    echo '<script type="text/javascript">var autoCompleteData = {
    teams : [["Devon", ""],["", ""]], results : []}</script>';



 ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/brackets.js"></script>

<?php /*?><script type="text/javascript" src="js/brackets-rd.js"></script><?php */?>



<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.bracket.css" />




<div id="autoComplete"></div>

<script>
   $(document).ready(function() { 
    $('#autoComplete').bracket({ 
      init: autoCompleteData,
      save: saveFn,
      decorator: {edit: acEditFn,
                  render: acRenderFn}})
  })
</script>