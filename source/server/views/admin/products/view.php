<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>

<?php vendor_html_helper::contentheader('Products <small>management</small>', [
    [
      'title' =>  'Products',
      'urlp'=>['ctl'=>$app['ctl']]],
    [
      'title' =>  'Detail of '.$this->record['name'],
      'urlp'  =>  ['ctl'=>$app['ctl'], 'act'=>$app['act']]
    ]
]); ?>

<section class="content">
	<?php 
		include_once 'views/admin/products/_form.php';
	?>
</section>
</div>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>