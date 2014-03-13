<div class='row-fluid'>
<div class="span12">
   
   <div class="page-header">
    <h4>
    <i class='fa fa-user'></i> Ubah Username ID
    
    <small>
   
    </small>
    
    </h4>   
  </div>
 <?php if($this->session->flashdata('sukses')){ ?>
 <div class='alert alert-success'>Berhasil memperbarui username ID ke <?php echo $this->session->userdata('reseller_username');?></div>
 <?php } ?>
<!--START FORM-->
<form method='POST' id='form' charset='UTF-8' action='<?php echo base_url('ubah_username');?>' class="" >
        
       <!-- start username_lama -->
<div class='control-group <?php echo form_error('username_lama') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Username ID lama</strong><span class='text-error'>*</span></label>
<div class='controls'>
<input type='text' name='username_lama' class='span5' value='<?php echo $this->session->userdata('username'); ?>' placeholder='...' readonly>
<?php echo form_error('username_lama'); ?></div>
</div>
<!-- end username_lama -->

<!-- start username_baru -->
<div class='control-group <?php echo form_error('username_baru') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>username ID baru</strong><span class='text-error'>*</span></label>
<div class='controls'>
<input type='text' name='username_baru' class='span5'   placeholder='...'>
<?php echo form_error('username_baru'); ?></div>
</div>
<!-- end username_baru -->
 
<!--Submit -->
<div class="control-group ">
<div class="controls">

<button type="reset" class="btn">Reset</button>
<button type="submit" class="btn btn-primary">Ubah Username</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>