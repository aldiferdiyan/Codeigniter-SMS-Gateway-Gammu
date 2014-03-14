  <legend>Send Message</legend>
  
<?php include('layout.php');?>  

 
       

   <form method='POST' action='<?php echo base_url('send_message');?>' charset='UTF-8'>

        <label>Contact</label>
	<?php $query = core::get_all('pbk','gammu');?>
	<select name='phone'>
       <?php foreach($query->result() as $row){ ?>
       <option value='<?php echo $row->Number;?>'><?php echo $row->Name;?> (<?php echo $row->Number;?>)</option>
       <?php } ?>
       </select>
       <?php echo form_error('phone');?>
     
        <label>Total Send</label>
        <select name='total'>
            <?php for($i = 1;$i < 11;$i++) { ?>
            <option value='<?php echo $i;?>'><?php echo $i;?></option>
            <?php } ?>
        </select>
         <label>Message</label>
          
          <textarea id='message' class='span9' style='height:200px;' name='message' placeholder='message'><?php echo set_value('message');?></textarea>
             <?php echo form_error('message');?>
       

       
          <hr>
            <input type="reset"  value="Reset" class='btn'>
            <input type="submit" class='btn btn-primary' value="Send Message">
         
  </form>

      
      
 
    <script src="<?php echo base_url();?>assets/plugin/count-textarea/count-textarea.js"></script>              
 <script>
                          var options = {
				'maxCharacterSize': 160,
				'originalStyle': 'originalDisplayInfo',
				'warningStyle': 'warningDisplayInfo',
				'warningNumber': 40,
				'displayFormat': '#input Characters | #left Characters Left | #words Words'
			};
			$('#message').textareaCount(options);
		
 </script>