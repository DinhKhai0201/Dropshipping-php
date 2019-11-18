<?php include_once 'views/admin/layout/' . $this->layout . 'top.php'; ?>

<?php vendor_html_helper::contentheader('Orders <small>management</small>', [
  [
    'title' =>  'Orders',
    'urlp' => ['ctl' => $app['ctl']]
  ],
  [
    'title' =>  'Detail of order ' ,
    'urlp'  =>  ['ctl' => $app['ctl'], 'act' => $app['act']]
  ]
]); ?>

<section class="content">
  <?php
  include_once 'views/admin/orders/_form.php';
  ?>

</section>
</div>

<?php include_once 'views/admin/layout/' . $this->layout . 'footer.php'; ?>