   <legend><i class='icon-address-book'></i> Phonebook</legend>
   <a href='<?php echo base_url('phonebook/create');?>' class='btn'><i class='icon-pencil'></i> Add Contact</a>
<br><br>
<table class="table">
    <thead>
        <tr>
            <th style='width:30px;'>#</th>
            <th class='text-left' style='width:200px;'>Name</th>
            <th class='text-left'>Phone</th>
            <th style='width:100px;text-align:center;'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $per_page = 25;
        $segment  = 3;
        $url      = 'phonebook/index/';
        $i  = 1 + $this->uri->segment(3);
        ?>
        <?php $query = core::get_all_pagination('phonebook','gammu',$per_page,$segment,$url);?>
        <?php if($query->num_rows() == 0){ ?>
        <tr><td colspan='4'>Empty...</td></tr>
        <?php } ?>
        <?php foreach($query->result() as $row){ ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td>
                   <?php echo $row->name;?>
             
            </td>
            <td><?php echo $row->phone;?></td>
            <td><center>
              <a href='<?php echo base_url('phonebook');?>/delete/<?php echo $row->id;?>' title='delete' data-confirm='delete ?' ><i class=' icon-remove'></i></a>
                 <a href='<?php echo base_url('phonebook/update');?>/<?php echo $row->id;?>' title='edit'><i class='icon-edit'></i></a>
      
                 </center></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
      <?php echo $this->pagination->create_links(); ?>
<script type='text/javascript'>
$(function(){
 $("[data-confirm]").on("click submit", function(){
    return confirm($(this).data("confirm"));
 }); 
});
</script>