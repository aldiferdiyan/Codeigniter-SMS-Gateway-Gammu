<?php
$config = array(
  
            'create' => array(
 					 array(
			                       'field' => 'username_lama',
			                       'label' => 'username lama',
			                       'rules' => 'required|trim|xss_clean|htmlspecialchars|callback_check_username',
					 ),
 					 array(
			                       'field' => 'username_baru',
			                       'label' => 'username baru',
			                       'rules' => 'required|trim|xss_clean|htmlspecialchars|',
					 ),
                                         
 					 
				 ),
		
               );