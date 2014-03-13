 <div class="span12" >
    <div class="page-header">
    <h3 class='text-center'><i class="fa fa-bolt"></i> Add Admin </h3>
    </div>
 
    <form class="form-horizontal" action='<?php echo base_url('install/create_admin');?>' method='POST'>
    
    <div class="control-group <?php echo form_error('username') ? 'error' : ''; ?>">
    <label class="control-label" for="inputDB">Username*</label>
    <div class="controls">
    <input type="text" name='username' id="inputDB" placeholder="Username">
    <?php echo form_error('username'); ?> 
    </div>
    </div>
      <div class="control-group <?php echo form_error('password') ? 'error' : ''; ?>">
 <label class="control-label" for="inputTP">Password*</label>
    <div class="controls">
    <input type="text" name='password' id="inputTP" placeholder="Password">
     <?php echo form_error('password'); ?> 
    </div>
    </div>
    
      <div class="control-group <?php echo form_error('email') ? 'error' : ''; ?>">
   <label class="control-label" for="inputEmail">Email*</label>
    <div class="controls">
    <input type="text" name='email' id="inputEmail" placeholder="Email ..">
     <?php echo form_error('email'); ?> 
    </div>
    </div>
     
     
    <div class="control-group">
    <label class="control-label" for="st">Status</label>
    <div class="controls">
    <input type="text" id="st" value='Super Admin' disabled>
    </div>
    </div>
    
    
    
    <div class="control-group">
    <div class="controls">
   
    <a href='<?php echo base_url('install/rollback');?>' class="btn"><i class="fa fa-times"></i>  Rollback</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-gear"></i>  Add Admin</button>
    </div>
    </div>
    </form>
            
    </div>