<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>

<?php vendor_html_helper::contentheader('Advertisements <small>management</small>', [
    [
      'title' =>  'Advertisements',
      'urlp'=>['ctl'=>$app['ctl']]],
    [
      'title' =>  'Detail of '.$this->record['title'],
      'urlp'  =>  ['ctl'=>$app['ctl'], 'act'=>$app['act']]
    ]
]); ?>

<section class="content">
	<?php 
		include_once 'views/admin/ads/_form.php';
	?>
</section>
</div>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>