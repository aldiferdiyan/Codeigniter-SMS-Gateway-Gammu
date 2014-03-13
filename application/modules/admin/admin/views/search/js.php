<script type='text/javascript'>
$(function(){
 $("[data-confirm]").on("click submit", function(){
    return confirm($(this).data("confirm"));
 }); 
});
</script>