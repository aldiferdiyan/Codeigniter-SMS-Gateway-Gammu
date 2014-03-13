<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Admincore extends Core
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('admincore_model');
        if(!$this->session->userdata('admin_username') AND
	   !$this->session->userdata('admin_email')  AND
	   !$this->session->userdata('admin_password') )
	{   
            redirect('home');
        }
    }


}