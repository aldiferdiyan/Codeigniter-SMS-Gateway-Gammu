<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_model
{
    function __construct()
    {
         date_default_timezone_set("Asia/Jakarta");
         parent::__construct();
    }
    
    function check_login($username_email,$password_encrypt)
    {
        $db = $this->load->database('gammu',TRUE);
        $where_username = array('username' => $username_email, 'password' => $password_encrypt);
        
        $db->where($where_username);
        $query = $db->get('admin',1);
        
        return $query;
    }
    
     
}