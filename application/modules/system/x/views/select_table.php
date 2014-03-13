 
<div class='row'>
 <div class='span3'>
  
 <form action='<?php echo base_url();?>x/select_table' method='POST'>
 <strong>Database : </strong>
<input type='text' value='<?php echo $this->session->userdata('database');?>' disabled>
<strong>Pilih Table DB</strong> 
<select class='form-control' name='table'>
<?php
$db = $this->load->database($this->session->userdata('database'),TRUE);
$tables = $db->list_tables();
foreach ($tables as $table) { ?>
   <option value='<?php echo $table;?>'><?php echo $table;?></option>
<?php } ?>
</select><br>

 <a class='btn' href='<?php echo base_url();?>x'>Back</a>
<input type='submit' class='btn btn-default' value='Generate'>
 </form>


 </div>
</div>

<?php if($this->session->flashdata('path_error')){ ?>
<div class='row'>
 <div class='span12'>
<div class='alert alert-error'>Sory cuy, Path Folder ada yang salah ntuh :-p</div>
 </div></div><hr>
<?php } ?>
 