    <ul class="nav nav-tabs">
    <li class="<?php echo $this->uri->segment(2) == '' ? 'active':'';?>">
    <a href="<?php echo base_url('send_message/');?>">Send By PhoneBook</a>
    </li>
    <li class="<?php echo $this->uri->segment(2) == 'send_by_group' ? 'active':'';?>">
        <a href="<?php echo base_url('send_message/send_by_group');?>">Send By Group</a>
    </li>
    <li class="<?php echo $this->uri->segment(2) == 'send_by_number' ? 'active':'';?>">
        <a href="<?php echo base_url('send_message/send_by_number');?>">Send By Number</a>
    </li>
    </ul>
<br>
<?php if($this->session->flashdata('success')){?>
  <div class="alert alert-success">
    <i class='fa fa-check'></i> Success Sending Message 
    </div>
    
    
    <?php } ?>
    