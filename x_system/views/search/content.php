<div class='row-fluid'>
<div class="span12">


<?php echo $this->load->view('_layouts/menus');?>


<div class="input-prepend input-append">
<?php
if($this->uri->segment(3) == 'rows')
{
 $rows =  "{nama_class_lower}/search/rows/".$this->uri->segment(4);
}
else
{
 $rows =  "{nama_class_lower}/search";
}
?>
<form action='<?php echo base_url($rows);?>' method='get'>

<input class="span9" type="text" name='search'>                   
<select name='search_by' style='width:100px;'>
{search_by}
</select>
<button class="btn" type="submit">Cari</button>
</form>
</div>
 
<select class="span2  pull-right" onchange="location = this.options[this.selectedIndex].value;">
<option selected='selected' disabled='disabled'>Pilih Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/search/rows/25');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">25 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/search/rows/50');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">50 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/search/rows/75');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">75 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/search/rows/100');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">100 Rows</option>
<option value="<?php echo base_url('{nama_class_lower}/search/rows/200');?>?search=<?php echo $this->input->get('search');?>&search_by=<?php echo $this->input->get('search_by');?>">200 Rows</option>
</select>
 
 

<?php
if($this->uri->segment(3) == 'rows'){
$per_page = $this->uri->segment(4);
$segment  = 5;
$url      = '{nama_class_lower}/search/rows/'.$this->uri->segment(4).'/';
}else{
$per_page = 25;
$segment  = 3;
$url      = '{nama_class_lower}/search';
}
?>

    {list_table}
    
      <?php echo $this->pagination->create_links(); ?>
        
        </div>
        </div>