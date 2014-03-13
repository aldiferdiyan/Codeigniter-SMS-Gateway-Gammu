<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

        function __construct()
        {
            parent::_construct();
             
        }
    
    function BTcheckbox($name = NULL,$value = NULL, $row = NULL,$checked = NULL)
        {
            if(!empty($row)){
                
                $data = '<div class="checkbox"><label>';
                $data .= "<input type='checkbox' name='".$name."' value='".$value."' $checked>". $row;
                $data .= '</label></div> ';
                return $data;
            }
        }
        
     
    function BTpanel($args = 'open',$heading = NULL, $typeHeading = 'default' )
    {
        if(!empty($args))
        {
            if($args == 'open')
            {
                $data = '<div class="panel panel-'.$typeHeading.'">';
                $data .= '<div class="panel-heading">'.$heading.'</div>';
                $data .= '<div class="panel-body">';
            }
            elseif($args == 'close')
            {
                $data  = '</div>';
                $data .= '</div>';
            }
            return $data;
        }
    }
    
    function BTactive($uri,$args)
    {
        if($uri == $args)
        {
           return "class='active'";
        }
        
    }
    
    function BTinput($type,$name,$placeholder)
    {
        if($type == 'text' OR $type == 'password')
        {
            $data = "<input type='".$type."' name='".$name."' placeholder='".$placeholder."' class='form-control'>";
            return $data;
        }
    }
    
    function BTselect($name,$value,$text)
    {
           
            $data = "<select class='form-control' name='".$name."'>";
            $data .= "<option value='".$value."'>".$text."</option>";
           
            return $data;
    }