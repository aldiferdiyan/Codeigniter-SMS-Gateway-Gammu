<div class='row-fluid'>
<div class="span12">
   
<?php echo $this->load->view('_layouts/menus');?>   

    <!--START FORM-->
    <form method='POST' charset='UTF-8' action='<?php echo base_url('{action}/create');?>' class="form form-horizontal" >
        
       {field}
       
<!--Submit -->
<div class="control-group ">
<div class="controls">
<a href='<?php echo base_url('{action}');?>' class="btn"><i class='fa fa-times'></i> Cancel</a>
<button data-loading-text="Loading ..." type="submit" class="submit btn btn-primary"><i class="fa fa-location-arrow"></i> Submit</button>
</div>
</div>
<!--end submit -->

    </form>
    <!--END FORM-->
</div>
</div>