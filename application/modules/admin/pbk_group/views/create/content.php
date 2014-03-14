<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   
<a href="<?php echo base_url('pbk_group');?>" class='btn'><i class='fa fa-angle-left'></i> Back to list</a>
   
  <hr>
  
    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('pbk_group/create');?>' class="form " >
        
       <!-- start Name -->
<div class='control-group <?php echo form_error('Name') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Name</strong></label>
<div class='controls'>
<input type='text' name='Name' value='<?php echo set_value('Name');?>' class='span5' placeholder='Name' required>
<?php echo form_error('Name'); ?></div>
</div>
<!-- end Name -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('pbk_group');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-primary"><i class="fa fa-location-arrow"></i> Submit</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>