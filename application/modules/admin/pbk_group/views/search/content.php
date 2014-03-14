<div class='row-fluid'>
<div class="span12">


<?php echo $this->load->view('_layouts/menus');?>

    <a href="<?php echo base_url('pbk_group/create');?>" class='btn'><i class='fa fa-pencil'></i> Add Group</a>
   
  <hr>
  
<div class="input-prepend input-append">
<?php
if($this->uri->segment(3) == 'rows')
{
 $rows =  "pbk_group/search/rows/".$this->uri->segment(4);
}
else
{
 $rows =  "pbk_group/search";
}
?>
<form action='<?php echo base_url($rows);?>' method='get'>

<input class="span9" type="text" name='search'>                   
<select name='search_by' style='width:100px;'>
<option value='Name' <?php echo $this->input->get('search_by') == 'Name' ? 'selected' : '' ;?>>Name</option>

</select>
<button class="btn" type="submit">Cari</button>
</form>
</div>
 
<select class="span2  pull-right" onchange="location = this.options[this.selectedIndex].value;">
<option selected='selected' disabled='disabled'>Pilih Rows</option>
<option value="<?php echo base_url('pbk_group/search/rows/25');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">25 Rows</option>
<option value="<?php echo base_url('pbk_group/search/rows/50');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">50 Rows</option>
<option value="<?php echo base_url('pbk_group/search/rows/75');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">75 Rows</option>
<option value="<?php echo base_url('pbk_group/search/rows/100');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">100 Rows</option>
<option value="<?php echo base_url('pbk_group/search/rows/200');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">200 Rows</option>
</select>
 
 

<?php
if($this->uri->segment(3) == 'rows'){
$per_page = $this->uri->segment(4);
$segment  = 5;
$url      = 'pbk_group/search/rows/'.$this->uri->segment(4).'/';
}else{
$per_page = 25;
$segment  = 3;
$url      = 'pbk_group/search';
}
?>

    <div class='table-responsive margin-table'>
<table class='table'>
<caption class='text-right'>
<?php $num_rows = core::get_search('pbk_groups','gammu',$this->input->get('search'),$this->input->get('search_by'))->num_rows();?>
<small>Total data : <u class='text-error'><?php echo $num_rows;?></u>
		               ( Hasil pencarian berdasarkan <u class='text-error'> <?php echo $this->input->get('search_by');?></u> ) -
			       <a href='<?php echo base_url('pbk_group');?>'>Back to all</a></small>
</caption><thead>
<tr>
<th style='width:20px;'>#</th>
<th>Name</th>
<th style='text-align:center;width:100px;'>Aksi</th>
</tr></thead>
<tbody>
<?php $i = $this->input->get('offset') + 1;?>
<?php foreach(core::get_search_pagination('pbk_groups','gammu',$this->input->get('search'),$this->input->get('search_by'),$per_page,$url)->result() as $row): { ?><tr>
<td><?php echo $i;?></td>
			<td><?php echo $row->Name ;?></td>
			<td>
		    <center><div class='btn-group' >
		    <a href='<?php echo base_url();?>pbk_group/delete/<?php echo $row->ID;?>' class='btn btn-small' data-confirm='Hapus data ini??'><i class='text-error fa fa-trash-o'></i></a>
                    <a href='<?php echo base_url();?>pbk_group/update/<?php echo $row->ID;?>' class='btn   btn-small'><i class='text-warning fa fa-edit'></i></a>
                      </div></center>
                    </td>
		    
</tr>
<?php } ?>
<?php $i++;?>
<?php endforeach;?>
</tbody>
</table>
</div>

    
      <?php echo $this->pagination->create_links(); ?>
        
        </div>
        </div>
<script type='text/javascript'>
$(function(){
 $("[data-confirm]").on("click submit", function(){
    return confirm($(this).data("confirm"));
 }); 
});
</script>