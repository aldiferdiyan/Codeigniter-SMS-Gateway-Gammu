  <div class="page-header">
    <h4>
    <i class='fa fa-pencil'></i> {nama_class_lower}
    
    <small>
    <ul class="nav nav-pills pull-right">
    <li class='<?php echo $this->uri->segment(2) != 'create' ? 'active' : ''; ?>'>
      <a href="<?php echo base_url('{nama_class_lower}');?>"><i class='fa fa-book'></i> List</a>
    </li>
    <li class='<?php echo $this->uri->segment(2) == 'create' ? 'active' : ''; ?>'>
      <a href="<?php echo base_url('{nama_class_lower}/create');?>"><i class='fa fa-pencil'></i> Add New</a>
    </li>
    </ul>
    </small>
    
    </h4>   
  </div>