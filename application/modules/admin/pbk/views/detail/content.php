<div class='row-fluid'>
<div class="span12">
  <?php echo $this->load->view('_layouts/menus');?>
  
        <table class='table table-striped table-bordered table-hover table-condensed'>
<tbody><?php foreach (core::get_where('pbk','gammu',array('id' => $this->uri->segment(3)),1)->result() as $row) { ; ?>
<tr><td>ID</td>
<td><?php echo $row->ID;?></td></tr>
<tr><td>GroupID</td>
<td><?php echo $row->GroupID;?></td></tr>
<tr><td>Name</td>
<td><?php echo $row->Name;?></td></tr>
<tr><td>Number</td>
<td><?php echo $row->Number;?></td></tr>
<?php } ?></tbody></table>
        
</div>
</div>