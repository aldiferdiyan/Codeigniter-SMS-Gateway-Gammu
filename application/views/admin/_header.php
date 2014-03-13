    <div class="navbar navbar-static-top navbar-inverse">
    <div class="navbar-inner">
    
    <!------------------- RESPONSIVE ----------------------------- -->
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </a>
    <!------------------- RESPONSIVE ----------------------------- -->
    
    <!-- ---------------------------- BRAND (TITLE) ------------------------ -->
    <a class="brand" href="#">AdminPanel</a>
    <!-- ---------------------------- BRAND (TITLE) ------------------------ -->
   
     
    <div class="nav-collapse collapse">
     <ul class="nav">
  
</ul>
      

    
    <ul class="nav pull-right">
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class='fa fa-user'></i>  <?php echo $this->session->userdata('username');?>
    <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo base_url();?>ubah_username" ><i class='fa fa-user'></i> Ubah Username</a></li>
      <li><a href="<?php echo base_url();?>ubah_password" ><i class='fa fa-lock'></i> Ubah Password</a></li>
   <li class='divider'></li>
    <li><a href="<?php echo base_url();?>login/logout"><i class='fa fa-power-off'></i> Logout</a></li>
    </ul>
    </li>
    </ul>
     
    
   
    
    
    </div>
    
    </div>
    </div>