
 <div class='well' style='margin:-10px;border:1px solid #CCC;border-radius:0px;padding:5px;background:#f9f9f9;box-shadow:0px 0px 0px #000;'>
    <ul class="nav nav-list">
    <li class="nav-header">Menus</li>
    <li class="<?php echo $this->uri->segment(1) == 'phonebook' ? "active" : "";?>"><a href="<?php echo base_url('phonebook');?>">Phonebook</a></li>
   <li class="<?php echo $this->uri->segment(1) == 'send_message' ? "active" : "";?>"><a href="<?php echo base_url('send_message');?>">Send Message</a></li>
    <li class="<?php echo $this->uri->segment(1) == 'send_broadcast' ? "active" : "";?>"><a href="<?php echo base_url('send_broadcast');?>">Send Broadcast</a></li>
     <li class="<?php echo $this->uri->segment(1) == 'outbox' ? "active" : "";?>"><a href="<?php echo base_url('outbox');?>">Outbox</a></li>
    <li class="<?php echo $this->uri->segment(1) == 'inbox' ? "active" : "";?>"><a href="<?php echo base_url('inbox');?>">Inbox</a></li>
    <li class='divider'></li>
    <li class="<?php echo $this->uri->segment(1) == 'admin' ? "active" : "";?>"><a href="<?php echo base_url('admin');?>">Admin</a></li>
    </ul>
 </div>