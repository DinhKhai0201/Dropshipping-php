
<form action="/about/test" method="POST" enctype="multipart/form-data">         
	<input type="file" name="image" />
	<input type="submit"/>
</form>     

<input type="file" name="image" id="cv_file"/>
<button class="Addbase64">AddBase64</button>

<?='---fulllink '.vendor_app_util::getUrlAws('2019/08/05/2019-08-05-156497051223054Bản đồ hướng dẫn cho lập trình viên DevOps _ Facebook.pdf', "users").'====';?>

<script type='text/javascript' src='<?php echo RootREL; ?>media/libs/jquery/jquery.min.js'></script>
<script>
$(document).ready(function(){
  var base64;
  $('#cv_file').change(function(){
    var file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        base64=reader.result;
        console.log('base', base64);
    }
    reader.readAsDataURL(file);
  });

  $('.Addbase64').click(function(){
    let formData = {
      base64: base64
    }
    $.ajax({
      url: "/about/test2",
      data: formData,
      type: "POST",
      success: function (data) {
        console.log('data1', data);
      },
      error: function (err) {
        console.log('data2', data);
      }
    })
  })
})

</script>