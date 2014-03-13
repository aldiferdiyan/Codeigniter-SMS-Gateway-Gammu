<script type='text/javascript'>
    
$(function(){
    
   $("#form").validate({
      rules: {
         username: {
            required: true,
            minlength: 4,
            remote: "<?php echo base_url('daftar/ajax_check_username');?>",
            },
         password: {
            required: true,
            minlength: 4,
          },
         password_konfirmasi: {
            required: true,
            equalTo: "#password",
          },
        email: {
            required: true,
            email: true,
            remote: "<?php echo base_url('daftar/ajax_check_email');?>",
          },
          nama: {
            required: true,
            minlength: 4,
          },
          no_telepon: {
            required: true,
            minlength: 6,
            number: true,
          },
          jenis_kelamin: {
            required: true,
          },
          tgl: {
            required: true,
          },
          tanggal: {
            required: true,
          },
          bulan: {
            required: true,
          },
          tahun: {
            required: true,
          },
          security_code: {
            required: true,
          },
          persetujuan: {
            required: true,
          },
        },
       messages: { 
           username: {
            remote: "ID is already registered"
            },
            email: {
              remote: "Email is already registered"   
            },
         },
         onkeyup: false
     });
});
	
</script>
<style>
    .error{
        color: #ff0000;
    }
</style>