 <div class="span12" >
    <div class="page-header">
    <h3 class='text-center'><i class="fa fa-bolt"></i> Select Database & Prefix Table </h3>
    </div>
      <?php echo validation_errors(); ?>
      <?php if($this->session->flashdata('alert')){ ?>
         <div class="alert alert-error">
            terjadi kesalahan mohon ulangi lagi
         </div>
      <?php } ?>
    <form class="form-horizontal" action='<?php echo base_url('install');?>' method='POST'>
    <div class="control-group">
    <label class="control-label" for="inputDB">Database</label>
    <div class="controls">
    <input type="text" name='db' id="inputDB" placeholder="Database name ...">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="inputDB">Prefix Table</label>
    <div class="controls">
    <div class="input-append">
    <input class="span3" name='prefix' type="text" placeholder='xx'>
    <span class="add-on">_</span>
    </div>
    </div>
    
    <br>
    <div class="control-group">
    <div class="controls">
   
    <button type="submit" class="btn btn-primary"><i class="fa fa-gear"></i>  Create</button>
    </div>
    </div>
    </form>
            
    </div>