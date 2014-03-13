<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class X extends CI_Controller {

        function index()
	{
	    $this->load->dbutil();
	    $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
            $this->form_validation->set_error_delimiters('<p class="text-error">*', '</p>');  
            $this->form_validation->set_rules('database','database','required');
            
            if ($this->form_validation->run() == FALSE)
            {
		$data['generate']     = '';
		$data['select_table'] = $this->load->view('/select_database',$data,TRUE);
                $this->load->view("/_layouts",$data);
            }
            else
            {
		$this->session->set_userdata('database',$this->input->post('database'));
		redirect('x/select_table');
            }
	}

	
	function select_table()
	{
            $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
            $this->form_validation->set_error_delimiters('<p class="text-danger text-center">*', '</p>');  
            $this->form_validation->set_rules('table','','');
            
            if ($this->form_validation->run() == FALSE)
            {
		$data['generate']     = '';
		$data['select_table'] = $this->load->view('/select_table',$data,TRUE);
                $this->load->view("/_layouts",$data);
            }
            else
            {
		$table = $this->input->post('table');
		
		$data['table']        = $table;
                $data['generate']     = $this->load->view('/generate',$data,TRUE);
		$data['select_table'] = $this->load->view('/select_table',$data,TRUE);
                $this->load->view("/_layouts",$data);
            }
	}
	
	
	function generate()
	{
		$file  = $this->input->post('file');
		$table = $this->input->post('table');
		$views = $this->input->post('views');
		$database = $this->session->userdata('database');
		$file_ucfirst = ucfirst($file);
		
                $path       = "application/modules/".$this->input->post('path').'/';
		
		$check_path1 =  "application/modules/".$this->input->post('path');
		$check_path2 = "application/modules/".$this->input->post('path').'/'.$file;
		
		if(!is_dir($check_path1) OR is_dir($check_path2))
		{
			$this->session->set_flashdata('path_error','error');
			redirect('x/select_table');
		}
		
		
		
		      
                mkdir($path.$file,0700);
                mkdir($path.$file."/config");
                mkdir($path.$file."/controllers");
                mkdir($path.$file."/models");
                mkdir($path.$file."/views");
		mkdir($path.$file."/views/_layouts");
		mkdir($path.$file."/views/read");
		mkdir($path.$file."/views/search");
		mkdir($path.$file."/views/update");
		mkdir($path.$file."/views/detail");
		mkdir($path.$file."/views/create");
                
		
		// =========================== CONFIG ===========================
		// generate config
		$this->create_file(array(
				'file_get_content'  => 'x_system/config/config.php',
				'get_array'         => array('{nama_class}'),
				'put_array'         => array($file),
				'file_put_content'  => $path.$file."/config/config.php",
			));

		
		// =========================== FORM VALIDATION ===========================
		$validation_data = $this->form_validation($table);
		
		// generate config validation
		$this->create_file(array(
				'file_get_content'  => 'x_system/config/form_validation.php',
				'get_array'         => array('{validation_data}'),
				'put_array'         => array($validation_data),
				'file_put_content'  => $path.$file."/config/form_validation.php",
			));
		
		
		// =========================== CONTROLLERS ===========================
		
		$array_insert = $this->array_insert_controller();
		
		// generate controller
		$this->create_file(array(
				'file_get_content'  => 'x_system/controllers/x_controller.php',
				'get_array'         => array('{nama_class}','{views}','{nama_class_lower}','{nama_table}','{nama_database}','{field_array}'),
				'put_array'         => array($file_ucfirst,$views,$file,$table,$database,$array_insert),
				'file_put_content'  => $path.$file."/controllers/".$file.".php",
			));
		
		
		// =========================== MODELS ===========================
		// generate model
		$this->create_file(array(
				'file_get_content'  => 'x_system/models/x_model.php',
				'get_array'         => array('{nama_class}'),
				'put_array'         => array($file_ucfirst),
				'file_put_content'  =>$path.$file."/models/".$file."_model.php",
			));
		
		
		// =========================== VIEWS/_LAYOUTS/ ===========================
		// generate views/_layouts/_menus
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/_layouts/menus.php',
				'get_array'         => array('{nama_class_lower}'),
				'put_array'         => array($file),
				'file_put_content'  => $path.$file."/views/_layouts/menus.php",
			));
	        
		// generate views/_layouts/_title
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/_layouts/title.php',
				'get_array'         => array('{header}'),
				'put_array'         => array($file_ucfirst),
				'file_put_content'  => $path.$file."/views/_layouts/title.php",
			));

		// =========================== VIEWS/READ/ ===========================
		$list_table = $this->list_table_views_read($table,$file);
		$search_by  = $this->search_by_views_read();
		
		// generate views/read/content
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/read/content.php',
				'get_array'         => array('{search_by}','{list_table}','{nama_class_lower}'),
				'put_array'         => array($search_by,$list_table,$file),
				'file_put_content'  => $path.$file."/views/read/content.php",
			));
		
		
		// generate views/read/include
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/read/include.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/read/include.php",
			));
		
		
		// generate views/read/js
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/read/js.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/read/js.php",
			));

		
		// =========================== VIEWS/SEARCH/ ===========================		
                $list_table = $this->list_table_views_search($table,$file);
		$search_by  = $this->search_by_views_search();
		
		
		// generate views/search/content
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/search/content.php',
				'get_array'         => array('{search_by}','{list_table}','{nama_class_lower}'),
				'put_array'         => array($search_by,$list_table,$file),
				'file_put_content'  => $path.$file."/views/search/content.php",
			));

		
		// generate views/search/include
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/search/include.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/search/include.php",
			));
		
		// generate views/search/js
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/search/js.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/search/js.php",
			));
		
		// =========================== VIEWS/CREATE/ ===========================
		$field_data = $this->field_data_views_create();
		
		// generate views/create/content
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/create/content.php',
				'get_array'         => array('{action}','{field}'),
				'put_array'         => array($file,$field_data),
				'file_put_content'  => $path.$file."/views/create/content.php",
			));
		
		// generate views/create/include
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/create/include.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/create/include.php",
			));
		
		// generate views/create/js
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/create/js.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/create/js.php",
			));

		
		// =========================== VIEWS/UPDATE/ ===========================
		$field_data = $this->field_data_views_update($table);
		
		// generate views/update/content
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/update/content.php',
				'get_array'         => array('{action}','{field}'),
				'put_array'         => array($file,$field_data),
				'file_put_content'  => $path.$file."/views/update/content.php",
			));
		
		// generate views/update/include
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/update/include.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/update/include.php",
			));
		
		// generate views/update/js
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/update/js.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/update/js.php",
			));
		
		// =========================== VIEWS/DETAIL/ ===========================
		$field_data = $this->field_data_views_detail($table);
		
		// generate views/detail/content
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/detail/content.php',
				'get_array'         => array('{field}'),
				'put_array'         => array($field_data),
				'file_put_content'  => $path.$file."/views/detail/content.php",
			));
		
		// generate views/detail/include
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/detail/include.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  => $path.$file."/views/detail/include.php",
			));
		
		// generate views/detail/js
		$this->create_file(array(
				'file_get_content'  => 'x_system/views/detail/js.php',
				'get_array'         => array(),
				'put_array'         => array(),
				'file_put_content'  =>  $path.$file."/views/detail/js.php",
			));
		
		//=========================== ADMIN SIDEBAR ======================================
		$add_sidebar = $this->add_sidebar($file);
		// generate sidebar admin
		$template_file = "application/views/admin/_sidebar.php";
		$get = "<!--{add_sidebar}-->";
                $put = $add_sidebar;
		 
		$get_content = file_get_contents($template_file);
		$get_content = str_replace($get, $put, $get_content);
		file_put_contents($template_file, $get_content);
		 
		
		
		//=========================== SUKSES ======================================
                echo "<strong>Berhasil di generate !!!</strong><br>";
                echo "silakan lihat di <a href='".base_url($file)."' target='_blank'>".base_url($file)."</a><br>";
	        echo "atau Buat lagi <a href='".base_url('x')."'>Di sini</a><br>";
	
	}
	
	
	
	// HELP METHOD
	private function create_file($args = array())
	{
		$get_content = file_get_contents($args['file_get_content']);
                $get = $args['get_array'];
                $put = $args['put_array'];
		$replace = str_replace($get, $put, $get_content);
		$file    = $args['file_put_content'];
                file_put_contents($file,$replace);
	}
	
	// +++++++++++++++++++++++++++ CONFIG ++++++++++++++++++++++++++++++++++
	private function form_validation($table)
	{
		$validation_data =  "'create' => array(".PHP_EOL;
		foreach($_POST['x'] as $x){
			if($x['type'] != 'null')
			{
				if($x['include'] != 'list_search')
				{
					$validation_data .= " \t\t\t\t\t array(
							       'field' => '".$x['name']."',
							       'label' => '".$x['label']."',
							       'rules' => '";
					 foreach($x as $b)
					 {
						if(is_array($b))
						{
						       foreach($b as $e)
						       {
							      if($e != '')
							      {
								$validation_data .= $e."|";
							      }
						       }
						}
					 }
					$validation_data .= "',".PHP_EOL;
					$validation_data .= "\t\t\t\t\t ),".PHP_EOL;
				}
			}
		}		
		$validation_data .= "\t\t\t\t ),".PHP_EOL;
		
		$validation_data .=  "\t\t'update' => array(".PHP_EOL;
		foreach($_POST['x'] as $x){
			if($x['type'] != 'null')
			{
				if($x['include'] != 'list_search')
				{
					$validation_data .= " \t\t\t\t\t array(
							       'field' => '".$x['name']."',
							       'label' => '".$x['label']."',
							       'rules' => '";
					 foreach($x as $b)
					 {
						if(is_array($b))
						{
						       foreach($b as $e)
						       {
							      if($e != '')
							      {
								if($e != "is_unique[".$table.'.'.$x['name']."]")
								{
								   $validation_data .= $e."|";
								}
							      }
						       }
						}
					 }
					$validation_data .= "',".PHP_EOL;
					$validation_data .= "\t\t\t\t\t ),".PHP_EOL;
				}
			}
		}		
		$validation_data .= "\t\t\t\t ),".PHP_EOL;
		
		
		return $validation_data;
	}
	
	
	// +++++++++++++++++++++++++++ CONTROLLERS ++++++++++++++++++++++++++++++++++
	private function array_insert_controller()
	{
		$array_insert = "array(".PHP_EOL;
		foreach($_POST['x'] as $x){
			if($x['type'] != 'null')
				{
				     if($x['include'] != 'list_search')
				     {
				     $array_insert .= "\t\t\t\t'".$x['name']."' => \$this->input->post('".$x['name']."'),".PHP_EOL;
				     }
				}
		}
		$array_insert .= "\t\t\t\t)";
		
		return $array_insert;
	}

	
	// +++++++++++++++++++++++++++ VIEWS/READ +++++++++++++++++++++++++++++++++++
	private function search_by_views_read()
	{
		$search_by = '';
		foreach($_POST['x'] as $x){
			if($x['type'] != 'null'){
				if($x['include'] != 'created_update')
				{
				$search_by .= "<option value='".$x['name']."' >".$x['label']."</option>".PHP_EOL;
				}
			}
		}
		
		return $search_by;
	}
	
	private function list_table_views_read($table,$file)
	{
		
                $list_table  = "<div class='table-responsive margin-table'>".PHP_EOL;
		$list_table .= "<table class='table table-striped table-bordered table-hover table-condensed'>".PHP_EOL;
		$list_table .= "<caption class='text-right'>".PHP_EOL;
		$list_table .= "<?php \$num_rows = core::get_all('".$table."','".$this->session->userdata('database')."')->num_rows();?>".PHP_EOL;
		$list_table .= "<small>Total data : <u class='text-error'><?php echo \$num_rows;?></u></small>".PHP_EOL;
		$list_table .= "</caption>";
		$list_table .= "<thead>".PHP_EOL;
		$list_table .= "<tr>".PHP_EOL;
		$list_table .= "<th style='width:20px;'>No</th>".PHP_EOL;
		foreach($_POST['x'] as $x){
			if($x['type'] != 'null'){
				if($x['include'] != 'created_update')
				{
				$list_table .= "<th>".$x['label']."</th>".PHP_EOL;
				}
			}
		}
		$list_table .= "<th style='text-align:center;width:100px;'>Aksi</th>".PHP_EOL;
		$list_table .= "</tr></thead>".PHP_EOL;
		$list_table .= "<tbody>".PHP_EOL;
		$list_table .= "<?php \$i = \$this->uri->segment(\$segment) + 1;?>".PHP_EOL;
		$list_table .= "<?php foreach(core::get_all_pagination('".$table."','".$this->session->userdata('database')."',\$per_page,\$segment,\$url)->result() as \$row): { ?>";
		$list_table .= "<tr>".PHP_EOL;
		$list_table .=  "<td><?php echo \$i;?></td>".PHP_EOL;
		foreach($_POST['x'] as $x){
		      if($x['type'] != 'null'){
			        if($x['include'] != 'created_update')
				{
				$list_table .= "\t\t\t<td><?php echo \$row->".$x['name']." ;?></td>".PHP_EOL;
				}
			}
		}
		$list_table .= "\t\t\t<td>
		    <center><div class='btn-group' >
		    <a href='<?php echo base_url();?>".$file."/delete/<?php echo \$row->id;?>' class='btn btn-small' data-confirm='Hapus data ini?'><i class='text-error fa fa-trash-o'></i></a>
                    <a  href='<?php echo base_url();?>".$file."/update/<?php echo \$row->id;?>' class='btn   btn-small'><i class='text-warning fa fa-edit'></i></a>
                    <a href='<?php echo base_url();?>".$file."/detail/<?php echo \$row->id;?>' class='btn btn-small'><i class='text-info fa fa-weibo'></i></a>
                    </div></center>
                    </td>
		   ".PHP_EOL;
		$list_table .= "</tr>".PHP_EOL;
		$list_table .= "<?php } ?>".PHP_EOL;
		$list_table .= "<?php \$i++;?>".PHP_EOL;
		$list_table .= "<?php endforeach;?>".PHP_EOL;
		$list_table .= "</tbody>".PHP_EOL;
		$list_table .= "</table>".PHP_EOL;
		$list_table .= "</div>".PHP_EOL;
		
		return $list_table;
	}
	
	
	
	// +++++++++++++++++++++++++++ VIEWS/SEARCH +++++++++++++++++++++++++++++++++++
        private function list_table_views_search($table,$file)
	{
		
		$list_table  = "<div class='table-responsive margin-table'>".PHP_EOL;
		$list_table .= "<table class='table table-striped table-bordered table-hover table-condensed'>".PHP_EOL;
		$list_table .= "<caption class='text-right'>".PHP_EOL;
		$list_table .= "<?php \$num_rows = core::get_search('".$table."','".$this->session->userdata('database')."',\$this->input->get('search'),\$this->input->get('search_by'))->num_rows();?>".PHP_EOL;
		$list_table .= "<small>Total data : <u class='text-error'><?php echo \$num_rows;?></u>
		               ( Hasil pencarian berdasarkan <u class='text-error'> <?php echo \$this->input->get('search_by');?></u> ) -
			       <a href='<?php echo base_url('".$file."');?>'>Back to all</a></small>".PHP_EOL;
                $list_table .= "</caption>";
		$list_table .= "<thead>".PHP_EOL;
		$list_table .= "<tr>".PHP_EOL;
		$list_table .= "<th style='width:20px;'>No</th>".PHP_EOL;
		foreach($_POST['x'] as $x){
			if($x['type'] != 'null'){
				if($x['include'] != 'created_update')
				{
				$list_table .= "<th>".$x['label']."</th>".PHP_EOL;
				}
			}
		}
		$list_table .= "<th style='text-align:center;width:100px;'>Aksi</th>".PHP_EOL;
		$list_table .= "</tr></thead>".PHP_EOL;
		$list_table .= "<tbody>".PHP_EOL;
		$list_table .= "<?php \$i = \$this->input->get('offset') + 1;?>".PHP_EOL;
		$list_table .= "<?php foreach(core::get_search_pagination('".$table."','".$this->session->userdata('database')."',\$this->input->get('search'),\$this->input->get('search_by'),\$per_page,\$url)->result() as \$row): { ?>";
		$list_table .= "<tr>".PHP_EOL;
		$list_table .=  "<td><?php echo \$i;?></td>".PHP_EOL;
		foreach($_POST['x'] as $x){
		      if($x['type'] != 'null'){
			        if($x['include'] != 'created_update')
				{
				$list_table .= "\t\t\t<td><?php echo \$row->".$x['name']." ;?></td>".PHP_EOL;
				}
			}
		}
		$list_table .= "\t\t\t<td>
		    <center><div class='btn-group' >
		    <a href='<?php echo base_url();?>".$file."/delete/<?php echo \$row->id;?>' class='btn btn-small' data-confirm='Hapus data ini??'><i class='text-error fa fa-trash-o'></i></a>
                    <a href='<?php echo base_url();?>".$file."/update/<?php echo \$row->id;?>' class='btn   btn-small'><i class='text-warning fa fa-edit'></i></a>
                    <a href='<?php echo base_url();?>".$file."/detail/<?php echo \$row->id;?>' class='btn btn-small'><i class='text-info fa fa-weibo'></i></a>
                    </div></center>
                    </td>
		    ".PHP_EOL;
		$list_table .= "</tr>".PHP_EOL;
		$list_table .= "<?php } ?>".PHP_EOL;
		$list_table .= "<?php \$i++;?>".PHP_EOL;
		$list_table .= "<?php endforeach;?>".PHP_EOL;
		$list_table .= "</tbody>".PHP_EOL;
		$list_table .= "</table>".PHP_EOL;
		$list_table .= "</div>".PHP_EOL;
		
		return $list_table;
	}
	
	private function search_by_views_search()
	{
		$search_by = '';
		foreach($_POST['x'] as $x){
			if($x['type'] != 'null'){
				if($x['include'] != 'created_update')
				{
				$search_by .= "<option value='".$x['name']."' <?php echo \$this->input->get('search_by') == '".$x['name']."' ? 'selected' : '' ;?>>".$x['label']."</option>".PHP_EOL;
				}
			}
		}
                
		return $search_by;
	}
	
	
	
	// +++++++++++++++++++++++++++ VIEWS/CREATE +++++++++++++++++++++++++++++++++++
	private function field_data_views_create()
	{
		
		$validation_html5 = '';		
		$field_data  = '';
		foreach($_POST['x'] as $x){
			foreach($x as $b)
			{
				if(is_array($b))
					{
					       foreach($b as $e)
					       {
						      if($e != '')
					              {	
								if($e == 'required')
								{
								   $validation_html5 = 'required';
								}
					                }
				                }
				        }
			}
					 
					 
		    if($x['type'] != 'null')
		    {
			if($x['include'] != 'list_search')
			{
				if($x['type'] == 'text')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='text' name='".$x['name']."' value='<?php echo set_value('".$x['name']."');?>' class='".$x['class']."' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'password')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='password' name='".$x['name']."' value='<?php echo set_value('".$x['name']."');?>' class='".$x['class']."' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'textarea')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<textarea name='".$x['name']."' class='".$x['class']."' placeholder='".$x['label']."' ".$validation_html5."><?php echo set_value('".$x['name']."');?></textarea>".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'email')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='email' name='".$x['name']."' value='<?php echo set_value('".$x['name']."');?>' class='".$x['class']."' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'number')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='number' name='".$x['name']."' value='<?php echo set_value('".$x['name']."');?>' class='".$x['class']."' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
			}
			 
		    }
		}
		
		return $field_data;
	}
	
	
	
	// +++++++++++++++++++++++++++ VIEWS/UPDATE +++++++++++++++++++++++++++++++++++
	private function field_data_views_update($table)
	{
		$validation_html5 = '';		
		$field_data  = "<?php \$query = core::get_where('".$table."','".$this->session->userdata('database')."',array('id' => \$this->uri->segment(3)),1); ?>".PHP_EOL;
		$field_data .= "<?php \$row = \$query->row_array();?>".PHP_EOL;
		$field_data .= "<input type='hidden' name='id' value='<?php echo \$row['id'];?>' >".PHP_EOL;
		foreach($_POST['x'] as $x){
			foreach($x as $b)
			{
				if(is_array($b))
					{
					       foreach($b as $e)
					       {
						      if($e != '')
					              {	
								if($e == 'required')
								{
								   $validation_html5 = 'required';
								}
					                }
				                }
				        }
			}
		    if($x['type'] != 'null')
		    {
		        if($x['include'] != 'list_search')
			{
				if($x['type'] == 'text')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='text' name='".$x['name']."' class='".$x['class']."' value='<?php echo \$row['".$x['name']."'];?>' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'password')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='password' name='".$x['name']."' value='<?php echo set_value('".$x['name']."');?>' class='".$x['class']."' value='<?php echo \$row['".$x['name']."'];?>' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'textarea')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<textarea name='".$x['name']."' class='".$x['class']."'  placeholder='".$x['label']."' ".$validation_html5."><?php echo \$row['".$x['name']."'];?><?php echo set_value('".$x['name']."');?></textarea>".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'email')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='email' name='".$x['name']."' value='<?php echo set_value('".$x['name']."');?>' class='".$x['class']."' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
				elseif($x['type'] == 'number')
				{
				$field_data .= "<!-- start ".$x['label']." -->".PHP_EOL;
				$field_data .= "<div class='control-group <?php echo form_error('".$x['name']."') ? 'error' : ''; ?>'>".PHP_EOL;
				$field_data .= "<label class='control-label' ><strong>".ucfirst($x['label'])."</strong></label>".PHP_EOL;
				$field_data .= "<div class='controls'>".PHP_EOL;
				$field_data .= "<input type='number' name='".$x['name']."' value='<?php echo set_value('".$x['name']."');?>' class='".$x['class']."' placeholder='".$x['label']."' ".$validation_html5.">".PHP_EOL;
				$field_data .= "<?php echo form_error('".$x['name']."'); ?>";
				$field_data .= "</div>".PHP_EOL."</div>".PHP_EOL."<!-- end ".$x['label']." -->".PHP_EOL.PHP_EOL;
				}
			}
		    }
		}
		
		return $field_data;
	}
	
	
	// +++++++++++++++++++++++++++ VIEWS/DETAILS +++++++++++++++++++++++++++++++++++
	private function field_data_views_detail($table)
	{
		$field_data  = "<table class='table table-striped table-bordered table-hover table-condensed'>".PHP_EOL;
		$field_data .= "<tbody>";
		$field_data .= "<?php foreach (core::get_where('".$table."','".$this->session->userdata('database')."',array('id' => \$this->uri->segment(3)),1)->result() as \$row) { ; ?>".PHP_EOL;
		foreach($_POST['x'] as $x){
			$field_data .= "<tr><td>".$x['label']."</td>".PHP_EOL;
			$field_data .= "<td><?php echo \$row->".$x['name'].";?></td></tr>".PHP_EOL;
			}
		$field_data  .= "<?php } ?>";
		$field_data  .= "</tbody>";
		$field_data  .= "</table>";
		
		return $field_data;
	
	}
	
	// +++++++++++++++++++++++++++ ADMIN SIDEBAR +++++++++++++++++++++++++++++++++++
	private function add_sidebar($file)
	{
		$file_replace = str_replace('_',' ',$file);
		
		$sidebar = " <li>
		<a data-toggle='collapse' data-target='#$file' data-parent='#$file' class='accordion-toggle collapsed'>
                <i class='fa fa-angle-right'></i> <span> $file_replace </span>
                <span class='pull-right'>
                <i class='fa fa-angle-double-right'></i>
                </span>
                </a>
                <ul id='$file' class='nav nav-list <?php echo \$this->uri->segment(1) != '$file' ? 'collapse' : '';?>'>
                <li><a href='<?php echo base_url();?>$file/create'><i class='fa fa-caret-right'></i> Add $file_replace</a></li>
                <li><a href='<?php echo base_url();?>$file'><i class='fa fa-caret-right'></i> List $file_replace</a></li>
                </ul>
                </li>
		
		<!--{add_sidebar}-->";
		
		return $sidebar;
	}
}
 