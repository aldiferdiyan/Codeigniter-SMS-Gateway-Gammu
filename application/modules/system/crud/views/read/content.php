<?php echo $this->load->view('/_layouts/menu');?>
<div class='row-fluid'>
<div class="span12">
                    
<div class="input-prepend input-append">
<input class="span9" type="text" name='search'>                   
<select name='search_by' style='width:100px;'>
<option value='trainer_id'>trainer id</option>
<option value='nama_acara'>nama acara</option>
<option value='deskripsi_acara'>deskripsi acara</option>
<option value='alamat_acara'>alamat acara</option>
<option value='kota_acara'>kota acara</option>
<option value='budget'>budget</option>
<option value='tanggal_mulai'>tanggal mulai</option>
<option value='tanggal_berakhir'>tanggal berakhir</option>
<option value='jam_mulai'>jam mulai</option>
<option value='jam_berakhir'>jam berakhir</option>
<option value='status'>status</option>
<option value='date_post_acara'>date post acara</option>
<option value='date_trainer_respone'>date trainer respone</option>

</select>
<button class="btn" type="button">Cari</button>
</div>
 
<select class="span2  pull-right" onchange="location = this.options[this.selectedIndex].value;">
<option selected='selected' disabled='disabled'>Pilih Rows</option>
<option value="<?php echo base_url('crud/index/rows/1');?>">1 Rows</option>
<option value="<?php echo base_url('crud/index/rows/2');?>">2 Rows</option>
<option value="<?php echo base_url('crud/index/rows/5');?>">5 Rows</option>
<option value="<?php echo base_url('crud/index/rows/75');?>">75 Rows</option>
<option value="/rows/100">100 Rows</option>
<option value="/rows/200">200 Rows</option>
</select>
 
 
</div>
</div>


<?php
if($this->uri->segment(3) == 'rows'){
$per_page = $this->uri->segment(4);
$segment  = 5;
$url      = 'crud/index/rows/'.$this->uri->segment(4).'/';
}else{
$per_page = 3;
$segment  = 3;
$url      = 'crud/index';
}
?>

<table class='table table-striped table-bordered table-hover table-condensed'>
<thead>
<tr>
<th style='width:20px;'>No</th>
<th>trainer id</th>
<th>nama acara</th>
<th>deskripsi acara</th>
<th>alamat acara</th>
<th>kota acara</th>
<th>budget</th>
<th>tanggal mulai</th>
<th>tanggal berakhir</th>
<th>jam mulai</th>
<th>jam berakhir</th>
<th>status</th>
<th>date post acara</th>
<th>date trainer respone</th>
<th colspan='2' style='width: 8%;text-align:center;'>Aksi</th>
</tr></thead>
<tbody>

<?php $i = $this->uri->segment($segment) + 1;?>
<?php foreach(core::get_all_pagination('pd_acara',$per_page,$segment,$url)->result() as $row): { ?><tr>
<td><?php echo $i;?></td>
			<td><?php echo $row->trainer_id ;?></td>
			<td><?php echo $row->nama_acara ;?></td>
			<td><?php echo $row->deskripsi_acara ;?></td>
			<td><?php echo $row->alamat_acara ;?></td>
			<td><?php echo $row->kota_acara ;?></td>
			<td><?php echo $row->budget ;?></td>
			<td><?php echo $row->tanggal_mulai ;?></td>
			<td><?php echo $row->tanggal_berakhir ;?></td>
			<td><?php echo $row->jam_mulai ;?></td>
			<td><?php echo $row->jam_berakhir ;?></td>
			<td><?php echo $row->status ;?></td>
			<td><?php echo $row->date_post_acara ;?></td>
			<td><?php echo $row->date_trainer_respone ;?></td>
			<td>
		    <div class='btn-group pull-right'>
		    <a class='btn dropdown-toggle' data-toggle='dropdown' href='#'>
		    Pilih
		    <span class='caret'></span>
		    </a>
		    <ul class='dropdown-menu'>
		    <li><a href='#'><i class='fa fa-weibo'></i> Detail</a></li>
		    <li><a  href='#'><i class='fa fa-pencil-square'></i> Quick Edit</a></li>
		    <li><a  href='#'><i class='fa fa-edit'></i> Full Edit</a></li>
		    <li><a  href='#'><i class='fa fa-check-square-o'></i> Checked</a></li>
		    <li><a href='#'><i class='fa fa-trash-o'></i> Delete</a></li>
		    </ul>
		    </div>	
                    </td>
		    <td>
		    <input type='checkbox'>
                    </td>
</tr>
<?php } ?>
<?php $i++;?>
<?php endforeach;?>
</tbody>
</table>
    
<?php echo $this->pagination->create_links(); ?>
 
        
        </div>
        </div>