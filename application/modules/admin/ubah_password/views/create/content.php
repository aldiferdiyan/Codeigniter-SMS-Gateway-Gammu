<div class='row-fluid'>
<div class="span12">
   
   <div class="page-header">
    <h4>
    <i class='fa fa-lock'></i> Ubah Password
    
    <small>
   
    </small>
    
    </h4>   
  </div>
 <?php if($this->session->flashdata('sukses')){ ?>
 <div class='alert alert-success'>Berhasil memperbarui password</div>
 <?php } ?>
<!--START FORM-->
<form method='POST' id='form' charset='UTF-8' action='<?php echo base_url('ubah_password');?>' class="" >
        
       <!-- start password_lama -->
<div class='control-group <?php echo form_error('password_lama') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Password lama</strong><span class='text-error'>*</span></label>
<div class='controls'>
<input type='password' name='password_lama' class='span5' value='<?php echo set_value('password_lama'); ?>' placeholder='...'>
<?php echo form_error('password_lama'); ?></div>
</div>
<!-- end password_lama -->

<!-- start password_baru -->
<div class='control-group <?php echo form_error('password_baru') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Password baru</strong><span class='text-error'>*</span></label>
<div class='controls'>
<input type='password' name='password_baru' class='span5'   placeholder='...'>
<?php echo form_error('password_baru'); ?></div>
</div>
<!-- end password_baru -->

<!-- start password -->
<div class='control-group <?php echo form_error('password_baru_konfirmasi') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Konfirmasi password baru</strong><span class='text-error'>*</span></label>
<div class='controls'>
<input type='password' name='password_baru_konfirmasi' class='span5' placeholder='...'>
<?php echo form_error('password_baru_konfirmasi'); ?></div>
</div>
<!-- end password -->
 
<!--Submit -->
<div class="control-group ">
<div class="controls">

<button type="reset" class="btn">Reset</button>
<button type="submit" class="btn btn-primary">Ubah Password</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>