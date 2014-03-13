<?php
$config = array(
  
            'create' => array(
 					 array(
							       'field' => 'SendingDateTime',
							       'label' => 'SendingDateTime',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Text',
							       'label' => 'Text',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'DestinationNumber',
							       'label' => 'DestinationNumber',
							       'rules' => 'required|trim|xss_clean|',
					 ),
				 ),
		'update' => array(
 					 array(
							       'field' => 'SendingDateTime',
							       'label' => 'SendingDateTime',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'Text',
							       'label' => 'Text',
							       'rules' => 'required|trim|xss_clean|',
					 ),
 					 array(
							       'field' => 'DestinationNumber',
							       'label' => 'DestinationNumber',
							       'rules' => 'required|trim|xss_clean|',
					 ),
				 ),

                                         
               );