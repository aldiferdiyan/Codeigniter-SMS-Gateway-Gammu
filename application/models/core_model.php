<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
        
    }
    
    // ################ GET ALL ###########################3
    function get_all($tbl,$database,$order_by,$limit,$offset)
    {
	$db = $this->load->database($database,TRUE);
        $db->order_by($order_by);
        $query = $db->get($tbl,$limit,$offset);
        return $query;
    }
    
    function get_all_pagination($tbl,$database,$per_page,$segment,$url)
    {
	$db = $this->load->database($database,TRUE);
            $this->load->library('pagination');
            $config['base_url']   = base_url().$url;
            $config['total_rows'] = $db->count_all($tbl);
            $config['per_page']   = $per_page;
            $config['uri_segment'] = $segment;
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next <i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';   
            $this->pagination->initialize($config);
            $db->order_by("id", "desc");
            $query = $db->get($tbl,$config['per_page'],$this->uri->segment($segment));
            return $query; 
    }
    
    //####################### GET JOIN ################################
    function get_join($tbl1,$tbl2,$join_by,$param,$database,$limit,$offset)
    {
	    $db = $this->load->database($database,TRUE);
            $db->select('*');
	     $db->order_by($tbl2.'.id','desc');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by, $param);
	    $db->limit($limit,$offset);
	    $query = $db->get();
	    return $query;
    }
    function get_join_pagination($tbl1,$tbl2,$join_by,$param,$database,$per_page,$segment,$url)
    {
	$db = $this->load->database($database,TRUE);
	    $db->select('*');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by, $param);
	    $query = $db->get();
	    $num = $query->num_rows();
	    
            $this->load->library('pagination');
            $config['base_url']   = base_url().$url;
            $config['total_rows'] = $num;
            $config['per_page']   = $per_page;
            $config['uri_segment'] = $segment;
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next <i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';   
            $this->pagination->initialize($config);
	    $db->select('*');
	    $db->order_by($tbl2.'.id','desc');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $db->limit($config['per_page'], $this->uri->segment($segment));
	    $query = $db->get();
            return $query; 
    }
    
    //####################### GET WHERE JOIN ################################
    function get_where_join($tbl1,$tbl2,$join_by,$database,$array,$limit,$offset)
    {
	$db = $this->load->database($database,TRUE);
            $db->select('*');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	     $where = $array;
	    $db->where($where);
		if($limit != ''){
		$db->limit($limit,$offset);
		}
	    $query = $db->get();
	    return $query;
    }
    function get_where_join_pagination($tbl1,$tbl2,$join_by,$database,$array,$per_page,$segment,$url)
    {
	$db = $this->load->database($database,TRUE);
	    $db->select('*');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $where = $array;
	    $db->where($where);
	    $query = $db->get();
	    $num = $query->num_rows();
	    
            $this->load->library('pagination');
            $config['base_url']   = base_url().$url;
            $config['total_rows'] = $num;
            $config['per_page']   = $per_page;
            $config['uri_segment'] = $segment;
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next <i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';   
            $this->pagination->initialize($config);
	    $db->select('*');
	    $db->order_by($tbl1.'.id','desc');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $db->limit($config['per_page'], $this->uri->segment($segment));
	    $where = $array;
	    $db->where($where);
	    $query = $db->get();
            return $query; 
    }
    
    // ########################### GET JOIN SEARCH #############################3
    function get_where_join_search($tbl1,$tbl2,$join_by,$database,$array,$search,$search_by,$limit,$offset)
    {
	$db = $this->load->database($database,TRUE);
            $db->select('*');
	    $db->like($tbl2.'.'.$search_by,$search);
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $where = $array;
	    $db->where($where);
	    if($limit != ''){
		$db->limit($limit,$offset);
		}
	    $query = $db->get();
	    return $query;
    }
    function get_where_join_search_pagination($tbl1,$tbl2,$join_by,$database,$array,$search,$search_by,$per_page,$url)
    {
	$db = $this->load->database($database,TRUE);
	 $this->load->library('pagination');
            $config['base_url']   = base_url().$url.'?search='.$this->input->get('search').'&search_by='.$this->input->get('search_by');
            
	    // QUERY BANTUAN UNTUK ROWS KETIKA DI SEARCH
	    $db->select('*');
	    $db->like($tbl2.'.'.$search_by,$search);
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $where = $array;
	    $db->where($where);
	    $query_num = $db->get();
	    $config['total_rows'] = $query_num->num_rows();
            // END QUERY BANTUAN
	    
	    $config['per_page']   = $per_page;
	    $config['page_query_string'] = TRUE;
	    $config['query_string_segment'] = 'offset';
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next <i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';   
            $this->pagination->initialize($config);
	    $db->select('*');
	    $db->like($tbl2.'.'.$search_by,$search);
	    $db->order_by($tbl2.'.id','desc');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $db->limit($config['per_page'], $this->input->get('offset'));
	    $where = $array;
	    $db->where($where);
	    $query = $db->get();
            return $query; 
    }
    
    // ########################### GET JOIN SEARCH #############################3
    function get_join_search($tbl1,$tbl2,$join_by,$database,$search,$search_by)
    {
	$db = $this->load->database($database,TRUE);
            $db->select('*');
	    $db->like($tbl2.'.'.$search_by,$search);
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $query = $db->get();
	    return $query;
    }
    function get_join_search_pagination($tbl1,$tbl2,$join_by,$database,$search,$search_by,$per_page,$url)
    {
	$db = $this->load->database($database,TRUE);
	 $this->load->library('pagination');
            $config['base_url']   = base_url().$url.'?search='.$this->input->get('search').'&search_by='.$this->input->get('search_by');
            
	    // QUERY BANTUAN UNTUK ROWS KETIKA DI SEARCH
	    $db->select('*');
	    $db->like($tbl2.'.'.$search_by,$search);
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $query_num = $db->get();
	    $config['total_rows'] = $query_num->num_rows();
            // END QUERY BANTUAN
	    
	    $config['per_page']   = $per_page;
	    $config['page_query_string'] = TRUE;
	    $config['query_string_segment'] = 'offset';
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next <i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';   
            $this->pagination->initialize($config);
	    $db->select('*');
	    $db->like($tbl2.'.'.$search_by,$search);
	    $db->order_by($tbl2.'.id','desc');
	    $db->from($tbl1);
	    $db->join($tbl2, $join_by);
	    $db->limit($config['per_page'], $this->input->get('offset'));
	    $query = $db->get();
            return $query; 
    }
    
     // ########################### GET SEARCH #############################3
    function get_search($tbl,$database,$search,$search_by,$limit,$offset)
    {
	$db = $this->load->database($database,TRUE);
            $db->order_by("id", "desc");
            $db->like($search_by,$search);
            $query = $db->get($tbl,$limit);
            return $query; 
    }
    
    function get_search_pagination($tbl,$database,$search,$search_by,$per_page,$url)
    {
	$db = $this->load->database($database,TRUE);
            $this->load->library('pagination');
            $config['base_url']   = base_url().$url.'?search='.$this->input->get('search').'&search_by='.$this->input->get('search_by');
            
	    // QUERY BANTUAN UNTUK ROWS KETIKA DI SEARCH
	    $db->like($search_by,$search);
	    $query_num = $db->get($tbl);
	    $config['total_rows'] = $query_num->num_rows();
            // END QUERY BANTUAN
	    
	    $config['per_page']   = $per_page;
	    $config['page_query_string'] = TRUE;
	    $config['query_string_segment'] = 'offset';
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next <i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';   
            $this->pagination->initialize($config);
            $db->order_by("id", "desc");
	    $db->like($search_by,$search);
            $query = $db->get($tbl,$config['per_page'],$this->input->get('offset'));
            return $query; 
    }
 
     // ########################### GET WHERE #############################3
    function get_where($tbl,$database,$array,$limit,$offset)
    {
	$db = $this->load->database($database,TRUE);
        $db->order_by("id","desc");
        $query = $db->get_where($tbl,$array,$limit,$offset);
        return $query;
    }
    
    function get_where_pagination($tbl,$database,$array,$per_page,$segment,$url)
    {
	$db = $this->load->database($database,TRUE);
            $this->load->library('pagination');
            $config['base_url']   = base_url().$url.'?search='.$this->input->get('search').'&search_by='.$this->input->get('search_by');
            
	    // QUERY BANTUAN UNTUK ROWS KETIKA DI SEARCH
	    
	    $query_num = $db->get_where($tbl,$array);
	    $config['total_rows'] = $query_num->num_rows();
            // END QUERY BANTUAN
	    
	    $config['per_page']   = $per_page;
	    $config['page_query_string'] = TRUE;
	    $config['query_string_segment'] = 'offset';
            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next <i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';   
            $this->pagination->initialize($config);
            $db->order_by("id", "desc");
            $query = $db->get_where($tbl,$array,$config['per_page'],$this->input->get('offset'));
            return $query; 
    }
    
    
    function get_field($tbl,$field,$call)
    {
         
    }
    
    function get_where_admin($tbl)
    {
        
    }
    
       
    function get_random($tbl,$database,$limit,$offset)
    {
	$db = $this->load->database($database,TRUE);
        $db->order_by("id","random");
        $query = $db->get($tbl,$limit,$offset);
        return $query;
    }
    
    function delete($tbl,$database,$param,$id)
    {
	$db = $this->load->database($database,TRUE);
        $db->where($param, $id);
        $db->delete($tbl);
    }
    
    function insert($tbl,$database,$arr)
    {
	$db = $this->load->database($database,TRUE);
        $data = $arr;
        $db->insert($tbl,$data);        
    }
    function update($tbl,$database,$arr,$id)
    {
	$db = $this->load->database($database,TRUE);
        $data = $arr;
	$db->where('id', $id);
	$db->update($tbl, $data);
    }
    
    function update_where($tbl,$database,$arr,$where,$value)
    {
	$db = $this->load->database($database,TRUE);
        $data = $arr;
	$db->where($where,$value);
	$db->update($tbl, $data);
    }
    
    function get_sum($tbl,$database,$sum)
    {
	$db = $this->load->database($database,TRUE);
	$db->select_sum($sum);
	$query = $db->get($tbl);
	return $query;
    }
    
}