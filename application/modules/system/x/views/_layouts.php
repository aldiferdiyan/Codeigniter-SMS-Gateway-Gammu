<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>WDC - Generator CRUD | CODEIGINITER</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/core/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/core/plugin/font-awesome/css/font-awesome.min.css">
  </head>
  <body>

  <?php echo $this->load->view('_header');?>
  
<!--body-->
<div class="container">
  <br>
  <ul class="nav nav-pills pull-right">
  <li class="active">
    <a href="#">CRUD</a>
  </li>
  <li><a href="#">Form</a></li>
</ul>
    
  <?php echo $select_table;?>
  <?php echo $generate;?>
</div>
<!--end body-->

 

<script type='text/javascript' src="<?php echo base_url();?>wdc-assets/core/js/jquery-2.0.3.min.js"></script>
<script type='text/javascript' src="<?php echo base_url();?>wdc-assets/core/js/bootstrap.min.js"></script>
<!--<script>
  $('.btn-block').on('click', function(){
      $(this).button('loading');
  });
</script>-->
 
  </body>
</html>