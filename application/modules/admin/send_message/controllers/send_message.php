<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_message extends Admincore
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
        $this->form_validation->set_rules('phone','Phone','required|xss_clean|htmlspecialchars|numeric|trim');
        $this->form_validation->set_rules('message','Message','required|xss_clean|htmlspecialchars|trim');
          
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['content'] = $this->load->view('send_by_phonebook','',TRUE);
            $this->load->view('/admin/main',$data);
        }
         else
        {
            for($i = 1;$i <= $this->input->post('total');$i++)
            {
                    core::insert('outbox','gammu',array(
                                                'DestinationNumber' => $this->input->post('phone'),
                                                'TextDecoded' => $this->input->post('message'),
                                         ));
            }
            $this->session->set_flashdata('success','success');
	    $this->session->set_flashdata('TotalSend',$t);
	    redirect('send_message');
	     
        }
    }
    
    function send_by_group()
    {
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-alert">', '</p> ');  
        $this->form_validation->set_rules('group','Goup','required|xss_clean|htmlspecialchars|trim');
        $this->form_validation->set_rules('message','Message','required|xss_clean|htmlspecialchars|trim');
          
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['content'] = $this->load->view('send_by_group','',TRUE);
            $this->load->view('/admin/main',$data);
        }
         else
        {
             
            for($i = 1;$i <= $this->input->post('total');$i++)
            {
                   $query = core::get_where('pbk','gammu',array('GroupID' => $this->input->post('group')));
                   if($query != 0){
                        foreach($query->result() as $row){
                             core::insert('outbox','gammu',array(
                                                         'DestinationNumber' => $row->Number,
                                                         'TextDecoded' => $this->input->post('message'),
                                                  ));
                        }
                   }else{
                          $query = core::get_where('pbk','gammu',array('GroupID !=' => $this->input->post('group')));
                          foreach($query->result() as $row){
                             core::insert('outbox','gammu',array(
                                                         'DestinationNumber' => $row->Number,
                                                         'TextDecoded' => $this->input->post('message'),
                                                  ));
                        }
                      }
            }
      
            $this->session->set_flashdata('success','success');
	    $this->session->set_flashdata('TotalSend',$t);
	    redirect('send_message/send_by_group');
              }
	     
        }
     
        
    function send_by_number()
    {
         $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-alert">', '</p> ');  
        $this->form_validation->set_rules('phone','Phone','required|xss_clean|htmlspecialchars|numeric|trim');
        $this->form_validation->set_rules('message','Message','required|xss_clean|htmlspecialchars|trim');
          
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['content'] = $this->load->view('send_by_number','',TRUE);
            $this->load->view('/admin/main',$data);
        }
         else
        {
            for($i = 1;$i <= $this->input->post('total');$i++)
            {
                    core::insert('outbox','gammu',array(
                                                'DestinationNumber' => $this->input->post('phone'),
                                                'TextDecoded' => $this->input->post('message'),
                                         ));
            }
            $this->session->set_flashdata('success','success');
	    $this->session->set_flashdata('TotalSend',$t);
	    redirect('send_message/send_by_number');
	     
        }
    }
    
 }