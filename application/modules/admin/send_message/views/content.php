  <?php if($this->session->flashdata('success')){?>
  <div class="notice fg-white marker-on-bottom">
    <i class='icon-checkmark'></i> Success Sending Message 
    </div>
    
    
    <?php } ?>
    
         <legend>Send Message</legend>
      <div class="balloon"><div class='padding20'>
   <form method='POST' action='<?php echo base_url('send_message');?>' charset='UTF-8'>

        <label>No Telephone/HP Tujuan</label>
	<?php $query = core::get_all('phonebook','gammu');?>
	<select name='phone'>
       <?php foreach($query->result() as $row){ ?>
       <option value='<?php echo $row->phone;?>'><?php echo $row->name;?> (<?php echo $row->phone;?>)</option>
       <?php } ?>
       </select>
       <?php echo form_error('phone');?>
     
         <label>Message</label>
          
          <textarea id='message' class='span9' style='height:200px;' name='message' placeholder='message'><?php echo set_value('message');?></textarea>
             <?php echo form_error('message');?>
       

       
          <hr>
            <input type="reset"  value="Reset" class='btn'>
            <input type="submit" class='btn btn-primary' value="Send Message">
         
  </form>
      </div> 
      
      
 
    <script src="<?php echo base_url();?>assets/plugin/count-textarea/count-textarea.js"></script>              
 <script>
                          var options = {
				'maxCharacterSize': 150,
				'originalStyle': 'originalDisplayInfo',
				'warningStyle': 'warningDisplayInfo',
				'warningNumber': 40,
				'displayFormat': '#input Characters | #left Characters Left | #words Words'
			};
			$('#message').textareaCount(options);
		
 </script>