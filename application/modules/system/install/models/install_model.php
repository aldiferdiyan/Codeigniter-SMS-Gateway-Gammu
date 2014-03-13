<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Install_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
        
    }

    function create_db($db,$prefix)
    {
        $admin_table = $prefix."admin";
        $con=mysqli_connect("localhost","root","","$db");
        // Check connection
        if (mysqli_connect_errno())
          {
           return FALSE;
          }
        
        // Create table
        $sql1 ="CREATE TABLE $admin_table(
                            id BIGINT(255) NOT NULL AUTO_INCREMENT,
                            PRIMARY KEY (id),
                            username varchar(255) NOT NULL,
                            password varchar(255) NOT NULL,
                            email varchar(255) NOT NULL,
                            activated TINYINT(2) NOT NULL DEFAULT '1',
                            banned TINYINT(2) NOT NULL DEFAULT '0',
                            last_ip varchar(255),
                            last_login DATETIME,
                            created DATETIME,
                            modified DATETIME,
                            status TINYINT(2) NOT NULL,
                            avatar varchar(255) NOT NULL,
                            description TEXT,
                            online TINYINT(2) NOT NULL DEFAULT '0' )";
                            

                
            // Execute query
        if (mysqli_query($con,$sql1))
          {
             return TRUE;
          }
        else
          {
            return FALSE;
          }
         
    }
    
    function add_admin($table,$username,$password,$email)
    {
         $password_encrypt = sha1(md5($password));
        
           $data = array(
             'username'    => $username,
             'password'    => $password_encrypt,
             'email'       => $email,
             'status'      => '1',
           );
           if($this->db->insert($table,$data))
           {
               return TRUE;
           }
           else
           {
                return FALSE;
           }
    }
    
  
    
}