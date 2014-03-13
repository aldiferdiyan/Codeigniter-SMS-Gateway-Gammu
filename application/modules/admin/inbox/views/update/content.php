<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('inbox/update').'/'.$this->uri->segment(3);?>' class="form form-horizontal" >
        
       <?php $query = core::get_where('inbox','gammu',array('id' => $this->uri->segment(3)),1); ?>
<?php $row = $query->row_array();?>
<input type='hidden' name='id' value='<?php echo $row['id'];?>' >
<!-- start UpdatedInDB -->
<div class='control-group <?php echo form_error('UpdatedInDB') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>UpdatedInDB</strong></label>
<div class='controls'>
<input type='text' name='UpdatedInDB' class='span5' value='<?php echo $row['UpdatedInDB'];?>' placeholder='UpdatedInDB' required>
<?php echo form_error('UpdatedInDB'); ?></div>
</div>
<!-- end UpdatedInDB -->

<!-- start Text -->
<div class='control-group <?php echo form_error('Text') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Text</strong></label>
<div class='controls'>
<textarea name='Text' class='span5'  placeholder='Text' required><?php echo $row['Text'];?><?php echo set_value('Text');?></textarea>
<?php echo form_error('Text'); ?></div>
</div>
<!-- end Text -->

<!-- start SenderNumber -->
<div class='control-group <?php echo form_error('SenderNumber') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>SenderNumber</strong></label>
<div class='controls'>
<input type='text' name='SenderNumber' class='span5' value='<?php echo $row['SenderNumber'];?>' placeholder='SenderNumber' required>
<?php echo form_error('SenderNumber'); ?></div>
</div>
<!-- end SenderNumber -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('inbox');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-warning"><i class='fa fa-edit'></i> Update</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>