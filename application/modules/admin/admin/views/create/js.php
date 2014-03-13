<script type='text/javascript'>
  $(function(){
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    
    $('.form').submit(function(){
        $('.submit').button('loading');
    });
});
</script>