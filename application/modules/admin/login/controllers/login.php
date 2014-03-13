<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model','model');
    }
  
      function index()
    {
	if($this->session->userdata('username') != '')
	    redirect('phonebook');
        
	
            $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
            $this->form_validation->set_error_delimiters('<p class="text-danger text-center">*', '</p>');
            $this->form_validation->set_rules('username_email', 'Username', 'required|xss_clean|trim|htmlspecialchars');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|htmlspecialchars');
 
            if ($this->form_validation->run() == FALSE)
	    {
                   $this->load->view('content');
	    }
            else
		{   
                  if($this->check_login() == TRUE)
		    redirect('phonebook');
                  else{
		    $this->session->set_flashdata('login_error','error message');
		    redirect('login');
		  }
                }
      
            
    }
    
    private function check_login() // check
    {
		$username_email   = $this->input->post('username_email');
		$password         = $this->input->post('password');
		$password_encrypt = sha1(md5($password));
        
                $query = $this->model->check_login($username_email,$password_encrypt);
                if( $query->num_rows() > 0 )
                    {
			$row = $query->row(1);
			$data = array(
			    'username'        => $row->username,
			    'email'           => $row->email,
			    'id'              => $row->id,
			);
                        $this->session->set_userdata($data);

                        return TRUE;
                    }
                else
                    {
                        return FALSE;
                    }
 
    }
    
    
    function logout()
    {
	if($this->session->userdata('username') != '')
	{
	    $this->session->sess_destroy();
	    redirect('login');
	}
	else
	    redirect('login');
    }
    
    
}