<div class='row-fluid'>
<div class="span12">
  <?php echo $this->load->view('_layouts/menus');?>
  
  
        <table class='table table-striped table-bordered table-hover table-condensed'>
<tbody><?php foreach (core::get_where('admin','gammu',array('id' => $this->uri->segment(3)),1)->result() as $row) { ; ?>
<tr><td>id</td>
<td><?php echo $row->id;?></td></tr>
<tr><td>username</td>
<td><?php echo $row->username;?></td></tr>
<tr><td>email</td>
<td><?php echo $row->email;?></td></tr>
<tr><td>password</td>
<td><?php echo $row->password;?></td></tr>
<tr><td>created</td>
<td><?php echo $row->created;?></td></tr>
<tr><td>modified</td>
<td><?php echo $row->modified;?></td></tr>
<?php } ?></tbody></table>
        
</div>
</div>