<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   
 <a href='<?php echo base_url('pbk');?>' class='btn'><i class='fa fa-angle-double-left'></i> Back to List</a>
      <br><hr>
    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('pbk/update').'/'.$this->uri->segment(3);?>' class="form" >
        
       <?php $query = core::get_where('pbk','gammu',array('ID' => $this->uri->segment(3)),1); ?>
<?php $row = $query->row_array();?>
<input type='hidden' name='id' value='<?php echo $row['ID'];?>' >
<!-- start GroupID -->
<div class='control-group <?php echo form_error('GroupID') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Group</strong></label>
<div class='controls'>
      <?php $group = core::get_all('pbk_groups','gammu');?>
    <select name='GroupID' class='span5'>
        <option value='0'>No Group</option>
        <?php foreach($group->result() as $rows) { ?>
        <option value='<?php echo $rows->ID;?>' <?php echo $row['GroupID'] == $rows->ID ? "selected" : "";?>><?php echo $rows->Name;?></option>
        <?php } ?>
    </select>
<?php echo form_error('GroupID'); ?></div>
</div>
<!-- end GroupID -->

<!-- start Name -->
<div class='control-group <?php echo form_error('Name') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Name</strong></label>
<div class='controls'>
<input type='text' name='Name' class='span5'  placeholder='Name' value='<?php echo $row['Name'];?>' required>
<?php echo form_error('Name'); ?></div>
</div>
<!-- end Name -->

<!-- start Number -->
<div class='control-group <?php echo form_error('Number') ? 'error' : ''; ?>'>
<label class='control-label' ><strong>Number</strong></label>
<div class='controls'>
<input type='text' name='Number' class='span5'  placeholder='Number' value='<?php echo $row['Number'];?>'  required>
<?php echo form_error('Number'); ?></div>
</div>
<!-- end Number -->


       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('pbk');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-warning"><i class='fa fa-edit'></i> Update</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>