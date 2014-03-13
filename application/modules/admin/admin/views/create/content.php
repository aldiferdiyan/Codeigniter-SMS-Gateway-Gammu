<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('admin/create');?>' class="form" >
        
       <!-- start username -->
<div class='control-group <?php echo form_error('username') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Username</strong></label>
<div class='controls'>
<input type='text' name='username' value='<?php echo set_value('username');?>' class='span5' placeholder='username' required>
<?php echo form_error('username'); ?></div>
</div>
<!-- end username -->

<!-- start email -->
<div class='control-group <?php echo form_error('email') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Email</strong></label>
<div class='controls'>
<input type='text' name='email' value='<?php echo set_value('email');?>' class='span5' placeholder='email' required>
<?php echo form_error('email'); ?></div>
</div>
<!-- end email -->

<!-- start password -->
<div class='control-group <?php echo form_error('password') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Password</strong></label>
<div class='controls'>
<input type='text' name='password' value='<?php echo set_value('password');?>' class='span5' placeholder='password' required>
<?php echo form_error('password'); ?></div>
</div>
<!-- end password -->

<!-- start ulangi_password -->
<div class='control-group <?php echo form_error('ulangi_password') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Ulangi Password</strong></label>
<div class='controls'>
<input type='text' name='ulangi_password' value='<?php echo set_value('ulangi_password');?>' class='span5' placeholder='ulangi password' required>
<?php echo form_error('ulangi_password'); ?></div>
</div>
<!-- end ulangi_password -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('admin');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-primary"><i class="fa fa-location-arrow"></i> Submit</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>