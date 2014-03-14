<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('sending/create');?>' class="form form-horizontal" >
        
       <!-- start SendingDateTime -->
<div class='control-group <?php echo form_error('SendingDateTime') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>SendingDateTime</strong></label>
<div class='controls'>
<input type='text' name='SendingDateTime' value='<?php echo set_value('SendingDateTime');?>' class='span5' placeholder='SendingDateTime' required>
<?php echo form_error('SendingDateTime'); ?></div>
</div>
<!-- end SendingDateTime -->

<!-- start DestinationNumber -->
<div class='control-group <?php echo form_error('DestinationNumber') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>DestinationNumber</strong></label>
<div class='controls'>
<input type='text' name='DestinationNumber' value='<?php echo set_value('DestinationNumber');?>' class='span5' placeholder='DestinationNumber' required>
<?php echo form_error('DestinationNumber'); ?></div>
</div>
<!-- end DestinationNumber -->

<!-- start TextDecoded -->
<div class='control-group <?php echo form_error('TextDecoded') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>TextDecoded</strong></label>
<div class='controls'>
<input type='text' name='TextDecoded' value='<?php echo set_value('TextDecoded');?>' class='span5' placeholder='TextDecoded' required>
<?php echo form_error('TextDecoded'); ?></div>
</div>
<!-- end TextDecoded -->

<!-- start Status -->
<div class='control-group <?php echo form_error('Status') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Status</strong></label>
<div class='controls'>
<input type='text' name='Status' value='<?php echo set_value('Status');?>' class='span5' placeholder='Status' required>
<?php echo form_error('Status'); ?></div>
</div>
<!-- end Status -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('sending');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-primary"><i class="fa fa-location-arrow"></i> Submit</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>