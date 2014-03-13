<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('outbox/create');?>' class="form form-horizontal" >
        
       <!-- start SendingDateTime -->
<div class='control-group <?php echo form_error('SendingDateTime') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>SendingDateTime</strong></label>
<div class='controls'>
<input type='text' name='SendingDateTime' value='<?php echo set_value('SendingDateTime');?>' class='span5' placeholder='SendingDateTime' required>
<?php echo form_error('SendingDateTime'); ?></div>
</div>
<!-- end SendingDateTime -->

<!-- start Text -->
<div class='control-group <?php echo form_error('Text') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Text</strong></label>
<div class='controls'>
<textarea name='Text' class='span5' placeholder='Text' required><?php echo set_value('Text');?></textarea>
<?php echo form_error('Text'); ?></div>
</div>
<!-- end Text -->

<!-- start DestinationNumber -->
<div class='control-group <?php echo form_error('DestinationNumber') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>DestinationNumber</strong></label>
<div class='controls'>
<input type='text' name='DestinationNumber' value='<?php echo set_value('DestinationNumber');?>' class='span5' placeholder='DestinationNumber' required>
<?php echo form_error('DestinationNumber'); ?></div>
</div>
<!-- end DestinationNumber -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('outbox');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-primary"><i class="fa fa-location-arrow"></i> Submit</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>