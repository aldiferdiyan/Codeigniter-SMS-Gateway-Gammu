<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends Core
{
    function __construct()
    {
        parent::__construct();
    }
    
    /* METHOD "READ"
     * berfungsi untuk membaca query dari database dengan system pagination
     * dengan 2 data include dan content yang akan di load ke "VIEW/READ"
     */
    function index()
    {
        $data['include'] =   $this->load->view('/read/include','',TRUE);
        $data['content'] =   $this->load->view('/read/content',$data,TRUE);
        $this->load->view("_layouts/main",$data);
    }
    
    /* METHOD "CREATE"
     * berfungsi untuk membuat / insert data ke dalam database
     * dengan 2 data include dan content yang akan di load ke "VIEW/CREATE"
     * dan terdapat validasi data yang di input ke database
     */
    function create()
    {
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-danger text-center">*', '</p>');  
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['include'] =   $this->load->view('/create/include','',TRUE);
            $data['content'] =   $this->load->view('/create/content',$data,TRUE);
            $this->load->view("_layouts/main",$data);
        }
        else
        {
            redirect('');
        }
    }
    
    /* METHOD "UPDATE"
     * berfungsi untuk mengupdate data dari database
     * dengan 2 data include dan content yang akan di load ke "VIEW/UPDATE"
     * dan terdapat validasi data yang di update ke database
     */
    function update($id = NULL)
    {
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters('<p class="text-danger text-center">*', '</p>');  
        
        if ($this->form_validation->run('update') == FALSE)
        {
        $data['include'] =   $this->load->view('/update/include','',TRUE);
        $data['content'] =   $this->load->view('/update/content',$data,TRUE);
        $this->load->view("_layouts/main",$data);
        }
        else
        {
            redirect('');
        }
    }
    
    // ACTIONS METHOD
    // method-method yang berfungsi hanya untuk sebuah actions/tidak ada view
    
    /* METHOD "DELETE"
     * berfungsi untuk menghapus data dari database
     * tidak ada content yang di VIEW di method ini
     */
    function delete($id = NULL)
    {
        core::delete('tbl',$id);
        redirect('');
    }
}