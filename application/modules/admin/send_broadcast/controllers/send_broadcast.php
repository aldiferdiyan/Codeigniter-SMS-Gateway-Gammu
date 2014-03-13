<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_broadcast extends Sitecore
{
    function __construct()
    {
        parent::__construct();
        
    }
  
    function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-alert">', '</p> ');  
        $this->form_validation->set_rules('SendNumber[]','Phone Number','required|xss_clean|htmlspecialchars|numeric|trim');
        $this->form_validation->set_rules('message','Message','required|xss_clean|htmlspecialchars|trim');
         
        
        if ($this->form_validation->run() == FALSE)
        {
           
            
            $data['content'] = $this->load->view('content','',TRUE);
            $this->load->view('/admin/main',$data);
        }
         else
        {

	        $t = count($_POST['SendNumber']);
		foreach($_POST['SendNumber'] as $x)
		{
		    core::insert('outbox','gammu',array(
					'DestinationNumber' => $x,
						     'TextDecoded' => $this->input->post('message'),
					));
		}
	    
		$this->session->set_flashdata('success','success');
		$this->session->set_flashdata('TotalSend',$t);
		redirect('send_broadcast');
	     
        }
    }
    
     
}