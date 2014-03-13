<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Install extends CI_Controller {
        
	function __construct()
	{
             parent::__construct();
	     $this->load->model('install_model');
	}

	function index() // step 1
	{
	    if($this->session->userdata('prefix_table')){
		redirect('install/create_login');
	    }
	    
            $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
            $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');  
            $this->form_validation->set_rules('db','Nama Database','required');
            
            if ($this->form_validation->run() == FALSE)
            {
		 
		$data['content'] = $this->load->view('/step_1','',TRUE);
                $this->load->view("/_layouts",$data);
            }
            else
            {
		$db        = $this->input->post('db');
		$prefix    = $this->input->post('prefix')."_";
		$admin_table     = $prefix."admin";
		
		$create_db = $this->install_model->create_db($db,$prefix);
		
		if($create_db == TRUE)
		{
		    // ################ CONFIG/CONFIG.PHP ####################
		   $this->create_file(array(
				'file_get_content'  => 'wdc-install/config/config.php',
				'get_array'         => array('{base_url}'),
				'put_array'         => array(base_url()),
				'file_put_content'  => 'application/config/config.php',
			));
			
		   // ################ CONFIG/DATABASE.PHP ####################
		    $this->create_file(array(
				'file_get_content'  => 'wdc-install/config/database.php',
				'get_array'         => array('{nama_database}'),
				'put_array'         => array($db),
				'file_put_content'  => 'application/config/database.php',
			));
		   
		   
		   $this->session->set_userdata('prefix_table',$admin_table);
		   redirect('install/create_login');
		}
		else
		{
		    $this->session->set_flashdata('alert','terjadi kesalahan mohon ulangi lagi');
		    redirect('install');
		}
            }
	}
	
	function create_login() // step 2
	{
	   if(!$this->session->userdata('prefix_table')){
		redirect('install');
	   }
	    
	    $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
            $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');  
            $this->form_validation->set_rules('login_page','Nama Halaman','required');
	    $this->form_validation->set_rules('login_name','Nama Login','required');
            
            if ($this->form_validation->run() == FALSE)
            {
		 
		$data['content'] = $this->load->view('/step_2','',TRUE);
                $this->load->view("/_layouts",$data);
            }
            else
            {
		
		$login_page  = $this->input->post('login_page');
		$login_name  = $this->input->post('login_name');
		$table       = $this->session->userdata('prefix_table');
	
                $path = "application/modules/admin/";
		$this->create_dir($path.$login_page);
                mkdir($path.$login_page."/controllers");
                mkdir($path.$login_page."/models");
                mkdir($path.$login_page."/views");
		
		// =========================== CONTROLLERS ===========================
		$this->create_file(array(
				'file_get_content'  => 'wdc-install/login/controllers/login.php',
				'get_array'         => array('{login_page_ucfirst}','{login_page}'),
				'put_array'         => array(ucfirst($login_page),$login_page),
				'file_put_content'  => $path.$login_page."/controllers/".$login_page.".php",
			));
	        
		// =========================== MODELS ===========================
		$this->create_file(array(
				'file_get_content'  => 'wdc-install/login/models/login_model.php',
				'get_array'         => array('{login_page_ucfirst}','{table}'),
				'put_array'         => array(ucfirst($login_page),$table),
				'file_put_content'  => $path.$login_page."/models/".$login_page."_model.php",
			));
		
		// =========================== VIEWS ===========================
		$this->create_file(array(
				'file_get_content'  => 'wdc-install/login/views/login.php',
				'get_array'         => array('{login_name}','{login_page}'),
				'put_array'         => array($login_name,$login_page),
				'file_put_content'  => $path.$login_page."/views/".$login_page.".php",
		));
               
		// =========================== VIEWS/ADMIN/_HEADER ===========================
		$this->create_file(array(
				'file_get_content'  => 'wdc-install/views/_header.php',
				'get_array'         => array('{title}'),
				'put_array'         => array($login_name),
				'file_put_content'  => "application/views/_header.php",
		));
		
		// =========================== VIEWS/ADMIN/_FOOTER ===========================
		$this->create_file(array(
				'file_get_content'  => 'wdc-install/views/_footer.php',
				'get_array'         => array('{title}'),
				'put_array'         => array($login_name),
				'file_put_content'  => "application/views/_footer.php",
		));
		
		// =========================== CORE/ADMINCORE ===========================
		$this->create_file(array(
				'file_get_content'  => 'wdc-install/core/Admincore.php',
				'get_array'         => array('{table}'),
				'put_array'         => array($table),
				'file_put_content'  => "application/core/Admincore.php",
		));
		
		
		
		redirect('install/create_admin');
	    }
	}

	
	function create_admin() // step 3
	{
	//     if(!$this->session->userdata('prefix_table')){
	//	redirect('install');
	//    }
	    $table   = $this->session->userdata('prefix_table');
            $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
            $this->form_validation->set_error_delimiters('<span class="text-error">*', '</span>');  
            $this->form_validation->set_rules('username','Username',"required|is_unique[$table.username]");
	    $this->form_validation->set_rules('password','Password','required');
	    $this->form_validation->set_rules('email','Email',"required|valid_email|is_unique[$table.email]");
            
            if ($this->form_validation->run() == FALSE)
            {
		 
		$data['content'] = $this->load->view('/step_3','',TRUE);
                $this->load->view("/_layouts",$data);
            }
            else
            {
		$username       = $this->input->post('username');
		$password       = $this->input->post('password');
		$email          = $this->input->post('email');
		
		$add_admin = $this->install_model->add_admin($table,$username,$password,$email);
		
		if($add_admin == TRUE)
		{
			$this->session->unset_userdata('prefix_table');
			redirect('install/finish');
		}
		else
		{
			redirect('install/create_admin');
		}
		
		
            }
	}
	function finish() // finish
	{
		$data['content'] = $this->load->view('/step_4','',TRUE);
                $this->load->view("/_layouts",$data);
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
	
	private function update_file($args = array())
	{
		$get_content = file_get_contents($args['file_content']);
                $get = $args['get_array'];
                $put = $args['put_array'];
		$replace = str_replace($get, $put, $get_content);
		$file    = $args['file_content'];
                file_put_contents($file,$replace);
	}
	
	private function create_dir($path)
	{
		if(!file_exists($path))
		{
		    mkdir($path,0700);
		}
		else
		{
		    redirect('install/create_login');
		}
	}
	
	function rollback()
	{
		$this->session->unset_userdata('prefix_table');
		redirect('install');
	}
	
}
 