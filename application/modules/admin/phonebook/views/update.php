<?php $query = core::get_where('phonebook','gammu',array('id' => $id),1);?>   
<?php $row = $query->row_array(); ?>
    <legend><i class='icon-address-book'></i> Phonebook</legend>
      <a href='<?php echo base_url('phonebook');?>' class='btn'><i class='fa fa-angle-double-left'></i> Back to List</a>
     <br><br>
 
            <form method='POST' action='<?php echo base_url('phonebook/update');?>/<?php echo $id;?>' charset='UTF-8'>
             <fieldset>
              
              <label>Name</label>
              <div class="input-control text" data-role="input-control">
              <input type="text" name='name' value='<?php echo $row['name'];?>' placeholder="Name ..">
                <?php echo form_error('name');?>
              </div>
              
              <label>Phone</label>
              <div class="input-control text" data-role="input-control">
              <input type="text" name='phone' value='<?php echo $row['phone'];?>' placeholder="No Telephone ..">
                    <?php echo form_error('phone');?>
              </div>
              <hr>
                 
                  <input type="submit" class='btn btn-warning' value="Update Contact">
               </fieldset>
             </form>
 