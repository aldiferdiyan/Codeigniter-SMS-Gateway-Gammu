<?php $inbox = core::get_all('inbox','gammu');?>
<?php $inboxUnread = core::get_where('inbox','gammu',array('newComing' => 1));?>
<?php $sending = core::get_all('sentitems','gammu');?>
<?php $outbox = core::get_all('outbox','gammu');?>
<?php $phonebook = core::get_all('pbk','gammu');?>
<?php $group = core::get_all('pbk_groups','gammu');?>

 <div class='well' style='margin:-10px;border:1px solid #CCC;border-radius:0px;padding:5px;background:#f9f9f9;box-shadow:0px 0px 0px #000;'>
    <ul class="nav nav-list">
    <li class="nav-header">Menus</li>
    <li class="<?php echo $this->uri->segment(1) == 'pbk' ? "active" : "";?>"><a href="<?php echo base_url('pbk');?>">Phonebook
         <span class="badge"><?php echo $phonebook->num_rows();?></span>
        </a></li>
     <li class="<?php echo $this->uri->segment(1) == 'pbk_group' ? "active" : "";?>"><a href="<?php echo base_url('pbk_group');?>">Groups
          <span class="badge"><?php echo $group->num_rows();?></span>
         </a></li>
  
    <li class='divider'></li>
    <li class="<?php echo $this->uri->segment(1) == 'send_message' ? "active" : "";?>"><a href="<?php echo base_url('send_message');?>">Send Message</a></li>
    <li class="<?php echo $this->uri->segment(1) == 'send_broadcast' ? "active" : "";?>"><a href="<?php echo base_url('send_broadcast');?>">Send Broadcast</a></li>
    <li class='divider'></li> 
   
    <li class="<?php echo $this->uri->segment(1) == 'inbox' ? "active" : "";?>"><a href="<?php echo base_url('inbox');?>">Inbox  	
         <span class="badge"><?php echo $inbox->num_rows();?></span>
         <?php if($inboxUnread->num_rows() > 0) { ?>
         <span class="badge badge-important"><?php echo $inboxUnread->num_rows();?> Unread</span>
         <?php } ?>
        </a></li>
         <li class="<?php echo $this->uri->segment(1) == 'outbox' ? "active" : "";?>"><a href="<?php echo base_url('outbox');?>">Outbox
             <?php if($outbox->num_rows() > 0) { ?>
             <span class="badge"><?php echo $outbox->num_rows();?></span>
             <?php } ?>
         </a></li>
         </a></li>
    <li class="<?php echo $this->uri->segment(1) == 'sending' ? "active" : "";?>"><a href="<?php echo base_url('sending');?>">Send Item
         <span class="badge"><?php echo $sending->num_rows();?></span></a></li>
        </a></li>
    <li class='divider'></li>
    <li class="<?php echo $this->uri->segment(1) == 'admin' ? "active" : "";?>"><a href="<?php echo base_url('admin');?>">Admin</a></li>
    </ul>
 </div>