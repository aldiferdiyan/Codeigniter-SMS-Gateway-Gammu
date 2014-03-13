<?php
$config = array(
  
            'create' => array(
 					 array(
							       'field' => 'UpdatedInDB',
							       'label' => 'UpdatedInDB',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Text',
							       'label' => 'Text',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'SenderNumber',
							       'label' => 'SenderNumber',
							       'rules' => 'required|trim|xss_clean|',
					 ),
				 ),
		'update' => array(
 					 array(
							       'field' => 'UpdatedInDB',
							       'label' => 'UpdatedInDB',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Text',
							       'label' => 'Text',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'SenderNumber',
							       'label' => 'SenderNumber',
							       'rules' => 'required|trim|xss_clean|',
					 ),
				 ),

                                         
               );