<div class='row-fluid'>
<div class="span12">
    
    
<?php echo $this->load->view('_layouts/menus');?>


<div class="input-prepend input-append">
<form action='<?php echo base_url('{nama_class_lower}/search');?>' method='get'>
<input class="span9" type="text" name='search'>                   
<select name='search_by' style='width:100px;'>
{search_by}
</select>
<button class="btn" type="submit">Cari</button>
</form>
</div>
 
<select class="span2  pull-right" onchange="location = this.options[this.selectedIndex].value;">
<option selected='selected' disabled='disabled'>Pilih Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/index/rows/25');?>">25 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/index/rows/50');?>">50 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/index/rows/75');?>">75 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/index/rows/100');?>">100 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/index/rows/200');?>">200 Rows</option>
</select>
 

<?php
if($this->uri->segment(3) == 'rows'){
$per_page = $this->uri->segment(4);
$segment  = 5;
$url      = '{nama_class_lower}/index/rows/'.$this->uri->segment(4).'/';
}else{
$per_page = 25;
$segment  = 3;
$url      = '{nama_class_lower}/index';
}
?>

    {list_table}
    
      <?php echo $this->pagination->create_links(); ?>
        
  
</div>
</div>