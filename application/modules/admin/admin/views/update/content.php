<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('admin/update').'/'.$this->uri->segment(3);?>' class="form form-horizontal" >
        
       <?php $query = core::get_where('admin','gammu',array('id' => $this->uri->segment(3)),1); ?>
<?php $row = $query->row_array();?>
<input type='hidden' name='id' value='<?php echo $row['id'];?>' >
<!-- start username -->
<div class='control-group <?php echo form_error('username') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Username</strong></label>
<div class='controls'>
<input type='text' name='username' class='span5' value='<?php echo $row['username'];?>' placeholder='username' required>
<?php echo form_error('username'); ?></div>
</div>
<!-- end username -->

<!-- start created -->
<div class='control-group <?php echo form_error('created') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Created</strong></label>
<div class='controls'>
<input type='text' name='created' class='span5' value='<?php echo $row['created'];?>' placeholder='created' required>
<?php echo form_error('created'); ?></div>
</div>
<!-- end created -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('admin');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-warning"><i class='fa fa-edit'></i> Update</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>