<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<?php  
	
?>
<?php vendor_html_helper::contentheader('Users <small>management</small>', [
    [
      'title' =>  'Index Users',
      'urlp'=>['ctl'=>$app['ctl']]
    ],
    ['urlp'  =>  ['ctl'=>$app['ctl'], 'act'=>$app['act']]]
]); ?>

<section class="content">
	<?php 
		include_once 'views/admin/users/_form.php';
	?>

</section>

</div>
  <!-- /.box -->
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
<script src="<?php echo RootREL; ?>media/admin/js/users_table.js"></script>
<script> 
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#output').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }
	$("#avata").change(function () {
        readURL(this);
	});
</script>
