<?php
$config = array(
  
            'create' => array(
 					 array(
							       'field' => 'username',
							       'label' => 'username',
							       'rules' => 'required|trim|xss_clean|',
					 ),
                                          array(
							       'field' => 'email',
							       'label' => 'email',
							       'rules' => 'valid_email|required|trim|xss_clean|',
					 ),
                                           array(
							       'field' => 'password',
							       'label' => 'password',
							       'rules' => 'required|trim|xss_clean|',
					 ),
                                            array(
							       'field' => 'ulangi_password',
							       'label' => 'Uangi password',
							       'rules' => 'matches[password]|required|trim|xss_clean|',
					 ),
 					 
				 ),
		 
               );