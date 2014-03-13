<div class='row-fluid'>
<div class="span12">
  <?php echo $this->load->view('_layouts/menus');?>
  
  
        <table class='table table-striped table-bordered table-hover table-condensed'>
<tbody><?php foreach (core::get_where('inbox','gammu',array('id' => $this->uri->segment(3)),1)->result() as $row) { ; ?>
<tr><td>UpdatedInDB</td>
<td><?php echo $row->UpdatedInDB;?></td></tr>
<tr><td>ReceivingDateTime</td>
<td><?php echo $row->ReceivingDateTime;?></td></tr>
<tr><td>Text</td>
<td><?php echo $row->Text;?></td></tr>
<tr><td>SenderNumber</td>
<td><?php echo $row->SenderNumber;?></td></tr>
<tr><td>Coding</td>
<td><?php echo $row->Coding;?></td></tr>
<tr><td>UDH</td>
<td><?php echo $row->UDH;?></td></tr>
<tr><td>SMSCNumber</td>
<td><?php echo $row->SMSCNumber;?></td></tr>
<tr><td>Class</td>
<td><?php echo $row->Class;?></td></tr>
<tr><td>TextDecoded</td>
<td><?php echo $row->TextDecoded;?></td></tr>
<tr><td>ID</td>
<td><?php echo $row->ID;?></td></tr>
<tr><td>RecipientID</td>
<td><?php echo $row->RecipientID;?></td></tr>
<tr><td>Processed</td>
<td><?php echo $row->Processed;?></td></tr>
<?php } ?></tbody></table>
        
</div>
</div>