<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ubah_username extends Admincore
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
                $this->form_validation->set_message('alpha_dash', 'Karakter yang di ijinkan ( huruf, angka, underscores dan dashes)');
       
        if ($this->form_validation->run('create') == FALSE)
        {
	    
	    
            $data['content'] =   $this->load->view('/content','',TRUE);
            $this->load->view("admin/main",$data);
        }
        else
        {
	    $this->session->set_flashdata('sukses','sukses'); 
	    
	    $username = $this->input->post('username_baru');
	    
	    $this->session->set_userdata('username',$username);
	    
	    core::update('admin','gammu',array(
				'username' => $username,		
				),$this->session->userdata('id'));
	    redirect('ubah_username');
        }
    }
    
    function check_username($username)
    {
	$query = core::get_where('admin','gammu',array('username' => $username, 'id' => $this->session->userdata('id')),1);
	if($query->num_rows() > 0)
	{
	    return TRUE;
	}
	else
	{
	    $this->form_validation->set_message('check_username', 'Username lama salah');
	    return FALSE;
	}
    }
    
   

     
}




