<!DOCTYPE html>
<html lang="en">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                Adminpanel
            </title>
            <?php echo $this->load->view('admin/_include');?>
            <?php echo $this->load->view('admin/_js');?>
            
        <style>
                
select,
input[type=text],
input[type=password],
input[type=email],
textarea{
   border-radius: 0px;
}
select:focus,
input[type=text]:focus,
input[type=password]:focus,
input[type=email]:focus,
textarea:focus{
   box-shadow: 0px 0px 0px #000;
   border: 1px solid #0080c0;
}
        </style>
            
        </head>
        <body>
            <?php echo $this->load->view('admin/_header');?>
       
        
        <div class="container-fluid"  style='min-height:500px;padding-top: 30px;'>
        <div class='row-fluid'>
     
            
            <div class="span2" >
            <?php echo $this->load->view('admin/_sidebar');?>
            </div>
        
            <div class="span10" >
               
            <?php echo $content;?>
            
            </div>
            
            
        </div>
          
        </div>
             <?php echo $this->load->view('admin/_footer');?>
          
          
            
        </body>
    </html>