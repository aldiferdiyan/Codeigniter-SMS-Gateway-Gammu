<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Admincore extends Core
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('admincore_model');
        if(!$this->session->userdata('username'))
	{   
            redirect('login');
        }
    }


}