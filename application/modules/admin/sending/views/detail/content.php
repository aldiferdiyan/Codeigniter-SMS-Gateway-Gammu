<div class='row-fluid'>
<div class="span12">
  <?php echo $this->load->view('_layouts/menus');?>
  
  
        <table class='table table-striped table-bordered table-hover table-condensed'>
<tbody><?php foreach (core::get_where('sentitems','gammu',array('id' => $this->uri->segment(3)),1)->result() as $row) { ; ?>
<tr><td>UpdatedInDB</td>
<td><?php echo $row->UpdatedInDB;?></td></tr>
<tr><td>InsertIntoDB</td>
<td><?php echo $row->InsertIntoDB;?></td></tr>
<tr><td>SendingDateTime</td>
<td><?php echo $row->SendingDateTime;?></td></tr>
<tr><td>DeliveryDateTime</td>
<td><?php echo $row->DeliveryDateTime;?></td></tr>
<tr><td>Text</td>
<td><?php echo $row->Text;?></td></tr>
<tr><td>DestinationNumber</td>
<td><?php echo $row->DestinationNumber;?></td></tr>
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
<tr><td>SenderID</td>
<td><?php echo $row->SenderID;?></td></tr>
<tr><td>SequencePosition</td>
<td><?php echo $row->SequencePosition;?></td></tr>
<tr><td>Status</td>
<td><?php echo $row->Status;?></td></tr>
<tr><td>StatusError</td>
<td><?php echo $row->StatusError;?></td></tr>
<tr><td>TPMR</td>
<td><?php echo $row->TPMR;?></td></tr>
<tr><td>RelativeValidity</td>
<td><?php echo $row->RelativeValidity;?></td></tr>
<tr><td>CreatorID</td>
<td><?php echo $row->CreatorID;?></td></tr>
<?php } ?></tbody></table>
        
</div>
</div>