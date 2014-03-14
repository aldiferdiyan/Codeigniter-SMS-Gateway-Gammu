<?php
$config = array(
  
            'create' => array(
 					 array(
							       'field' => 'GroupID',
							       'label' => 'GroupID',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Name',
							       'label' => 'Name',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Number',
							       'label' => 'Number',
							       'rules' => 'required|trim|xss_clean|',
					 ),
				 ),
		'update' => array(
 					 array(
							       'field' => 'GroupID',
							       'label' => 'GroupID',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Name',
							       'label' => 'Name',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Number',
							       'label' => 'Number',
							       'rules' => 'required|trim|xss_clean|',
					 ),
				 ),

                                         
               );