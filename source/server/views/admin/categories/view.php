<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>

<?php vendor_html_helper::contentheader('Categories <small>management</small>', [
    [
      'title' =>  'Categories',
      'urlp'=>['ctl'=>$app['ctl']]],
    [
      'title' =>  'Detail of '.$this->record['name'],
      'urlp'  =>  ['ctl'=>$app['ctl'], 'act'=>$app['act']]
    ]
]); ?>

<section class="content">
	<?php 
		include_once 'views/admin/categories/_form.php';
	?>
</section>
</div>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>