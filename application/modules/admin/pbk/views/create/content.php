 <div class='row-fluid'>
<div class="span12">
    
    
<?php echo $this->load->view('_layouts/menus');?>
      <a href='<?php echo base_url('pbk');?>' class='btn'><i class='fa fa-angle-double-left'></i> Back to List</a>
      <br><hr>
    Total Field : 
    <select onchange="location = this.options[this.selectedIndex].value;">
         <option selected='selected' disabled='disabled'> Select</option>
          <?php for($a = 1;$a <= 25;$a++){ ?>
 
          <option value="<?php echo base_url('pbk/create/');?>/<?php echo $a;?>" <?php echo $this->uri->segment(3) == $a ? "selected" : "";?>><?php echo $a;?></option>
          <?php } ?>
    </select>
    <hr>
            <form method='POST' action='' charset='UTF-8'>
            <div class="controls controls-row">
            <div style='width:0px;' class='span1'>#</div>
            <div class='span3'>Name</div>
            <div class='span3'>Phonhe Number</div>
             <div class='span3'>Group</div>
            </div>
            <?php $param = $this->uri->segment(3) == '' ? '1' :  $this->uri->segment(3)  ; ?>
            <?php for($i = 1;$i <= $param;$i++){ ?>
            

             <div class="controls controls-row">
             <div class='span1' style='width:0px;'><?php echo $i;?></div>
              <input type="text" class="span3" value='<?php echo set_value("x[$i][name]");?>' name='x[<?php echo $i;?>][name]' placeholder="Name ..">
              <input type="text" class="span3" value='<?php echo set_value("x[$i][phone]");?>' name='x[<?php echo $i;?>][phone]' placeholder="No Telephone ..">
              <select name='x[<?php echo $i;?>][group]' class="span3">
                  <option>No Group</option>
                  <?php $query = core::get_all('pbk_groups','gammu');?>
                <?php foreach($query->result() as $row){?>
                <option value='<?php echo $row->ID;?>'><?php echo $row->Name;?></option>
                <?php } ?>
            </select>
             
             </div>
             
              <div class="controls controls-row">
                     <div class='span1' style='width:0px;' ></div>
              <div class='span3'><?php echo form_error("x[$i][name]");?></div>
              <div class='span3'><?php echo form_error("x[$i][phone]");?></div>
                 <div class='span3'><?php echo form_error("x[$i][group]");?></div>
              </div>
              <?php } ?>
              <hr>
                 
                  <input type="submit" class='btn btn-primary' value="Save Contact">
                
             </form>
</div></div>