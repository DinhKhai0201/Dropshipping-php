<?php 
    global $mediaFiles;
    array_push($mediaFiles['css'], RootREL."media/css/custom_style.css");
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<div class="wrapper">
    <div class="iw-overlay"></div>
    <div class="iw-header-version3 iw-header-version6">
        <div class="header header-default header-style-default v3 v6 header-sticky no-header-sticky-mobile ">
            <?php include_once 'views/layout/'.$this->layout.'navbar.php'; ?>
        </div>
    </div>   
	<div class="entry-content">
		<div class="page-content page-content-404">
			<div class="container">
				<div class="error-404 not-found">
					<div class="text_404">404</div>
					<div class="text_label_404">Not Found</div>
						<div class="home_link"> <span>Return </span> <a href="<?=vendor_app_util::url(array('ctl'=>''))?>"> Homepage</a>
						</div>
					</div>
				</div>
			</div>
		</div>

    </div>
</div>            
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>