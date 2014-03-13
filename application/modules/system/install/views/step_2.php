 <div class="span12" >
    <div class="page-header">
    <h3 class='text-center'><i class="fa fa-bolt"></i> Add Admin </h3>
    </div>
      <?php echo validation_errors(); ?>
      <?php if($this->session->flashdata('alert')){ ?>
         <div class="alert alert-error">
            terjadi kesalahan mohon ulangi lagi
         </div>
      <?php } ?>
    <form class="form-horizontal" action='<?php echo base_url('install/create_login');?>' method='POST'>
    
    <div class="control-group">
    <label class="control-label" for="inputDB">Login Page</label>
    <div class="controls">
    <input type="text" name='login_page' id="inputDB" value='adminpanel'>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="inputDB">Project Name</label>
    <div class="controls">
    <input type="text" name='login_name' id="inputDB" placeholder="Nama Project">
    </div>
    </div>
    
    <div class="control-group">
    <div class="controls">
    <button type="submit" class="btn btn-primary"><i class="fa fa-gear"></i>  Create Page Login</button>
    </div>
    </div>
    </form>
            
    </div>