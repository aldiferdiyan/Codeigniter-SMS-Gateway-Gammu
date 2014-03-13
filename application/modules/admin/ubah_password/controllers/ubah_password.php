<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ubah_password extends Core
{
    function __construct()
    {
        parent::__construct();
        
    }
    
   
    /* METHOD "CREATE"
     * berfungsi untuk membuat / insert data ke dalam database
     */
    function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-error">*', '</p>');  
 
       
        if ($this->form_validation->run('create') == FALSE)
        {
            $data['content'] =   $this->load->view('/create/content','',TRUE);
            $this->load->view("admin/main",$data);
        }
        else
        {
	    $this->session->set_flashdata('sukses','sukses');
	    $password_encrypt = sha1(md5($this->input->post('password_baru')));
	    
	    core::update('admin','gammu',array(
				'password' => $password_encrypt,		
				),$this->session->userdata('id'));
	    redirect('ubah_password');
        }
    }
    
    function check_password($password)
    {
	$password_encrypt = sha1(md5($password));
	$query = core::get_where('admin','gammu',array('password' => $password_encrypt,'username' => $this->session->userdata('username')),1);
	
	if($query->num_rows() > 0)
	{
	    return TRUE;
	}
	else
	{
	      $this->form_validation->set_message('check_password', 'Password lama salah');
	  
	    return FALSE;
	}
    }
    
   

     
}




