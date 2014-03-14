<div class='row-fluid'>
<div class="span12">
  <?php echo $this->load->view('_layouts/menus');?>
  
  
        <table class='table table-striped table-bordered table-hover table-condensed'>
<tbody><?php foreach (core::get_where('pbk_groups','gammu',array('id' => $this->uri->segment(3)),1)->result() as $row) { ; ?>
<tr><td>Name</td>
<td><?php echo $row->Name;?></td></tr>
<tr><td>ID</td>
<td><?php echo $row->ID;?></td></tr>
<?php } ?></tbody></table>
        
</div>
</div>