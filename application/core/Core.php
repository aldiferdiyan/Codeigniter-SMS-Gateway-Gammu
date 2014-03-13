<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core extends MX_Controller {
    
    
    function __construct()
    {
        parent::__construct();
	$this->load->config('jm_url');
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('core_model',"model");
    }
    
    // ------------------------- get all
    function get_all($tbl,$database,$order_by = 'id desc',$limit = NULL,$offset = NULL)
    {
        $query = $this->model->get_all($tbl,$database,$order_by,$limit,$offset);
        return $query;
    }
    function get_all_pagination($tbl,$database,$per_page,$segment,$url)
    {
        $query = $this->model->get_all_pagination($tbl,$database,$per_page,$segment,$url);
        return $query;
    }
    
    // ------------------------- get search
    function get_search($tbl,$database,$search,$search_by,$limit = NULL,$offset = NULL)
    {
        $db = $this->load->database($database,TRUE);
        if ($db->field_exists($search_by, $tbl))
	{
            $query = $this->model->get_search($tbl,$database,$search,$search_by,$limit,$offset);
            return $query;
        }
        else
        {
            $base_url = base_url().$this->uri->segment(1);
            header("Location: $base_url", true, 302);
            exit;
        }
    }
    function get_search_pagination($tbl,$database,$search,$search_by,$per_page,$url)
    {
        $db = $this->load->database($database,TRUE);
        if ($db->field_exists($search_by, $tbl))
	{
            $query = $this->model->get_search_pagination($tbl,$database,$search,$search_by,$per_page,$url);
            return $query;
        }
        else
        {
            $base_url = base_url().$this->uri->segment(1);
            header("Location: $base_url", true, 302);
            exit;
        }
    }
    
    // ------------------------- get join
    function get_join($tbl1,$tbl2,$join_by,$param = NULL,$database,$limit = NULL,$offset = NULL)
    {
        $query = $this->model->get_join($tbl1,$tbl2,$join_by,$param,$database,$limit,$offset);
        return $query;
    }
    function get_join_pagination($tbl1,$tbl2,$join_by,$param = NULL,$database,$per_page,$segment,$url)
    {
         $query = $this->model->get_join_pagination($tbl1,$tbl2,$join_by,$param,$database,$per_page,$segment,$url);
         return $query;
    }
    
    // ------------------------- get join search
    function get_join_search($tbl1,$tbl2,$join_by,$database,$search,$search_by,$limit = NULL,$offset = NULL)
    {
        $db = $this->load->database($database,TRUE);
        if ($db->field_exists($search_by, $tbl2))
	{
            $query = $this->model->get_join_search($tbl1,$tbl2,$join_by,$database,$search,$search_by,$limit,$offset);
            return $query;
        }
        else
        {
            $base_url = base_url().$this->uri->segment(1);
            header("Location: $base_url", true, 302);
            exit;
        }
    }
    function get_join_search_pagination($tbl1,$tbl2,$join_by,$database,$search,$search_by,$per_page,$url)
    {
        $db = $this->load->database($database,TRUE);
        if ($db->field_exists($search_by, $tbl2))
	{
            $query = $this->model->get_join_search_pagination($tbl1,$tbl2,$join_by,$database,$search,$search_by,$per_page,$url);
            return $query;
        }
        else
        {
            $base_url = base_url().$this->uri->segment(1);
            header("Location: $base_url", true, 302);
            exit;
        }
    }
    
    // ------------------------- get where join
    function get_where_join($tbl1,$tbl2,$join_by,$database,$array,$limit = NULL,$offset = NULL)
    {
        $query = $this->model->get_where_join($tbl1,$tbl2,$join_by,$database,$array,$limit,$offset);
        return $query;
    }
    function get_where_join_pagination($tbl1,$tbl2,$join_by,$database,$array,$per_page,$segment,$url)
    {
        $query = $this->model->get_where_join_pagination($tbl1,$tbl2,$join_by,$database,$array,$per_page,$segment,$url);
        return $query;
    }
    
    // ------------------------- get where join search
    function get_where_join_search($tbl1,$tbl2,$join_by,$database,$array,$search,$search_by,$limit = NULL,$offset = NULL)
    {
        $db = $this->load->database($database,TRUE);
        if ($db->field_exists($search_by, $tbl2))
	{
        $query = $this->model->get_where_join_search($tbl1,$tbl2,$join_by,$database,$array,$search,$search_by,$limit,$offset);
        return $query;
        }
        else
        {
            $base_url = base_url().$this->uri->segment(1);
            header("Location: $base_url", true, 302);
            exit;
        }
    }
    function get_where_join_search_pagination($tbl1,$tbl2,$join_by,$database,$array,$search,$search_by,$per_page,$url)
    {
        $db = $this->load->database($database,TRUE);
        if ($db->field_exists($search_by, $tbl2))
	{
        $query = $this->model->get_where_join_search_pagination($tbl1,$tbl2,$join_by,$database,$array,$search,$search_by,$per_page,$url);
        return $query;
        }
        else
        {
            $base_url = base_url().$this->uri->segment(1);
            header("Location: $base_url", true, 302);
            exit;
        }
    }
    
    
    // ------------------------- get where
    function get_where($tbl,$database,$array,$limit = NULL,$offset = NULL)
    {
        $query = $this->model->get_where($tbl,$database,$array,$limit,$offset);
        return $query;
    }
    function get_where_pagination($tbl,$database,$array,$per_page,$segment,$url)
    {
        $query = $this->model->get_where_pagination($tbl,$database,$array,$per_page,$segment,$url);
        return $query;
    }
        
    function get_random($tbl,$database,$limit = NULL,$offset = NULL)
    {
        $query = $this->model->get_random($tbl,$database,$limit,$offset);
        return $query;
    }
    

    
    function insert($tbl,$database,$arr)
    {
        $this->model->insert($tbl,$database,$arr);
    }
    
    function update($tbl,$database,$arr,$id)
    {
        $this->model->update($tbl,$database,$arr,$id);
    }
     function update_where($tbl,$database,$arr,$where,$value)
    {
	    $this->model->update_where($tbl,$database,$arr,$where,$value);
    }
    
    function delete($tbl,$database,$param,$id)
    {
        $this->model->delete($tbl,$database,$param,$id);
    }
    
    
    function get_sum($tbl,$database,$sum)
    {
        $this->model->get_sum($tbl,$database,$sum);
    }

    // HELPER
    function rupiah($angka){
    $angka= number_format($angka, 0, ".","."); 
    return $angka;
    }
    
    function voucher($nilai)
    { 
	 $voucher = 
	    substr($nilai,0,4) . ' - ' . 
	    substr($nilai,4,4) . ' - ' . 
	    substr($nilai,8,4). ' - ' . 
	    substr($nilai,12,4). ' - ' . 
	    substr($nilai,16,4). ' - ' . 
	    substr($nilai,20,4);
        
        
	return $voucher;
    }
}