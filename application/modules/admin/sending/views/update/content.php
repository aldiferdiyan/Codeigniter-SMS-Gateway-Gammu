<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('sending/update').'/'.$this->uri->segment(3);?>' class="form form-horizontal" >
        
       <?php $query = core::get_where('sentitems','gammu',array('id' => $this->uri->segment(3)),1); ?>
<?php $row = $query->row_array();?>
<input type='hidden' name='id' value='<?php echo $row['id'];?>' >
<!-- start SendingDateTime -->
<div class='control-group <?php echo form_error('SendingDateTime') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>SendingDateTime</strong></label>
<div class='controls'>
<input type='text' name='SendingDateTime' class='span5' value='<?php echo $row['SendingDateTime'];?>' placeholder='SendingDateTime' required>
<?php echo form_error('SendingDateTime'); ?></div>
</div>
<!-- end SendingDateTime -->

<!-- start DestinationNumber -->
<div class='control-group <?php echo form_error('DestinationNumber') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>DestinationNumber</strong></label>
<div class='controls'>
<input type='text' name='DestinationNumber' class='span5' value='<?php echo $row['DestinationNumber'];?>' placeholder='DestinationNumber' required>
<?php echo form_error('DestinationNumber'); ?></div>
</div>
<!-- end DestinationNumber -->

<!-- start TextDecoded -->
<div class='control-group <?php echo form_error('TextDecoded') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>TextDecoded</strong></label>
<div class='controls'>
<input type='text' name='TextDecoded' class='span5' value='<?php echo $row['TextDecoded'];?>' placeholder='TextDecoded' required>
<?php echo form_error('TextDecoded'); ?></div>
</div>
<!-- end TextDecoded -->

<!-- start Status -->
<div class='control-group <?php echo form_error('Status') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Status</strong></label>
<div class='controls'>
<input type='text' name='Status' class='span5' value='<?php echo $row['Status'];?>' placeholder='Status' required>
<?php echo form_error('Status'); ?></div>
</div>
<!-- end Status -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('sending');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-warning"><i class='fa fa-edit'></i> Update</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>