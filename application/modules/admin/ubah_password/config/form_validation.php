<?php
$config = array(
  
            'create' => array(
 					 array(
			                       'field' => 'password_lama',
			                       'label' => 'password lama',
			                       'rules' => 'required|trim|xss_clean|htmlspecialchars|callback_check_password',
					 ),
 					 array(
			                       'field' => 'password_baru',
			                       'label' => 'password baru',
			                       'rules' => 'required|trim|xss_clean|matches[password_baru_konfirmasi]|min_length[4]|max_length[15]|htmlspecialchars',
					 ),
                                          array(
			                       'field' => 'password_baru_konfirmasi',
			                       'label' => 'konfirmasi Password baru',
			                       'rules' => 'required|trim|xss_clean|min_length[4]|max_length[15]|htmlspecialchars',
					 ),
 					 
				 ),
		
               );