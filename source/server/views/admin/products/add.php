<?php include_once 'views/admin/layout/' . $this->layout . 'top.php'; ?>
<?php

?>
<?php vendor_html_helper::contentheader('Products <small>management</small>', [
  [
    'title' =>  'Index Products',
    'urlp' => ['ctl' => $app['ctl']]
  ],
  ['urlp'  =>  ['ctl' => $app['ctl'], 'act' => $app['act']]]
]); ?>

<section class="content">
  <?php
  include_once 'views/admin/products/_form.php';
  ?>
  <script type="text/javascript">
    CKEDITOR.replace('editor1', {});
    CKEDITOR.config.baseFloatZIndex = 100001;
  </script>

</section>

</div>
<!-- /.box -->
<?php include_once 'views/admin/layout/' . $this->layout . 'footer.php'; ?>