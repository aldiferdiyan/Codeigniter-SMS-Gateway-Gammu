    <legend><i class='icon-address-book'></i> Phonebook</legend>
      <a href='<?php echo base_url('phonebook');?>' class='btn'><i class='fa fa-angle-double-left'></i> Back to List</a>
     <br><br>
    Total Field : 
    <select onchange="location = this.options[this.selectedIndex].value;">
         <option selected='selected' disabled='disabled'> Select</option>
          <?php for($a = 1;$a <= 25;$a++){ ?>
 
          <option value="<?php echo base_url('phonebook/create/');?>/<?php echo $a;?>" <?php echo $this->uri->segment(3) == $a ? "selected" : "";?>><?php echo $a;?></option>
          <?php } ?>
    </select>
    <hr>
            <form method='POST' action='' charset='UTF-8'>
            <div class="controls controls-row">
            <div style='width:0px;' class='span1'>#</div>
            <div class='span3'>Name</div>
            <div class='span3'>Phonhe Number</div>
            </div>
            <?php $param = $this->uri->segment(3) == '' ? '1' :  $this->uri->segment(3)  ; ?>
            <?php for($i = 1;$i <= $param;$i++){ ?>
            

             <div class="controls controls-row">
             <div class='span1' style='width:0px;'><?php echo $i;?></div>
              <input type="text" class="span3" value='<?php echo set_value("x[$i][name]");?>' name='x[<?php echo $i;?>][name]' placeholder="Name ..">
              <input type="text" class="span3" value='<?php echo set_value("x[$i][phone]");?>' name='x[<?php echo $i;?>][phone]' placeholder="No Telephone ..">
             </div>
             
              <div class="controls controls-row">
                     <div class='span1' style='width:0px;' ></div>
              <div class='span3'><?php echo form_error("x[$i][name]");?></div>
              <div class='span3'><?php echo form_error("x[$i][phone]");?></div>
              </div>
              <?php } ?>
              <hr>
                 
                  <input type="submit" class='btn btn-primary' value="Save Contact">
                
             </form>
    