<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('inbox/create');?>' class="form form-horizontal" >
        
       <!-- start UpdatedInDB -->
<div class='control-group <?php echo form_error('UpdatedInDB') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>UpdatedInDB</strong></label>
<div class='controls'>
<input type='text' name='UpdatedInDB' value='<?php echo set_value('UpdatedInDB');?>' class='span5' placeholder='UpdatedInDB' required>
<?php echo form_error('UpdatedInDB'); ?></div>
</div>
<!-- end UpdatedInDB -->

<!-- start Text -->
<div class='control-group <?php echo form_error('Text') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Text</strong></label>
<div class='controls'>
<textarea name='Text' class='span5' placeholder='Text' required><?php echo set_value('Text');?></textarea>
<?php echo form_error('Text'); ?></div>
</div>
<!-- end Text -->

<!-- start SenderNumber -->
<div class='control-group <?php echo form_error('SenderNumber') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>SenderNumber</strong></label>
<div class='controls'>
<input type='text' name='SenderNumber' value='<?php echo set_value('SenderNumber');?>' class='span5' placeholder='SenderNumber' required>
<?php echo form_error('SenderNumber'); ?></div>
</div>
<!-- end SenderNumber -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('inbox');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-primary"><i class="fa fa-location-arrow"></i> Submit</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>