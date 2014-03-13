<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Phonebook extends Sitecore
{
    function __construct()
    {
        parent::__construct();
        
    }
  
    function index()
    {
        $data['content'] = $this->load->view('content','',TRUE);
        $this->load->view('/admin/main',$data);
    }
    
    function search()
    {
        $data['content'] = $this->load->view('content','',TRUE);
        $this->load->view('/admin/main',$data);
    }
    
    function create()
    {
	$this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-error">', '</p> ');
	if(!empty($_POST['x']))
        {
	    foreach($_POST['x'] as $row => $val) {
	    $this->form_validation->set_rules("x[$row][name]",'Name','required|trim');
	    $this->form_validation->set_rules("x[$row][phone]",'Phone','required|numeric|trim');
	   }
	}
	
        if ($this->form_validation->run() == FALSE)
        {
	  $data['content'] = $this->load->view('create','',TRUE);
          $this->load->view('/admin/main',$data);
	}
        else
        {
	  foreach($_POST['x'] as $row) {
            core::insert('phonebook','gammu',array(
				    'name'  => $row['name'],
				    'phone' => $row['phone'],
				    'created' => date('Y-m-d H:i:s')
				));
	  }
            redirect('phonebook');
        }
    }
    
    function update($id)
    {
	$this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-error">', '</p> ');  
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('phone','Phone','required|numeric|trim');
	
        if ($this->form_validation->run() == FALSE)
        {
	 $data['id']    = $id;
	  $data['content'] = $this->load->view('update',$data,TRUE);
          $this->load->view('/admin/main',$data);
	}
        else
        {
            core::update('phonebook','gammu',array(
				    'name'  => $this->input->post('name'),
				    'phone' => $this->input->post('phone'),
				    'modified' => date('Y-m-d H:i:s')
				),$id);
            redirect('phonebook');
        }
    }
    
    function delete($id = NULL)
    {
       core::delete('phonebook','gammu','id',$id);
       redirect('phonebook');
    }
    
    
    
    
}